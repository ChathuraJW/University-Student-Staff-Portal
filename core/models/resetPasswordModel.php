<?php

	class ResetPasswordModel extends Model {
		public static function resetPassword($userName, $password) {
//	        Update the new password's hash value
			$salt = bin2hex(random_bytes(8));
			$hashedPassword = hash('sha256', "$password$salt");
			$queryOne = "UPDATE user SET password='$hashedPassword',passwordSalt='$salt' WHERE userName='$userName'";
			$databaseInstance = new Database;
			$databaseInstance->establishTransaction('generalAccess', 'generalAccess@16');
			$databaseInstance->executeTransaction($queryOne);
			$databaseInstance->transactionAudit($queryOne, 'user', "UPDATE", "Update new password for user $userName.", $userName);
			if ($databaseInstance->getTransactionState()) {
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
	}