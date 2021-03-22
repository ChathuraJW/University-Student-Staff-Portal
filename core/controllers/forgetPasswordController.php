<?php
	require_once('../assets/php/sendMail.php');

	class ForgetPasswordController extends Controller {

		public static function open() {

			self::createView("forgetPasswordView");

			if (isset($_POST['submit'])) {

				$userName = $_POST['userName'];

				// Store the cipher method
				$ciphering = "AES-128-CTR";

				// Use OpenSSl Encryption method
				$iv_length = openssl_cipher_iv_length($ciphering);
				$options = 0;

				// Non-NULL Initialization Vector for encryption
				$encryption_iv = '1234567891011121';

				// Store the encryption key
				$encryption_key = "@cs#@24TRC##";

				// Use openssl_encrypt() function to encrypt the data
				$encryption = openssl_encrypt($userName, $ciphering, $encryption_key, $options, $encryption_iv);

				$name = ForgetPasswordModel::getName($userName);
				if (!$name) {
					echo("<script>createToast('Warning (error code: #FPW03)','Invalid username.','W')</script>");
					die();
				}
				$title = "Reset USSP Password";
				$link = "http://localhost/USSP/core/resetPassword?secret=" . $encryption . "";
				$message = "
            
                <p>Dear $name,</p>
                <p>You recently requested to reset your password for your USSP account. Click the link bellow to reset it.</p>
                <a href='" . $link . "'>Reset Password</a>
                <p>If you did not requested, it is better to contact system administrator for further process.</p>
                <p>Thank you.</p> 
            
            ";

//            send password reset link
				$isMailSend = sendMail($title, $message, false, array($userName));
//            display alert
				if ($isMailSend) {
					echo("<script>createToast('Success','Check your primary email for reset link.','S')</script>");
//					create log
					ForgetPasswordModel::createLog(date("Y-m-d H:m:s", time()), "user $userName create password reset request.");
				} else {
					echo("<script>createToast('Warning (error code: #FPW03)','Failed to send reset password link.','W')</script>");
				}
			}
		}

	}
