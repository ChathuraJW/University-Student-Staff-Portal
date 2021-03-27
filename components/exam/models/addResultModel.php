<?php

	class AddResultModel extends Model {

		public static function getSubjectData(): bool|array {
			$sqlQuery = "SELECT * FROM course_module";
			$result = Database::executeQuery("administrativeGeneral", "administrativeGeneral@16", $sqlQuery);
			if ($result) {
				$subjectList = array();
//			read subject list and add them into above array as CourseModule objects
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

		public static function saveFileData($fileData) {
			$dbInstance = new Database;
			$dbInstance->establishTransaction('administrativeGeneral', 'administrativeGeneral@16');
//			query for insert file data
			$sqlQuery = "INSERT INTO result_data_file(subjectCode, semester, yearOfExam, attempt, batch, isEncrypted, fileLocation) 
				VALUES ('" . $fileData->getSubjectCode() . "'," . $fileData->getSemester() . ",'" . $fileData->getYearOfExam() . "',
				'" . $fileData->getAttempt() . "','" . $fileData->getBatch() . "',FALSE,'assets/boardConfirmedResults/" . $fileData->getFileName() . "')";
			$dbInstance->executeTransaction($sqlQuery);
//        create audit trail
			$dbInstance->transactionAudit($sqlQuery, 'result_data_file', "INSERT", 'Result file uploaded to the system.');

			//upload file into directory, before that check all queries are run correctly
			if ($dbInstance->getTransactionState()) {
				$name = $_FILES['resultFile']['name'];
				$temp_name = $_FILES['resultFile']['tmp_name'];
				$fileName = $fileData->getFileName();
				$location = "./assets/boardConfirmedResults/$fileName";
				if (isset($name) and !empty($name)) {
					if (move_uploaded_file($temp_name, $location)) {
//				    file save successfully
						echo("<script>createToast('Info','Result file successfully uploaded.','I')</script>");
//					call function to insert file data to database
						self::processFinalResultData($fileData->getYearOfExam(), $fileData->getAttempt(), $fileData->getBatch(), $fileData->getSubjectCode(),
							$fileData->getFileName());
					} else {
//			    	fail operation
						echo("<script>createToast('Warning (error code: #ERM05-F)','Failed submit result file.','W')</script>");
					}
				}
			} else {
//	    	fail operation
				echo("<script>createToast('Warning (error code: #ERM05-T)','Failed submit result file.','W')</script>");
			}
			$dbInstance->closeConnection();
		}

		//hear academicYer is as same as batch value. that means to whom this exam for
		private static function processFinalResultData($examinationYear, $attempt, $academicYear, $subject, $fileName) {
			$dbInstance = new Database;
			$dbInstance->establishTransaction('administrativeGeneral', 'administrativeGeneral@16');
			if ($fileName !== "") {
//              get subject credit value
				$sqlQuery = "SELECT creditValue FROM course_module WHERE courseCode='$subject'";
				$creditForSubject = $dbInstance->executeTransaction($sqlQuery)[0]['creditValue'];

//              file operation start here onward
				$filePath = './assets/boardConfirmedResults/' . $fileName;
				$resultFile = fopen($filePath, "r");
//              prepare sql query top part
				$sqlQuery = "INSERT INTO result(enrollmentID, yearOfExam, academicYear, result,uploadTimestamp) VALUES";
//              use this variable to ignore header
				$isHeader = true;
//              iterate through file and read data
				while (!feof($resultFile)) {
					$resultEntry = explode(",", fgets($resultFile));
//                  to ignore header row use this condition checking
					if ($isHeader) {
						$isHeader = false;
						continue;
					} else {
						$studentIndex = $resultEntry[1];
//						add student index to array
//                      cleanup string for take result value
						$result = trim(preg_replace('/[^a-zA-Z0-9 +-]/s', '', $resultEntry[2]), ' ');

//						call enrollment id getting function with same database object
						$enrollmentID = self::getEnrollmentID($dbInstance, $studentIndex, $subject, $attempt);
//                      check weather dat is empty in the row (empty row check)
						if ($result !== '' & $studentIndex !== '' & $enrollmentID !== '') {
//                          update GPA of student
//							call GPA update function with same database object
							self::updateGPA($dbInstance, $studentIndex, $subject, $creditForSubject, $result, $attempt);
							$sqlQuery .= "($enrollmentID,'$examinationYear','$academicYear','$result',NOW()),";
						}
					}
				}
//				ready created query for execution
				$sqlQuery = trim($sqlQuery, ",");
				$sqlQuery .= ";";
				$dbInstance->executeTransaction($sqlQuery);
//              create audit
				$dbInstance->transactionAudit($sqlQuery, 'result', "INSERT", 'Insert all result as a bulk.');
//				close file
				fclose($resultFile);

				if ($dbInstance->getTransactionState()) {
					if ($dbInstance->commitToDatabase()) {
						echo("<script>createToast('Success','Result upload successfully completed.','S')</script>");
						//TODO (nice to have) if need can send notification to student to there new result release
					} else {
						echo("<script>createToast('Warning (error code: #ERM06)','Failed to complete the process.','W')</script>");
					}
				} else {
					echo("<script>createToast('Warning (error code: #ERM06)','Failed to complete the process.','W')</script>");
				}
				$dbInstance->closeConnection();
			}
		}

//		use for get student enrollment ID
		private static function getEnrollmentID(&$dbInstance, $studentID, $courseCode, $attempt) {
			$sqlQuery = "SELECT enrollmentID FROM student_enroll_course WHERE studentIndexNo='$studentID' AND courseCode='$courseCode' AND attempt='$attempt' AND isActive=TRUE LIMIT 1";
			return $dbInstance->executeTransaction($sqlQuery)[0]['enrollmentID'];
		}

//		this function update the student current GPA value
		private static function updateGPA(&$dbInstance, $studentIndex, $subjectCode, $subjectCredit, $result, $attempt) {
//			$dbInstance=new Database;
//			$dbInstance->establishTransaction('administrativeGeneral', 'administrativeGeneral@16');
			if ($attempt === 'F') {
//				first attempt calculations
//      	    get total credit of given student
				$sqlQuery = "SELECT SUM(creditValue) as totalCredit FROM student_result WHERE indexNo='$studentIndex' AND attempt='F'";
				$totalCredit = $dbInstance->executeTransaction($sqlQuery)[0]['totalCredit'];

//              get current GPA of the student
				$sqlQuery = "SELECT currentGPA FROM student WHERE indexNo='$studentIndex'";
				$currentGPA = $dbInstance->executeTransaction($sqlQuery)[0]['currentGPA'];

//              GPA calculation
				if ($currentGPA == 0 || $totalCredit == 0) {
					$newGPA = self::getGPV($result);
				} else {
					//newGPA=(currentGPA*totalCredits + newSubjectGPV*subjectCredit) / all credits(including new result credit)
					$newGPA = (($currentGPA * $totalCredit) + (self::getGPV($result) * $subjectCredit)) / ($totalCredit + $subjectCredit);
				}
			} else {
//				repeated attempt calculations
				$sqlQuery = "SELECT * FROM student_result WHERE indexNo=$studentIndex";
				$resultEntryList = $dbInstance->executeTransaction($sqlQuery);
				$totalCredit = 0;
				$sumGPV = 0.0;
				$selectedSubjectMaxGPV = self::getGPV($result);
				foreach ($resultEntryList as $resultEntry) {
					if ($resultEntry['courseCode'] === $subjectCode) {
//						tackle repeats
//						get GPV related to result
						$entryResultGPV = self::getGPV($resultEntry['result']);
//						if student attempt for several time get maximum result for GPA calculation
						if ($entryResultGPV > $selectedSubjectMaxGPV)
							$selectedSubjectMaxGPV = $entryResultGPV;
					} else {
//						normal entries
						$creditValue = $resultEntry['creditValue'];
						$result = $resultEntry['result'];
						$totalCredit = $totalCredit + $creditValue;
						$sumGPV = $sumGPV + ($creditValue * self::getGPV($result));
					}
				}
//				consider about current subject result and add them into final GPA calculation
				$totalCredit = $totalCredit + $subjectCredit;
				$sumGPV = $sumGPV + ($selectedSubjectMaxGPV * $subjectCredit);
//				calculate final GPA value that goes to database
				$newGPA = $sumGPV / $totalCredit;
			}
//			GPA correction
			if ($newGPA > 4.0000) $newGPA = 4.0000;
//          update new GPA of the student
			$sqlQuery = "UPDATE student SET currentGPA=$newGPA WHERE indexNo='$studentIndex'";
			$dbInstance->executeTransaction($sqlQuery);
			$dbInstance->transactionAudit($sqlQuery, 'student', "UPDATE", 'Modify GPA after add new result data into system.');
		}

		private static function getGPV($result): float {
			return match ($result) {
				'A+', 'A' => 4.0000,
				'A-' => 3.7000,
				'B+' => 3.3000,
				'B' => 3.0000,
				'B-' => 2.7000,
				'C+' => 2.3000,
				'C' => 2.0000,
				'C-' => 1.7000,
				'D+' => 1.3000,
				'D' => 1.0000,
				default => 0.0,
			};
		}
	}