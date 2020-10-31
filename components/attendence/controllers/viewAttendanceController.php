<?php
class ViewAttendanceController extends Controller{

    public static function viewAttendance(){

        $passingSubjects=viewAttendanceModel::getSubjectData();
        self::createView("viewAttendanceView",$passingSubjects);
    }
}