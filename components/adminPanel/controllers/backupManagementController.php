<?php

	class BackupManagementController extends Controller {
		public static function configBackup() {
			$fileList = BackupManagementModel::loadCurrentBackupList();
			self::createModularView('backupManagement', 'bmBackupConfigView', $fileList);

//			create a new backup
			if (isset($_POST['createBackup'])) {
//				call model function to create backup
				BackupManagementModel::createNewBackup();
			}

//			in-house backup restore
			if (isset($_GET['backupName'])) {
//				call restore function
				BackupManagementModel::restoreBackup("./assets/backup/" . $_GET['backupName']);
			}

//			custom file, backup restore
			if (isset($_POST['restoreBackup'])) {
				$backupFile = $_FILES['createBackup']['tmp_name'];
//				call restore function
				BackupManagementModel::restoreBackup($backupFile);
			}
		}
	}