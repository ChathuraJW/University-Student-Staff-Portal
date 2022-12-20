<?php
	require_once('../../../assets/mvc/Database.php');
	if (isset($_GET['activity']) & $_GET['activity'] == "markAsRead") {
		$userName = $_GET['userName'];
		$marked = $_GET['mark'];
		$notificationID = $_GET['notificationID'];
		echo "hi";
		$sqlQuery = "UPDATE user_view_notification SET isViewed=1,viewTimestamp=now() WHERE notificationID=$notificationID AND userName='$userName' ";
		$isSuccess = Database::executeQuery('generalAccess', 'generalAccess@16', $sqlQuery);

		if ($isSuccess) {
			self::createAudit($sqlQuery, 'user_view_notification', "UPDATE", 'Update notification mark as read.');
		}
		echo(json_encode($isSuccess));
	}