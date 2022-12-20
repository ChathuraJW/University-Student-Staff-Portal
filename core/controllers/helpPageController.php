<?php

	class HelpPageController extends Controller {
		public static function helpPage() {
			self::createView("helpPageView");
		}
	}

?>