<?php

	require_once('../../../assets/mvc/Database.php');
	require_once ('../../../assets/mvc/Notification.php');
	if (isset($_GET['activity']) & $_GET['activity'] == "getAttendanceForEdit") {
		$studentIndex = $_GET['studentIndex'];
		$attempt = $_GET['attempt'];
		$subjectCode = $_GET['subjectCode'];
		//get enrollment id
		$sqlQuery = "SELECT enrollmentID FROM student_enroll_course WHERE studentIndexNo='$studentIndex' AND courseCode='$subjectCode' AND  attempt='$attempt' AND isActive=TRUE";
		$enrollmentId = Database::executeQuery("administrativeAttendance", "administrativeAttendance@16", $sqlQuery)[0]['enrollmentID'];
		// attendance data
		$sqlQuery = "SELECT date, week, attendance, description FROM attendance WHERE enrollmentID=$enrollmentId ORDER BY week";//how to get enrollment id
		$attendanceDetail = Database::executeQuery("administrativeAttendance", "administrativeAttendance@16", $sqlQuery);
		echo(json_encode($attendanceDetail));

	} elseif (isset($_GET['activity']) & $_GET['activity'] == "updateAttendance") {
		$studentIndex = $_GET['studentIndex'];
		$week = $_GET['week'];
		$attendance = $_GET['attendance'];
		$description = $_GET['description'];
		$subjectCode = $_GET['subjectCode'];
		$attempt = $_GET['attempt'];
		// get enrollment id
		$sqlQuery = "SELECT enrollmentID FROM student_enroll_course WHERE studentIndexNo='$studentIndex' AND courseCode='$subjectCode' AND  attempt='$attempt' AND isActive=TRUE";
		$enrollmentId = Database::executeQuery("administrativeAttendance", "administrativeAttendance@16", $sqlQuery)[0]['enrollmentID'];
		//update attendance
		$sqlQuery = "UPDATE attendance SET  attendance=$attendance ,description='$description' ,uploadTimestamp=now() WHERE enrollmentID=$enrollmentId AND week =$week";
		$isSuccess = Database::executeQuery("administrativeAttendance", "administrativeAttendance@16", $sqlQuery);
		self::createAudit($sqlQuery, 'attendance', "UPDATE", 'Update the attendance table.');
		echo(json_encode($isSuccess));
	} elseif (isset($_GET['activity']) & $_GET['activity'] == "markAsRead") {
		$userName = $_GET['userName'];
		$marked = $_GET['mark'];
		$inquiryId = $_GET['inquiryID'];

        $dbInstance = new Database();
        $dbInstance->establishTransaction('root', '');

        $sqlQuery = "UPDATE attendance_inquiry SET isViewed=1 WHERE entryID=$inquiryId";
        $dbInstance->executeTransaction($sqlQuery);
            $dbInstance->transactionAudit($sqlQuery, 'attendance_inquiry', 'UPDATE', 'Update inquiry message as read.',$userName);
            $sqlQuery = "SELECT sendBy FROM `attendance_inquiry` WHERE entryID=$inquiryId";
            $receiver = $dbInstance->executeTransaction($sqlQuery)[0]['sendBy'];

        //check current transaction state before proceed towards
            if ($dbInstance->getTransactionState()) {
                if ($dbInstance->commitToDatabase($userName)) {
                    $dbInstance->closeConnection();
                    $notification = new Notification();
                    $notification->createNotification("Attendance Inquiry [Entry ID - $inquiryId]",'Inquiry proceed successful and took necessary actions. ');
                    $notification->setReceivers(array($receiver));
                    $notification->setSender($userName);
                    $notification->publishNotification(false);
                    return true;
                } else {
                    $dbInstance->closeConnection();
                    return false;
                }
            } else {
                $dbInstance->closeConnection();
                return false;
            }


		echo(json_encode($isSuccess));
	}



