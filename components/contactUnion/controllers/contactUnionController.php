<?php

	class ContactUnionController extends Controller {
		public static function init() {
			$messageData = ContactUnionModel::getMessageData();
			self::createView('contactUnionView', $messageData);
			if (isset($_POST['sendMessage'])) {
				$newUnionMessage = new ContactUnion;
				$newUnionMessage->setBasicMessage($_POST['messageTitle'], $_POST['messageContent'], $_COOKIE['userName']);
//	        set anonymous state
				if (isset($_POST['anonymousCheck']) & $_POST['anonymousCheck'] === 'on')
					$newUnionMessage->setIsAnonymous(true);
				else
					$newUnionMessage->setIsAnonymous(false);
//	        calling model function
				ContactUnionModel::createMail($newUnionMessage);
			}
		}
	}