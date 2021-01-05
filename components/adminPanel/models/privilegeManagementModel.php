<?php

	class PrivilegeManagementModel extends Model {
//		load current privilege list
		public static function loadCurrentPrivileges(): bool|array {
			$sqlQuery = "SELECT SP.*, U.salutation, U.firstName, U.lastName FROM special_role SP,user U WHERE SP.assignedUser=U.userName";
			//TODO need to change database credentials
			$result = Database::executeQuery('root', '', $sqlQuery);
			if ($result) {
//				initialize array for add role data
				$returnArray = array();
				foreach ($result as $row) {
					$role = new SpecialRole();
					$role->createRole($row['entryID'], $row['userRole'], $row['assignedUser'], $row['salutation'], $row['firstName'], $row['lastName']);
//					insert object to array
					$returnArray[] = $role;
				}
				return $returnArray;
			} else {
				return false;
			}
		}

//		function for get user data according to user name
		public static function loadUser($userName): bool|User {
			$sqlQuery = "SELECT * FROM user WHERE userName='$userName'";
			//TODO need to change database credentials
			$result = Database::executeQuery('root', '', $sqlQuery)[0];
			if ($result) {
//				create user object and return it
				$user = new User;
				$user->createUserForPrivilegeSearch($result['salutation'], $result['firstName'], $result['lastName'], $result['userName'], $result['role']);
				return $user;
			} else {
				return false;
			}
		}

//		privilege updating function
		public static function updatePrivilege($privilegeID, $newlyAssignedUser) {
//			create database object
			$dbInstance = new Database;
			//TODO need to change database credentials
			$dbInstance->establishTransaction('root', '');

//			check whether user can hold this privilege
			$sqlQuery = "SELECT possibleUserCategory FROM special_role WHERE entryID=$privilegeID";
			$possibleUserCategory = $dbInstance->executeTransaction($sqlQuery)[0]['possibleUserCategory'];

//			take selected user type
			$sqlQuery = "SELECT role FROM user WHERE userName='$newlyAssignedUser'";
			$selectedUserType = $dbInstance->executeTransaction($sqlQuery)[0]['role'];

//			check user role and privilege accepted role if they are equal the procedure toward ele display error and leave model function
			if ($possibleUserCategory !== $selectedUserType) {
				echo("<script>createToast('Warning (error code: #ADMIN-PM-04)','This user($newlyAssignedUser) cannot hold selected(#$privilegeID) position.','W')</script>");
//				close connection
				$dbInstance->closeConnection();
				return;
			}

//			update special_role table and create log
			$sqlQuery = "UPDATE special_role SET assignedUser='$newlyAssignedUser',assignedDate='NOW()' WHERE entryID=$privilegeID";
			$dbInstance->executeTransaction($sqlQuery);

			$dbInstance->transactionAudit($sqlQuery, 'special_role', 'UPDATE', "Change role #$privilegeID privilege to $newlyAssignedUser by admin.");

//			check transaction state
			if ($dbInstance->getTransactionState()) {
				if ($dbInstance->commitToDatabase()) {
//					display success message
					echo("<script>createToast('Success','Operation successful.','S')</script>");
					//TODO send notification
				} else {
//					display error
					echo("<script>createToast('Warning (error code: #ADMIN-PM-03)','Failed to complete the operation.','W')</script>");
				}
			} else {
//				display error
				echo("<script>createToast('Warning (error code: #ADMIN-PM-03)','Failed to complete the operation.','W')</script>");
			}
//			close connection
			$dbInstance->closeConnection();
		}

	}