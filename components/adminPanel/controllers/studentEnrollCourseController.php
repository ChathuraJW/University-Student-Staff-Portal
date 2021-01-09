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
	}