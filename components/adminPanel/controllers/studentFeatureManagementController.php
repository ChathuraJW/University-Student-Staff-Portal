<?php

	class StudentFeatureManagementController extends Controller {
		public static function addHostelStudent() {
			self::createModularView('studentFeatureManagement', 'smfAddHostelStudentView');

			if (isset($_POST['saveData'])) {
				$studentList = $_POST['studentList'];
//				clean index list string to convert to list
				$indexListString = str_replace(' ', '', $studentList);
				$indexList = explode(',', $indexListString);

//				validate indexes by semantic with respect to length
				$isIndexesOk = true;
				foreach ($indexList as $row) {
					if (strlen($row) != 8) {
						$isIndexesOk = false;
						break;
					}
				}
//				check index list status
				if ($isIndexesOk) {
					//proceed towards
					studentFeatureManagementModel::assignStudentForHostelFacility($indexList);
				} else {
//					display error
					echo("<script>createToast('Warning (error code: #ADMIN-SF-01)','Student index list is not in correct format.','W')</script>");
				}
			}
		}

		public static function scholarshipStudent() {
			self::createModularView('studentFeatureManagement', 'smfAddScholarshipView');

			if (isset($_POST['saveData'])) {
				$studentList = $_POST['studentList'];
				$scholarshipType = $_POST['scholarshipType'];

//				clean index list string to convert to list
				$indexListString = str_replace(' ', '', $studentList);
				$indexList = explode(',', $indexListString);

//				validate indexes by semantic with respect to length
				$isIndexesOk = true;
				foreach ($indexList as $row) {
					if (strlen($row) != 8) {
						$isIndexesOk = false;
						break;
					}
				}
//				check index list status
				if ($isIndexesOk) {
					//proceed towards
					studentFeatureManagementModel::assignStudentForScholarship($scholarshipType, $indexList);
				} else {
//					display error
					echo("<script>createToast('Warning (error code: #ADMIN-SF-03)','Student index list is not in correct format.','W')</script>");
				}

			}
		}
	}