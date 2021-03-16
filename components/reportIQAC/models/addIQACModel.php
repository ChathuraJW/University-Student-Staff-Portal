<?php
    class AddIQACModel extends Model{
        public static function getLecturer(){
            $sqlQuery = "SELECT userName,fullName FROM user WHERE role='AS'";
            $lecturers = Database::executeQuery("root","",$sqlQuery);

            if($lecturers){
                $lecturersList = array();
                foreach($lecturers as $data){
                    $newLecturer = new User();
                    $newLecturer->setUser($data['userName'],$data['fullName']);
                    $lecturersList[]=$newLecturer;
                }
                return $lecturersList;
            }else{
                return false;
            }
        }

        public static function getSubject(){
            $sqlQuery = "SELECT courseCode,name FROM course_module";
            $subjects = Database::executeQuery("root","",$sqlQuery);

            if($subjects){
                $subjectList = array();
                foreach($subjects as $data){
                    $newSubject = new courseModule();
                    $newSubject->setSubjects($data['courseCode'],$data['name']);
                    $subjectList[]=$newSubject;
                }
                return $subjectList;
            }else{
                return false;
            }
        }


        public static function insertData($reportDetail){
            $dbObject = new Database();
            $dbObject->establishTransaction('root','');
            $insertQuery = "INSERT INTO iqac_report(subjectCode,staffID,fileLocation,academicYear,batchYear,semester) 
                            VALUES('".$reportDetail->getSubject()."','".$reportDetail->getStaffID()."','".$reportDetail->getFileLocation()."',".$reportDetail->getAcademicYear().",".$reportDetail->getBatchYear().",".$reportDetail->getSemester().")";
            echo $insertQuery;
            $dbObject->executeTransaction($insertQuery); 
             

            //create audit trial
            $dbObject->transactionAudit($insertQuery,'iqac_report','INSERT',"IQAC report details upload to the database");

            if($dbObject->getTransactionState()){
                $name = $_FILES['file']['name'];
                $tempName = $_FILES['file']['tmp_name'];
                if(isset($name) && !empty($tempName)){
                    $location = './assets/iqacReports/';
                    $fileName = $reportDetail->getReportName();
                    echo("File Name - $fileName");

                    if(move_uploaded_file($tempName,$location.$fileName)){
                        if($dbObject->commitToDatabase()){
                            echo("<script>createToast('Success','IQAC report successfully uploaded','S')</script>");
                        }else{
                            echo("<script>createToast('Warning(error code:#IQACM02)','Failed to Upload','W')</script>");
                        }
                    }else{
                        echo("<script>createToast('Warning(error code:#IQACM02)','Failed to Upload','W')</script>");
                    }
                }else{
                    echo("<script>createToast('Warning(error code:#IQACM02)','Failed to Upload','W')</script>");
                }
            }else{
                echo("<script>createToast('Warning(error code:#IQACM02)','Failed to Upload','W')</script>");
            }
            $dbObject->closeConnection();
        }
        
         
    }