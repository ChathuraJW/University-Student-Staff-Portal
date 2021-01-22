<?php

	class AdminPanelController extends Controller {

		public static function open() {
//			check weather the cookie is created or not
			if (!isset($_COOKIE['adminSelectedFeature'])) {
//				create initial view without feature loading
				self::createView("adminPanelView",false);
			} else {
//				get cookie value to a variable and select necessary function using below statements
				$feature = $_COOKIE['adminSelectedFeature'];
				switch ($feature) {
					case "addStudent":
						$selectedFeature = "UserManagementController::addStudent";
						break;
					case "addStaff":
						$selectedFeature = "UserManagementController::addStaff";
						break;
					case "editUserProfile":
						$selectedFeature = "UserManagementController::updateProfile";
						break;
					case "studentGroupOperation":
						$selectedFeature = "UserManagementController::changeStudentGroup";
						break;
					case "subjectManagement":
						$selectedFeature = "";
						break;
					case "facilityManagement":
						$selectedFeature = "";
						break;
					case "userPrivilegeManagement":
						$selectedFeature = "PrivilegeManagementController::init";
						break;
					case "hostelStudent":
						$selectedFeature = "StudentFeatureManagementController::addHostelStudent";
						break;
					case "scholarshipStudent":
						$selectedFeature = "StudentFeatureManagementController::scholarshipStudent";
						break;
					case "":
						$selectedFeature = "";
						break;
					case "basicSystemConfig":
						$selectedFeature = "SystemConfigController::doSystemConfigs";
						break;
					case "startNewSemester":
						$selectedFeature = "DangerousZoneController::startNewSemester";
						break;
					case "changeAdminUser":
						$selectedFeature = "DangerousZoneController::changeAdminUser";
						break;
					case "firstAttemptEnrollment":
						$selectedFeature = "StudentEnrollCourseController::makeEnrollment";
						break;
					case "repeatAttemptEnrollment":
						$selectedFeature = "StudentEnrollCourseController::makeRepeatEnrollment";
						break;
					case "backupConfig":
						$selectedFeature = "BackupManagementController::configBackup";
						break;
//						related to feature management
//					case "addNewFeature":
//						$selectedFeature = "";
//						break;
//					case "disableEnableFeature":
//						$selectedFeature = "";
//						break;
				}
//				call view creation function with selected function
				self::createView("adminPanelView", $selectedFeature);
			}
		}

	}

?>
