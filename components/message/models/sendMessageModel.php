<?php

	class SendMessageModel extends Model {
		public static function getContacts($role): bool|array {
			$userName = $_COOKIE['userName'];
			$sqlQuery = "SELECT userName,fullName FROM user WHERE role='$role' AND userName!='$userName'";
			$getAcademic = Database::executeQuery("generalAccess", "generalAccess@16", $sqlQuery);

			if ($getAcademic) {
				$getAcademicList = array();
				foreach ($getAcademic as $data) {
					$newAcademic = new User();
					$newAcademic->setUser(NULL, $data['fullName'], $data['userName'], NULL, NULL);
					$getAcademicList[] = $newAcademic;
				}
				return $getAcademicList;
			} else {
				return false;
			}

		}

		public static function addData($messageDetail) {
			$databaseInstance = new Database();
			$databaseInstance->establishTransaction("generalAccess", "generalAccess@16");
			$insertQuery = "INSERT INTO message(`title`, `message`, `timestamp`, `sendBy`) VALUES ('" . $messageDetail->getTitle() . "','" . $messageDetail->getMessage() . "',NOW(),'" . $messageDetail->getSendBy() . "')";
			$databaseInstance->executeTransaction($insertQuery)[0]['messageID'];

			//create audit trail
			$databaseInstance->transactionAudit($insertQuery, 'message', 'INSERT', "Message details are uploaded to the system.");

			$selectQuery = "SELECT messageID FROM message WHERE title='" . $messageDetail->getTitle() . "' AND message='" . $messageDetail->getMessage() . "' AND sendBy='" . $messageDetail->getSendBy() . "' ";
			$messageID = $databaseInstance->executeTransaction($selectQuery)[0]['messageID'];

			foreach ($messageDetail->getReceivedBy() as $value) {
				$insertSplitDataQuery = "INSERT INTO user_receive_message(messageID,receivedBy) VALUE($messageID,'$value')";
				$databaseInstance->executeTransaction($insertSplitDataQuery);
				//create audit trail
				$databaseInstance->transactionAudit($insertSplitDataQuery, 'user_receive_message', 'INSERT', "Add contact($value) to message $messageID.");
			}

			//check transaction state
			if ($databaseInstance->getTransactionState()) {
				if ($databaseInstance->commitToDatabase()) {
//					create notification
					$informConfirmation = new Notification;
					$informConfirmation->setReceivers($messageDetail->getReceivedBy());
					$informConfirmation->setSender($_COOKIE['userName']);
					$informConfirmation->createNotification($messageDetail->getTitle(), $messageDetail->getMessage());
					$informConfirmation->publishNotification(false);

					echo("<script>createToast('Success','Message successfully send.','S')</script>");
				} else {
					echo("<script>createToast('Warning(error code:#UM02-T)','Failed to send.','W')</script>");
				}
			} else {
				echo("<script>createToast('Warning(error code:#UM02-T)','Failed to send.','W')</script>");
			}
			$databaseInstance->closeConnection();
		}
	}

?>