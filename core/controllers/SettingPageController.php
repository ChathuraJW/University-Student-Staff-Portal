<?php


	class SettingPageController extends Controller {

		public static function open() {
			self::createView("settingPageView");
			if (isset($_POST['profilePictureSubmit'])) {
				echo 'hello1';
				$fileName = $_COOKIE['userName'] . '.png';
				$profilePic = $_FILES['profilePic']['name'];
				$tempName = $_FILES['profilePic']['tmp_name'];
				if (isset($profilePic) && !empty($profilePic)) {
					$location = './assets/images/';
					move_uploaded_file($tempName, $location . $fileName);
					$userName = $_COOKIE['userName'];
					echo 'hello2';

					SettingPageModel::profilePic($userName, $fileName);
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

				// Extract the private key from $res to $privKey

				openssl_pkey_export($res, $privateKey);


				// Extract the public key from $res to $pubKey

				$pubKey = openssl_pkey_get_details($res);

				$pubKey = $pubKey["key"];

//				 echo($pubKey);
//
//				// echo("<br>");
//
//				 echo($privateKey);
//				$file = "privateKey.txt";
//				$openedFile = fopen($file, "w") or die("Unable to open file!");
//				fwrite($openedFile, $privateKey);


				$privateKey = urlencode($privateKey);
				$state = SettingPageModel::updateKeys($pubKey);
				if ($state) {
					echo("<script>createToast('Operation Successful.','Key pair generation completed.','S')</script>");
					echo("
						<script>
						  let element = document.createElement('a');
						  let url = 'data:text/plain;charset=utf-8,'+decodeURIComponent('$privateKey');
						  element.setAttribute('href',url);
						  element.setAttribute('download', 'privateKey.pem');
						
						  element.style.display = 'none';
						  document.body.appendChild(element);
						
						  element.click();
						
						  document.body.removeChild(element);
						</script>
					
					");
				} else {
					echo("<script>createToast('Warning (error code: #PUBK01)','Failed to Update Public Key','W')</script>");
				}
			}
		}
	}