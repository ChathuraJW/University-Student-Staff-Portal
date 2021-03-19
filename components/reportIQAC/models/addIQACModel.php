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

    public static function getSubjectData():array|bool{
        $sqlQuery = "SELECT courseCode, name, semester FROM course_module ORDER BY semester";
        $subjects = Database::executeQuery('root','',$sqlQuery);

        if($subjects){
            $subjectList = array();
            foreach ($subjects as $row){
                $newSubject = new courseModule();
                $newSubject->setCourseModule($row['courseCode'], $row['name'], $row['semester']);
                $subjectList[] = $newSubject;
            }
            return $subjectList;
        }else{
           return false;
        }

    }

    public static function addReportDetails($report){
        $databaseInstance = new Database();
        $databaseInstance->establishTransaction('root','');
        $sqlQuery = "INSERT INTO iqac_report(staffID, subjectCode, 	fileLocation, examinationYear, semester,reportName) VALUES ('".$report->getStaffID()."','".$report->getSubjectCode()."','".$report->getFileLocation()."',".$report->getExaminationYear().",".$report->getSemester().",'".$report->getReportName()."')";
        $databaseInstance->executeTransaction($sqlQuery);
       
        //create audit trail
        $databaseInstance->transactionAudit($sqlQuery,'iqac_report', 'INSERT',"IQAC Report uploaded to the system." );


        if($databaseInstance->getTransactionState()){
            $name = $_FILES['myFile']['name'];
            $tempName = $_FILES['myFile']['tmp_name'];
            if(isset($name) and !empty($tempName)){
                $location = './assets/IQACreports/';
                $fileName = $report->getReportName();
                echo("File name- $fileName");
                if(move_uploaded_file($tempName, $location . $fileName)){
                    //commit to database
                    if($databaseInstance->commitToDatabase()) {
                        echo("<script>createToast('Success','Report file is successfully uploaded','S')</script>");
                    }else{
                        echo("<script>createToast('Warning(error code:#IQAC02-T)','Failed to upload report file','W')</script>");
                    }
                }else{
                    echo("<script>createToast('Warning(error code:#IQAC02-T)','Failed to upload report file','W')</script>");

                }
            }else{
                echo("<script>createToast('Warning(error code:#IQAC02-T)','Failed to upload report file','W')</script>");

            }
        }else{
            echo("<script>createToast('Warning(error code:#IQAC02-T)','Failed to upload report file','W')</script>");
        }
        $databaseInstance->closeConnection();
    }


    public static function getSubjectName($subjectCode){
        $sqlQuery = "SELECT name FROM course_module WHERE courseCode = '$subjectCode'";
        return Database::executeQuery('root', '',$sqlQuery)[0]['name'];

 
    }


}