<?php

	class ViewAttendanceModel extends Model {

		public static function loadAttendanceData() {
			$regNo = $_COOKIE['userName'];
			$sqlQuery = "SELECT indexNo FROM student WHERE regNo='$regNo'"; //getting index number from student table
			$index = Database::executeQuery("student", "student@16", $sqlQuery)[0]['indexNo'];
			if ($index) {
				$enrollmentDetail = self::getEnrollmentID($index);// get enrollment id of student's active courses.
//            print_r($enrollmentDetail);
				$finalAttendanceArray = array();
				foreach ($enrollmentDetail as $attendanceEntry) {
					$enrollmentId = $attendanceEntry['enrollmentID'];
//                print_r($enrollmentId);
					$courseCode = $attendanceEntry['courseCode'];
					$sqlQuery = "SELECT courseCode, name FROM course_module WHERE courseCode='$courseCode'";
					$courseDetail = Database::executeQuery("student", "student@16", $sqlQuery);
					if ($courseDetail) {
						$sqlQuery = "SELECT date, week, attendance, description FROM attendance WHERE enrollmentID=$enrollmentId ORDER BY week LIMIT 15";//how to get enrollment id
						$attendanceDetail = Database::executeQuery("student", "student@16", $sqlQuery);
						$temp = array($courseDetail[0], $attendanceDetail);
						array_push($finalAttendanceArray, $temp);
					} else {
						echo("<script>createToast('Warning (error code: #SAM03-D)','Failed Load attendance Data.','W')</script>");
					}

				}
			} else {
				echo("<script>createToast('Warning (error code: #SAM03-D)','Failed Load attendance Data.','W')</script>");
			}

			return $finalAttendanceArray;
		}

		public static function getEnrollmentID($studentID): array|bool {
			$sqlQuery = "SELECT enrollmentID,courseCode FROM student_enroll_course WHERE studentIndexNo=$studentID AND isActive=TRUE";
			$index = Database::executeQuery("student", "student@16", $sqlQuery);
			if ($index) {
				return $index;
			} else {
				return false;
			}

		}

		public static function sendInquiryMessage($week, $subject, $message) {
			$regNo = $_COOKIE['userName'];
			$finalMessage = (" Week :$week<br>\n Subject :$subject<br>\n message :$message");
			$dbInstance = new Database();
			$dbInstance->establishTransaction('root', '');

			$sqlQuery = "INSERT INTO attendance_inquiry( sendBy, message, sendDate) VALUES ('$regNo','$finalMessage',NOW())";

			$dbInstance->executeTransaction($sqlQuery);
			//create audit trail
			$dbInstance->transactionAudit($sqlQuery, 'attendance_inquiry', 'INSERT', 'Insert inquiry message.');
			if ($dbInstance->getTransactionState()) {
				if ($dbInstance->commitToDatabase()) {
					echo("<script>createToast('Success','Inquiry Message sent successfully.','S')</script>");
				} else {
					echo("<script>createToast('Warning (error code: #SAM02-D)','Failed to send inquiry message.','W')</script>");
				}
			} else {
				echo("<script>createToast('Warning (error code: #SAM02-D)','Failed to send inquiry message.','W')</script>");
			}
		}

		public static function getSubjectData() {
			$regNo = $_COOKIE['userName'];
			$sqlQuery = "SELECT indexNo FROM student WHERE regNo='$regNo'"; //getting index number from student table
			$index = Database::executeQuery("student", "student@16", $sqlQuery)[0]['indexNo'];
			if ($index) {
				$enrollmentDetail = self::getEnrollmentID($index);// get enrollment id of student's active courses.
//        print_r($enrollmentDetail);
				$subjectList = array();
				foreach ($enrollmentDetail as $attendanceEntry) {
					$enrollmentId = $attendanceEntry['enrollmentID'];
//            print_r($enrollmentId);
					$courseCode = $attendanceEntry['courseCode'];
					$sqlQuery = "SELECT * FROM course_module WHERE courseCode='$courseCode'";
					$courseDetail = Database::executeQuery("student", "student@16", $sqlQuery);
					foreach ($courseDetail as $row) {
						$subject = new CourseModule;
						$subject->createCourseModule($row['courseCode'], $row['name'], $row['creditValue'], $row['semester'], $row['description']);
						$subjectList[] = $subject;
					}

				}
				if ($subjectList) {
					return $subjectList;
				} else {
					return false;
				}
			}
		}
	}