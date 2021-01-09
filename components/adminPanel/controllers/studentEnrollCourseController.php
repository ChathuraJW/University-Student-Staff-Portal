<?php

	class StudentEnrollCourseController extends Controller {
		public static function makeEnrollment() {
//			with subject data load the view
			$subjectList = StudentEnrollCourseModel::loadSubjectsAccordingToSemester();
			self::createModularView('studentEnrollCourse', 'ecMakeEnrollmentView', $subjectList);
//			generate error if subject list not prepared
			if (!$subjectList)
				echo("<script>createToast('Warning (error code: #ADMIN-EC-01)','Failed to load subject data.','W')</script>");

//			go for operation
			if (isset($_POST['gotoEnroll'])) {
				$selectedGroup = $_POST['studentGroup'];
				$selectedSubject = $_POST['selectedSubject'];

//				call model function
				StudentEnrollCourseModel::makeEnrollment($selectedGroup, $selectedSubject);
			}
		}

		public static function makeRepeatEnrollment() {
//			create view with subject data
			$subjectList = StudentEnrollCourseModel::loadSubjectsAccordingToSemester();
			self::createModularView('studentEnrollCourse', 'ecMakeEnrollmentRepeatView', $subjectList);
//			generate error if subject list not prepared
			if (!$subjectList)
				echo("<script>createToast('Warning (error code: #ADMIN-EC-01)','Failed to load subject data.','W')</script>");

			if (isset($_POST['Proceed'])) {
				$indexListString = $_POST['studentIndexList'];
				$selectedSubject = $_POST['selectedSubject'];

//				clean index list string to convert to list
				$indexListString = str_replace(' ', '', $indexListString);
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
					StudentEnrollCourseModel::repeatedStudentEnrollment($selectedSubject, $indexList);
				} else {
//					display error
					echo("<script>createToast('Warning (error code: #ADMIN-EC-04)','Student index list is not in correct format.','W')</script>");
				}
			}
		}
	}