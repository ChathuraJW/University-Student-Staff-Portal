<?php
class ViewAttendanceModel extends Model{

    public static function loadAttendanceData(){
        // $regNo = $_COOKIE['userName'];
        $regNo = '2018cs136';
        $sqlQuery = "SELECT indexNo FROM student WHERE regNo='$regNo'"; //getting index number from student table 
        $index = Database::executeQuery("root","",$sqlQuery)[0]['indexNo'];
        // print_r($index);

        $enrollmentDetail = self::getEnrollmentID($index);
        // print_r($enrollmentDetail);
        $attendanceSet=array();
        $courseSet = array();
        $finalAttendanceArray = array();
        foreach($enrollmentDetail as $attendanceEntry){
            $enrollmentId = $attendanceEntry['enrollmentID'];
            $courseCode = $attendanceEntry['courseCode'];
            $sqlQuery = "SELECT courseCode, name FROM course_module WHERE courseCode='$courseCode'";
            $courseDetail = Database::executeQuery("root","",$sqlQuery);
            $sqlQuery = "SELECT date, week, attendance, description FROM attendance WHERE enrollmentID=$enrollmentId ORDER BY week";//how to get enrollment id
            $attendanceDetail = Database::executeQuery("root","",$sqlQuery);
            // print_r($attendanceDetail);
            array_push($courseSet,$courseDetail);
            array_push($attendanceSet,$attendanceDetail);
        }
        array_push($finalAttendanceArray,$courseSet,$attendanceSet);
        // print_r($finalAttendanceArray);
        return $finalAttendanceArray;
    }

    public static function getEnrollmentID($studentID){
        $sqlQuery = "SELECT enrollmentID,courseCode FROM student_enroll_course WHERE studentIndexNo=$studentID AND isActive=TRUE";
        return Database::executeQuery("root", "", $sqlQuery);
        
    }

    public static function sendInquiryMessage($week , $subject ,$message){
        // $regNo = $_COOKIE['userName'];
        $regNo = '2018cs136';
        $finalMessage = (" Week :$week\n Subject :$subject\n message :$message");
        // echo("$finalMessage");
        $sqlQuery = "INSERT INTO attendance_inquiry( sendBy, message, sendDate) VALUES ('$regNo','$finalMessage',NOW())";
        $isSend = Database::executeQuery("root","",$sqlQuery);
        if($isSend){
            echo("Send Successfully!!");
        }
        else{
            echo("Send Failed!!");
        }

    }
}