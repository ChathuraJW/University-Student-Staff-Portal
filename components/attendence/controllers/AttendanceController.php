<?php
class AttendanceController extends controller{
    public static function addAttendance(){
        self::createView("addAttendanceView");
        
    }

    public static function viewAttendance(){
        self::createView("viewAttendanceView");
    }
}
