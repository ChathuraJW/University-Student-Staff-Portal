<?php
	require_once('../../../assets/mvc/Database.php');
	if (isset($_GET['operation']) && $_GET['operation'] === 'getSelectedUserData') {
		$username = $_GET['userName'];
		$sqlQuery = "SELECT * FROM user WHERE userName='$username'";
		$result = Database::executeQuery('root', '', $sqlQuery)[0];
		echo json_encode($result);
	}