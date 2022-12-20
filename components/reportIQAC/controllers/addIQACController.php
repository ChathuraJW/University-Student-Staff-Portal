<?php
class AddIQACController extends Controller{

    public static function AddIQACReport(){

        $lecturerList=AddIQACModel::getLecturer();
        $passingSubjects=AddIQACModel::getSubjectData();
        $sendData=array($lecturerList,$passingSubjects);
        self::createView("addIQACView",$sendData);
        
        
        if(isset($_POST['upload'])){
            $staffID = $_POST['lecturer'];
            $examinationYear = $_POST['examinationYear'];
            //$academicYear = $_POST['academicYear'];
            //$semester = $_POST['semester'];
            $subjectCode = $_POST['subject'];
            $name = $_FILES['myFile']['name'];
            $fileLocation = $_FILES['myFile']['tmp_name'];
            $fileNameCmps = explode(".", $name);
            $fileExtension = strtolower(end($fileNameCmps));

            //check all inputs fill in it's feilds
            if(!$staffID || !$examinationYear || !$subjectCode || !$name || !$fileNameCmps || !$fileExtension){
                echo("<script>createToast('Warning(error code:#IQAC01-T)','Failed to get inputs from input feilds.','W')</script>");
            }
             

	        //get subject name 
	        $subjectName = AddIQACModel::getSubjectName($subjectCode);

	        
        

            //check the files are in pdf
            if($fileExtension == 'pdf'){
                //create file name
                $reportName = "$staffID-$subjectCode-$subjectName-$examinationYear ,$semesterInWords.$fileExtension";

                $reportDetail = new IQACReport();
                $reportDetail->setReportDetail($staffID, $subjectCode, $examinationYear, $realSemester,$reportName, $fileLocation);
	            $insertDetail =  AddIQACModel::addReportDetails($reportDetail);
            }

        }
    }
}