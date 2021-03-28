<?php

	class PrivilegeManagementController extends Controller {
		public static function init() {
			$currentPrivilegeList = PrivilegeManagementModel::loadCurrentPrivileges();
//			search user details
			if (isset($_POST['searchUser'])) {
				$searchKey = $_POST['searchUserName'];
				$userData = PrivilegeManagementModel::loadUser($searchKey);
//				create view with both privilege list and user search result
				self::createModularView('privilegeManagement', 'privilegeManagementView', array($currentPrivilegeList, $userData));
//				display error by saying search failed
				if (!$userData)
					echo("<script>createToast('Warning (error code: #ADMIN-PM-02)','Invalid user or failed to load user data.','W')</script>");
			} else {
//				default view
				self::createModularView('privilegeManagement', 'privilegeManagementView', array($currentPrivilegeList));
			}
//			display error if basic data not loaded properly
			if (!$currentPrivilegeList)
				echo("<script>createToast('Warning (error code: #ADMIN-PM-01)','Failed to load current privilege list.','W')</script>");

//			updating operation
			if (isset($_POST['updatePrivilege'])) {
				$userName = $_POST['searchUserName'];
				$privilegeID = $_POST['privilegeID'];
//				call model function for backed operation
				PrivilegeManagementModel::updatePrivilege($privilegeID, $userName);
			}
		}
	}