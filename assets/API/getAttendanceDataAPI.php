<?php
    require_once('../mvc/Database.php');
    if(isset($_GET['activity']) & $_GET['activity']=="getAttendanceForEdit"){
        $studentIndex = $_GET['studentIndex'] ;
        $attempt = $_GET['attempt'];
        $subjectCode = $_GET['subjectCode'];
        //get enrollement id
        $sqlQuery = "SELECT enrollmentID FROM student_enroll_course WHERE studentIndexNo='$studentIndex' AND courseCode='$subjectCode' AND  attempt='$attempt' AND isActive=TRUE";
        $enrollmentId = Database::executeQuery("root", "", $sqlQuery)[0]['enrollmentID'];
        // attendance data
        $sqlQuery = "SELECT date, week, attendance, description FROM attendance WHERE enrollmentID=$enrollmentId ORDER BY week";//how to get enrollment id
        $attendanceDetail = Database::executeQuery("root","",$sqlQuery);
        echo(json_encode($attendanceDetail));

    }elseif (isset($_GET['activity']) & $_GET['activity']=="updateAttendance"){
        $studentIndex = $_GET['studentIndex'];
        $week = $_GET['week'];
        $attendance = $_GET['attendance'];
        $description = $_GET['description'];
        $subjectCode = $_GET['subjectCode'];
        $attempt = $_GET['attempt'];
        // get enrollment id
        $sqlQuery = "SELECT enrollmentID FROM student_enroll_course WHERE studentIndexNo='$studentIndex' AND courseCode='$subjectCode' AND  attempt='$attempt' AND isActive=TRUE";
        $enrollmentId = Database::executeQuery("root", "", $sqlQuery)[0]['enrollmentID'];
//        echo($enrollmentId);
//        echo(jason_encode($enrollmentId));
        //update attendance
        $sqlQuery = "UPDATE attendance SET  attendance=$attendance ,description='$description' ,uploadTimestamp=now() WHERE enrollmentID=$enrollmentId AND week =$week";
        $isSuccess = Database::executeQuery("root","",$sqlQuery);
        self::createAudit($sqlQuery, 'attendance', "UPDATE", 'Update the attendance table.');
        echo(json_encode($isSuccess));



    }

?>
