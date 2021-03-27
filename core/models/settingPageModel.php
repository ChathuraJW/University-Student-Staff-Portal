<?php

	class SettingPageModel extends Model {
		public static function profilePic($userName, $fileName) {
			echo 'hello3';

			$query = "UPDATE user SET profilePicURL='$fileName' WHERE userName='$userName'";
			$databaseInstance = new Database;
			$databaseInstance->establishTransaction('root', '');
			if ($databaseInstance->executeTransaction($query)) {
				echo 'hello4';

				$databaseInstance->transactionAudit($query, 'user', "UPDATE", "Update profile picture by setting page");
				$databaseInstance->commitToDatabase();
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