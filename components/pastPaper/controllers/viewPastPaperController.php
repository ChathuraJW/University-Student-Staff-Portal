<?php
class ViewPastPaperController extends Controller{

    public static function viewPastPaper(){
        $passingSubjects=ViewPastPaperModel::getSubjectData();
        $recentUploads = ViewPastPaperModel::getRecentUploads();
        $sendingData = array($passingSubjects, $recentUploads);


        if(isset($_POST['search'])){
            $examinationYear = $_POST['examinationYear'];
            $academicYear = $_POST['academicYear'];
            $semester = $_POST['semester'];
            $subject = $_POST['subject'];

            //calculate semester as 1,2,3,4,5,6,7,8
            $semList = array(array(1, 2), array(3, 4), array(5, 6), array(7, 8));
            $realSemester = $semList[$academicYear - 1][$semester - 1];

            $pastPaper = new PastPaper();
            $pastPaper->setPastPaper($subject,$examinationYear,$realSemester);
            $isSuccess = ViewPastPaperModel::showSearchResult($pastPaper);
        }else{
            self::createView("viewPastPaperView",$sendingData);
        }
    }
}