<?php
//import database class
//	TODO make sure about path
	require_once "Database.php";
	require_once "../php/sendMail.php";

	class Notification {
//    parameters
		private int $notificationID;
		private string $notificationTitle;
		private string $notificationContent;
		private int $notificationType;
		private string $sender;
		private string $validWeeks;
		private array $receivers;

//    TODO constructor
		function __construct() {
			$this->notificationType = 2600;
			$this->validWeeks = 4;
		}

		public function createNotification($title, $content): Notification {
			$this->notificationTitle = $title;
			$this->notificationContent = $content;
			return $this;

		}

		public function setSender($sender): Notification {
			$this->sender = $sender;
			return $this;
		}

		public function setReceivers(array $receiver): Notification {
			$this->receivers = $receiver;
			return $this;
		}

		public function setTimeout($weeks): Notification {
			$this->validWeeks = $weeks;
			return $this;
		}

		public function publishNotification($isSendMail = false): bool {
			// get database instance
			$databaseInstance = new Database();
			//TODO need to change database credentials
			$databaseInstance->establishTransaction('root', '');

//			calculate validity period
			$validUntil = $this->calculateValidityPeriod();

//			insert data to notification detail
			$sqlQuery = "INSERT INTO notification_detail(title, content, notificationType, timestamp, validUntil, publishedByUser)
            VALUES ('" . $this->notificationTitle . "','" . $this->notificationContent . "'," . $this->notificationType . ",NOW(),'$validUntil','" .
				$this->sender . "')";

			$databaseInstance->executeTransaction($sqlQuery);
			$databaseInstance->transactionAudit($sqlQuery, 'notification_detail', 'INSERT', 'Publish notification Details');

//          get notification id for just entered notification details
			$sqlQuery = "SELECT notificationID FROM notification_detail WHERE title='" . $this->notificationTitle . "'
            AND content='" . $this->notificationContent . "' AND notificationType=" . $this->notificationType . "
            AND publishedByUser='" . $this->sender . "' ORDER BY notificationID DESC LIMIT 1";

//			set notification id to object value
			$this->notificationID = $databaseInstance->executeTransaction($sqlQuery)[0]['notificationID'];

//          Send data to the target audience table
			$sqlQuery = "INSERT INTO target_audience(targetAudience, notificationID) VALUES ('CUSTOM'," . $this->notificationID . ")";
			$databaseInstance->executeTransaction($sqlQuery);
			$databaseInstance->transactionAudit($sqlQuery, 'target_audience', 'INSERT', 'Set target audience category');

//			set individual receivers
			$sqlQuery = "INSERT INTO user_view_notification(notificationID, userName) VALUES ";
			$notificationID = $this->notificationID;
			$receiverList = array();
			foreach ($this->receivers as $receiver) {
				$sqlQuery .= "($notificationID,'$receiver') ,";
				$receiverList[] = $receiver;
			}
//			if need send email then will work
			$isMailSuccess = true;
			if ($isSendMail) {
//				create email title
				$title = "USSP Notification :: " . $this->notificationTitle;
//				send email
				$isMailSuccess = sendMail($title, $this->notificationContent, false, $receiverList);
			}
//			clean query
			$sqlQuery = trim($sqlQuery, ",");
//			disable foreign key check before insert receivers data to the database and after that enable it
			$databaseInstance->executeTransaction('SET FOREIGN_KEY_CHECKS=0;');
			$databaseInstance->executeTransaction($sqlQuery);
			$databaseInstance->executeTransaction('SET FOREIGN_KEY_CHECKS=1;');
//			audit query
			$databaseInstance->transactionAudit($sqlQuery, "user_view_notification", "INSERT", "Add receiver list to notification ID #$notificationID");

			if ($isMailSuccess && $databaseInstance->getTransactionState()) {
				if ($databaseInstance->commitToDatabase()) {
//					close connection
					$databaseInstance->closeConnection();
					return true;
				} else {
//					close connection
					$databaseInstance->closeConnection();
					return false;
				}
			} else {
//				close connection
				$databaseInstance->closeConnection();
				return false;
			}
		}

		private function calculateValidityPeriod(): string {
			$validDays = ($this->validWeeks) * 7;
			$date = strtotime("28-12-2020");
			$endDate = date('d-m-Y', strtotime("+$validDays day", $date));
			return "$endDate 23:59:59";
		}
	}
