<?php
	require_once('../../../assets/mvc/Database.php');
	if (isset($_GET['operation']) & $_GET['operation'] == 'respond') {
		$requestID = $_GET['requestID'];

		$dbInstance = new Database;
		//TODO change database credentials
		$dbInstance->establishTransaction('root', '');
//        get data for selected request
		$sqlQuery = "SELECT * FROM hall_reservation_details WHERE reservationID=$requestID";
		$selectedRequest = $dbInstance->executeTransaction($sqlQuery)[0];
//        initialize variable for next query
		$hallID = $selectedRequest['hallID'];
		$fromTS = $selectedRequest['fromTimestamp'];
		$toTS = $selectedRequest['toTimestamp'];

		//TODO check weather there have further more optimization (similar Query for line 45)
		$sqlQuery = "SELECT reservationID,hallID,reserveUserName,fullName,type,requestMadeAt,reservationStates,isUnderReview 
        FROM hall_reservation_details WHERE hallID='$hallID' AND ((fromTimestamp < '$toTS' AND toTimestamp > '$fromTS') OR fromTimestamp='$fromTS') ";
		$result = $dbInstance->executeTransaction($sqlQuery);
		foreach ($result as $row) {
			$sqlQuery = "UPDATE user_receive_hall SET isUnderReview=false WHERE reservationID=" . $row['reservationID'];
			//TODO make sure to uncomment below statement
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
		//TODO change database credentials
		$dbInstance->establishTransaction('root', '');
		$confirmUser = $_COOKIE['userName'];
//        change the state of request to 'A' state
		$sqlQuery = "UPDATE user_receive_hall SET reservationStates='A', approvedBy='$confirmUser', approvalTimestamp=NOW() 
        WHERE reservationID=$requestID";
//        execute query and make a audit
		$dbInstance->executeTransaction($sqlQuery);
		$dbInstance->transactionAudit($sqlQuery, 'user_receive_hall', 'UPDATE',
			'confirmed reservation request.');

//        load same slot request to change state to 'R' state
//        get data for selected request
		$sqlQuery = "SELECT * FROM hall_reservation_details WHERE reservationID=$requestID";
		$selectedRequest = $dbInstance->executeTransaction($sqlQuery)[0];
//        initialize variable for next query
		$hallID = $selectedRequest['hallID'];
		$fromTS = $selectedRequest['fromTimestamp'];
		$toTS = $selectedRequest['toTimestamp'];

		//TODO check weather there have further more optimization (similar Query for line 45)
		$sqlQuery = "SELECT reservationID,hallID,reserveUserName,fullName,type,requestMadeAt,reservationStates,isUnderReview 
        FROM hall_reservation_details WHERE hallID='$hallID' AND ((fromTimestamp < '$toTS' AND toTimestamp > '$fromTS') OR fromTimestamp='$fromTS') ";
		$result = $dbInstance->executeTransaction($sqlQuery);
//        change the state of rest of requests to 'R' state
		foreach ($result as $row) {
//            ignore approved request
			if ($row['reservationID'] !== $requestID) {
				$sqlQuery = "UPDATE user_receive_hall SET reservationStates='R' WHERE reservationID=" . $row['reservationID'];
				//TODO make sure to uncomment below statement
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
	}