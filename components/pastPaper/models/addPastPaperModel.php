<?php


	class AddPastPaperModel extends Model {


		public static function getSubjectData(): array|bool {
			$sqlQuery = "SELECT courseCode, name, semester FROM course_module ORDER BY semester";
			$subjects = Database::executeQuery('root', '', $sqlQuery);

//        initialize the returning array
			if ($subjects) {
				$subjectList = array();
				foreach ($subjects as $row) {
					$newSubject = new courseModule();
					$newSubject->setCourseModule($row['courseCode'], $row['name'], $row['semester']);
					$subjectList[] = $newSubject;
				}
				return $subjectList;
			} else {
				return false;
			}
		}

		public static function addPastPaperDetails($pastPaper) {
			$databaseInstance = new Database();
			$databaseInstance->establishTransaction('administrativeGeneral', 'administrativeGeneral@16');
			$sqlQuery = "INSERT INTO pastpaper(subjectCode, yearOfExam, semester,fileName) VALUES ('" . $pastPaper->getSubjectCode() . "'," . $pastPaper->getExaminationYear() . "," . $pastPaper->getSemester() . ",'" . $pastPaper->getPaperName() . "')";
			$databaseInstance->executeTransaction($sqlQuery);
//        create audit trail
			$databaseInstance->transactionAudit($sqlQuery, 'pastpaper', 'INSERT', "PastPaper uploaded to the system.");


			if ($databaseInstance->getTransactionState()) {
				$name = $_FILES['myFile']['name'];
				$tempName = $_FILES['myFile']['tmp_name'];
				if (isset($name) and !empty($tempName)) {
					$location = './assets/pastPapers/';
					$fileName = $pastPaper->getPaperName();
					echo("File name- $fileName");
					if (move_uploaded_file($tempName, $location . $fileName)) {
						//commit to database
						if ($databaseInstance->commitToDatabase()) {
							echo("<script>createToast('Success','Past paper successfully uploaded','S')</script>");
						} else {
							echo("<script>createToast('Warning(error code:#PPM01)','Failed to submit past Paper.','W')</script>");
						}
					} else {
						echo("<script>createToast('Warning(error code:#PPM01)','Failed to submit past Paper.','W')</script>");

					}
				} else {
					echo("<script>createToast('Warning(error code:#PPM01)','Failed to submit past Paper.','W')</script>");

				}
			} else {
				echo("<script>createToast('Warning(error code:#PPM01)','Failed to submit past Paper.','W')</script>");
			}
			$databaseInstance->closeConnection();
		}

		//TO do apply course module class
		public static function getSubjectName($subjectCode) {
			$sqlQuery = "SELECT name FROM course_module WHERE courseCode = '$subjectCode'";
			$isSuccess = Database::executeQuery('administrativeGeneral', 'administrativeGeneral@16', $sqlQuery)[0]['name'];
			if($isSuccess){
			    return $isSuccess;
            }else{
			    return false;
            }

		}


	}