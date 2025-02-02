<?php

	class AssignmentOperationController extends Controller {
		public static function init() {
			if (isset($_GET['planID'])) {
//				initial data creation
				$assignmentData = AssignmentOperationModel::loadAssignmentData($_GET['planID']);

				if (isset($_GET['operation']) & $_GET['operation'] === 'open') {
//					operation for open assignment for add marks
					$assignmentID = $_GET['assignmentID'];
					$studentWithMarks = AssignmentOperationModel::loadDataForAddMark($assignmentID);
					$assignmentInfo = AssignmentOperationModel::assignmentDetails($assignmentID);
					self::createView('assignmentOperationView', [$assignmentData, $studentWithMarks, $assignmentInfo]);

//					display waring for data loading errors
					if (!$studentWithMarks)
						echo("<script>createToast('Warning (error code: #AOM02-M)','Fail to load basic data.','W')</script>");
					if (!$assignmentInfo)
						echo("<script>createToast('Warning (error code: #AOM02-I)','Fail to load basic data.','W')</script>");
				} else {
//					all operation except open assignment
					self::createView('assignmentOperationView', [$assignmentData]);
				}

//				close assignment section
				if (isset($_POST['closeAssignment'])) {
//					calling model function for close assignment
					AssignmentOperationModel::closeAssignmentPlan($_GET['planID']);
//					location redirection
					echo("
						<script>
							setTimeout(function () {
						        window.location='assignmentManagement';
						    }, 3000);
						</script>
					");
				}

//				display error by saying unable to load
				if (!$assignmentData)
					echo("<script>createToast('Warning (error code: #AOM02-A)','Fail to load basic data.','W')</script>");

//				this button can be click in multiple instances
				self::buttonOperation();
			}
		}

		private static function buttonOperation() {
			if (isset($_POST['saveChanges'])) {
//					create object from assignment class to store new/edited data
				$assignment = new Assignment;
				if (isset($_GET['operation']) & $_GET['operation'] === 'edit') {
//          	        edit exist assignment
					$assignment->createAssignment($_GET['assignmentID'], $_GET['planID'], $_POST['assignmentName'], $_POST['assignmentType'], $_POST['assignmentWeight'], $_POST['assignmentDescription']);
//	                    call data update function in model
					AssignmentOperationModel::editAssignment($assignment);
//						location redirection
					$redirectLocation = "assignmentOperation?planID=" . $_GET['planID'];
					echo("
						<script>
							setTimeout(function () {
						        window.location='$redirectLocation';
						    }, 3000);
						</script>
					");

				} elseif (isset($_GET['operation']) & $_GET['operation'] === 'create') {
//          		    create new assignment section
					$assignment->createAssignment(null, $_GET['planID'], $_POST['assignmentName'], $_POST['assignmentType'], $_POST['assignmentWeight'], $_POST['assignmentDescription']);
//	                    call data update function in model
					AssignmentOperationModel::createNewAssignment($assignment);
//						location redirection
					$redirectLocation = "assignmentOperation?planID=" . $_GET['planID'];
					echo("
						<script>
							setTimeout(function () {
						        window.location='$redirectLocation';
						    }, 3000);
						</script>
					");
				}

			} elseif (isset($_GET['operation']) & $_GET['operation'] === 'delete') {
//					handle delete assignment operation
				$selectedAssignmentID = $_GET['assignmentID'];
//					call model function to delete assignment
				AssignmentOperationModel::deleteAssignment($selectedAssignmentID);
//					location redirection
				echo("
						<script>
							setTimeout(function () {
						        window.location='assignmentManagement';
						    }, 3000);
						</script>
					");
			}
		}
	}
