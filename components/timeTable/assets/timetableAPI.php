<?php
	require_once('../../../assets/mvc/Database.php');
	if (isset($_GET['username'])) {
		$userName = $_GET['username'];
		$length = strlen($userName);

		if ($length > 3) {
			$queryOne = "SELECT studentGroup FROM student WHERE regNo='$userName'";
			$group = Database::executeQuery("root", "", $queryOne);
			$groupNumber = $group[0]['studentGroup'];
			$queryTwo = "SELECT * FROM timetable WHERE relatedGroup='$groupNumber'";
			$timetableData = Database::executeQuery("root", "", $queryTwo);

		} else {
			$queryThree = "SELECT * FROM staff_conduct_session,timetable WHERE staff_conduct_session.staffID='$userName' AND staff_conduct_session.eventID=timetable.eventID";
			$timetableData = Database::executeQuery("root", "", $queryThree);
		}
		echo(json_encode($timetableData));
	}
?>