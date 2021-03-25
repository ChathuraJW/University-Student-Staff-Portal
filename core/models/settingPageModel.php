<?php

	class SettingPageModel extends Model {
		public static function profilePic($userName,$fileName) {
            echo 'hello3';

			$query = "UPDATE user SET profilePicURL='$fileName' WHERE userName='$userName'";
			$databaseInstance=new Database;
			$databaseInstance->establishTransaction('root','');
			if($databaseInstance->executeTransaction($query)){
				echo 'hello4';

				$databaseInstance->transactionAudit($query,'user',"UPDATE","Update profile picture by setting page");
				$databaseInstance->commitToDatabase();
			}
			else{
				echo("<script>createToast('Warning (error code: #SETP01)','Failed to Update Profile Picture','W')</script>");
			}
		}
		public static function securityKeys($pubKey){
			$userName=$_COOKIE['userName'];
			$date=date('Y-m-d H:i:s');
			$queryOne="SELECT * FROM public_key WHERE staffID='$userName'";
			$data=Database::executeQuery('root','',$queryOne);
			if($data){
				$queryTwo="UPDATE public_key SET publicKey='$pubKey',lastModifiedTimestamp='$date' WHERE='$userName'";
				$databaseInstance=new Database;
				$databaseInstance->establishTransaction('root','');
				if($databaseInstance->executeTransaction($queryTwo)){
					$databaseInstance->transactionAudit($queryTwo,'user',"UPDATE","Update Public key");
					$databaseInstance->commitToDatabase();
				}
				else{
					echo("<script>createToast('Warning (error code: #PUBK01)','Failed to Update Public Key','W')</script>");
				}
			}
			else{
				$queryThree="INSERT INTO public_key(publicKey,staffID,lastModifiedTimestamp) VALUES ('$pubKey','$userName','$date')";
				$databaseInstance=new Database;
				$databaseInstance->establishTransaction('root','');
				if($databaseInstance->executeTransaction($queryThree)){
					$databaseInstance->transactionAudit($queryThree,'user',"INSERT","Update Public key");
					$databaseInstance->commitToDatabase();
				}
				else{
					echo("<script>createToast('Warning (error code: #PUBK01)','Failed to Update Public Key','W')</script>");
				}
			}
			
		}
	}