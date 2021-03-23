<?php

	class ForgetPasswordModel extends Model {
		public static function getName($userName) {
			$query = "SELECT firstName FROM user WHERE userName='" . $userName . "'";
			return Database::executeQuery("generalAccess", "generalAccess@16", $query)[0]['firstName'];
		}
	}