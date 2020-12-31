<?php
class ViewPastPaperController extends Controller{

    public static function viewPastPaper(){
        $passingSubjects=ViewPastPaperModel::getSubjectData();

        if(isset($_POST['search'])){
            $examinationYear = $_POST['examinationYear'];
            $academicYear = $_POST['academicYear'];
            $semester = $_POST['semester'];
            $subject = $_POST['subject'];

            //            check whether all inputs are set or not
            if(!$examinationYear || !$academicYear || !$semester || !$subject){
                echo("<script>createToast('Warning(error code:#PPM02-T)','Failed to get inputs.','W')</script>");
            }

            //calculate semester as 1,2,3,4,5,6,7,8
            if($semester == 0){
                $realSemester= 0;
            }else{
                $semList = array(array(1, 2), array(3, 4), array(5, 6), array(7, 8));
                $realSemester = $semList[$academicYear - 1][$semester - 1];
            }
//            echo("$examinationYear, $realSemester,$subject, $academicYear");
            $searchResults = ViewPastPaperModel::showSearchResult($examinationYear,$realSemester,$subject);

            $sendingData = array($passingSubjects, $searchResults,"Search Results");
            self::createView("viewPastPaperView",$sendingData);

            //        display error toast for data loading error
            if(!$passingSubjects)
                echo("<script>createToast('Warning (error code: #PPM03-T)','Failed to load review list.','W')</script>");
        }else{
            $recentUploads = ViewPastPaperModel::getRecentUploads();
            $sendingData = array($passingSubjects, $recentUploads,"Recent Uploads");
            self::createView("viewPastPaperView",$sendingData);

            //        display error toast for data loading error
            if(!$passingSubjects)
                echo("<script>createToast('Warning (error code: #PPM03-T)','Failed to load review list.','W')</script>");
        }
    }
}