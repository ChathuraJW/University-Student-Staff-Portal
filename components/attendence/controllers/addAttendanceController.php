<?php
class AddAttendanceController extends Controller{
    
    public static function addAttendance(){
        
        $passingSubjects=AddAttendanceModel::getSubjectData();
        // print_r($passingSubjects);
        self::createView("addAttendanceView",$passingSubjects);
    }
}
