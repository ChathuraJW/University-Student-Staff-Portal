<?php
	class UserManagementController extends Controller {
		public static function init() {
			self::createView('userManagementView');
			if(isset($_POST['addStudentData'])){
				$studentGroup=$_POST['studentGroup'];
				$fileName = $_FILES['studentListFile']['name'];
				$fileLocation = $_FILES['studentListFile']['tmp_name'];
//				check whether file is uploaded or not
				if(isset($fileLocation))
					UserManagementModel::addNewStudentBulk($studentGroup,$fileName,$fileLocation);
				else
					echo("<script>createToast('Warning (error code: #ADMIN-UM-01)','Failed to find uploaded file.','W')</script>");
			}
		}
	}