<?php

	class AssignmentOperationController extends Controller {
		public static function init() {
			if (isset($_GET['planID'])) {
				$assignmentData = AssignmentOperationModel::loadAssignmentData($_GET['planID']);
				self::createView('assignmentOperationView', $assignmentData);

				if (isset($_POST['saveChanges'])) {
					$assignment = new Assignment;
					if (isset($_GET['operation']) & $_GET['operation'] === 'edit') {
//          	    edit exist assignment
						$assignment->createAssignment($_GET['assignmentID'], $_GET['planID'], $_POST['assignmentName'], $_POST['assignmentType'], $_POST['assignmentWeight'], $_POST['assignmentDescription']);
//	            call data update function in model
						AssignmentOperationModel::editAssignment($assignment);
					} else {
//          		create new assignment
						$assignment->createAssignment(null, $_GET['planID'], $_POST['assignmentName'], $_POST['assignmentType'], $_POST['assignmentWeight'], $_POST['assignmentDescription']);
//	            call data update function in model
						AssignmentOperationModel::createNewAssignment($assignment);
					}
				}
			}
		}
	}
