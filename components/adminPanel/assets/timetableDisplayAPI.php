<?php
	require_once('../../../assets/mvc/Database.php');
	if (isset($_GET['groupName'])) {
		$group = $_GET['groupName'];

		$databaseInstance = new Database;
		$databaseInstance->establishTransaction('admin', 'admin@16');


		$query = "SELECT * FROM timetable WHERE relatedGroup='$group'";
		$timetableData = $databaseInstance->executeTransaction($query);
		if ($databaseInstance->getTransactionState()) {

		} else {
			echo("<script>createToast('Warning (error code: #TTV01)','Timetable Data Selecting Failed.','W')</script>");
		}
		$databaseInstance->closeConnection();

		echo(json_encode($timetableData));
	}
?>
