<?php

	class SendMessageController extends Controller {
		public static function sendMessage() {
			$academic = sendMessageModel::getContacts('AS');
			$administrative = sendMessageModel::getContacts('AD');
			$academicSupportive = sendMessageModel::getContacts('SP');
			$student = sendMessageModel::getContacts('ST');
			$sendData = array($academic, $administrative, $academicSupportive, $student);

			self::createView("sendMessageView", $sendData);

			if (isset($_POST['submit'])) {
				$title = "New Message form " . $_COOKIE['userName'];
				$message = $_POST['message'];
				$sendBy = $_COOKIE['userName'];

				if (!$title || !$message || !$sendBy) {
					echo("<script>createToast('Warning(error code:#UM01-T)','Failed to get inputs.','W')</script>");
				} else {
					//add data to message table
					$contacts = $_POST['contacts'];
					$indexListString = trim($contacts, ' ');
					$splitData = (explode(" ", $indexListString));
					$messageDetail = new Message();
					$messageDetail->setMessageDetail($title, $message, $sendBy, NULL, $splitData, NULL, NULL);
					 SendMessageModel::addData($messageDetail);
				}
			}
		}
	}

?>