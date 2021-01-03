<?php

	class UserManagementController extends Controller {
//		public static function init() {
//			if (!isset($_GET['searchUserProfile']) && !isset($_GET['searchStudentProfile']))
//				self::createView('userManagementView');
//
//			if (isset($_POST['addStudentData'])) {
////				handle student data serving
//				$studentGroup = $_POST['studentGroup'];
//				$fileName = $_FILES['studentListFile']['name'];
//				$fileLocation = $_FILES['studentListFile']['tmp_name'];
////				check whether file is uploaded or not
//				if (isset($fileLocation))
//					UserManagementModel::addNewStudentBulk($studentGroup, $fileName, $fileLocation);
//				else
//					echo("<script>createToast('Warning (error code: #ADMIN-UM-01)','Failed to find uploaded file.','W')</script>");
//
//			} elseif (isset($_POST['registerStaffMember'])) {
////				handle staff data serving
//				$staffMember = new Staff;
//				$staffMember->createUser($_POST['userName'], $_POST['firstName'], $_POST['lastName'], $_POST['fullName'], $_POST['personalEmail'],
//					$_POST['universityEmail'], $_POST['dob'], $_POST['nic']);
//				UserManagementModel::addStaffMember($staffMember, $_POST['userRole']);
//			} elseif (isset($_GET['searchUserProfile'])) {
////				search for user operation in edit profile section
//				$username = $_GET['searchUser'];
//				$userData = UserManagementModel::searchUser($username);
//
////				create view with selected user data
//				self::createView('userManagementView', $userData);
////				display error if user did not exist
//				if (!$userData)
//					echo("<script>createToast('Warning (error code: #ADMIN-UM-05)','Failed to load user data or invalid username.','W')</script>");
//			}
//
////				save updated date of user
//			if (isset($_POST['updateUserData'])) {
////				create and edit parameter of User object
//				$updatedUser = new User;
//				$updatedUser->createUserForAdminEdit($_POST['firstName'], $_POST['lastName'], $_POST['fullName'], $_POST['uniMail'], $_POST['dob'], $_POST['nic'], $_POST['userRole']);
//				$updatedUser->setUserName($_GET['searchUser']);
////				call model function for operation
//				UserManagementModel::updateUserData($updatedUser);
//			}
//
//			if (isset($_GET['searchStudentProfile'])) {
//				$username = $_GET['searchStudent'];
//				$studentData = UserManagementModel::getStudentData($username);
////				create view with selected user data
//				self::createView('userManagementView', $studentData);
//				if (!$studentData)
//					echo("<script>createToast('Warning (error code: #ADMIN-UM-07)','Failed to load user data or invalid username.','W')</script>");
//			}
//
//			if (isset($_POST['updateStudentGroup'])) {
//				$selectedGroup = $_POST['studentGroup'];
//				$studentUsername = $_GET['searchStudent'];
////				call model function
//				UserManagementModel::updateStudentGroup($studentUsername, $selectedGroup);
//			}
//		}

//		handle student data add operation
		public static function addStudent() {
//			load view
			self::createModularView('userManagement', 'umAddStudentAsBulkView');
//			handle operation
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

			}
		}

//	handle staff data serving
		public static function addStaff() {
//			load view
			self::createModularView('userManagement', 'umAddStaffAsIndividualView');
//			handle operation
			if (isset($_POST['registerStaffMember'])) {
				$staffMember = new Staff;
				$staffMember->createUser($_POST['userName'], $_POST['firstName'], $_POST['lastName'], $_POST['fullName'], $_POST['personalEmail'],
					$_POST['universityEmail'], $_POST['dob'], $_POST['nic']);
				UserManagementModel::addStaffMember($staffMember, $_POST['userRole']);
			}
		}

		public static function updateProfile() {
//			handle operation
			if (isset($_GET['searchUserProfile'])) {
//			search for user operation in edit profile section
				$username = $_GET['searchUser'];
				$userData = UserManagementModel::searchUser($username);
//			create view with selected user data
				self::createModularView('userManagement', 'umUpdateProfileView', $userData);
//			display error if user did not exist
				if (!$userData)
					echo("<script>createToast('Warning (error code: #ADMIN-UM-05)','Failed to load user data or invalid username.','W')</script>");
			}else{
//				load default view
				self::createModularView('userManagement', 'umUpdateProfileView');
			}
//			save updated date of user
			if (isset($_POST['updateUserData'])) {
//				create and edit parameter of User object
				$updatedUser = new User;
				$updatedUser->createUserForAdminEdit($_POST['firstName'], $_POST['lastName'], $_POST['fullName'], $_POST['uniMail'], $_POST['dob'], $_POST['nic'], $_POST['userRole']);
				$updatedUser->setUserName($_GET['searchUser']);
//				call model function for operation
				UserManagementModel::updateUserData($updatedUser);
			}
		}

		public static function changeStudentGroup(){
//			initial search operation
			if (isset($_GET['searchStudentProfile'])) {
				$username = $_GET['searchStudent'];
				$studentData = UserManagementModel::getStudentData($username);
//				create view with selected user data
				self::createModularView('userManagement', 'umChangeStudentGroupView',$studentData);
				if (!$studentData)
					echo("<script>createToast('Warning (error code: #ADMIN-UM-07)','Failed to load user data or invalid username.','W')</script>");
			}else{
//				load default view
				self::createModularView('userManagement', 'umChangeStudentGroupView');
			}
//			data saving operation
			if (isset($_POST['updateStudentGroup'])) {
				$selectedGroup = $_POST['studentGroup'];
				$studentUsername = $_GET['searchStudent'];
//				call model function
				UserManagementModel::updateStudentGroup($studentUsername, $selectedGroup);
			}
		}
	}