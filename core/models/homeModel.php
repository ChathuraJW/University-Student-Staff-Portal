<?php

	class HomeModel extends Model {
		public static function loadBasicInfo(): bool|array {
			$userName = $_COOKIE['userName'];
			$sqlQuery = "SELECT gender, salutation, firstName, lastName, personalEmail, universityEmail,salutation,gender,profilePicURL FROM user WHERE userName='$userName'";
			$resultUser = Database::executeQuery('generalAccess', 'generalAccess@16', $sqlQuery);
			if ($_COOKIE['role'] === 'ST') {
				$sqlQuery = "SELECT currentGPA FROM student WHERE regNo='$userName'";
				$resultGPA = Database::executeQuery('student', 'student@16', $sqlQuery)[0]['currentGPA'];
			} else {
				$resultGPA = 0.0000;
			}
			$resultUser[0]['currentGPA'] = $resultGPA;
			return $resultUser;
		}

		public static function notification(): array|bool {
			//Get the most frequent unleaded notification, limit - 8
			$userName = $_COOKIE['userName'];
			$sqlQuery = "SELECT notificationID FROM user_view_notification WHERE userName='$userName' AND isViewed=0 ORDER BY notificationID DESC LIMIT 8";
			$notificationIdList = Database::executeQuery('root', '', $sqlQuery);

			if ($notificationIdList) {
				$notificationArray = array();
				foreach ($notificationIdList as $notificationId) {
					$notificationId = $notificationId['notificationID'];
					$sqlQuery = "SELECT title,content,timestamp,firstName,lastName FROM publisher_name WHERE notificationID=$notificationId AND isValid=1";
					$notificationContent = Database::executeQuery('root', '', $sqlQuery);
					$notificationArray[] = $notificationContent;
				}
				return $notificationArray;
			} else {
				return false;
			}


		}

		public static function countNotification(): array {
			//get the notification count of unread notifications.
			$userName = $_COOKIE['userName'];
			$sqlQuery = "SELECT COUNT(notificationID) FROM user_view_notification WHERE userName='$userName' AND isViewed=0";
			return Database::executeQuery('root', '', $sqlQuery)[0];
		}

		public static function timetable() {
			$userName = $_COOKIE['userName'];
			$role = self::getRole();

			if ($role) {
				$day = date("l");// get the current day
				$day = strtoupper(substr($day, 0, 3));// get the first three letters of day and convert in to uppercase

				if ($day == 'MON' or $day == 'TUE' or $day == 'WED' or $day == 'TUR' or $day == 'FRI') {
					if ($role == "ST") {
						$sqlQuery = "SELECT studentGroup FROM student WHERE regNo='$userName' LIMIT 1";
						$studentGroup = Database::executeQuery('root', '', $sqlQuery)[0]['studentGroup'];

						if ($studentGroup) {
							$sqlQuery = "SELECT * FROM timetable WHERE relatedGroup='$studentGroup' AND day='$day'";
							return Database::executeQuery('root', '', $sqlQuery);
						} else {
							return false;
						}

					} elseif ($role == "AS" or $role == 'SP') {
						$sqlQuery = "SELECT eventID FROM staff_conduct_session WHERE staffID='$userName' ORDER by eventID ASC ";
						$eventIdList = Database::executeQuery('root', '', $sqlQuery);
						if ($eventIdList) {
							$eventList = array();
							foreach ($eventIdList as $eventId) {
								$eventId = $eventId['eventID'];
								$sqlQuery = "SELECT * FROM timetable WHERE eventID=$eventId AND day='$day';";
								$event = Database::executeQuery('root', '', $sqlQuery);
								$eventList[] = $event[0];

							}
							return $eventList;
						} else {
							return false;
						}
					}
				}
			} else {
				return false;
			}
		}

		public static function getRole(): string {
			$userName = $_COOKIE['userName'];
			$sqlQuery = "SELECT role FROM user WHERE userName='$userName' LIMIT 1;";
			return Database::executeQuery('root', '', $sqlQuery)[0]['role'];
		}

		public static function createLoadableFeatureList(): array {
			$userName = $_COOKIE['userName'];
			$dbInstance = new Database();
			$dbInstance->establishTransaction('generalAccess', 'generalAccess@16');
			$sqlQuery = "SELECT role FROM user WHERE userName='$userName'";
			$userRole = $dbInstance->executeTransaction($sqlQuery)[0]['role'];
//			get extra permission to user
			$sqlQuery = "SELECT userRole FROM special_role WHERE assignedUser='$userName'";
			$userFeatureList = $dbInstance->executeTransaction($sqlQuery);
//			get active feature list
			$sqlQuery = "SELECT * FROM system_components WHERE isAlive=TRUE";
			$featureList = $dbInstance->executeTransaction($sqlQuery);
			$finalFeatureSet = array();
//			iterate through each feature
			foreach ($featureList as $individualFeature) {
				$permissionList = explode('-', $individualFeature['permission']);
				foreach ($permissionList as $individualPermission) {
//					check matches with user role
					if ($userRole === $individualPermission) {
//						add this to list
						$systemFeature = new SystemFeature();
						$systemFeature->createFeature($individualFeature['featureID'], $individualFeature['name'], $individualFeature['path'],
							$individualFeature['icon']);
						$finalFeatureSet[] = $systemFeature;
						break;
					}
//					check matches with roles
					foreach ($userFeatureList as $userFeature) {
						if ($individualPermission == $userFeature['userRole']) {
//							add this to list
							$systemFeature = new SystemFeature();
							$systemFeature->createFeature($individualFeature['featureID'], $individualFeature['name'], $individualFeature['path'],
								$individualFeature['icon']);
							$finalFeatureSet[] = $systemFeature;
//							break 2 inner most loops
							break 2;
						}
					}
				}
			}
			return $finalFeatureSet;
		}
	}