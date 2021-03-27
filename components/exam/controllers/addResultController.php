<?php

	class AddResultController extends Controller {
		public static function init() {
//    	get subject list
			$subjectList = AddResultModel::getSubjectData();
			self::createView("addResultView", $subjectList);

			//get data and store in variable to save in DB
			if (isset($_POST['submit'])) {
				$year = $_POST['examinationName'];
				$semesterRow = $_POST['semester'];
//                get 1-8 semester value from year semester combination
				$semList = array(array(1, 2), array(3, 4), array(5, 6), array(7, 8));
				$realSemester = $semList[$year - 1][$semesterRow - 1];
//				take rest of data to variables
				$attempt = $_POST['attempt'];
				$batch = 'NA';
				if ($attempt == 'F')
					$batch = $_POST['batch'];
				$subject = $_POST['subject'];
				$examinationYear = $_POST['examinationYear'];
//                get current user
				$user = $_COOKIE['userName'];
//                create result file name
				$fileName = "$subject-$examinationYear-$attempt.csv";
//				create ResultFile object to pass to model
				$resultFile = new ResultFile;
				$resultFile->setResultFile($subject, $realSemester, $examinationYear, $attempt, $batch, TRUE, $fileName);
//	            call model function operation
				AddResultModel::saveFileData($resultFile);
			}
		}
	}