<?php


	class viewNotificationModel extends Model {

		public static function getAllNotifications(): array|bool {
			$userName = $_COOKIE['userName'];
			$sqlQuery = "SELECT * FROM notification WHERE reciever='$userName' AND isValid=1 ORDER by notificationID DESC ,isViewed";
			$notificationList = Database::executeQuery('root', '', $sqlQuery);

			if ($notificationList) {
				return self::returnNotification($notificationList);
			} else {
				return false;
			}
		}

		public static function returnNotification($notificationList): array {
			$notifications = array();
			//read subject list and add them into above array as CourseModule objects
			foreach ($notificationList as $row) {
				$notification = new Notification();
				$notification->setNotificationID($row['notificationID']);
				$notification->createNotification($row['title'], $row['content']);
				$notification->setSender($row['sender']);
				$notification->setTimeStamp($row['timestamp']);
				$notification->setIsViewed($row['isViewed']);
				$notifications[] = $notification;
			}
			return $notifications;
		}

		public static function getSortedNotification($notificationType): array|bool {
			$userName = $_COOKIE['userName'];
			$sqlQuery = "SELECT * FROM notification WHERE reciever='$userName' AND isValid=1 AND notificationType=$notificationType ORDER by notificationID DESC ,isViewed";
			$notificationList = Database::executeQuery("root", '', $sqlQuery);
			if ($notificationList) {
				return self::returnNotification($notificationList);
			} else {
				return false;
			}
		}

		public static function getNotificationCount() {
			$userName = $_COOKIE['userName'];
			$notificationTypes = array(2600, 2200, 2300, 2400, 2500, 2100, 2700);//notification types
			$notificationCount = array();
			foreach ($notificationTypes as $type) {
				$sqlQuery = "SELECT COUNT(notificationID) FROM notification WHERE notificationType=$type AND isValid=1 AND isViewed=0 AND reciever='$userName'";
				$count = Database::executeQuery('root', '', $sqlQuery)[0]['COUNT(notificationID)'];
				$notificationCount[] = $count;

			}
			return $notificationCount;

		}

		public static function search($keyWord): array|bool {
			$userName = $_COOKIE['userName'];
			$sqlQuery = "SELECT * FROM notification WHERE reciever='$userName' AND isValid=1 AND (title LIKE '%$keyWord%' OR content LIKE '%$keyWord%' OR sender Like '%$keyWord%' )";
			$searchResult = Database::executeQuery('root', '', $sqlQuery);
			if ($searchResult) {
				return self::returnNotification($searchResult);
			} else {
				return false;
			}
		}

	}