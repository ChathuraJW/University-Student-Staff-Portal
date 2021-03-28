<?php
	require_once('../../../assets/mvc/Database.php');
	require_once('../../../assets/mvc/Notification.php');
	require_once('../../../assets/php/sendMail.php');

	function getDataOfSelectedRequestEntry($dbInstance, $requestID) {
		$sqlQuery = "SELECT * FROM hall_reservation_details WHERE reservationID=$requestID";
		$selectedRequest = $dbInstance->executeTransaction($sqlQuery)[0];
//        initialize variable for next query
		$hallID = $selectedRequest['hallID'];
		$fromTS = $selectedRequest['fromTimestamp'];
		$toTS = $selectedRequest['toTimestamp'];

		//try for further optimization
		$sqlQuery = "SELECT reservationID,hallID,reserveUserName,fullName,type,requestMadeAt,reservationStates,isUnderReview 
        FROM hall_reservation_details WHERE hallID='$hallID' AND ((fromTimestamp < '$toTS' AND toTimestamp > '$fromTS') OR fromTimestamp='$fromTS') ";
		return $dbInstance->executeTransaction($sqlQuery);
	}

	if (isset($_GET['operation']) & $_GET['operation'] == 'respond') {
		$requestID = $_GET['requestID'];

		$dbInstance = new Database;
		$dbInstance->establishTransaction('generalAccess', 'generalAccess@16');
//        get data for selected request
		$result = getDataOfSelectedRequestEntry($dbInstance, $requestID);
		foreach ($result as $row) {
			$sqlQuery = "UPDATE user_receive_hall SET isUnderReview=false WHERE reservationID=" . $row['reservationID'];
			$dbInstance->executeTransaction($sqlQuery);
			$dbInstance->transactionAudit($sqlQuery, 'user_receive_hall', 'UPDATE',
				'Update isUnderReview into false to release the lock added before open request.');
		}
//        check all operation get success
		if ($dbInstance->getTransactionState()) {
			if ($dbInstance->commitToDatabase()) {
				$dbInstance->closeConnection();
				echo true;
			} else {
				echo false;
			}
		} else {
			echo false;
		}
	} elseif (isset($_GET['operation']) & $_GET['operation'] == 'confirm') {
		$requestID = $_GET['requestID'];

		$dbInstance = new Database;
		$dbInstance->establishTransaction('generalAccess', 'generalAccess@16');
		$confirmUser = $_COOKIE['userName'];
//        change the state of request to 'A' state
		$sqlQuery = "UPDATE user_receive_hall SET reservationStates='A', approvedBy='$confirmUser', approvalTimestamp=NOW() 
        WHERE reservationID=$requestID";
//        execute query and make a audit
		$dbInstance->executeTransaction($sqlQuery);
		$dbInstance->transactionAudit($sqlQuery, 'user_receive_hall', 'UPDATE',
			'confirmed reservation request.');

		//send notification with email to requester to inform accepted
		$sqlQuery = "SELECT reserveUserName FROM user_receive_hall WHERE reservationID=$requestID";
		$requestOwnerUserName = $dbInstance->executeTransaction($sqlQuery)[0]['reserveUserName'];

		$informConfirmation = new Notification;
		$informConfirmation->setReceivers(array($requestOwnerUserName));
		$informConfirmation->setSender($_COOKIE['userName']);
		$informConfirmation->createNotification('Reservation request accepted', "Reservation request #$requestID has been approved.");
		$informConfirmation->publishNotification(true);

//        load same slot request to change state to 'R' state
//        get data for selected request
		$result = getDataOfSelectedRequestEntry($dbInstance, $requestID);
//        change the state of rest of requests to 'R' state
		foreach ($result as $row) {
//            ignore approved request
			if ($row['reservationID'] !== $requestID) {
				$sqlQuery = "UPDATE user_receive_hall SET reservationStates='R' WHERE reservationID=" . $row['reservationID'];
				$dbInstance->executeTransaction($sqlQuery);
				$dbInstance->transactionAudit($sqlQuery, 'user_receive_hall', 'UPDATE',
					'Change the the state of rest of the request to `R` state.');
			}
		}
//        check all operation get success
		if ($dbInstance->getTransactionState()) {
			if ($dbInstance->commitToDatabase()) {
				$dbInstance->closeConnection();
				echo true;
			} else {
				echo false;
			}
		} else {
			echo false;
		}
	} elseif (isset($_GET['operation']) & $_GET['operation'] == 'loadCurrentAllocation') {

//		get date from link
		$selectedDate = $_GET['dateSelected'];
//		generate date to corresponding date
		$day = strtoupper(date('D', strtotime($_GET['dateSelected'])));

		$dbInstance = new Database;
		$dbInstance->establishTransaction('generalAccess', 'generalAccess@16');
//		take a list of hall details to maintain row indexes
		$sqlQuery = "SELECT hallID FROM hall_and_lab ORDER BY hallType DESC";
		$hallData = ($dbInstance->executeTransaction($sqlQuery));
//		setup hall list indexes
		$hallDataList = array();
		$key = 2;
		foreach ($hallData as $row) {
			$hallDataList[$row['hallID']] = $key;
			$key++;
		}
//		list uot timetable entries
		$sqlQuery = "SELECT * FROM timetable WHERE day='$day' AND entryValidity=TRUE ORDER BY hallID;";
		$result = $dbInstance->executeTransaction($sqlQuery);
		$finalResult = array();
		$rowIndex = 2;
		foreach ($result as $row) {
//			add additional date to array for support entry creation
			$timeDiff = $row['toTime'] - $row['fromTime'];
			$row['rowNumber'] = $hallDataList[$row['hallID']];
			$row['neededSlot'] = $timeDiff * 2;
			$row['beginCell'] = ($row['fromTime'] - '08:00:00') * 2 + 1;
			$row['endCell'] = $row['neededSlot'] + $row['beginCell'];
			$row['degreeStreamColor'] = strlen($row['subjectCode']) == 7 ? 'rgba(255, 0, 0, 0.6)' : 'rgba(0, 0, 255, 0.6)';
			$row['displayMessage'] = '[' . $row['subjectCode'] . ' for ' . $row['relatedGroup'] . '] [From: ' . $row['fromTime'] . ' To: ' . $row['toTime'] . '] ['
				. $row['description'] . ']';
			$rowIndex++;
//			add modified row into new array created
			$finalResult[] = $row;
		}

//		list out reservation entries
		//improve query for further accuracy in further rounds
		$sqlQuery = "SELECT * from hall_reservation_details WHERE reservationStates='A' AND (DATE(fromTimestamp)='$selectedDate' OR DATE (toTimestamp)='$selectedDate');";
		$result = $dbInstance->executeTransaction($sqlQuery);
		$rowIndex = 2;
		foreach ($result as $row) {
			if (date('d-m-Y', strtotime($row['fromTimestamp'])) !== date('d-m-Y', strtotime($selectedDate))) {
//				handle entries has time more than one day
				$timeDiff = (strtotime($row['toTimestamp']) - strtotime("$selectedDate 08:00:00")) / 3600;
				$row['neededSlot'] = $timeDiff * 2;
				$row['beginCell'] = 1;
				$row['endCell'] = $row['neededSlot'] + $row['beginCell'];
			} else {
//				handle one day entry
				$timeDiff = (strtotime($row['toTimestamp']) - strtotime($row['fromTimestamp'])) / 3600;
				$row['neededSlot'] = $timeDiff * 2;
				$row['beginCell'] = ((strtotime($row['fromTimestamp']) - strtotime("$selectedDate 08:00:00")) / 3600) * 2 + 1;
			}

			$row['rowNumber'] = $hallDataList[$row['hallID']];
			$row['endCell'] = $row['neededSlot'] + $row['beginCell'];
			//end cell correction
			$row['endCell'] = $row['endCell'] > 23 ? 23 : $row['endCell'];
//			color assign for appointment entry
			$row['degreeStreamColor'] = 'rgba(0, 128, 0, 0.6)';
			$row['displayMessage'] = '[Reserved By: ' . $row['salutation'] . '. ' . $row['fullName'] . ' (' . $row['reserveUserName'] . ') ] [From: ' . $row['fromTimestamp'] . ' To: ' . $row['toTimestamp']
				. '] [' . $row['description'] . ']';
			$rowIndex++;

//			add data to the same array already created
			$finalResult[] = $row;
		}
		echo json_encode($finalResult);
	}