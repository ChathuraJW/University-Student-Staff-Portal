<?php
	require_once('../../../assets/mvc/Database.php');
	if (isset($_GET['activity']) & $_GET['activity'] == 'GPADistribution') {
		$dbInstance = new Database();
		//TODO change database credentials "student", "student@16"
		$dbInstance->establishTransaction('root', '');
//    batch GPA distribution
		$regNo = $_GET['regNo'];
		$sqlQuery = "SELECT studentGroup FROM `student` WHERE regNo='$regNo'";
		$group = $dbInstance->executeTransaction($sqlQuery)[0]['studentGroup'];
		$pointGPA = array('0' => 0, '0.1' => 0, '0.2' => 0, '0.3' => 0, '0.4' => 0, '0.5' => 0, '0.6' => 0, '0.7' => 0, '0.8' => 0, '0.9' => 0, '1' => 0, '1.1' => 0, '1.2' => 0, '1.3' => 0, '1.4' => 0, '1.5' => 0, '1.6' => 0, '1.7' => 0, '1.8' => 0, '1.9' => 0, '2' => 0, '2.1' => 0, '2.2' => 0, '2.3' => 0, '2.4' => 0, '2.5' => 0, '2.6' => 0, '2.7' => 0, '2.8' => 0, '2.9' => 0, '3' => 0, '3.1' => 0, '3.2' => 0, '3.3' => 0, '3.4' => 0, '3.5' => 0, '3.6' => 0, '3.7' => 0, '3.8' => 0, '3.9' => 0, '4' => 0);

		if ($group != '') {
			//create student batch identification Eg: 1CS1 ==> 1CS, 2CS2 ==> 2CS, 1IS ==> 1IS
			if (strlen($group) == 4)
				$group = rtrim(rtrim($group, "1"), "2");
//    echo($group);
			$sqlQuery = "SELECT currentGPA FROM student WHERE studentGroup LIKE '$group%'";
			$result = $dbInstance->executeTransaction($sqlQuery);

			foreach ($result as $elementGPA) {
				$roundedGPA = (string)round($elementGPA['currentGPA'], 1);
				$pointGPA[$roundedGPA]++;
			}
		}
		$returnResult = array();
		foreach ($pointGPA as $studentCount) {
			array_push($returnResult, $studentCount);
		}
		if ($dbInstance->getTransactionState()) {
			echo(json_encode($returnResult));
		}
		$dbInstance->closeConnection();


	} elseif (isset($_GET['activity']) & $_GET['activity'] == 'IndividualGPADistribution') {
		$dbInstance = new Database();
		//TODO change database credentials "student", "student@16"
		$dbInstance->establishTransaction('root', '');
//    individual GPA distribution
		$regNo = $_GET['regNo'];
		$sqlQuery = "SELECT MAX(semester) as maxSemester FROM student_result WHERE regNo='$regNo'";
		$maxSemester = $dbInstance->executeTransaction($sqlQuery)[0]['maxSemester'];
		$returnValue = array();
		for ($i = 1; $i <= $maxSemester; $i++) {
			$sqlQuery = "SELECT * FROM student_result WHERE regNo='$regNo' AND semester=$i ORDER BY courseCode";
			$result = $dbInstance->executeTransaction($sqlQuery);
			$totalCreditSem = 0;
			$fxValue = 0;
			foreach ($result as $subjectData) {
				$totalCreditSem = $totalCreditSem + $subjectData['creditValue'];
				$fxValue = $fxValue + getGPV($subjectData['result']) * $subjectData['creditValue'];
			}
			$semGPA = round($fxValue / $totalCreditSem, 4);
			array_push($returnValue, $semGPA);
		}
		if ($dbInstance->getTransactionState()) {
			echo(json_encode($returnValue));
		}
		$dbInstance->closeConnection();

	} elseif (isset($_GET['activity']) & $_GET['activity'] == 'GradeContribution') {
		$dbInstance = new Database();
		//TODO change database credentials "student", "student@16"
		$dbInstance->establishTransaction('root', '');
//    grade contribution
		$regNo = $_GET['regNo'];
		$sqlQuery = "SELECT MAX(semester) as maxSemester FROM student_result WHERE regNo='$regNo'";
		$maxSemester = $dbInstance->executeTransaction($sqlQuery)[0]['maxSemester'];
		$returnValue = array();
		for ($i = 1; $i <= $maxSemester; $i++) {
			$sqlQuery = "SELECT result FROM student_result WHERE regNo='$regNo' AND semester=$i";
			$result = $dbInstance->executeTransaction($sqlQuery);
			$resultGrade = array('A+' => 0, 'A' => 0, 'A-' => 0, 'B+' => 0, 'B' => 0, 'B-' => 0, 'C+' => 0, 'C' => 0, 'C-' => 0, 'D+' => 0, 'D' => 0, 'E' => 0, 'F' => 0);
			foreach ($result as $row) $resultGrade[$row['result']]++;
			$gradeCount = array();
			foreach ($resultGrade as $entry) {
				array_push($gradeCount, $entry);
			}
			array_push($returnValue, $gradeCount);
		}

		if ($dbInstance->getTransactionState()) {
			echo(json_encode($returnValue));
		}
		$dbInstance->closeConnection();
	}
	function getGPV($result): float {
		switch ($result) {
			case 'A':
			case 'A+':
				$returnValue = 4.0000;
				break;
			case 'A-':
				$returnValue = 3.7000;
				break;
			case 'B+':
				$returnValue = 3.3000;
				break;
			case 'B':
				$returnValue = 3.0000;
				break;
			case 'B-':
				$returnValue = 2.7000;
				break;
			case 'C+':
				$returnValue = 2.3000;
				break;
			case 'C':
				$returnValue = 2.0000;
				break;
			case 'C-':
				$returnValue = 1.7000;
				break;
			case 'D+':
				$returnValue = 1.3000;
				break;
			case 'D':
				$returnValue = 1.0000;
				break;
			default:
				$returnValue = 0.0;
		}
		return $returnValue;
	}