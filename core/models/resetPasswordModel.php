<?php

	class ResetPasswordModel extends Model {
		public static function resetPassword($userName, $password) {
			$hashedPassword = self::getHashPassword($userName, $password);
//	        Update the new password's hash value
			$queryOne = "UPDATE user SET password='$hashedPassword' WHERE userName='$userName'";
			$databaseInstance = new Database;
			$databaseInstance->establishTransaction('generalAccess', 'generalAccess@16');
			$databaseInstance->executeTransaction($queryOne);
			if ($databaseInstance->getTransactionState()) {
				$databaseInstance->transactionAudit($queryOne, 'user', "UPDATE", "Update new password for user $userName.", $userName);
				if ($databaseInstance->commitToDatabase($userName)) {
//					create notification and send email
					$msgContent = "
						Password reset operation completed on your USSP account. <br>
						If you <b>did not</b> do that, quickly contact system administrator. <br>
						Thank you.
					";
					$informConfirmation = new Notification;
					$informConfirmation->setReceivers(array($userName));
					$informConfirmation->setSender(self::getAdminUser());
					$informConfirmation->createNotification('Password reset successful.', $msgContent);
					$informConfirmation->publishNotification(true);
					// display success message and the wait 2 second and redirect to login
					echo("<script>
						createToast('Success','Update password successfully.','S');
						setTimeout(function(){
						    window.location.href='login';
						}, 2000);
					</script>");
				} else {
					// display fail message
					echo("<script>createToast('Warning (error code: #FPWD01)','Failed to Update .','W')</script>");
				}
			} else {
				echo("<script>createToast('Warning (error code: #FPWD01)','Failed to Update .','W')</script>");
			}
		}

		private static function getHashPassword($userName, $password): string {
//	        There create a new salt value for every password changing time.
//	        create a salt value
			$salt = bin2hex(random_bytes(8));
			$databaseInstance = new Database;
			$databaseInstance->establishTransaction('generalAccess', 'generalAccess@16');
//	        update the salt value
			$query = "UPDATE user SET passwordSalt='$salt' WHERE userName='$userName'";
			$databaseInstance->executeTransaction($query);
			$databaseInstance->transactionAudit($query, 'user', 'UPDATE', "Update password salt of user $userName.", $userName);
			if ($databaseInstance->getTransactionState()) {
				$databaseInstance->commitToDatabase($userName);
			}
//	        create the hash value of the password and salt value
			return hash('sha256', "$password$salt");
		}
	}