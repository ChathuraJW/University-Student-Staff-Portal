<?php

	class DangerousZoneController extends Controller {
		public static function startNewSemester() {
//			create view
			self::createModularView('dangerousZone', 'startNewSemesterView');

			if (isset($_POST['confirmToStartNewSemester'])) {
				$adminUserName = $_POST['adminUserName'];
				$adminPasswordPlain = $_POST['adminPassword'];
//				get salt of admin user
				$passwordSalt = DangerousZoneModel::getSalt($adminUserName);
//				get password hash
				$adminPasswordHash = hash('sha256', "$adminPasswordPlain$passwordSalt");
//				call model function to validate admin user
				$result = DangerousZoneModel::validateAdmin($adminUserName, $adminPasswordHash);
				if ($result) {
//					call operation function
					DangerousZoneModel::startNewSemester();
				} else {
					//admin credential error
					echo("<script>createToast('Warning (error code: #ADMIN-DZ-02)','Admin credential mismatch.','W')</script>");
				}
			}
		}

		public static function changeAdminUser() {
//			create view
			self::createModularView('dangerousZone', 'changeAdminUserView');

			if (isset($_POST['transferAdminPrivilege'])) {
				$adminUserName = $_POST['adminUserName'];
				$adminPasswordPlain = $_POST['adminPassword'];
				$appointedUser = $_POST['appointedUser'];
//				get password salt
				$passwordSalt = DangerousZoneModel::getSalt($adminUserName);
//				get password hash
				$adminPasswordHash = hash('sha256', "$adminPasswordPlain$passwordSalt");
//				call model function to validate admin user
				$result = DangerousZoneModel::validateAdmin($adminUserName, $adminPasswordHash);
				if ($result) {
//					call operation function
					DangerousZoneModel::changeAdminUser($appointedUser);
				} else {
					//admin credential error
					echo("<script>createToast('Warning (error code: #ADMIN-DZ-02)','Admin credential mismatch.','W')</script>");
				}
			}
		}
	}