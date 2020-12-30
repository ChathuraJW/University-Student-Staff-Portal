<?php
class ViewPastPaperController extends Controller{

    public static function viewPastPaper(){
        $passingSubjects=ViewPastPaperModel::getSubjectData();
        $recentUploads = ViewPastPaperModel::getRecentUploads();
        $sendingData = array($passingSubjects, $recentUploads);
        self::createView("viewPastPaperView",$sendingData);
    }
}