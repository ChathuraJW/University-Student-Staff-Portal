<?php

	class ViewResultModel extends Model {
		public static function loadResultData(): bool|array {
			$dbInstance = new Database;
			$dbInstance->establishTransaction('student', 'student@16');

			$regNo = $_COOKIE['userName'];
//        get maximum semester for given student
			$sqlQuery = "SELECT MAX(semester) as maxSemester FROM student_result WHERE regNo='$regNo'";
			$maxSemester = $dbInstance->executeTransaction($sqlQuery)[0]['maxSemester'];
			$returnValue = array();
//        iterate through each semester
			for ($i = 1; $i <= $maxSemester; $i++) {
//        	get result for considering semester
				$sqlQuery = "SELECT * FROM student_result WHERE regNo='$regNo' AND semester=$i ORDER BY courseCode";
				$queryResult = $dbInstance->executeTransaction($sqlQuery);
				$semesterResults = array();
//            add them to array after creating result objects
				foreach ($queryResult as $row) {
					$resultItem = new Result;
					$resultItem->addResult($row['courseCode'], $row['name'], $row['creditValue'], $row['semester'],
						$row['yearOfExam'], $row['result'], $row['attempt']);
					$semesterResults[] = $resultItem;
				}
//            add both semester and result data to a associative array
				$returnValue[] = array('semester' => $i, 'results' => $semesterResults);
			}
			if ($dbInstance->getTransactionState()) {
//        	close connection and return result
				$dbInstance->closeConnection();
				return $returnValue;
			} else {
//	        close connection
				$dbInstance->closeConnection();
				return false;
			}
		}

		public static function calculateTotalCredit() {
			$regNo = $_COOKIE['userName'];
			$sqlQuery = "SELECT SUM(creditValue) as totalCredit FROM student_result WHERE attempt='F' AND regNo='$regNo'";
			return Database::executeQuery("student", "student@16", $sqlQuery)[0]['totalCredit'];
		}

		public static function getCurrentGPA() {
			$regNo = $_COOKIE['userName'];
			$sqlQuery = "SELECT currentGPA FROM student WHERE regNo ='$regNo'";
			return Database::executeQuery("student", "student@16", $sqlQuery)[0]['currentGPA'];
		}

		public static function getCurrentRank(): int {
			$dbInstance = new Database;
			$dbInstance->establishTransaction('student', 'student@16');

			$regNo = $_COOKIE['userName'];
			$sqlQuery = "SELECT studentGroup,currentGPA FROM student WHERE regNo='$regNo'";
			$result = $dbInstance->executeTransaction($sqlQuery);

			$userGroup = $result[0]['studentGroup'];
			$userGPA = $result[0]['currentGPA'];
//        create student batch identification Eg: 1CS1 ==> 1CS, 2CS2 ==> 2CS, 1IS ==> 1IS
			if (strlen($userGroup) == 4)
				$userGroup = rtrim(rtrim($userGroup, "1"), "2");

//        get current student's  batch GPAs
			$sqlQuery = "SELECT currentGPA FROM student WHERE studentGroup LIKE '$userGroup%'";
			$result = $dbInstance->executeTransaction($sqlQuery);
//        add GPA list to array
			$batchGPAList = array();
			foreach ($result as $userEntry) {
				$batchGPAList[] = $userEntry['currentGPA'];
			}

//        sort list max->min
			rsort($batchGPAList);

//        give rank
			$previousGPA = 0.0;
			$rank = 0;
			foreach ($batchGPAList as $elementGPA) {
//	    	rank creation
				if ($elementGPA != $previousGPA) {
					$previousGPA = $elementGPA;
					$rank++;
				}
//	    	when student GPA found then stop rank giving to list
				if ($elementGPA == $userGPA) {
					break;
				}
			}
			return $rank;
		}
	}