<?php
class AddPastPaperController extends Controller{

    public static function AddPastPaper(){

        $passingSubjects=AddPastPaperModel::getSubjectData();
        $recentUploads = AddPastPaperModel::getRecentUploads();
        $sendingData = array($passingSubjects, $recentUploads);
        self::createView("addPastPaperView",$sendingData);

        //get data to store in database
        if(isset($_POST['upload'])){
            $examinationYear = $_POST['examinationYear'];
            $academicYear = $_POST['academicYear'];
            $semester = $_POST['semester'];
            $subject = $_POST['subject'];
            $name = $_FILES['myFile']['name'];
            $fileLocation = $_FILES['myFile']['tmp_name'];
            echo ($name);
            //calculate semester as 1,2,3,4,5,6,7,8
            $semList = array(array(1, 2), array(3, 4), array(5, 6), array(7, 8));
	        $realSemester = $semList[$academicYear - 1][$semester - 1];
	        //to add
            $pastPaperDetail = new PastPaper();
            $pastPaperDetail->setPastPaper($subject, $examinationYear, $semester);
	        $isSuccess =  AddPastPaperModel::addPastPaperDetails($pastPaperDetail);


            echo("$examinationYear, $academicYear, $realSemester, $subject, $fileLocation");
        }
    }
}