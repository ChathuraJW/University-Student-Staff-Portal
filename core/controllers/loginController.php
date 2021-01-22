<?php

	class LoginController extends Controller {
		public static function initLogin() {
//        create view
			self::createView("loginView");
			if (isset($_POST['login'])) {
				$userName = $_POST['userName'];
				$password = $_POST['password'];
				if ($password != '' && $userName != '') {
//                check userName validity
					$isUserNameValid = LoginModel::checkUserName($userName);
					if ($isUserNameValid) {
						$loginStatus = LoginModel::validateLogIn($userName, hash('sha256', "$password$userName"));
						if (!$loginStatus[0]) {
//                        display error
							echo("<script>displayError();</script>");
						} else {
//                        set cookies valid for two days
							setcookie('userName', $userName, time() + 8400 * 2, "/");
							setcookie('role', $loginStatus[0]['role'], time() + 8400 * 2, "/");
							$fullName = $loginStatus[0]['firstName'] . ' ' . $loginStatus[0]['lastName'];
							setcookie('fullName', $fullName, time() + 8400 * 2, "/");

//                        create entry in application log
							$timestamp = date("Y-m-d H:i:s");
							$fileEntry = "$timestamp      ::::    User $userName login to the system as " . $loginStatus[0]['role'] . "\n";
							file_put_contents("../system.log", $fileEntry, FILE_APPEND);

//                        redirect to home
							header("location: home");
						}
					} else {
						echo("<script>displayError();</script>");
					}
				} else {
					echo("<script>displayError();</script>");
				}
//
			}
		}
	}
