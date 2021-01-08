<?php
	class DangerousZoneController extends Controller {
		public static function startNewSemester(){
			self::createModularView('dangerousZone','startNewSemesterView');
			if (isset($_POST['confirmToStartNewSemester'])){
				$adminUserName=$_POST['adminUserName'];
				$adminPasswordPlain=$_POST['adminPassword'];

				$adminPasswordEnc = hash('sha256', "$adminPasswordPlain$adminUserName");
				$result=DangerousZoneModel::validateAdmin($adminUserName,$adminPasswordEnc);
				if($result){
//					call operation function
					DangerousZoneModel::startNewSemester();
				}else{
					//admin credential error
					echo("<script>createToast('Warning (error code: #ADMIN-DZ-02)','Admin credential mismatch.','W')</script>");
				}
			}
		}
	}