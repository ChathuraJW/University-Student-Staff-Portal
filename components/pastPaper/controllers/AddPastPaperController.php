<?php
class AddPastPaperController extends Controller{

    public static function AddPastPaper(){

        $passingSubjects=AddPastPaperModel::getSubjectData();
//        $sendingData = array($passingSubjects);
        self::createView("addPastPaperView",$passingSubjects);

        //get data to store in database
        if(isset($_POST['upload'])){
            $examinationYear = $_POST['examinationYear'];
            $academicYear = $_POST['academicYear'];
            $semester = $_POST['semester'];
            $subjectCode = $_POST['subject'];
            $name = $_FILES['myFile']['name'];
            $fileLocation = $_FILES['myFile']['tmp_name'];
//            $fileType = $_FILES['myFile']['type'];
            $fileNameCmps = explode(".", $name);
            $fileExtension = strtolower(end($fileNameCmps));

            //calculate semester as 1,2,3,4,5,6,7,8
            $semList = array(array(1, 2), array(3, 4), array(5, 6), array(7, 8));
	        $realSemester = $semList[$academicYear - 1][$semester - 1];

	        //get subject name according to the subject code
	        $subjectName = AddPastPaperModel::getSubjectName($subjectCode);

	        //semester in words
            if($semester == 1){
                $semesterInWords = "First Semester";
            }else{
                $semesterInWords = "Second Semester";
            }

            //Academic year in words
            if($academicYear == 1){
                $academicYearInWords = "First Year";
            }else if($academicYear == 2){
                $academicYearInWords = "Second Year";
            }else if($academicYear == 3){
                $academicYearInWords = "Third Year";
            }else{
                $academicYearInWords = "Fourth Year";
            }

            //prevent un allowed file types.
            if($fileExtension == 'pdf' || $fileExtension == 'zip'){
                //create the past paper name according to the paper detail
                $paperName = "$subjectCode-$subjectName-$examinationYear $academicYearInWords,$semesterInWords.$fileExtension";

                //to add
                $pastPaperDetail = new PastPaper();
                $pastPaperDetail->setPastPaper($subjectCode, $examinationYear, $semester,$paperName);
	            $isSuccess =  AddPastPaperModel::addPastPaperDetails($pastPaperDetail);
	            //todo success message
            }

        }
    }
}