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
            $academicYear = $_POST['academicYear'];
            $semester = $_POST['semester'];
            $subjectCode = $_POST['subject'];
            $name = $_FILES['myFile']['name'];
            $fileLocation = $_FILES['myFile']['tmp_name'];
            $fileNameCmps = explode(".", $name);
            $fileExtension = strtolower(end($fileNameCmps));

            //check all inputs fill in it's feilds
            if(!$staffID || !$examinationYear || !$academicYear || !$semester || !$subjectCode || !$name || !$fileNameCmps || !$fileExtension){
                echo("<script>createToast('Warning(error code:#IQAC01-T)','Failed to load inputs.','W')</script>");
            }
            //semester values (1,2,3,4,5,6,7,8)
            $semList = array(array(1, 2), array(3, 4), array(5, 6), array(7, 8));
	        $realSemester = $semList[$academicYear - 1][$semester - 1];

	        //get subject name 
	        $subjectName = AddIQACModel::getSubjectName($subjectCode);

	        
            if($semester == 1){
                $semesterInWords = "First Semester";
            }else{
                $semesterInWords = "Second Semester";
            }

            
            if($academicYear == 1){
                $academicYearInWords = "First Year";
            }else if($academicYear == 2){
                $academicYearInWords = "Second Year";
            }else if($academicYear == 3){
                $academicYearInWords = "Third Year";
            }else{
                $academicYearInWords = "Fourth Year";
            }

            //check the files are pdf or zip
            if($fileExtension == 'pdf' || $fileExtension == 'zip'){
                //create file name
                $reportName = "$staffID-$subjectCode-$subjectName-$examinationYear $academicYearInWords,$semesterInWords.$fileExtension";

                $reportDetail = new IQACReport();
                $reportDetail->setReportDetail($staffID, $subjectCode, $examinationYear, $realSemester,$reportName, $fileLocation);
	            $isSuccess =  AddIQACModel::addReportDetails($reportDetail);
            }

        }
    }
}