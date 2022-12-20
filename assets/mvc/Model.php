<?php

	class Model {
		public static function createLog($timestamp, $description, $transactionID = 0) {
			date_default_timezone_set('Asia/Colombo');
			$description = trim($description, ' ');
			if ($transactionID == 0)
				$fileEntry = "$timestamp      ::::    $description\n";
			else
				$fileEntry = "$timestamp      ::::    [Transaction ID: $transactionID]-$description\n";
//		append to the log file
			if (file_exists("../system.log"))
				file_put_contents("../system.log", $fileEntry, FILE_APPEND);
			else if (file_exists("../../system.log"))
				file_put_contents("../../system.log", $fileEntry, FILE_APPEND);
			else if (file_exists("../../../system.log"))
				file_put_contents("../../../system.log", $fileEntry, FILE_APPEND);

		}

		public static function getAdminUser(): string {
			$sqlQuery = "SELECT assignedUser FROM special_role WHERE userRole='ADM'";
			return Database::executeQuery('admin', 'admin@16', $sqlQuery)[0]['assignedUser'];
		}

		public static function getStudentUsernameForIndex($indexNo): string {
			$sqlQuery = "SELECT regNo FROM student WHERE indexNo='$indexNo'";
			return Database::executeQuery('admin', 'admin@16', $sqlQuery)[0]['regNo'];
		}
	}