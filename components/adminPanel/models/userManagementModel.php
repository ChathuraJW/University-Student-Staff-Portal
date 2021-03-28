<?php

	class UserManagementModel extends Model {
//		save student data
		public static function addNewStudentBulk($selectedGroup, $fileName, $filePath): bool {
			$dbInstance = new Database;
			$dbInstance->establishTransaction('admin', 'admin@16');

//			query for insert into user table
			$sqlQueryForUser = "INSERT INTO user(userName, password, nic, firstName, lastName, fullName, dob, address, TPNO, personalEmail, role,passwordSalt) VALUES";

//			query for insert data into student table
			$sqlQueryForStudent = "INSERT INTO student(indexNo, regNo, studentGroup) VALUES";

//			open csv file
			$resultFile = fopen($filePath, "r");
			$isHeaderRow = true;
			while (!feof($resultFile)) {
				$resultEntry = explode(",", fgets($resultFile));
				if ($isHeaderRow) {
//					ignore process header
					$isHeaderRow = false;
					continue;
				} else {
//					process with data fields
					if (isset($resultEntry[1])) {
						if (count($resultEntry) != 10) {
//							this error occur when format as not expected
							echo("<script>createToast('Warning (error code: #ADMIN-UM-02)','Invalid data format on data file.','W')</script>");
							$dbInstance->closeConnection();
							return false;
						}
//						create default password, including username as salt
						$salt = bin2hex(random_bytes(8));
						$defaultPasswordHash = hash('sha256', "ucsc@123$salt");

						$sqlQueryForUser .= " ('" . $resultEntry[1] . "','$defaultPasswordHash','" . $resultEntry[5] . "','" . $resultEntry[2] . "','" . $resultEntry[3] . "','" . $resultEntry[4] . "','" . $resultEntry[6] . "','" . $resultEntry[7] . "','" . $resultEntry[8] . "','" . $resultEntry[9] . "','ST','$salt'),";
						$sqlQueryForStudent .= " (" . $resultEntry[0] . ",'" . $resultEntry[1] . "','$selectedGroup'),";
					}
				}
			}
			$sqlQueryForUser = trim($sqlQueryForUser, ",");
			$sqlQueryForStudent = trim($sqlQueryForStudent, ",");

//			query run and audit for user table
			$dbInstance->executeTransaction($sqlQueryForUser);
			$dbInstance->transactionAudit($sqlQueryForUser, 'user', 'INSERT', "Add student as bulk for group $selectedGroup.");

//			query run and audit for student table
			$dbInstance->executeTransaction($sqlQueryForStudent);
			$dbInstance->transactionAudit($sqlQueryForStudent, 'student', 'INSERT', "Add student as bulk for group $selectedGroup.");

//			close file
			fclose($resultFile);

			if ($dbInstance->getTransactionState()) {
				if ($dbInstance->commitToDatabase()) {
					echo("<script>createToast('Success','Student data uploaded successfully.','S')</script>");
					$dbInstance->closeConnection();
					return true;
				} else {
					echo("<script>createToast('Warning (error code: #ADMIN-UM-03)','Operation Failed.','W')</script>");
					$dbInstance->closeConnection();
					return false;
				}
			} else {
				echo("<script>createToast('Warning (error code: #ADMIN-UM-03)','Operation Failed.','W')</script>");
				$dbInstance->closeConnection();
				return false;
			}
		}

//		save new staff data
		public static function addStaffMember($staffMember, $userRole) {
			$dbInstance = new Database;
			$dbInstance->establishTransaction('admin', 'admin@16');

//			create default password and salt
			$salt = bin2hex(random_bytes(8));
			$defaultPasswordHash = hash('sha256', "ucsc@123$salt");

//			add data to user table
			$sqlQuery = "INSERT INTO user(userName,password, nic, firstName, lastName, fullName, dob, personalEmail, universityEmail, role, passwordSalt) VALUE ('"
				. $staffMember->getUserName() . "','$defaultPasswordHash','" . $staffMember->getNic() . "','" . $staffMember->getFirstName() . "','" . $staffMember->getLastName()
				. "','"
				. $staffMember->getFullName() . "','" . $staffMember->getDateOfBirth() . "','" . $staffMember->getPersonalEmail() . "','" . $staffMember->getUniversityEmail()
				. "','$userRole','$salt')";
			$dbInstance->executeTransaction($sqlQuery);
			$dbInstance->transactionAudit($sqlQuery, 'user', 'INSERT', "Add new staff member to user table.");

//			add data to academic_staff table if new user is an academic staff member
			if ($userRole === 'AS') {
				$sqlQuery = "INSERT INTO academic_staff(staffID) VALUE ('" . $staffMember->getUserName() . "')";
				$dbInstance->executeTransaction($sqlQuery);
				$dbInstance->transactionAudit($sqlQuery, 'academic_staff', 'INSERT', "Add data when create new academic staff user.");
			}

//			check weather all queries execute
			if ($dbInstance->getTransactionState()) {
				if ($dbInstance->commitToDatabase()) {
					echo("<script>createToast('Success','Operation successful.','S')</script>");
				} else {
					echo("<script>createToast('Warning (error code: #ADMIN-UM-04)','Operation Failed.','W')</script>");
				}
			} else {
				echo("<script>createToast('Warning (error code: #ADMIN-UM-04)','Operation Failed.','W')</script>");
			}
//			close connection
			$dbInstance->closeConnection();
		}

//		search user profile
		public static function searchUser($userName): User|bool {
			$sqlQuery = "SELECT * FROM user WHERE userName='$userName'";
			$result = Database::executeQuery('admin', 'admin@16', $sqlQuery)[0];
			if ($result) {
				$user = new User;
				$user->createUserForAdminEdit($result['firstName'], $result['lastName'], $result['fullName'], $result['universityEmail'],
					$result['dob'], $result['nic'], $result['role']);
				return $user;
			} else {
				return false;
			}
		}

		public static function updateUserData($updatedUser) {
			$dbInstance = new Database;
			$dbInstance->establishTransaction('admin', 'admin@16');
			//check previous user role and current user role are same or previous is different one and present is academic staff
			//if so add new data entry to academic_staff table
			$sqlQuery = "SELECT role FROM user WHERE userName='" . $updatedUser->getUserName() . "'";
			$previousRole = $dbInstance->executeTransaction($sqlQuery)[0]['role'];

			if ($previousRole !== 'AS' & $updatedUser->getUserType() === 'AS') {
//				add new entry to academic staff table
				$sqlQuery = "INSERT INTO academic_staff(staffID) VALUE ('" . $updatedUser->getUserName() . "')";
				$dbInstance->executeTransaction($sqlQuery);
				$dbInstance->transactionAudit($sqlQuery, 'academic_staff', 'INSERT', "Due to user details update add new entry to academic staff table.");
			}
//			update user data
			$sqlQuery = "UPDATE user SET nic='" . $updatedUser->getNic() . "',firstName='" . $updatedUser->getFirstName() . "',lastName='"
				. $updatedUser->getLastName() . "',fullName='" . $updatedUser->getFullName() . "',dob='" . $updatedUser->getDateOfBirth() . "',universityEmail='"
				. $updatedUser->getUniversityEmail() . "',role='" . $updatedUser->getUserType() . "' WHERE userName='" . $updatedUser->getUserName() . "'";
			$dbInstance->executeTransaction($sqlQuery);
			$dbInstance->transactionAudit($sqlQuery, 'user', 'UPDATE', "Update user details by system admin.");

//			check weather all queries are executed successfully
			if ($dbInstance->getTransactionState()) {
				if ($dbInstance->commitToDatabase()) {
					echo("
						<script>
							createToast('Success','Operation successful.','S')
//							redirect to previous page after 3seconds
							setTimeout(function(){ 
								history.go(-2);
							 }, 3000);
						</script>
						");
				} else {
//					display error
					echo("<script>createToast('Warning (error code: #ADMIN-UM-06)','Operation Failed.','W')</script>");
				}
			} else {
//				display error
				echo("<script>createToast('Warning (error code: #ADMIN-UM-06)','Operation Failed.','W')</script>");
			}
			$dbInstance->closeConnection();
		}

		public static function updateStudentGroup($studentIndexes, $newGroup) {
			$dbInstance = new Database;
			$dbInstance->establishTransaction('admin', 'admin@16');

//			create query to update group
			$sqlQuery = "UPDATE student SET studentGroup='$newGroup' WHERE ";
			foreach ($studentIndexes as $individualIndex) {
				$sqlQuery .= "indexNo='$individualIndex' OR ";
			}
			$sqlQuery = trim($sqlQuery, 'OR ');
			echo $sqlQuery;
			$dbInstance->executeTransaction($sqlQuery);
//			execute update query and audit the action
			$dbInstance->transactionAudit($sqlQuery, 'student', 'UPDATE', "Update set of students  group to $newGroup by admin.");

			if ($dbInstance->getTransactionState()) {
				if ($dbInstance->commitToDatabase()) {
					//TODO send email to inform the situation (nice to have)
//					display success message and redirect to previous page
					echo("
						<script>
							createToast('Success','Operation successful.','S')
//							redirect to previous page after 3seconds
							setTimeout(function(){ 
								history.go(-3);
							 }, 3000);
						</script>
						");
				} else {
//					display fail message
					echo("<script>createToast('Warning (error code: #ADMIN-UM-08)','Operation Failed.','W')</script>");
				}
			} else {
//				display fail message
				echo("<script>createToast('Warning (error code: #ADMIN-UM-08)','Operation Failed.','W')</script>");
			}
			$dbInstance->closeConnection();
		}
	}