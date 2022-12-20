<?php

	class ReceiveMessageModel extends Model {
		public static function getMessageData() {
			$userName = $_COOKIE['userName'];
			$sqlQueryGetTime = "SELECT * FROM message,user_receive_message WHERE message.messageID=user_receive_message.messageID AND user_receive_message.receivedBy='$userName'";
			$getDetail = Database::executeQuery("generalAccess", "generalAccess@16", $sqlQueryGetTime);
			if ($getDetail) {
				$getDetailList = array();
				foreach ($getDetail as $data) {
					$newDetail = new Message();
					$newDetail->setMessageDetail($data['title'], $data['message'], $data['sendBy'], $data['messageID'], $data['receivedBy'], $data['isViewed'], $data['timestamp']);
					$getDetailList[] = $newDetail;
				}
				return $getDetailList;
			} else {
				return false;
			}
		}


		public static function insertMessageState($messageID) {
			$databaseInstance = new Database();
			$databaseInstance->establishTransaction('root', '');

			$userName = $_COOKIE['userName'];
			$sqlQueryMessageState = "UPDATE user_receive_message SET isViewed=1 WHERE messageID=$messageID AND receivedBy='$userName'";
			$isUpdated = $databaseInstance->executeTransaction($sqlQueryMessageState);

			//create audit trail
			$databaseInstance->transactionAudit($sqlQueryMessageState, 'user_receive_message', 'UPDATE', "Change the state of the message. (not view->view).");

			//check transaction state
			if ($databaseInstance->getTransactionState()) {
				if ($databaseInstance->commitToDatabase()) {
					echo("<script>createToast('Success','Successfully updated the state.','S')</script>");
				} else {
					echo("<script>createToast('Warning(error code:#UM04-T)','Failed to updated.','W')</script>");
				}
			} else {
				echo("<script>createToast('Warning(error code:#UM04-T)','Failed to updated.','W')</script>");
			}


		}
	}