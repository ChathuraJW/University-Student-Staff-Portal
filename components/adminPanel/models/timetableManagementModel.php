<?php

	class timetableManagementModel extends Model {

		public static function getHall() {
			$query = "SELECT hallID FROM hall_and_lab";
			return Database::executeQuery('root', '', $query);
		}

		public static function editEntry($hallID, $subjectCode, $day, $fromTime, $toTime, $description, $eventID) {
			if ($hallID == "" || $subjectCode == "" || $day == "" || $fromTime == "" || $toTime == "" || $eventID == "") {
				echo("<script>createToast('Warning (error code: #ADMIN-TM-01)','Cannot set Null fields. Please Try Again.','W');</script>");
			} else {
				$databaseInstance = new Database;
				$databaseInstance->establishTransaction('admin', 'admin@16');
				$query = "UPDATE timetable SET hallID='" . $hallID . "',subjectCode='" . $subjectCode . "',day='" . $day . "',fromTime='" . $fromTime . "',toTime='" . $toTime . "',description='" . $description . "' WHERE eventID='" . $eventID . "'";

				$databaseInstance->executeTransaction($query);
				if ($databaseInstance->getTransactionState()) {
					$databaseInstance->commitToDatabase();
					$databaseInstance->transactionAudit($query, 'Edit Timetable Entry', 'UPDATE', 'Update a Timetable Detail.');
					echo("<script>createToast('Success','Entry Update Successfully.','S');</script>");
				} else {
					//			show failed toast
					echo("<script>createToast('Warning (error code: #ADMIN-TM-02)','Update Query failed. Please Try Again.','W');</script>");
				}
				//		close db connection
				$databaseInstance->closeConnection();
			}

		}

		public static function addEntry($hallID, $subjectCode, $day, $fromTime, $toTime, $description, $group) {

			if ($hallID == "" || $subjectCode == "" || $day == "" || $fromTime == "" || $toTime == "" || $eventID == "") {
				echo("<script>createToast('Warning (error code: #ADMIN-TM-01)','Cannot set Null fields. Please Try Again.','W');</script>");
			} else {
				$databaseInstance = new Database;
				$databaseInstance->establishTransaction('admin', 'admin@16');

				$query = "INSERT INTO timetable(hallID,subjectCode,day,fromTime,toTime,description,relatedGroup) VALUES ('" . $hallID . "','" . $subjectCode . "','" . $day . "','" . $fromTime . "','" . $toTime . "','" . $description . "','" . $group . "')";
				$databaseInstance->executeTransaction($query);
				if ($databaseInstance->getTransactionState()) {
					$databaseInstance->commitToDatabase();
					$databaseInstance->transactionAudit($query, 'Add Timetable Entry', 'INSERT', 'Add a New Timetable entry.');
					echo("<script>createToast('Success','Entry insert Successfully.','S');</script>");
				} else {
					//			show failed toast
					echo("<script>createToast('Warning (error code: #ADMIN-TM-02)','Insert Query failed. Please Try Again.','W');</script>");
				}
				//		close db connection
				$databaseInstance->closeConnection();
			}
		}

		public static function deleteEntry($eventID) {
			$databaseInstance = new Database;
			$databaseInstance->establishTransaction('admin', 'admin@16');

			$query = "UPDATE timetable SET entryValidity=0 WHERE eventID='" . $eventID . "'";
			$databaseInstance->executeTransaction($query);
			if ($databaseInstance->getTransactionState()) {
				$databaseInstance->commitToDatabase();
				$databaseInstance->transactionAudit($query, 'Delete TimeTable Entry', 'UPDATE', 'Delete a timetable entry.');
				echo("<script>createToast('Success','Deleted a entry Successfully.','S');</script>");
			} else {
//			show failed toast
				echo("<script>createToast('Warning (error code: #ADMIN-TM-03)','Delete Query failed. Please Try Again.','W');</script>");
			}
//		close db connection
			$databaseInstance->closeConnection();
		}
	}

?>