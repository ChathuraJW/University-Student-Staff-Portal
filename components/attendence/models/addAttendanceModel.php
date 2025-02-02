<?php

	class AddAttendanceModel extends Model {

		//subject data getting function
		public static function getSubjectData(): bool|array {
			$sqlQuery = "Select * from course_module";
			//TODO change DB credentials
			$result = Database::executeQuery("root", "", $sqlQuery);
			if ($result) {
				$subjectList = array();
				//read subject list and add them into above array as CourseModule objects
				foreach ($result as $row) {
					$subject = new CourseModule;
					$subject->createCourseModule($row['courseCode'], $row['name'], $row['creditValue'], $row['semester'], $row['description']);
					$subjectList[] = $subject;
				}
				return $subjectList;
			} else {
				return false;
			}
		}

		public static function processAttendanceData($attendance): bool {
			$dbInstance = new Database();

			$dbInstance->establishTransaction('administrativeAttendance', 'administrativeAttendance@16');
			//query for insert file data
			$sqlQuery = "INSERT INTO attendance (enrollmentID, date, week, attendance, description, uploadTimestamp) VALUES 
                    (" . $attendance->getEnrollmentId() . ", '" . $attendance->getDate() . "', " . $attendance->getWeek() . ", 
                    " . $attendance->getAttendance() . ", '" . $attendance->getDescription() . "', current_timestamp());";
			$dbInstance->executeTransaction($sqlQuery);
			//create audit trail
			$dbInstance->transactionAudit($sqlQuery, 'attendance', 'INSERT', 'Insert weekly attendance.');
			//check current transaction state before proceed towards
			if ($dbInstance->getTransactionState()) {
				if ($dbInstance->commitToDatabase()) {
					//operation success message
                    $dbInstance->closeConnection();
					return true;
				} else {
                    $dbInstance->closeConnection();
					return false;
				}
			} else {
                $dbInstance->closeConnection();
				return false;
			}

		}


		public static function getEnrollmentID($studentID, $courseCode, $attempt): bool|int {
			$sqlQuery = "SELECT enrollmentID FROM student_enroll_course WHERE studentIndexNo='$studentID' AND courseCode='$courseCode' AND attempt='$attempt' AND isActive=TRUE LIMIT 1";
			$isResult = Database::executeQuery("administrativeAttendance", "administrativeAttendance@16", $sqlQuery)[0]['enrollmentID'];
			if ($isResult) {
				return $isResult;
			} else {
				return false;
			}
			// $sqlQuery1=Database::executeQuery("root", "", $sqlQuery)[0]['enrollmentID'];

		}


		public static function getInquiryMessage(): array|bool {
			$sqlQuery = "SELECT entryID,sendBy, message, sendDate, isViewed FROM attendance_inquiry WHERE isViewed=0";
			$result = Database::executeQuery("administrativeAttendance", "administrativeAttendance@16", $sqlQuery);
			if ($result) {
				$messageList = array();
				//read subject list and add them into above array as attendance inquiry objects
				foreach ($result as $row) {
					$message = new AttendanceInquiry();
					$message->setInquiryID($row['entryID']);
					$message->setInquiryDetails($row['sendBy'], $row['message'], $row['sendDate'], $row['isViewed']);
					$messageList[] = $message;
				}
				return $messageList;
			} else {
				return false;
			}
		}
	}






