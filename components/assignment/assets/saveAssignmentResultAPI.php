<?php
	require_once('../../../assets/mvc/Database.php');
	if (isset($_GET['operation']) & $_GET['operation'] === 'lockEntry') {
		$markID = $_GET['markID'];
		$dbInstance = new Database;
		//TODO need to change DB credentials
		$dbInstance->establishTransaction('root', '');
//		check current state of the entry
		$sqlQuery = "SELECT isUnderReview FROM assignment_mark WHERE markID=$markID";
		$isNuderReview = $dbInstance->executeTransaction($sqlQuery)[0]['isUnderReview'];
		if (!$isNuderReview) {
//			update state
			$sqlQuery = "UPDATE assignment_mark SET isUnderReview=TRUE WHERE markID=$markID";
			$dbInstance->executeTransaction($sqlQuery);
			$dbInstance->transactionAudit($sqlQuery, 'assignment_mark', 'UPDATE',
				'Change state of the data row to, another is reviewing this data.');

			if ($dbInstance->getTransactionState() & $dbInstance->commitToDatabase()) {
				echo json_encode(true);
			} else {
				echo json_encode(false);
			}
		} else {
			echo json_encode(false);
		}
	} elseif (isset($_GET['operation']) & $_GET['operation'] === 'unlockEntry') {
		$markID = $_GET['markID'];
		$dbInstance = new Database;
		//TODO need to change DB credentials
		$dbInstance->establishTransaction('root', '');

		$sqlQuery = "UPDATE assignment_mark SET isUnderReview=FALSE WHERE markID=$markID";
		$dbInstance->executeTransaction($sqlQuery);
		$dbInstance->transactionAudit($sqlQuery, 'assignment_mark', 'UPDATE',
			'Reverse back the state to, no one is operating on that.');

		if ($dbInstance->getTransactionState() & $dbInstance->commitToDatabase()) {
			echo json_encode(true);
		} else {
			echo json_encode(false);
		}
	} elseif (isset($_GET['operation']) & $_GET['operation'] === 'addMark') {
		$markID = $_GET['markID'];
		$newMark = $_GET['newMark'];
		$dbInstance = new Database;
		//TODO need to change DB credentials
		$dbInstance->establishTransaction('root', '');

//		add mark to the entry
		$sqlQuery = "UPDATE assignment_mark SET mark=$newMark WHERE markID=$markID";
		$dbInstance->executeTransaction($sqlQuery);
		$dbInstance->transactionAudit($sqlQuery, 'assignment_mark', 'UPDATE',
			'Update entry with new marks');
//		change state of entry
		$sqlQuery = "UPDATE assignment_mark SET isUnderReview=FALSE WHERE markID=$markID";
		$dbInstance->executeTransaction($sqlQuery);
		if ($dbInstance->getTransactionState() & $dbInstance->commitToDatabase()) {
			echo json_encode(true);
		} else {
			echo json_encode(false);
		}
	}