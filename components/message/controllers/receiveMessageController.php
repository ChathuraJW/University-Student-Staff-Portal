<?php

	class ReceiveMessageController extends Controller {
		public static function receiveMessage() {
			$getMessageData = receiveMessageModel::getMessageData();

			self::createView("receiveMessageView", $getMessageData);
			if (isset($_GET['activity'])) {
				$messageID = $_GET['messageIDForReadConfirm'];

				if (!$messageID) {
					echo("<script>createToast('Warning(error code:#UM03-T)','Failed to get messageID.','W')</script>");
				}


				$insertMessageState = ReceiveMessageModel::insertMessageState($messageID);

			}


		}
	}