<?php

	class CheckTrainSeasonModel extends Model {
		public static function getData() {
			$sqlQuery = "SELECT * FROM request_train_season WHERE isChecked=0";

			$requesterData = Database::executeQuery("root", "", $sqlQuery);

			if ($requesterData) {
				$requesterDataList = array();

				foreach ($requesterData as $data) {
					$getNameQuery = "SELECT fullName FROM user WHERE userName='" . $data['requester'] . "'";
					$getName = Database::executeQuery("root", "", $getNameQuery)[0]['fullName'];

					$newRequesterData = new TrainSeason();
					$newRequesterData->setData($data['requestID'], NULL, $data['requester'], $data['academicYear'], $data['age'], $data['address'], $data['fromMonth'],
						$data['toMonth'], $data['nearRailwayStationHome'], $data['nearRailwayStationUni'], $data['submittedTimestamp'], NULL);
					$newRequesterData->setRequesterFullName($getName);
					$requesterDataList[] = $newRequesterData;
				}
				return $requesterDataList;
			} else {
				return false;
			}
		}


		public static function getCompletedApplicationData() {
			$sqlQuery = "SELECT * FROM request_train_season WHERE isChecked=1";

			$requesterData = Database::executeQuery("root", "", $sqlQuery);

			if ($requesterData) {
				$requesterDataList = array();

				foreach ($requesterData as $data) {
					$getNameQuery = "SELECT fullName FROM user WHERE userName='" . $data['requester'] . "'";
					$getName = Database::executeQuery("root", "", $getNameQuery)[0]['fullName'];

					$newRequesterData = new TrainSeason();
					$newRequesterData->setData($data['requestID'], NULL, $data['requester'], $data['academicYear'], $data['age'], $data['address'], $data['fromMonth'],
						$data['toMonth'], $data['nearRailwayStationHome'], $data['nearRailwayStationUni'], $data['submittedTimestamp'], NULL);
					$newRequesterData->setRequesterFullName($getName);
					$requesterDataList[] = $newRequesterData;
				}
				return $requesterDataList;
			} else {
				return false;
			}
		}


	}

?>