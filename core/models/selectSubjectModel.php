<?php

	class SelectSubjectModel extends Model {

		public static function subjects(): bool|array {
			$regNo = $_COOKIE['userName'];
			$queryOne = "SELECT parameterValue FROM system_parameters WHERE parameterKey='current_semester'";
			$semester = Database::executeQuery('root', '', $queryOne);
			$sem = $semester[0]['parameterValue'];
			$queryTwo = "SELECT studentGroup FROM student WHERE regNo='$regNo'";
			$year = Database::executeQuery('root', '', $queryTwo);
			$yearNumber = $year[0]['studentGroup'][0];
			// echo $yearNumber;

			if ($yearNumber == '3' && $sem == '1') {
				$semNo = 5;
			} elseif ($yearNumber == '4' && $sem == '1') {
				$semNo = 7;
			} elseif ($yearNumber == '4' && $sem == '2') {
				$semNo = 8;
			} else {
				return false;
			}
			$queryFour = "SELECT * FROM course_module WHERE semester='' AND courseValidity=TRUE";
			return Database::executeQuery('student', 'student@16', $queryFour);

		}

		public static function enroll($array) {
			if (empty($array)) {
				echo("<script>createToast('Warning (error code: #SBS01)','Cannot enroll without select subjects','W')</script>");
			} else {
				$userName = $_COOKIE['userName'];
				$querySub = "SELECT indexNo FROM student WHERE regNo='$userName'";
				$indexNo = Database::executeQuery('student', 'student@16', $querySub);
				$index = $indexNo[0]['indexNo'];
				$date = date('Y-m-d');
				$dbInstance = new Database;
				$enrollState = false;
				$dbInstance->establishTransaction('student', 'student@16');
				foreach ($array as $record) {
					$query = "INSERT INTO student_enroll_course(studentIndexNo,courseCode,attempt,enrollDate) VALUES('" . $index . "','" . $record . "','F','" . $date . "')";
					$dbInstance->executeTransaction($query);
					$dbInstance->transactionAudit($query, 'student_enroll_course', "INSERT", 'Successfully enroll for Course Module.');
				}
				if ($dbInstance->getTransactionState()) {
					$dbInstance->commitToDatabase();
					echo("<script> createToast('Success','Enroll for courses successfully.','S');
                    setTimeout(function(){ window.location.href='home';}, 3000);
                    </script>");
				} else {
					echo("<script>createToast('Warning (error code: #SBS02)','Enrollment process failed','W')</script>");
				}
			}
		}
	}

?>