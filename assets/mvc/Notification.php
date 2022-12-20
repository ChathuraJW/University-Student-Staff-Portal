<?php

	class Notification {
//    parameters
		private int $notificationID;
		private string $notificationTitle;
		private string $notificationContent;
		private int $notificationType;
		private int $isViewed;
		private string $sender;
		private string $validWeeks;
		private string $timeStamp;
		private array $receivers;
		private array $targetAudienceList;

		function __construct() {
			$this->notificationType = 2600;
			$this->targetAudienceList = array('CUSTOM');
			$sqlQuery = "SELECT parameterValue FROM system_parameters WHERE parameterKey='notification_validity_hours'";
			$weeks = Database::executeQuery('root', '', $sqlQuery);
			if ($weeks)
				$this->validWeeks = $weeks[0]['parameterValue'];
			else
				$this->validWeeks = 4;
		}

		public function createNotification($title, $content): Notification {
			$this->notificationTitle = $title;
			$this->notificationContent = $content;
			return $this;

		}

		public function setNotificationType(int $notificationType): Notification {
			$this->notificationType = $notificationType;
			return $this;
		}

		public function setReceivers(array $receiver): Notification {
			$this->receivers = $receiver;
			return $this;
		}

		public function targetAudience(array $targetAudienceList): Notification {
			$this->targetAudienceList = $targetAudienceList;
			return $this;
		}

		//newly added

		public function setTimeout($weeks): Notification {
			$this->validWeeks = $weeks;
			return $this;
		}

		public function getIsViewed(): int {
			return $this->isViewed;
		}

		public function setIsViewed(int $isViewed): Notification {
			$this->isViewed = $isViewed;
			return $this;
		}

		public function getNotificationID(): int {
			return $this->notificationID;
		}

		public function setNotificationID(int $notificationID): Notification {
			$this->notificationID = $notificationID;
			return $this;
		}

		public function getNotificationTitle(): string {
			return $this->notificationTitle;
		}

		public function getNotificationContent(): string {
			return $this->notificationContent;
		}

		public function getSender(): string {
			return $this->sender;
		}

		public function setSender($sender): Notification {
			$this->sender = $sender;
			return $this;
		}

		public function getTimeStamp(): string {
			return $this->timeStamp;
		}

		public function setTimeStamp($timestamp): Notification {
			$this->timeStamp = $timestamp;
			return $this;
		}

		public function publishNotification($isSendMail = false): bool {
			// get database instance
			$databaseInstance = new Database();
			$databaseInstance->establishTransaction('generalAccess', 'generalAccess@16');

//			calculate validity period
			$validUntil = $this->calculateValidityPeriod();

//			insert data to notification detail
			$sqlQuery = "INSERT INTO notification_detail(title, content, notificationType, timestamp, validUntil, publishedByUser)
            VALUES ('" . $this->notificationTitle . "','" . $this->notificationContent . "'," . $this->notificationType . ",NOW(),'$validUntil','" .
				$this->sender . "')";

			$databaseInstance->executeTransaction($sqlQuery);
			$databaseInstance->transactionAudit($sqlQuery, 'notification_detail', 'INSERT', 'Publish notification Details.', $this->sender);

//          get notification id for just entered notification details
			$sqlQuery = "SELECT notificationID FROM notification_detail WHERE title='" . $this->notificationTitle . "'
            AND content='" . $this->notificationContent . "' AND notificationType=" . $this->notificationType . "
            AND publishedByUser='" . $this->sender . "' ORDER BY notificationID DESC LIMIT 1";

//			set notification id to object value
			$this->notificationID = $databaseInstance->executeTransaction($sqlQuery)[0]['notificationID'];

//          Send data to the target audience table
			foreach ($this->targetAudienceList as $targetAudience) {
				$sqlQuery = "INSERT INTO target_audience(targetAudience, notificationID) VALUES ('$targetAudience'," . $this->notificationID . ")";
				$databaseInstance->executeTransaction($sqlQuery);
				$databaseInstance->transactionAudit($sqlQuery, 'target_audience', 'INSERT', 'Set target audience category.');
			}
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
				if ($databaseInstance->commitToDatabase($this->sender)) {
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
			$date = strtotime(date("Y-m-d H:i:s"));
			$endDate = date('Y-m-d', strtotime("+$validDays day", $date));
			return "$endDate 23:59:59";
		}
	}
