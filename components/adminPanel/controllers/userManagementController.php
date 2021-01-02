<?php

	class UserManagementController extends Controller {
		public static function init() {
			if (!isset($_GET['searchUserProfile']))
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
			} elseif (isset($_GET['searchUserProfile'])) {
//				search for user operation in edit profile section
				$username = $_GET['searchUser'];
				$userData = UserManagementModel::searchUser($username);

//				create view with selected user data
				self::createView('userManagementView', $userData);
//				display error if user did not exist
				if (!$userData)
					echo("<script>createToast('Warning (error code: #ADMIN-UM-05)','Failed to load user data or invalid username.','W')</script>");

			}

//				save updated date of user
			if (isset($_POST['updateUserData'])) {
//				create and edit parameter of User object
				$updatedUser = new User;
				$updatedUser->createUserForAdminEdit($_POST['firstName'], $_POST['lastName'], $_POST['fullName'], $_POST['uniMail'], $_POST['dob'], $_POST['nic'], $_POST['userRole']);
				$updatedUser->setUserName($_GET['searchUser']);
//				call model function for operation
				UserManagementModel::updateUserData($updatedUser);
			}
		}
	}