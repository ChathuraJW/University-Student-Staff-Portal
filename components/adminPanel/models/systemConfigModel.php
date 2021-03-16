<?php

	class SystemConfigModel extends Model {
		public static function takeCurrentConfig(): bool|array {
			$sqlQuery = "SELECT parameterID,parameterKey,parameterValue FROM system_parameters";
			$result = Database::executeQuery('admin', 'admin@16', $sqlQuery);
			if ($result) {
				$returnArray = array();
				foreach ($result as $row) {
					$parameter = new SystemParameters;
					$parameter->setParameter($row['parameterID'], $row['parameterKey'], $row['parameterValue']);
					$returnArray[] = $parameter;
				}
				return $returnArray;
			} else {
				return false;
			}
		}

		public static function editParameters($parameterID, $newValue): bool {
			$dbInstance = new Database;
			$dbInstance->establishTransaction('admin', 'admin@16');

//			execute update query and audit the operation
			$sqlQuery = "UPDATE system_parameters SET parameterValue='$newValue' WHERE parameterID=$parameterID";
			$dbInstance->executeTransaction($sqlQuery);
			$dbInstance->transactionAudit($sqlQuery, 'system_parameters', 'UPDATE', "Update system parameter(#$parameterID) value to $newValue.");

//			check transaction state and commit to database return only true/false after the operation
			if ($dbInstance->getTransactionState()) {
				if ($dbInstance->commitToDatabase()) {
					$dbInstance->closeConnection();
					return true;
				} else {
					$dbInstance->closeConnection();
					return false;
				}
			} else {
				$dbInstance->closeConnection();
				return false;
			}
		}

	}