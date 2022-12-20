<?php

	class GetRawResultModel extends Model {
		public static function loadReviewData(): bool|array {
			$dbInstance = new Database;
			$dbInstance->establishTransaction('administrativeSAR', 'administrativeSAR@16');
//    	list out entries thar are not currently reviewed
			$sqlQuery = "SELECT * FROM submit_raw_result WHERE isReceived=FALSE";
			$notReviewedFileList = $dbInstance->executeTransaction($sqlQuery);

			$fileList = array();
			foreach ($notReviewedFileList as $row) {
				$fileID = $row['fileID'];
//            get file data correspond to the given fileID
				$sqlQuery = "SELECT * FROM result_data_file WHERE fileID=$fileID LIMIT 1";
				$fileInfo = $dbInstance->executeTransaction($sqlQuery)[0];

//            create object and update attributes
				$resultFile = new ResultFile;
				$resultFile->setResultFile($fileInfo['subjectCode'], $fileInfo['semester'], $fileInfo['yearOfExam'], $fileInfo['attempt'], $fileInfo['batch'], TRUE, $fileInfo['fileLocation']);
				$resultFile->setFileID($fileID);
				$resultFile->setSendBy($row['staffID']);
//          add object to array
				$fileList[] = $resultFile;
			}
			if ($dbInstance->getTransactionState()) {
//			all queries run successfully
				$dbInstance->closeConnection();
				return $fileList;
			} else {
				$dbInstance->closeConnection();
				return false;
			}
		}

		public static function sendResultReceiveConfirmation($fileID) {
			$dbInstance = new Database;
			$dbInstance->establishTransaction('administrativeSAR', 'administrativeSAR@16');

			$sqlQuery = "UPDATE submit_raw_result SET isReceived=TRUE,receivedTimestamp=NOW() WHERE fileID=$fileID";
			$dbInstance->executeTransaction($sqlQuery);
//        create audit trail
			$dbInstance->transactionAudit($sqlQuery, 'submit_raw_result', "UPDATE", 'Update table after SAR take raw result file.');

//		    get file sent user for create notification
			$sqlQuery = "SELECT staffID FROM submit_raw_result WHERE fileID=$fileID";
			$fileSentUser = $dbInstance->executeTransaction($sqlQuery)[0]['staffID'];
//	    check transaction state
			if ($dbInstance->getTransactionState()) {
				if ($dbInstance->commitToDatabase()) {
//	    		display success message
					echo("
					<script>
						createToast('Success','Operation successfully completed.','S');
//						navigate back after timeout
						setTimeout(function(){
                        	window.location.href=document.location.href.toString().split('getRawResult')[0]+'getRawResult';
						}, 4000);
			    	</script>
			    	");
//					send notification to the user back to inform file is taken
					$timestamp = date("d-m-Y H:i:s");
					$notification = new Notification;
					$notification->setReceivers(array($fileSentUser));
					$notification->setSender($_COOKIE['userName']);
					$notification->createNotification('Result file collected.', "Submitted result for the examination registrar is collected now[$timestamp].");
					$notification->publishNotification();
				} else {
//	    		display error
					echo("<script>createToast('Warning (error code: #ERM04)','Failed to confirm.','W')</script>");
				}
			} else {
//		    display error
				echo("<script>createToast('Warning (error code: #ERM04)','Failed to confirm.','W')</script>");
			}
			$dbInstance->closeConnection();
		}
	}