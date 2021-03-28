<?php

	class Model {
		public static function createAudit($sqlQuery, $affectedTable, $eventType, $description) {
			$user = $_COOKIE['userName'];//take from cookies
			$executedQuery = explode("$affectedTable", str_replace("'", "", $sqlQuery))[1];
			$auditQuery = "INSERT INTO audit_log(userID, executedQuery,
                        affectedTable, eventType, description, timestamp)
                        VALUES ('$user','$executedQuery','$affectedTable','$eventType','$description',NOW())";
			return Database::executeQuery("root", "", $auditQuery);
		}

		//subject data getting function
		public static function getSubjectData() {
			$sqlQuery = "Select * from course_module";
			return Database::executeQuery("root", "", $sqlQuery);
		}

		public static function getSubjectName($courseCode) {
			$sqlQuery = "SELECT name FROM course_module WHERE courseCode='$courseCode' LIMIT 1";
			return Database::executeQuery("root", "", $sqlQuery)[0]['name'];
		}
	}