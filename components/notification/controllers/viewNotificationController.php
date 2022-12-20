<?php

	class ViewNotificationController extends Controller {

		public static function viewNotification() {

			$notificationCount = viewNotificationModel::getNotificationCount();
			if (isset($_POST['notificationName'])) {
				//Show notification according to the categories
				$notificationType = $_POST['notificationName'];
				$sortedNotifications = viewNotificationModel::getSortedNotification($notificationType);
				$controllerData = array($sortedNotifications, $notificationCount);
				self::createView("viewNotificationView", $controllerData);

			} elseif (isset($_POST['search'])) {
				//searching notifications
				$keyWord = $_POST['keyWord'];
				$searchResult = viewNotificationModel::search($keyWord);
				$controllerData = array($searchResult, $notificationCount);
				self::createView("viewNotificationView", $controllerData);

			} else {
				//show all available notifications
				$allNotifications = viewNotificationModel::getAllNotifications();
				$controllerData = array($allNotifications, $notificationCount);
				self::createView("viewNotificationView", $controllerData);
			}
		}
	}