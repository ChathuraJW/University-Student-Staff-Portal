<?php
    class AddIQACController extends Controller{
        public static function addIQAC(){
            $lecturerList=AddIQACModel::getLecturer();
            $subjectList=AddIQACModel::getSubject();
            $sendData=array($lecturerList,$subjectList);
            self::createView("addIQACView",$sendData);
            //$lecturerName = explode(" - ",$_POST['lecturer'])[1];
            //echo $lecturerName;

            if(isset($_POST["submit"])){
                $lecturerName = explode(" - ",$_POST['lecturer']);
                $staffID = end($lecturerName);
                print_r($staffID);
                //get values of form feilds in view after clicking submit button
                //$staffID = $_POST['lecturer']; //staff id eka userName witarak gann ona 
                $subject = $_POST['subject'];
                $academicYear = $_POST['academicYear'];
                $batchYear = $_POST['batchYear'];
                $semester = $_POST['semester'];

                //get name attribute of file which file name 'file'
                $name = $_FILES['file']['name'];

                //get default file location(temporary) of a file
                $fileLocation = $_FILES['file']['tmp_name'];

                //explode the file name and extenmsion
                $fileNameCmps = explode(".",$name);

                //get file extension from the exploded words
                $fileExtension = strtolower(end($fileNameCmps));

                //check feilds are empty or not
                if(!$staffID || !$subject || !$academicYear || !$batchYear || !$semester || !$name || !$fileNameCmps || !$fileExtension){
                    echo("<script>createToast('Warning(error code:#IQACM01)','All feilds reqired','W')</script>"); 
                }
                 
                $semList = array(array(1,2),array(3,4),array(5,6),array(7,8));
                $realSemester = $semList[$batchYear-1][$semester-1];

                if($semester == 1){
                    $semesterInWords = "First Semester";
                }else{
                    $semesterInWords = "Second Semester";
                }

                if($batchYear == 1){
                    $batchYearInWords = "First Year";
                }else if($batchYear == 2){
                    $batchYearInWords = "Second Year";
                }else if($batchYear == 3){
                    $batchYearInWords = "Third Year";
                }else{
                    $batchYearInWords = "Fourth Year";
                }

                if($fileExtension == 'pdf' || $fileExtension == 'zip'){
                    //create iqac report name
                    $reportName = "$subject-$batchYear-$semester-$academicYear.$fileExtension";

                    //create object from IQACReport class to insert data to the database
                    $reportDetail = new IQACReport();
                    $reportDetail->setDetail($staffID,$subject,$academicYear,$batchYear,$realSemester,$fileLocation,$reportName);
                    $iqacReportDetail = AddIQACModel::insertData($reportDetail);
                }
            }


        }
    } 