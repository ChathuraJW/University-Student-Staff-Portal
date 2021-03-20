<?php

	class ContactUnionModel extends Model {
		public static function getMessageData(): array|bool {
			$userName = $_COOKIE['userName'];
			$sqlQuery = "SELECT * FROM send_message_to_union where sender='$userName'";
			$result = Database::executeQuery('student', 'student@16', $sqlQuery);
//		initialize returning array
			if ($result) {
				$returnData = array();
				foreach ($result as $row) {
//			create individual objects and store those data for add into array
					$contactUnionItem = new ContactUnion;
					$contactUnionItem->setMessage($row['messageID'], $row['title'], $row['message'], $row['sender'], $row['sendTimestamp'], $row['isAnonymous']);
//			append created object to returning array
					$returnData[] = $contactUnionItem;
				}
				return $returnData;
			} else {
				return false;
			}
		}

		public static function createMail($newUnionMessage) {
//		get client IP
			$clientIP = $_SERVER['REMOTE_ADDR'];
//		set timezone and get date
			date_default_timezone_set("Asia/Colombo");
			$date = (date("D d-m-y", time()));

			if ($newUnionMessage->isAnonymous()) {
//			anonymous message
				$sender = "<b>Antonymous</b>";
			} else {
//        	non anonymous message
				$sendingUser = new User;
				$sendingUser->setUserName($newUnionMessage->getSender());
				$sender = '(<b>' . $newUnionMessage->getSender() . '</b>) ' . $sendingUser->getSalutation() . '. ' . $sendingUser->getFullName();
			}
//      create email content
			$mailContent = "
		            <div style='padding:5px;'>
				        <h3 style='text-align:center;'><u>
				        	" . $newUnionMessage->getTitle() . "
				         </u></h3>
				        <p style='text-align:justify;font-size:14px;'>
				        	" . $newUnionMessage->getMessage() . "
				        </p>
				
				        <p>
				            Send By, <br>
				            $sender <br>
				        </p>
				        <p style='font-size:10px;'>
				            Client IP: $clientIP <br>
				            Date: $date
				        </p>
				        <h6 style='color:red;padding:10px;border:1px solid red;text-align:center;'>Notice that this message is generated according to the user message to the &#174;USSP system.</h6>
				    </div>
		        ";
//      start transaction
			$dbInstance = new Database;
			$dbInstance->establishTransaction('student', 'student@16');

//		generate title
			$title = "USSP System Generated Message";

//		insert data and log into database
			$anonymousString = $newUnionMessage->isAnonymous() ? 'TRUE' : 'FALSE';
			$sqlQuery = "INSERT INTO send_message_to_union(title, message, sender, sendTimestamp, isAnonymous) VALUES ('" . $newUnionMessage->getTitle() . "','" . $newUnionMessage->getMessage() . "','" . $_COOKIE['userName'] . "',NOW(),$anonymousString)";
			$dbInstance->executeTransaction($sqlQuery);
			$dbInstance->transactionAudit($sqlQuery, 'send_message_to_union', 'INSERT', 'Create new message and that send to the Union.');

//		check whether all execute successfully
			if ($dbInstance->getTransactionState()) {
//				import mail function and call it
				require_once('../../assets/php/sendMail.php');
				$isSuccess = sendMail($title, $mailContent, true);
				if ($isSuccess) {
//					commit and display success toast
					$dbInstance->commitToDatabase();
					echo("<script>createToast('Success','Message Sent Successfully.','S');</script>");
				} else {
					echo("<script>createToast('Warning (error code: #SMU01-M)','Failed send email.','W');</script>");
				}
			} else {
//			show failed toast
				echo("<script>createToast('Warning (error code: #SMU01-D)','Message Sent Failed. Please Try Again.','W');</script>");
			}
//		close db connection
			$dbInstance->closeConnection();
		}

	}