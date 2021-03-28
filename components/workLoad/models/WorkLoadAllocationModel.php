<?php

	class WorkLoadAllocationModel extends Model {
		public static function getWorkLoad() {
			$workLoadList = array();
			$workLoads = Database::executeQuery("academicSupportiveHead", "academicSupportiveHead@16", "SELECT * FROM workload,User where workload.workloadOwner=User.userName AND workload.checkValue=0;");
			// print_r($workLoads);

			foreach ($workLoads as $workLoad) {
				$newWorkLoad = new AllocatedWorkload;

				$newWorkLoad->setWorkLoad($workLoad['workloadOwner'], $workLoad['title'], $workLoad['description'], $workLoad['location'], $workLoad['Date'], $workLoad['fromTime'], $workLoad['toTime'], $workLoad['salutation'], $workLoad['fullName'], $workLoad['requestDate'], $workLoad['workloadID']);

				$workLoadList[] = $newWorkLoad;
			}
			return $workLoadList;
		}

		public static function setWorkload($members, $workloadID) {
			$timestamp = date("F j, Y \a\t g:ia");
			$length = sizeof($members);
			$databaseInstance = new Database;
			$databaseInstance->establishTransaction('academicSupportiveHead', 'academicSupportiveHead@16');
			for ($i = 0; $i < $length; $i++) {
				print_r($members[$i]);
				$query = "INSERT INTO academic_support_staff_workload(staffID, workloadID, allocationTimestamp, isChecked) VALUES ('" . $members[$i] . "'," . $workloadID . ",NOW(),0)";
				// echo $databaseInstance->getTransactionState();
				$databaseInstance->executeTransaction($query);
				$databaseInstance->transactionAudit($query, "academic_support_staff_workload", "INSERT", "Allocate a Workload for Supportive Staff");
			}
			$queryTwo = "UPDATE workload SET checkValue=1 WHERE workloadID=" . $workloadID;
			$databaseInstance->executeTransaction($queryTwo);
			$databaseInstance->transactionAudit($queryTwo, "workload", "UPDATE", "View the Workload Request");
			// echo $databaseInstance->getTransactionState();


			if ($databaseInstance->getTransactionState()) {
				// echo $databaseInstance->getTransactionState();

				if ($databaseInstance->commitToDatabase()) {
					//                display success message
					echo("<script>createToast('Success','Workload Allocated successfully.','S');</script>");
				} else {
					//                display fail message
					echo("<script>createToast('Warning (error code: #WLA01)','Workload Allocation failed .','W')</script>");
				}
			} else {
				//            display fail message
				echo("<script>createToast('Warning (error code: #WLA01)','Workload Allocation failed .','W')</script>");
			}
			//        close connection
			$databaseInstance->closeConnection();

		}
	}

?>