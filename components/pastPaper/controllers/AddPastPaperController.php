<?php
class AddPastPaperController extends Controller{

    public static function AddPastPaper(){

        // $passingSubjects=viewAttendanceModel::getSubjectData();
        self::createView("addPastPaperView");
    }
}