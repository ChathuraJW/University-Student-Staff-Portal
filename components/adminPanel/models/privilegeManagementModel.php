<?php

	class PrivilegeManagementModel extends Model {
//		load current privilege list
		public static function loadCurrentPrivileges(): bool|array {
			$sqlQuery = "SELECT SP.*, U.salutation, U.firstName, U.lastName FROM special_role SP,user U WHERE SP.assignedUser=U.userName AND SP.userRole!='ADM'";
			$result = Database::executeQuery('admin', 'admin@16', $sqlQuery);
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
			$result = Database::executeQuery('admin', 'admin@16', $sqlQuery)[0];
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
			$dbInstance->establishTransaction('admin', 'admin@16');

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

//					create notification and send mail to inform the new privilege
					$notificationMessage = "<br><br><table border=`1`><tr><th>Code</th><th>Description</th><th>Responsibilities</th></tr>
					<tr><td>RED(#1)</td><td>Registrar for Examination Department</td><td>This user role is responsible to take result send by academic staff
					 for examination board approval. Should be a Administrative base login. System have only one SAR login.</td></tr>
					<tr><td>HBO(#2,#3,#4)</td><td>Hall Booking Approval Officer</td><td>This privileged use is responsible to handle hall reservation request send
					 by other system user. System can have maximum three HBO privileged users.</td></tr>
					<tr><td>ASH(#5)</td><td>Academic Supportive Head</td><td>This role should assign for one of academic supportive staff member. He/She 
					responsible to distribute and allocate workload requests.</td>
					</tr><tr><td>EDO(#6)</td><td>Examination Department Officer</td><td>This user responsible to upload examination board confirmed results
					 to the system. This privilege can take for only one administrative user login.</td></tr>
					<tr><td>AMO(#7)</td><td>Attendance Marking Officer</td><td>This user responsible to upload daily student attendance for lectures. To have
					 this privilege user should be administrative login and system only have one AMO role.</td></tr>
					<tr><td>QAO(#8)</td><td>IQAC Report Uploading Officer</td><td>This user responsible to submit IQAC reports to academic staff. This user 
					also should be a administrative login and system have only one such user.</td></tr>
					<tr><td>TSO(#9)</td><td>Train Season Officer</td><td>This user is responsible to prepare train season according to the user request. 
					To have this role, user should be a administrative login. System can have only one TSO.</td></tr>
					</table>";
					$informNotification = new Notification();
					$informNotification->createNotification("Obtained new privilege level", "You had obtained new privilege #$privilegeID. To know what you can do please refer the below table. $notificationMessage");
					$informNotification->setReceivers(array($newlyAssignedUser));
					$informNotification->setSender(self::getAdminUser());
					$informNotification->publishNotification(true);
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