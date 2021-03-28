<?php

	class studentFeatureManagementModel extends Model {
		public static function assignStudentForHostelFacility($indexList) {
			$dbInstance = new Database;
			$dbInstance->establishTransaction('admin', 'admin@16');

//			get student username corresponding to the index number and create a list
			$usernameList = array();
			foreach ($indexList as $individualIndex) {
				$sqlQuery = "SELECT regNo FROM student WHERE indexNo='$individualIndex'";
				$usernameList[] = $dbInstance->executeTransaction($sqlQuery)[0]['regNo'];
			}

//			hostel feature assignment process
			$sqlQuery = "INSERT INTO student_feature(userName, feature, timestamp) VALUES ";
			foreach ($usernameList as $username) {
				$sqlQuery .= "('$username','HO',NOW()), ";
			}
			$sqlQuery = trim($sqlQuery, ', ');

//			call query and do audit
			$dbInstance->executeTransaction($sqlQuery);
			$dbInstance->transactionAudit($sqlQuery, 'student_feature', 'INSERT', "Assign student for hostel facility.");

			if ($dbInstance->getTransactionState()) {
				if ($dbInstance->commitToDatabase()) {
//					operation completed
					echo("<script>createToast('Success','Given student list assigned to hostel facility.','S')</script>");
				} else {
//					operation failed message
					echo("<script>createToast('Warning (error code: #ADMIN-SF-02)','Failed to assign student to hostel facility.','W')</script>");
				}
			} else {
//				operation failed message
				echo("<script>createToast('Warning (error code: #ADMIN-SF-02)','Failed to assign student to hostel facility.','W')</script>");
			}
//			close database connection
			$dbInstance->closeConnection();
		}

		public static function assignStudentForScholarship($scholarshipType, $studentList) {
			$dbInstance = new Database;
			$dbInstance->establishTransaction('admin', 'admin@16');

//			get student username corresponding to the index number and create a list
			$usernameList = array();
			foreach ($studentList as $individualIndex) {
				$sqlQuery = "SELECT regNo FROM student WHERE indexNo='$individualIndex'";
				$usernameList[] = $dbInstance->executeTransaction($sqlQuery)[0]['regNo'];
			}

//			hostel feature assignment process
			$sqlQuery = "INSERT INTO student_feature(userName, feature, timestamp) VALUES ";
			foreach ($usernameList as $username) {
				$sqlQuery .= "('$username','$scholarshipType',NOW()), ";
			}
			$sqlQuery = trim($sqlQuery, ', ');

//			call query and do audit
			$dbInstance->executeTransaction($sqlQuery);
			$dbInstance->transactionAudit($sqlQuery, 'student_feature', 'INSERT', "Assign set of students to scholarship[$scholarshipType] feature.");

			if ($dbInstance->getTransactionState()) {
				if ($dbInstance->commitToDatabase()) {
//					operation completed
					echo("<script>createToast('Success','Given student list assigned to scholarship[$scholarshipType].','S')</script>");
				} else {
//					operation failed message
					echo("<script>createToast('Warning (error code: #ADMIN-SF-04)','Failed to assign student to scholarship[$scholarshipType].','W')</script>");
				}
			} else {
//				operation failed message
				echo("<script>createToast('Warning (error code: #ADMIN-SF-04)','Failed to assign student to scholarship[$scholarshipType].','W')</script>");
			}
//			close database connection
			$dbInstance->closeConnection();
		}
	}