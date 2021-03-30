<?php

	class SettingPageModel extends Model {
		public static function loadEditableData(): User {
			$userName = $_COOKIE['userName'];
			$sqlQuery = "SELECT * FROM user WHERE userName='$userName'";
			$result = Database::executeQuery('generalAccess', 'generalAccess@16', $sqlQuery)[0];
			$user = new User();
			$user->setUserSetting($result['firstName'], $result['lastName'], $result['personalEmail'], $result['address'], $result['TPNO']);
			return $user;
		}

		public static function updateProfileData($userData) {
			$userName = $_COOKIE['userName'];
			$dbInstance = new Database();
			$dbInstance->establishTransaction('generalAccess', 'generalAccess@16');
//			user data update query
			$sqlQuery = "UPDATE user SET firstName='" . $userData->getFirstName() . "',lastName='" . $userData->getLastName() . "'
			,personalEmail='" . $userData->getPersonalEmail() . "',address='" . $userData->getAddress() . "',TPNO='" . $userData->getTPNO() . "' WHERE userName='$userName'";
			echo($sqlQuery);
			$dbInstance->executeTransaction($sqlQuery);
			$dbInstance->transactionAudit($sqlQuery, 'user', 'UPDATE', "Update profile data of user $userName.", $userName);

			if ($dbInstance->getTransactionState()) {
				if ($dbInstance->commitToDatabase($userName)) {
					echo("<script>createToast('Operation Successful.','Profile information successfully updated.','S')</script>");
				} else {
					echo("<script>createToast('Warning (error code: #SETP02)','Failed to update user information.','W')</script>");
				}
			} else {
				echo("<script>createToast('Warning (error code: #SETP02)','Failed to update user information.','W')</script>");
			}

		}

		public static function profilePicUpdate($userName, $fileName) {
			$query = "UPDATE user SET profilePicURL='$fileName' WHERE userName='$userName'";
			$databaseInstance = new Database;
			$databaseInstance->establishTransaction('generalAccess', 'generalAccess@16');
			if ($databaseInstance->executeTransaction($query)) {
				$databaseInstance->transactionAudit($query, 'user', "UPDATE", "Update profile picture of user $userName.");
				if ($databaseInstance->commitToDatabase()) {
					echo("<script>createToast('Operation Successful.','Profile picture successfully updated.','S')</script>");
				}
			} else {
				echo("<script>createToast('Warning (error code: #SETP01)','Failed to Update Profile Picture','W')</script>");
			}
		}

		public static function updateKeys($pubKey): bool {
			$userName = $_COOKIE['userName'];
			$databaseInstance = new Database;
			$databaseInstance->establishTransaction('generalAccess', 'generalAccess@16');
//			check weather already have public key on database
			$queryOne = "SELECT * FROM public_key WHERE staffID='$userName'";
			$data = $databaseInstance->executeTransaction($queryOne);
			$state = true;
			if ($data) {
				$queryTwo = "UPDATE public_key SET publicKey='$pubKey',lastModifiedTimestamp=NOW() WHERE staffID='$userName'";
				if ($databaseInstance->executeTransaction($queryTwo)) {
					$databaseInstance->transactionAudit($queryTwo, 'public_key', "UPDATE", "Update PPK of $userName.");
				} else {
					$state = false;
				}
			} else {
				$queryThree = "INSERT INTO public_key(publicKey,staffID,lastModifiedTimestamp) VALUES ('$pubKey','$userName',NOW())";
				if ($databaseInstance->executeTransaction($queryThree)) {
					$databaseInstance->transactionAudit($queryThree, 'public_key', "INSERT", "Create PPK for $userName.");

				} else {
					$state = false;
				}
			}
			$databaseInstance->commitToDatabase();
			return $state;
		}
	}