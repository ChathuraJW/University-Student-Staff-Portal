<?php

	class UserManagementController extends Controller {
		public static function init() {
			self::createView('userManagementView');

			if (isset($_POST['addStudentData'])) {
//				handle student data serving
				$studentGroup = $_POST['studentGroup'];
				$fileName = $_FILES['studentListFile']['name'];
				$fileLocation = $_FILES['studentListFile']['tmp_name'];
//				check whether file is uploaded or not
				if (isset($fileLocation))
					UserManagementModel::addNewStudentBulk($studentGroup, $fileName, $fileLocation);
				else
					echo("<script>createToast('Warning (error code: #ADMIN-UM-01)','Failed to find uploaded file.','W')</script>");

			} elseif (isset($_POST['registerStaffMember'])) {
//				handle staff data serving
				$staffMember = new Staff;
				$staffMember->createUser($_POST['userName'], $_POST['firstName'], $_POST['lastName'], $_POST['fullName'], $_POST['personalEmail'],
					$_POST['universityEmail'], $_POST['dob'], $_POST['nic']);
				UserManagementModel::addStaffMember($staffMember, $_POST['userRole']);
			}
		}
	}