<?php
	require_once('../../../assets/mvc/Database.php');
	require_once('class.php');
	if (isset($_GET['operation'])) {
		$feature = $_GET['feature'];
		$state = $_GET['state'];
		if ($state == 'on') {
			$query = "UPDATE system_components SET isAlive=TRUE WHERE featureID='$feature'";
		} else {
			$query = "UPDATE system_components SET isAlive=FALSE WHERE featureID='$feature'";
		}
		$dbInstance = new Database();
		$dbInstance->establishTransaction('admin', 'admin@16');
		$dbInstance->executeTransaction($query);
		$dbInstance->transactionAudit($query, 'system_components', 'UPDATE', "Admin change state for $feature to $state.");
		if ($dbInstance->getTransactionState()) {
			if ($dbInstance->commitToDatabase()) {
				echo('ture');
			} else {
				echo('false');
			}
		} else {
			echo('false');
		}
	}
