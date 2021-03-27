<?php

	class RegistrationModel extends Model {
		public static function getData(): bool|array {
			$userName = $_COOKIE['userName'];
			$query = "SELECT * FROM user WHERE userName='$userName' LIMIT 1";
			return Database::executeQuery("generalAccess", "generalAccess@16", $query);
		}

		public static function updateUserData($password, $gender, $salutation, $telephone, $address, $personalEmail, $profilePicURL) {
			$userName = $_COOKIE['userName'];
//	        here create a new salt value for password
			$salt = bin2hex(random_bytes(8));
			$hashedPassword = hash('sha256', "$password$salt");
			$dbInstance = new Database;
			$dbInstance->establishTransaction("generalAccess", "generalAccess@16");
			$query = "UPDATE user SET isFirstLogIn=FALSE, password='$hashedPassword',gender='$gender',salutation='$salutation',address='$address',TPNO='$telephone',personalEmail='$personalEmail',profilePicURL='$profilePicURL',passwordSalt='$salt'  WHERE userName='$userName'";
			$dbInstance->executeTransaction($query);
			$dbInstance->transactionAudit($query, 'user', "UPDATE", "Update user($userName) basic information when initial login to the system.");
			$dbInstance->commitToDatabase();
		}
	}