<?php

	use PHPMailer\PHPMailer\Exception;
	use PHPMailer\PHPMailer\PHPMailer;

	require 'PHPMailer/src/Exception.php';
	require 'PHPMailer/src/PHPMailer.php';
	require 'PHPMailer/src/SMTP.php';

	function sendMail($title, $message, $isMessageToUnion, $receivers = null): bool {
		$dbInstance = new Database;
		//TODO change database credentials
		$dbInstance->establishTransaction('root', '');
//		create phpMailer object
		$mail = new PHPMailer(true);
		try {
			$mail->IsSMTP();
			$mail->SMTPAuth = true;
			$mail->SMTPSecure = "tls";
			$mail->Host = "smtp.gmail.com";
			$mail->Port = 587;

			$mail->FromName = "USSP-UCSC";
			$mail->Subject = $title;
			$mail->MsgHTML($message);

//			set sender email and password, take data from system_parameter table
			$sqlQuery = "SELECT parameterValue FROM system_parameters WHERE parameterKey='system_email'";
			$systemEmail = $dbInstance->executeTransaction($sqlQuery)[0]['parameterValue'];

			$sqlQuery = "SELECT parameterValue FROM system_parameters WHERE parameterKey='system_email_password'";
			$systemEmailPassword = $dbInstance->executeTransaction($sqlQuery)[0]['parameterValue'];

			$mail->Username = $systemEmail;
			$mail->Password = $systemEmailPassword;
			$mail->From = $systemEmail;

//			set receivers
			if (!$isMessageToUnion) {
				foreach ($receivers as $receiverUserName) {
//				get email form username
					$sqlQuery = "SELECT personalEmail,fullName FROM user WHERE userName=$receiverUserName";
					$queryResult = $dbInstance->executeTransaction($sqlQuery)[0];
					$userEmail = $queryResult['personalEmail'];
					$fullName = $queryResult['fullName'];
//				set email to mail function
					$mail->AddAddress($userEmail, $fullName);
				}
			} else {
//				read db to get union email address
				$sqlQuery = "SELECT parameterValue FROM system_parameters WHERE parameterKey='union_email'";
				$unionEmail = $dbInstance->executeTransaction($sqlQuery)[0]['parameterValue'];
//				set union main address to receiver address
				$mail->AddAddress($unionEmail,"UCSC Student Union");
			}

			$mail->IsHTML(true);
//			check transaction state
			if ($dbInstance->getTransactionState()) {
//				send the create mail
				$mail->send();
				$dbInstance->closeConnection();
				return true;
			} else {
				return false;
			}
		} catch (Exception $e) {
			return false;
		}
	}