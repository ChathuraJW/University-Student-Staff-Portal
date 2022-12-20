<?php

	class SelectSubjectController extends Controller {

		public static function open() {
			$subjects = SelectSubjectModel::subjects();
			self::createView("selectSubjectView", $subjects);
			if (!$subjects)
				echo("<script>createToast('Warning (error code: #SBS03)','You are not allowed to access this feature.','W')</script>");
			if (isset($_POST['submit'])) {

				$array = $_POST['checkingBox'];
				SelectSubjectModel::enroll($array);
			}

		}
	}

?>