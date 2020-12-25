<?php

	class AssignmentOperationController extends Controller {
		public static function init() {
			if (isset($_GET['planID'])) {
				$assignmentData = AssignmentOperationModel::loadAssignmentData($_GET['planID']);
				self::createView('assignmentOperationView', $assignmentData);

//				this button can be click in multiple instances
				if (isset($_POST['saveChanges'])) {
					$assignment = new Assignment;
					if (isset($_GET['operation']) & $_GET['operation'] === 'edit') {
//          	        edit exist assignment
						$assignment->createAssignment($_GET['assignmentID'], $_GET['planID'], $_POST['assignmentName'], $_POST['assignmentType'], $_POST['assignmentWeight'], $_POST['assignmentDescription']);
//	                    call data update function in model
						AssignmentOperationModel::editAssignment($assignment);

					} elseif(isset($_GET['operation']) & $_GET['operation'] === 'create') {
//          		    create new assignment section
						$assignment->createAssignment(null, $_GET['planID'], $_POST['assignmentName'], $_POST['assignmentType'], $_POST['assignmentWeight'], $_POST['assignmentDescription']);
//	                    call data update function in model
						AssignmentOperationModel::createNewAssignment($assignment);
					}elseif(isset($_GET['operation']) & $_GET['operation'] === 'delete'){
						$assignmentPlanID=$_GET['planID'];
						$selectedAssignmentID=$_GET['assignmentID'];
						//TODO call necessary model function to delete or disable plan
					}
				}
			}
		}
	}
