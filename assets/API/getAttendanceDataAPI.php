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

    }

?>
