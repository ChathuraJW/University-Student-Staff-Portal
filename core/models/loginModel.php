<?php

	class LoginModel extends Model {
		public static function checkUserName($userName): bool {
			$sqlQuery = "SELECT * FROM user WHERE userName='$userName'";
			$result = Database::executeQuery("generalAccess", "generalAccess@16", $sqlQuery);
			if (sizeof($result) > 0) {
				return true;
			} else {
				return false;
			}
		}

		public static function validateLogIn($userName, $password): array|bool {
			$sqlQuery = "SELECT * FROM user WHERE userName='$userName'";
			$result = Database::executeQuery("generalAccess", "generalAccess@16", $sqlQuery);
			if (($result[0]["password"]) === $password) {
				return $result;
			} else {
				return array(false);
			}
		}
	}
