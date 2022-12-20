<?php
	require_once('../../../assets/mvc/Database.php');
	if (isset($_GET['username'])) {
		$username = $_GET['username'];
		$date = $_GET['date'];
		$timestamp = strtotime($date);
		$day = date('D', $timestamp);
		$dayName = strtoupper($day);
		$queryOne = "SELECT * FROM staff_conduct_session,timetable WHERE staff_conduct_session.staffID='" . $username . "' AND staff_conduct_session.eventID=timetable.eventID AND timetable.day='" . $dayName . "'";

		$allocatedTimes = Database::executeQuery("root", "", $queryOne);
		$queryTwo = "SELECT salutation,fullName FROM user WHERE userName='" . $username . "'";
		$LecturerName = Database::executeQuery("root", "", $queryTwo);
		$data = array($allocatedTimes, $LecturerName, $date);
		echo(json_encode($data));

	}
?>