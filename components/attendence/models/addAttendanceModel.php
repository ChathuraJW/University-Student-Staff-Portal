<?php
class AddAttendanceModel extends Model{

    // public static function getSubjectName(){
    //     $sqlQuery = "SELECT courseCode,name FROM course_module";
    //     return  Database::executeQuery("root","",$sqlQuery);
    // }
    public static function ProcessAttendanceData( $subject,$date,$week, $attempt, $fileLocation){
        // echo(" $subject $date $week $attempt $fileLocation");
        $attendanceFile = fopen($fileLocation,"r");
        // to ignore header
        $isHeader = true;
        $description = "General";
        // get data from the csv file
        while(!feof($attendanceFile)){
            $attendanceEntry = explode(",",fgets($attendanceFile));
            if($isHeader){
                $isHeader = false;
            }
            else{
                $studentIndex = $attendanceEntry[1];
                $attendance = $attendanceEntry[2];
                $enrollmentID = self::getEnrollmentID($studentIndex, $subject, $attempt);
                // echo(" $enrollmentID $date $week $attendance $description");
                $sqlQuery = "INSERT INTO attendance (enrollmentID, date, week, attendance, description, uploadTimestamp) VALUES ($enrollmentID, '$date', $week, $attendance, '$description', current_timestamp());";
                self::createAudit($sqlQuery, 'attendance', "INSERT", 'Insert a new attendance to the system.');
                // echo($query);
                // print_r($sqlQuery);
                Database::executeQuery("administrativeAttendance","administrativeAttendance@16",$sqlQuery);
            }
        }
        fclose($attendanceFile);
    }

    public static function getAttendanceDataFromDatabase($studentIndex,$subject,$attempt){
        $enrollmentID = self::getEnrollmentID($studentIndex, $subject, $attempt);
        echo($enrollmentID);
        $sqlQuery = "SELECT date, week, attendance, description FROM attendance WHERE enrollmentID=$enrollmentID";
        return Database::executeQuery("administrativeAttendance","administrativeAttendance@16",$sqlQuery);
    }

    public static function getEnrollmentID($studentID, $courseCode, $attempt){
        $sqlQuery = "SELECT enrollmentID FROM student_enroll_course WHERE studentIndexNo='$studentID' AND courseCode='$courseCode' AND attempt='$attempt' AND isActive=TRUE LIMIT 1";
        return Database::executeQuery("administrativeAttendance", "administrativeAttendance@16", $sqlQuery)[0]['enrollmentID'];
        // $sqlQuery1=Database::executeQuery("root", "", $sqlQuery)[0]['enrollmentID'];
        
    }

    public static function getInquiryMessage(){
        $sqlQuery = "SELECT `sendBy`, `message`, `sendDate` FROM `attendance_inquiry`";
        return Database::executeQuery("administrativeAttendance","administrativeAttendance@16",$sqlQuery);
        // print_r($result);
    }
}






