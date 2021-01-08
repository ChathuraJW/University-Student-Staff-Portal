<?php

	class DangerousZoneModel extends Model {

		public static function validateAdmin($username, $password): bool {
//			based on the data pass check weather user is admin and credential is valid
			$sqlQuery = "SELECT U.password FROM user U,special_role UR WHERE U.userName=UR.assignedUser AND U.userName='$username' AND UR.userRole='ADM'";
			$dbGetPassword = Database::executeQuery('root', '', $sqlQuery)[0]['password'];
			if ($dbGetPassword && $password === $dbGetPassword) {
				return true;
			} else {
				return false;
			}
		}

		public static function startNewSemester() {
			$dbInstance = new Database;
			//TODO need to change database credentials
			$dbInstance->establishTransaction('root', '');

			//get current academic year
			$sqlQuery = "SELECT parameterValue FROM system_parameters WHERE parameterKey='current_academic_year' LIMIT 1";
			$currentAcademicYear = $dbInstance->executeTransaction($sqlQuery)[0]['parameterValue'];

			//get current semester and decide whether it is start of a new academic year or not
			$sqlQuery = "SELECT parameterValue FROM system_parameters WHERE parameterKey='current_semester' LIMIT 1";
			$currentSemester = $dbInstance->executeTransaction($sqlQuery)[0]['parameterValue'];

			/**
			 * if $currentSemester equals to one that mean, going to start second semester of same academic year
			 * but it $currentSemester equals to two that mean, going to start second first semester of new academic year
			 **/

			if ($currentSemester == 1) {
//				going to start a new semester in same academic year -->> second semester of the year

//				set currentSemester to 2
				$sqlQuery = "UPDATE system_parameters SET parameterValue='2' WHERE parameterKey='current_semester'";
				$dbInstance->executeTransaction($sqlQuery);
				$dbInstance->transactionAudit($sqlQuery, 'system_parameters', 'UPDATE', "Start second semester of $currentAcademicYear academic year.");

			} elseif ($currentSemester == 2) {
//				going to a new academic year -->> first semester on new academic year

//				set currentSemester to 1
				$newAcademicYear = $currentAcademicYear + 1;
				$sqlQuery = "UPDATE system_parameters SET parameterValue='1' WHERE parameterKey='current_semester'";
				$dbInstance->executeTransaction($sqlQuery);
				$dbInstance->transactionAudit($sqlQuery, 'system_parameters', 'UPDATE', "Start first semester of $newAcademicYear academic year.");

//				increase current academic year by 1
				$sqlQuery = "UPDATE system_parameters SET parameterValue='$newAcademicYear' WHERE parameterKey='current_academic_year'";
				$dbInstance->executeTransaction($sqlQuery);
				$dbInstance->transactionAudit($sqlQuery, 'system_parameters', 'UPDATE', "Increase current academic year by one, with the start of new academic year($currentAcademicYear -->>  $newAcademicYear).");

				//promote all student to there next year
				/*
				promotion scheme
				1CS1 --> 2CS1
				1CS2 --> 2CS2
				1IS --> 2IS

				2CS1 --> 3CS1
				2CS2 --> 3CS2
				2IS --> 3IS

				3CSC --> 4CSC
				3CSS --> 4CSS
				3ISI --> 4ISI
				3CSG --> PASS
				3ISG --> PASS

				4CSC --> PASS
				4CSS --> PASS
				4ISI --> PASS
				*/

//				4th year to pass out
//				4CSC --> PASS
				$sqlQuery = "UPDATE student SET studentGroup='PASS' WHERE studentGroup='4CSC'";
				$dbInstance->executeTransaction($sqlQuery);
				$dbInstance->transactionAudit($sqlQuery, 'student', 'UPDATE', "Pass out 4th year CS[special] students.($currentAcademicYear -->>  $newAcademicYear)");

//				4CSS --> PASS
				$sqlQuery = "UPDATE student SET studentGroup='PASS' WHERE studentGroup='4CSS'";
				$dbInstance->executeTransaction($sqlQuery);
				$dbInstance->transactionAudit($sqlQuery, 'student', 'UPDATE', "Pass out 4th year SE[special] students.($currentAcademicYear -->>  $newAcademicYear)");

//				4ISI --> PASS
				$sqlQuery = "UPDATE student SET studentGroup='PASS' WHERE studentGroup='4ISI'";
				$dbInstance->executeTransaction($sqlQuery);
				$dbInstance->transactionAudit($sqlQuery, 'student', 'UPDATE', "Pass out 4th year IS[special] students.($currentAcademicYear -->>  $newAcademicYear)");

//				3rd year to 4th year
//				3CSC --> 4CSC
				$sqlQuery = "UPDATE student SET studentGroup='4CSC' WHERE studentGroup='3CSC'";
				$dbInstance->executeTransaction($sqlQuery);
				$dbInstance->transactionAudit($sqlQuery, 'student', 'UPDATE', "Promote 3rd Year CS[special] student to 4th year.($currentAcademicYear -->>  $newAcademicYear)");

//				3CSS --> 4CSS
				$sqlQuery = "UPDATE student SET studentGroup='4CSS' WHERE studentGroup='3CSS'";
				$dbInstance->executeTransaction($sqlQuery);
				$dbInstance->transactionAudit($sqlQuery, 'student', 'UPDATE', "Promote 3rd Year SE[special] student to 4th year.($currentAcademicYear -->>  $newAcademicYear)");

//				3ISI --> 4ISI
				$sqlQuery = "UPDATE student SET studentGroup='4ISI' WHERE studentGroup='3ISI'";
				$dbInstance->executeTransaction($sqlQuery);
				$dbInstance->transactionAudit($sqlQuery, 'student', 'UPDATE', "Promote 3rd Year IS[special] student to 4th year.($currentAcademicYear -->>  $newAcademicYear)");

//				3rd year general to pass out
//				3CSG --> PASS
				$sqlQuery = "UPDATE student SET studentGroup='PASS' WHERE studentGroup='3CSG'";
				$dbInstance->executeTransaction($sqlQuery);
				$dbInstance->transactionAudit($sqlQuery, 'student', 'UPDATE', "Pass out 3rd year CS[general] students.($currentAcademicYear -->>  $newAcademicYear)");

//				3ISG --> PASS
				$sqlQuery = "UPDATE student SET studentGroup='PASS' WHERE studentGroup='3ISG'";
				$dbInstance->executeTransaction($sqlQuery);
				$dbInstance->transactionAudit($sqlQuery, 'student', 'UPDATE', "Pass out 3rd year IS[general] students.($currentAcademicYear -->>  $newAcademicYear)");

				/*
				promote all second years to general group after, at the time add 4th year selected
				student there group need to change
				*/

//				2nd years to 3rd years
//				2CS1 --> 3CS1
				$sqlQuery = "UPDATE student SET studentGroup='3CSG' WHERE studentGroup='2CS1'";
				$dbInstance->executeTransaction($sqlQuery);
				$dbInstance->transactionAudit($sqlQuery, 'student', 'UPDATE', "Promote 2nd Year CS group 1 student to 3rd year CS[general].($currentAcademicYear -->>  $newAcademicYear)");

//				2CS2 --> 3CS2
				$sqlQuery = "UPDATE student SET studentGroup='3CSG' WHERE studentGroup='2CS2'";
				$dbInstance->executeTransaction($sqlQuery);
				$dbInstance->transactionAudit($sqlQuery, 'student', 'UPDATE', "Promote 2nd Year CS group 2 student to 3rd year CS[general].($currentAcademicYear -->>  $newAcademicYear)");

//				2IS --> 3IS
				$sqlQuery = "UPDATE student SET studentGroup='3ISG' WHERE studentGroup='2IS'";
				$dbInstance->executeTransaction($sqlQuery);
				$dbInstance->transactionAudit($sqlQuery, 'student', 'UPDATE', "Promote 2nd Year IS student to 3rd year IS[general].($currentAcademicYear -->>  $newAcademicYear)");

//				1st year to 2nd years
//				1CS1 --> 2CS1
				$sqlQuery = "UPDATE student SET studentGroup='2CS1' WHERE studentGroup='1CS1'";
				$dbInstance->executeTransaction($sqlQuery);
				$dbInstance->transactionAudit($sqlQuery, 'student', 'UPDATE', "Promote 1st Year CS group 1 student to 2nd Year CS group 1.($currentAcademicYear -->>  $newAcademicYear)");

//				1CS2 --> 2CS2
				$sqlQuery = "UPDATE student SET studentGroup='2CS2' WHERE studentGroup='1CS2'";
				$dbInstance->executeTransaction($sqlQuery);
				$dbInstance->transactionAudit($sqlQuery, 'student', 'UPDATE', "Promote 1st Year CS group 2 student to 2nd Year CS group 2.($currentAcademicYear -->>  $newAcademicYear)");

//				1IS --> 2IS
				$sqlQuery = "UPDATE student SET studentGroup='2IS' WHERE studentGroup='1IS'";
				$dbInstance->executeTransaction($sqlQuery);
				$dbInstance->transactionAudit($sqlQuery, 'student', 'UPDATE', "Promote 1st Year IS student to 2nd Year IS.($currentAcademicYear -->>  $newAcademicYear)");

			}

			//disable all active enrollment for course
			$sqlQuery = "UPDATE student_enroll_course SET isActive=FALSE WHERE isActive=TRUE";
			$dbInstance->executeTransaction($sqlQuery);
			$dbInstance->transactionAudit($sqlQuery, 'student_enroll_course', 'UPDATE', "Deactivate all current student enrollment for courses.");

			//TODO (nice to have) display greeting, Send notification and email
			if ($dbInstance->getTransactionState()) {
				if ($dbInstance->commitToDatabase()) {
//					operation Successful message
					echo("<script>createToast('Success','Successfully started a new semester.','S')</script>");
				} else {
//					operation fail message
					echo("<script>createToast('Warning (error code: #ADMIN-DZ-01)','Failed to start a new semester.','W')</script>");
				}
			} else {
//				operation fail message
				echo("<script>createToast('Warning (error code: #ADMIN-DZ-01)','Failed to start a new semester.','W')</script>");
			}
			$dbInstance->closeConnection();
		}

		public static function changeAdminUser($selectedUser) {
			$dbInstance = new Database;
			//TODO need to change database credentials
			$dbInstance->establishTransaction('root', '');

//			update special role table and audit the operation
			$sqlQuery = "UPDATE special_role SET assignedUser='$selectedUser', assignedDate=NOW() WHERE userRole='ADM'";
			$dbInstance->executeTransaction($sqlQuery);

			$currentUser = $_COOKIE['userName'];
			$dbInstance->transactionAudit($sqlQuery, 'special_role', 'UPDATE', "Change system administrator to $selectedUser by current system administrator[$currentUser].");

//			check operation status
			if ($dbInstance->getTransactionState()) {
				if ($dbInstance->commitToDatabase()) {
					//procured towards
					//TODO send notification with email to both parties inform the situation
					//close the connection and logout from user current session
					$dbInstance->closeConnection();
					//TODO check logout operation
					require_once('../../assets/php/logout.php');
				} else {
//					close connection and display error
					$dbInstance->closeConnection();
					echo("<script>createToast('Warning (error code: #ADMIN-DZ-04)','Operation failed.','W')</script>");
				}
			} else {
//				close connection and display error
				$dbInstance->closeConnection();
				echo("<script>createToast('Warning (error code: #ADMIN-DZ-04)','Operation failed.','W')</script>");
			}
		}
	}