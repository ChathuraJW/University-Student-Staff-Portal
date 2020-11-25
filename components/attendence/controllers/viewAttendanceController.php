<?php
class ViewAttendanceController extends Controller{

    public static function viewAttendance(){

        $passingSubjects=viewAttendanceModel::getSubjectData();
        $attendanceData = viewAttendanceModel::loadAttendanceData();
        // print_r($attendanceData);
        $sendData = array($passingSubjects,$attendanceData);
        self::createView("viewAttendanceView",$sendData);

        if(isset($_POST['send'])){
            $week = $_POST['week'];
            $subject = $_POST['subject'];
            $message = $_POST['message'];
            // echo("$week $subject $message");
            $isSend = ViewAttendanceModel::sendInquiryMessage($week, $subject, $message);

        }
    }
}