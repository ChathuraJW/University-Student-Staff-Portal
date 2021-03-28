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
            if($examinationYear==0 AND $academicYear==0 AND $semester==0 AND $subject==0){
                $recentUploads = ViewPastPaperModel::getRecentUploads();
                $sendingData = array($passingSubjects, $recentUploads,"Recent Uploads");
                self::createView("viewPastPaperView",$sendingData);

                //        display error toast for data loading error
                echo("<script>createToast('Warning(error code:#PPM02-T)','Need to fill at least one field.','W')</script>");
            }else{
                $searchResults = ViewPastPaperModel::showSearchResult($examinationYear,$semester,$subject,$academicYear);
                $sendingData = array($passingSubjects, $searchResults,"Search Results");
                self::createView("viewPastPaperView",$sendingData);

                //        display error toast for data loading error
                if(!$passingSubjects)
                    echo("<script>createToast('Warning (error code: #PPM03-T)','Failed to load review list.','W')</script>");
            }


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


