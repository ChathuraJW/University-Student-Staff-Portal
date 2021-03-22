<?php

	class ResetPasswordController extends Controller {
		public static function open() {
			self::createView("resetPasswordView");
			if (isset($_POST['password'])) {
				$userName = $_GET['secret'];
				$password = $_POST['password'];

				$ciphering = "AES-128-CTR";

				// Use OpenSSl Encryption method
				$iv_length = openssl_cipher_iv_length($ciphering);
				$options = 0;

				// Non-NULL Initialization Vector for decryption
				$decryption_iv = '1234567891011121';

				// Store the decryption key
				$decryption_key = "@cs#@24TRC##";

				// Use openssl_decrypt() function to decrypt the data
				$decryption = openssl_decrypt($userName, $ciphering, $decryption_key, $options, $decryption_iv);

				ResetPasswordModel::resetPassword($decryption, $password);
			}
		}
	}
