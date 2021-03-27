<?php


	class SettingPageController extends Controller {

		public static function open() {
			self::createView("settingPageView");

			if (isset($_POST['profilePictureSubmit'])) {
				$fileName = $_COOKIE['userName'] . '.png';
				$profilePic = $_FILES['profilePic']['name'];
				$tempName = $_FILES['profilePic']['tmp_name'];
				if (isset($profilePic) && !empty($profilePic)) {
					$location = './assets/profile picture/';
					move_uploaded_file($tempName, $location . $fileName);
					$userName = $_COOKIE['userName'];
					SettingPageModel::profilePicUpdate($userName, $fileName);
				}
			}
			if (isset($_POST['pubKeySubmit'])) {
				$config = array(
					"digest_alg" => "sha256",
					"private_key_bits" => 2048,
					"private_key_type" => OPENSSL_KEYTYPE_RSA,
				);
				// Create the private and public key
				$res = openssl_pkey_new($config);
				// Extract the private key from $res to $private Key
				openssl_pkey_export($res, $privateKey);
				// Extract the public key from $res to $pubKey
				$pubKey = openssl_pkey_get_details($res);
				$pubKey = $pubKey["key"];

				$state = SettingPageModel::updateKeys($pubKey);
				if ($state) {
					echo("<script>createToast('Operation Successful.','Key pair generation completed.','S')</script>");
					$file = "assets/keyFile.pem";
					$txt = fopen($file, "w") or die("Unable to open file!");
					fwrite($txt, $privateKey);
					fclose($txt);
					header("location: $file");
//					unlink($file);
				} else {
					echo("<script>createToast('Warning (error code: #PUBK01)','Failed to Update Public Key','W')</script>");
				}
			}
		}
	}