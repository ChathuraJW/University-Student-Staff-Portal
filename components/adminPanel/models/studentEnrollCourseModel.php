<?php

	class StudentEnrollCourseModel extends Model {
		public static function loadSubjectsAccordingToSemester(): bool|array {
			$dbInstance = new Database;
			//TODO need to change database credentials
			$dbInstance->establishTransaction('root', '');

//			take current semester to get subject related to that semester
			$sqlQuery = "SELECT parameterValue FROM system_parameters WHERE parameterKey='current_semester'";
			$currentSemester = $dbInstance->executeTransaction($sqlQuery)[0]['parameterValue'];

//			semester base sql query for listing subjects
			if ($currentSemester == 1) {
				$sqlQuery = "SELECT * FROM course_module WHERE semester=1 OR semester=3 OR semester=5 OR semester=7";
			} elseif ($currentSemester == 2) {
				$sqlQuery = "SELECT * FROM course_module WHERE semester=2 OR semester=4 OR semester=6 OR semester=8";
			}
//			execute query and create, add CourseModule objects to array
			$result = $dbInstance->executeTransaction($sqlQuery);
			$returnArray = array();
			foreach ($result as $row) {
				$courseModule = new CourseModule;
				$courseModule->createCourseModule($row['courseCode'], $row['name'], $row['semester']);
				$returnArray[] = $courseModule;
			}

//			check query status and return array
			if ($dbInstance->getTransactionState()) {
//				close connection and return
				$dbInstance->closeConnection();
				return $returnArray;
			} else {
//				close connection and return
				$dbInstance->closeConnection();
				return false;
			}
		}

		public static function makeEnrollment($group, $subject) {
			$dbInstance = new Database;
			//TODO need to change database credentials
			$dbInstance->establishTransaction('root', '');

//			validate group to subject combination
//			get year from student group
			$studentGroupYear = (int)substr($group, 0, 1);
//			get year from subject
			$sqlQuery = "SELECT semester FROM course_module WHERE courseCode='$subject'";
			$subjectSemester = $dbInstance->executeTransaction($sqlQuery)[0]['semester'];
			$subjectYear = ceil($subjectSemester / 2);

//			comparison
			if ($dbInstance->getTransactionState()) {
				if ($studentGroupYear == $subjectYear) {
//					procured towards
//					get student list for given group
					$sqlQuery = "SELECT indexNo FROM student WHERE studentGroup='$group'";
					$result = $dbInstance->executeTransaction($sqlQuery);
					$studentIndexList = array();
					foreach ($result as $row) {
						$studentIndexList[] = $row['indexNo'];
					}

//					make enrollment for created student list
//					create insert query for student list
					$sqlQuery = "INSERT INTO student_enroll_course(studentIndexNo, courseCode, attempt, enrollDate) VALUES ";
					foreach ($studentIndexList as $individualIndex) {
						$sqlQuery .= "($individualIndex,'$subject','F',NOW()), ";
					}
//					remove extra commas and spaces in the query
					$sqlQuery = trim($sqlQuery, ', ');
//					execute query and create audit
					$dbInstance->executeTransaction($sqlQuery);
					$dbInstance->transactionAudit($sqlQuery, 'student_enroll_course', 'INSERT', "As a bulk enroll $group group student to $subject for First Attempt.");

//					check connection state and commit to database
					if ($dbInstance->getTransactionState()) {
						if ($dbInstance->commitToDatabase()) {
//							create success message
							echo("<script>createToast('Success',' Enrollment successful [$group] >>> [$subject].','S')</script>");
							//TODO send notification to student to inform about new enrollment
						} else {
//							fail to enroll student to course
							echo("<script>createToast('Warning (error code: #ADMIN-EC-03)','Failed to enroll students[$group] to course[$subject].','W')</script>");
						}
					} else {
//						fail to enroll student to course
						echo("<script>createToast('Warning (error code: #ADMIN-EC-03)','Failed to enroll students[$group] to course[$subject].','W')</script>");
					}
				} else {
//					display error for combination error
					echo("<script>createToast('Warning (error code: #ADMIN-EC-02)','Group to course module pair not valid.','W')</script>");
				}
			} else {
//				display error for combination error
				echo("<script>createToast('Warning (error code: #ADMIN-EC-02)','Group to course module pair not valid.','W')</script>");
			}
//			close connection
			$dbInstance->closeConnection();
		}

		public static function repeatedStudentEnrollment($subject, $indexList) {
			$dbInstance = new Database;
			//TODO need to change database credentials
			$dbInstance->establishTransaction('root', '');
//			make enrollment for created student list
//			create insert query for student list
			$sqlQuery = "INSERT INTO student_enroll_course(studentIndexNo, courseCode, attempt, enrollDate) VALUES ";
			foreach ($indexList as $individualIndex) {
				$sqlQuery .= "($individualIndex,'$subject','R',NOW()), ";
			}
//					remove extra commas and spaces in the query
			$sqlQuery = trim($sqlQuery, ', ');
//					execute query and create audit
			echo $sqlQuery;
			$dbInstance->executeTransaction($sqlQuery);
			$dbInstance->transactionAudit($sqlQuery, 'student_enroll_course', 'INSERT', "Repeated student set enroll for $subject course.");

//			check connection state and commit to database
			if ($dbInstance->getTransactionState()) {
				if ($dbInstance->commitToDatabase()) {
//							create success message
					echo("<script>createToast('Success',' Enrollment successful [R] >>> [$subject].','S')</script>");
					//TODO send notification to student to inform about new enrollment
				} else {
//							fail to enroll student to course
					echo("<script>createToast('Warning (error code: #ADMIN-EC-05)','Failed to enroll students[R] to course[$subject].','W')</script>");
				}
			} else {
//						fail to enroll student to course
				echo("<script>createToast('Warning (error code: #ADMIN-EC-05)','Failed to enroll students[R] to course[$subject].','W')</script>");
			}
		}
	}