<?php

	class HomeController extends Controller {
		public static function init() {
			$basicInfo = HomeModel::loadBasicInfo();
			$notifications = HomeModel::notification();
			$notificationCount = HomeModel::countNotification();
			$academicSchedule = HomeModel::timetable();
			$userRole = HomeModel::getRole();
			$featureList = HomeModel::createLoadableFeatureList();
			$sendArray = array($basicInfo, $notifications, $notificationCount, $academicSchedule, $userRole, $featureList);
			self::createView("homeView", $sendArray);
		}
	}

?>