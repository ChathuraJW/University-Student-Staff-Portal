<?php
class ViewAttendanceController extends Controller{

    public static function viewAttendance(){

        $passingSubjects=viewAttendanceModel::getSubjectData();
        $attendanceData = viewAttendanceModel::loadAttendanceData();
        print_r($attendanceData);
        self::createView("viewAttendanceView",$passingSubjects);
    }
}