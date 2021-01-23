<?php

	class AddRawResultModel extends Model {

		public static function saveFileData($fileData, $owner) {
			$dbInstance = new Database;
			$dbInstance->establishTransaction('academicStaff', 'academicStaff@16');
//			query for insert file data
			$sqlQuery = "INSERT INTO result_data_file(subjectCode, semester, yearOfExam, attempt, batch, isEncrypted, fileLocation) 
				VALUES ('" . $fileData->getSubjectCode() . "'," . $fileData->getSemester() . ",'" . $fileData->getYearOfExam() . "',
				'" . $fileData->getAttempt() . "','" . $fileData->getBatch() . "',TRUE,'assets/rawResults/" . $fileData->getFileName() . "')";
			$dbInstance->executeTransaction($sqlQuery);
//            create audit trail
			$dbInstance->transactionAudit($sqlQuery, 'result_data_file', 'INSERT', 'Insert when academic staff send raw result file. Related to storing file information.');
//			check current transaction state before proceed towards
			if ($dbInstance->getTransactionState()) {
				$sqlQuery = "SELECT fileID FROM result_data_file WHERE fileLocation='assets/rawResults/" . $fileData->getFileName() . "' LIMIT 1";
				$fileID = $dbInstance->executeTransaction($sqlQuery)[0]['fileID'];

//            set file owner
				$sqlQuery = "INSERT INTO submit_raw_result(staffID, fileID, submitTimestamp) VALUES ('$owner',$fileID,NOW())";
				$dbInstance->executeTransaction($sqlQuery);
				$dbInstance->transactionAudit($sqlQuery, 'submit_raw_result', "INSERT", 'Insert when academic staff send raw result file. Related to storing file owner information.');

				if ($dbInstance->getTransactionState()) {
//	        	ready to save file
					//upload file into directory
					$name = $_FILES['rawResultFile']['name'];
					$temp_name = $_FILES['rawResultFile']['tmp_name'];
					if (isset($name) and !empty($name)) {
						$location = './assets/rawResults/';
						$fileName = $fileData->getFileName();
						if (move_uploaded_file($temp_name, $location . $fileName)) {
//				        	commit changes to DB
							if ($dbInstance->commitToDatabase()) {
								//operation success message
								echo("<script>createToast('Success','Result file successfully uploaded','S')</script>");
							} else {
//					        	display error
								echo("<script>createToast('Warning (error code: #ERM02-D)','Failed submit result file.','W')</script>");
							}

						} else {
//				        	display fail
							echo("<script>createToast('Warning (error code: #ERM02-F)','Failed submit result file.','W')</script>");
						}
					}
				} else {
//	        	display error
					echo("<script>createToast('Warning (error code: #ERM02-U)','Failed submit result file.','W')</script>");
				}
			} else {
				//display error
				echo("<script>createToast('Warning (error code: #ERM02-I)','Failed submit result file.','W')</script>");
			}
			$dbInstance->closeConnection();
		}

		//subject data getting function
		public static function getSubjectData(): bool|array {
			$sqlQuery = "SELECT * FROM course_module";
			$result = Database::executeQuery("academicStaff", "academicStaff@16", $sqlQuery);
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
	}
