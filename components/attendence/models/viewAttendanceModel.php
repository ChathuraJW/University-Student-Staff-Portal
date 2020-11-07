<?php
class ViewAttendanceModel extends Model{

    public static function loadAttendanceData(){
        // $regNo = $_COOKIE['userName'];
        $regNo = '2018cs136';
        $sqlQuery = "SELECT indexNo FROM student WHERE regNo='$regNo'"; //getting index number from student table 
        $index = Database::executeQuery("root","",$sqlQuery);

        $enrollmentDetail = self::getEnrollmentID($index);
        $attendanceSet=array();
        foreach($enrollmentDetail as $attendanceEntry){
            $enrollmentId = $attendanceEntry['enrollmentID'];
            $sqlQuery = "SELECT date, week, attendance, description FROM attendance WHERE enrollmentID=$enrollmentId ORDER BY week";//how to get enrollment id
            $attendanceDetail = Database::executeQuery("root","",$sqlQuery);
            array_push($attendanceSet,$attendanceDetail);
            return $attendanceSet;
        }
    }

    public static function getEnrollmentID($studentID){
        $sqlQuery = "SELECT enrollmentID,courseCode FROM student_enroll_course WHERE studentIndexNo=18001361 AND isActive=TRUE";
        return Database::executeQuery("root", "", $sqlQuery);
        
    }


}