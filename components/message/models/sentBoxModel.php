<?php

	class sentBoxModel extends Model {

		public static function sentBoxGetMessageData(): bool|array {
			$userName = $_COOKIE['userName'];
//			$sqlQueryGetTime = "SELECT * FROM message,user_receive_message WHERE message.messageID=user_receive_message.messageID AND message.sendBy='$userName'";
			$sqlQuery = "SELECT *  FROM message WHERE sendBy='$userName'";
			$dbInstance = new Database();
			$dbInstance->establishTransaction("generalAccess", "generalAccess@16");
			$getDetail = $dbInstance->executeTransaction($sqlQuery);
			if ($getDetail) {
				$getDetailList = array();
				foreach ($getDetail as $data) {
					$messageID = $data['messageID'];
					$sqlQuery = "SELECT receivedBy,isViewed FROM user_receive_message WHERE messageID=$messageID";
					$receivers = $dbInstance->executeTransaction($sqlQuery);
					$receiverList = array();
					$isViewedList = array();
					foreach ($receivers as $receiver) {
						$receiverList[] = $receiver['receivedBy'];
						$isViewedList[] = $receiver['isViewed'];
					}
					$newDetail = new Message();
					$newDetail->setMessageDetail($data['title'], $data['message'], $data['sendBy'], $data['messageID'], $receiverList,
						$isViewedList, $data['timestamp']);
					$getDetailList[] = $newDetail;
				}
				return $getDetailList;
			} else {
				return false;
			}
		}

	}

?>