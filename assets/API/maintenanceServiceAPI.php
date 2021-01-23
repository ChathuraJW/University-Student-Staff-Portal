<?php
	require_once('../mvc/Database.php');
	$dbInstance = new Database();
	//TODO change database credentials
	$dbInstance->establishTransaction('root', '');

//	get admin username for add log for maintains service
	$sqlQuery = "SELECT assignedUser FROM special_role WHERE userRole='ADM'";
	$adminUser = $dbInstance->executeTransaction($sqlQuery)[0]['assignedUser'];

	if ($_GET['operation'] && $_GET['operation'] === 'getSystemParameters') {
		$sqlQuery = "SELECT * FROM system_parameters ORDER BY parameterID";
		$result = $dbInstance->executeTransaction($sqlQuery);
		echo(json_encode($result));
	} elseif ($_GET['operation'] && $_GET['operation'] === 'timeoutHallReservationRequest') {
		//Timeout expired hall reservation request

		//get maximum time request can be active in the system
		$sqlQuery = "SELECT parameterValue FROM system_parameters WHERE parameterKey='hall_reservation_request_valid_hours'";
		$maximumActiveHours = $dbInstance->executeTransaction($sqlQuery)[0]['parameterValue'];

//	expiration done using this query
		$sqlQuery = "UPDATE user_receive_hall SET reservationStates='T' WHERE (DATE_ADD(NOW(),interval -$maximumActiveHours hour) > requestMadeAt) AND reservationStates='N' AND isUnderReview='FALSE'";
		$dbInstance->executeTransaction($sqlQuery);
		//hear send admin 's username as a parameter
		$dbInstance->transactionAudit($sqlQuery, 'user_receive_hall', 'UPDATE', "Maintains service operation for timeout expired hall reservation requests.", $adminUser);
//	check transaction state and commit database and then return boolean value to inform state
		if ($dbInstance->getTransactionState()) {
			//hear send admin 's username as a parameter
			if ($dbInstance->commitToDatabase($adminUser)) {
				echo("[{true}]");
			} else {
				echo("[{false}]");
			}
		} else {
			echo("[{false}]");
		}
	} elseif ($_GET['operation'] && $_GET['operation'] === 'autoDeleteBackup') {
//		delete expired backup files
//		scan backup file location and read there names into an array
		$fileList = scandir('../../components/adminPanel/assets/backup/');
		$fileListArray = array();
//		filter out only backup files and add them into above created array
		$deletedList = array();
		foreach ($fileList as $file) {
//			remove first two unwanted data in scantier reading and add only files
			if (strlen($file) > 2) {
				$fileTS = time() - explode('_', $file)[0];
				$dateDiff = date('d', $fileTS);
//				check date difference grater than or equal to 30
				if ($dateDiff >= 30) {
//					delete file
					$isDeleted = unlink("../../components/adminPanel/assets/backup/$file");
//					add file name into array after delete
					if ($isDeleted)
						$deletedList[] = $file;
				}
//				read file and decide to delete or keep
			}
		}
//		check weather at least one file deleted then create audit for the operation
		if (sizeof($deletedList) > 0) {
//			create audit query
			$description = "Deleted expired backup files.[ " . implode(", ", $deletedList) . " ]";
			$auditQuery = "INSERT INTO database_log(userID, executedQuery,
                        affectedTable, eventType, description, timestamp)
                        VALUES ('$adminUser','-----','Maintains Service','DELETE','$description',NOW())";
			//TODO need to change database credentials
			Database::executeQuery('root', '', $auditQuery);
//			echo deleted file list
			echo(json_encode($deletedList));
		} else {
			echo("['No Backups deleted.']");
		}
	} elseif ($_GET['operation'] && $_GET['operation'] === 'createBackup') {
//		hear backup creation happen
//		setup basic parameter that need to run backup query
		$database = Database::getDatabaseStatic();
		$databaseHost = Database::getServerStatic();
		//TODO need to change database credentials
		$dbUser = 'root';
		$dbPassword = '';
		$fileName = time() . '_backup';
		$fileLocation = '../../components/adminPanel/assets/backup/' . $fileName . '.sql';

//			create and execute backup command
		//TODO approach might be different in linux think it and care it
		$command = "C:\wamp64\bin\mysql\mysql8.0.21\bin\mysqldump --user=$dbUser --password=$dbPassword --host=$databaseHost $database > $fileLocation";
		exec($command, $output, $return_var);

		if (!$return_var) {
//			create audit query
			$description = "New backup created. [ $fileLocation ]";
			$auditQuery = "INSERT INTO database_log(userID, executedQuery,
	                        affectedTable, eventType, description, timestamp)
	                        VALUES ('$adminUser','-----','Maintains Service','CREATE','$description',NOW())";
			//TODO need to change database credentials
			Database::executeQuery('root', '', $auditQuery);
			echo("['$fileLocation']");
		} else {
			echo("['Failed to create backup.']");
		}
	}
	$dbInstance->closeConnection();