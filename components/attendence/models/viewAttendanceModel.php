<?php
class ViewAttendanceModel extends Model{

    public static function loadAttendanceData(){
         $regNo = $_COOKIE['userName'];
        $sqlQuery = "SELECT indexNo FROM student WHERE regNo='$regNo'"; //getting index number from student table 
        $index = Database::executeQuery("student","student@16",$sqlQuery)[0]['indexNo'];
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
            $courseDetail = Database::executeQuery("student","student@16",$sqlQuery);
            $sqlQuery = "SELECT date, week, attendance, description FROM attendance WHERE enrollmentID=$enrollmentId ORDER BY week";//how to get enrollment id
            $attendanceDetail = Database::executeQuery("student","student@16",$sqlQuery);
            $temp = array($courseDetail[0],$attendanceDetail);
            array_push($finalAttendanceArray,$temp);

            
            if($attendanceDetail){
                // array_push($courseSet,$courseDetail);
                // array_push($attendanceSet,$attendanceDetail);
            }
            // print_r($temp);
            
        }
        
        // print_r($courseSet);
        // echo("<br>");
        // print_r($attendanceSet);
        // echo("<br>");
        // print_r($finalAttendanceArray);
        return $finalAttendanceArray;
    }

    public static function getEnrollmentID($studentID){
        $sqlQuery = "SELECT enrollmentID,courseCode FROM student_enroll_course WHERE studentIndexNo=$studentID AND isActive=TRUE";
        return Database::executeQuery("student", "student@16", $sqlQuery);
        
    }

    public static function sendInquiryMessage($week , $subject ,$message){
        $regNo = $_COOKIE['userName'];
        $finalMessage = (" Week :$week<br>\n Subject :$subject<br>\n message :$message");
        // echo("$finalMessage");
        $sqlQuery = "INSERT INTO attendance_inquiry( sendBy, message, sendDate) VALUES ('$regNo','$finalMessage',NOW())";
        $isSend = Database::executeQuery("student","student@16",$sqlQuery);
        if($isSend){
            echo("Send Successfully!!");
        }
        else{
            echo("Send Failed!!");
        }

    }
}