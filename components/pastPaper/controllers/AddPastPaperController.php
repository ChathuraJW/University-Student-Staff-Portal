<?php
class AddPastPaperController extends Controller{

    public static function AddPastPaper(){

        $passingSubjects=AddPastPaperModel::getSubjectData();
        $recentUploads = AddPastPaperModel::getRecentUploads();
        $sendingData = array($passingSubjects, $recentUploads);
        self::createView("addPastPaperView",$sendingData);
    }
}