<?php

	class sentBoxController extends Controller {
		public static function sentBox() {

			$getData = sentBoxModel::sentBoxGetMessageData();
			print_r($getData);
			/*$getTitle = receiveMessageModel::getTitle();
			$getMessage = receiveMessageModel::getMessage();
			$getSendBy = receiveMessageModel::getSendBy();*/


			self::createView("sentBoxView", $getData);


		}
	}