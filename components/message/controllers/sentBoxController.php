<?php

	class SentBoxController extends Controller {
		public static function sentBox() {
			$getData = sentBoxModel::sentBoxGetMessageData();
			self::createView("sentBoxView", $getData);
		}
	}