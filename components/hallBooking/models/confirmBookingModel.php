<?php

	class ConfirmBookingModel extends Model {
		public static function loadReviewList(): array {
//        get reservation request that need to be review ordered according to reservationID
			$sqlQuery = "SELECT * FROM hall_reservation_details WHERE reservationStates='N' AND isUnderReview='false' ORDER BY reservationID;";
			$result = Database::executeQuery('generalAccess', 'generalAccess@16', $sqlQuery);
//        create array yo store objects
			$requestList = array();
//        insert object by object to array
			foreach ($result as $row) {
				$request = new HallAllocation();
//            call function to set data to the object
				$fullName = $row['salutation'] . '. ' . $row['fullName'];
				$request->setAllocationFull($row['reservationID'], $row['reserveUserName'], $row['hallID'], $row['description'],
					$row['type'], $row['fromTimestamp'], $row['toTimestamp'], $row['requestMadeAt'], $row['reservationStates'],
					'', '', $fullName);
//            add object to  the list
				$requestList[] = $request;
			}
			return $requestList;
		}

		public static function loadSelectedRequest($requestID): array|int {
			$dbInstance = new Database;
			$dbInstance->establishTransaction('generalAccess', 'generalAccess@16');
//        get data for selected request
			$sqlQuery = "SELECT * FROM hall_reservation_details WHERE reservationID=$requestID";
			$selectedRequest = $dbInstance->executeTransaction($sqlQuery)[0];
//        set object for open request
			$fullName = $selectedRequest['salutation'] . '. ' . $selectedRequest['fullName'];
			$openedRequest = new HallAllocation;
			$openedRequest->setAllocation($selectedRequest['reservationID'], $selectedRequest['reserveUserName'], $fullName,
				$selectedRequest['hallID'], $selectedRequest['description'], $selectedRequest['type'],
				$selectedRequest['fromTimestamp'], $selectedRequest['toTimestamp'], $selectedRequest['requestMadeAt'],
				$selectedRequest['reservationStates']);

			if ($selectedRequest['reservationStates'] === "N") {
				$hallID = $selectedRequest['hallID'];
				$fromTS = $selectedRequest['fromTimestamp'];
				$toTS = $selectedRequest['toTimestamp'];
				$sqlQuery = "SELECT reservationID,hallID,reserveUserName,fullName,type,requestMadeAt,reservationStates,isUnderReview 
            	FROM hall_reservation_details WHERE hallID='$hallID' AND ((fromTimestamp < '$toTS' AND toTimestamp > '$fromTS') OR fromTimestamp='$fromTS') ";
				$requestInSameSlot = $dbInstance->executeTransaction($sqlQuery);
				$isSlotFree = true;
				$isUnderReview = false;
				$sameSlotRequestList = array();
				foreach ($requestInSameSlot as $row) {
//                check weather slot is free
					if ($row['reservationStates'] === 'A') {
						$isSlotFree = false;
						break;
					}
//                check weather another one is review the request
					if ($row['isUnderReview']) {
						$isUnderReview = true;
						break;
					}
//                create dataset for same slot request
//                ignore adding currently reviewing request to same slot set
					if ($requestID !== $row['reservationID']) {
						//create HallAllocation object and add data to array
						$sameSlotEntry = new HallAllocation;
						$sameSlotEntry->createSameSlotEntry($row['reservationID'], $row['hallID'], $row['reserveUserName'],
							$row['fullName'], $row['type'], $row['requestMadeAt'], $row['reservationStates'],
							$row['isUnderReview']);
						$sameSlotRequestList[] = $sameSlotEntry;
					}
//                change state fo isUnderReview to true
					$sqlQuery = "UPDATE user_receive_hall SET isUnderReview=true WHERE reservationID=" . $row['reservationID'];
					$dbInstance->executeTransaction($sqlQuery);
					$dbInstance->transactionAudit($sqlQuery, 'user_receive_hall', 'UPDATE',
						'Update isUnderReview into true because user start review the entry.');
				}
//            check weather request ready to review
				if ($isSlotFree && !$isUnderReview) {
//                proceed towards
//                check weather all transaction success
					if ($dbInstance->getTransactionState()) {
//                    commit transaction
						if ($dbInstance->commitToDatabase()) {
							//return stuff and close connection
							$dbInstance->closeConnection();
							return array($openedRequest, $sameSlotRequestList);
						} else {
							//display error for saying failed to open
							//close connection
							$dbInstance->closeConnection();
							return 1;
						}
					} else {
						//display error for saying failed to open
						//close connection
						$dbInstance->closeConnection();
						return 2;
					}

				} else {
					//display error that saying slot already occupy or another one is review
					//close connection
					$dbInstance->closeConnection();
					return 3;
				}
			} else {
				//display warring it is timeout/already review
				//close connection
				$dbInstance->closeConnection();
				return 4;
			}
		}
	}
