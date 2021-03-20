<?php

	class BackupManagementModel extends Model {
		public static function loadCurrentBackupList(): array {
//			list out all files in backup directory
			$fileList = scandir('./assets/backup/');
			$returnList = array();
//			filter out only backup files and add them into above created array
			foreach ($fileList as $file) {
//				remove first two unwanted data in scantier reading and add only files
				if (strlen($file) > 2)
					$returnList[] = $file;
			}
			return $returnList;
		}

		public static function createNewBackup() {
//			setup basic parameter that need to run backup query
			$database = Database::getDatabaseStatic();
			$databaseHost = Database::getServerStatic();
			$dbUser = 'admin';
			$dbPassword = 'admin@16';
			$fileName = time() . '_backup';
			$fileLocation = './assets/backup/' . $fileName . '.sql';

//			create and execute backup command
			//TODO approach might be different in linux think it and care it
			$command = "C:\wamp64\bin\mysql\mysql8.0.21\bin\mysqldump --user=$dbUser --password=$dbPassword --host=$databaseHost $database > $fileLocation";
			exec($command, $output, $return_var);

			if (!$return_var) {
//				create audit
				self::createDatabaseLog('Backup', "Full Database backup created.[Backup File: $fileLocation]");
//				display success message
				echo("
					<script>
						createToast('Success','Backup creation successful.[$fileName]','S')
						document.location.href='$fileLocation';
					</script>
				");
			} else {
//				display fail message
				echo("<script>createToast('Warning (error code: #ADMIN-BM-01)','Failed to create a backup.','W')</script>");

			}
		}

		private static function createDatabaseLog($operation, $description) {
			$user = $_COOKIE['userName'];//take from cookies
			$timestamp = date("Y-m-d H:i:s");
//			create audit query
			$auditQuery = "INSERT INTO database_log(userID, executedQuery,
                        affectedTable, eventType, description, timestamp)
                        VALUES ('$user','-----','All','$operation','$description','$timestamp')";
			Database::executeQuery('admin', 'admin@16', $auditQuery);

//			get transaction id back
			$sqlQuery="SELECT eventID FROM database_log WHERE description='$description' AND userID='$user' AND timestamp='$timestamp'";
			$transactionID=Database::executeQuery('admin', 'admin@16',$sqlQuery)[0]['eventID'];
//			call log creation function
			self::createLog($timestamp,$description,$transactionID);
		}

		public static function restoreBackup($selectedFile) {
//			setup basic parameter that need to run restore query
			$database = Database::getDatabaseStatic();
			$databaseHost = Database::getServerStatic();
			//TODO need to change database credentials
			$dbUser = 'root';
			$dbPassword = '';

//			create and execute restore command
			//TODO approach might be different in linux think it and care it
			$command = "C:\wamp64\bin\mysql\mysql8.0.21\bin\mysql --user=$dbUser --password=$dbPassword --host=$databaseHost $database < $selectedFile";
			exec($command, $output, $return_var);
			if (!$return_var) {
//				create audit
				self::createDatabaseLog('Restore', "Full database restore with backup file [$selectedFile].");
//				display success message
				echo("<script>createToast('Success',' Database successfully restored.','S')</script>");
			} else {
//				display fail message
				echo("<script>createToast('Warning (error code: #ADMIN-BM-02)','Backup restore operation failed.','W')</script>");
			}
//			clean url
			echo("
				<script>
					window.history.replaceState({}, document.title, window.location.pathname);
				</script>
			");
		}
	}