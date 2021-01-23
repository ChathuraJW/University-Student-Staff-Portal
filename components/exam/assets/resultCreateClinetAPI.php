<?php
	header('Access-Control-Allow-Origin: *');
	require_once('../../../assets/mvc/Database.php');
	$dbInstance = new Database();
	$dbInstance->establishTransaction('academicStaff', 'academicStaff@16');
	if (isset($_GET['dataSet'])) {
		if ($_GET['dataSet'] == 'subjectData') {
			$sqlQuery = "SELECT * FROM course_module";
			$dataSet = $dbInstance->executeTransaction($sqlQuery);
			if ($dbInstance->getTransactionState())
				echo(json_encode($dataSet));
		}
	} else if (isset($_GET['username'])) {
		$userName = $_GET['username'];
		$password = $_GET['password'];
		$role = $_GET['role'];
		$sqlQuery = "SELECT * FROM user WHERE userName='$userName' and role='$role' LIMIT 1";
		$result = $dbInstance->executeTransaction($sqlQuery);
		$returnValue = false;
		if (sizeof($result) > 0) {
			$sqlQuery = "SELECT userName,password, salutation, fullName, role FROM user WHERE userName='$userName'";
			$result = $dbInstance->executeTransaction($sqlQuery);
			if (($result[0]["password"]) == $password) {
				$returnValue = $result;
			}
		}
		if ($dbInstance->getTransactionState())
			echo(json_encode($returnValue));
	} else if (isset($_GET['task'])) {
		$sqlQuery = "SELECT publicKey FROM public_key WHERE isSAR=true";
		$result = $dbInstance->executeTransaction($sqlQuery);
		if ($dbInstance->getTransactionState())
			echo(json_encode($result));
	} else if (isset($_GET['subjectCode'])) {
		$subjectCode = $_GET['subjectCode'];
		$attempt = $_GET['attempt'];
		$sqlQuery = "SELECT studentIndexNo FROM student_enroll_course WHERE courseCode='$subjectCode' AND attempt='$attempt' AND isActive=true";
		$result = $dbInstance->executeTransaction($sqlQuery);
		if ($dbInstance->getTransactionState())
			echo(json_encode($result));
	} else if (isset($_GET['loadSubjectData'])) {
		$sqlQuery = "SELECT courseCode,name FROM course_module";
		$result = $dbInstance->executeTransaction($sqlQuery);
		if ($dbInstance->getTransactionState())
			echo(json_encode($result));
	} else if (isset($_GET['takeUserPublicKey'])) {
		$selectedUser = $_GET['userName'];
		$sqlQuery = "SELECT publicKey FROM public_key WHERE staffID=$selectedUser";
		$result = $dbInstance->executeTransaction($sqlQuery);
		if ($dbInstance->getTransactionState())
			echo(json_encode($result));
	}
	$dbInstance->closeConnection();