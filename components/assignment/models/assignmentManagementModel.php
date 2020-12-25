<?php

	class AssignmentManagementModel extends Model {
		public static function loadSubjectData(): array|bool {
			//@TODO change database credentials
			$sqlQuery = "SELECT * FROM course_module ORDER BY semester";
			$result = Database::executeQuery('root', '', $sqlQuery);
			if ($result) {
				$subjectDataList = array();
				foreach ($result as $row) {
					$subjectDataItem = new CourseModule;
					$subjectDataItem->createCourseModule($row['courseCode'], $row['name'], $row['creditValue'], $row['semester'], $row['description']);
					$subjectDataList[] = $subjectDataItem;
				}
				return $subjectDataList;
			} else {
				return false;
			}
		}

		public static function loadSupportiveStaffData(): array|bool {
			//@TODO change database credentials
			$sqlQuery = "SELECT * FROM user WHERE role='SP'";
			$result = Database::executeQuery('root', '', $sqlQuery);
			if ($result) {
				$subjectDataList = array();
				foreach ($result as $row) {
					$subjectDataItem = new User();
					$subjectDataItem->createBasicUser($row['salutation'], $row['userName'], $row['firstName'], $row['lastName']);
					$subjectDataList[] = $subjectDataItem;
				}
				return $subjectDataList;
			} else {
				return false;
			}
		}

		public static function loadAssignmentPlan(): array|bool {
//        initialization of returning array
			$assignmentPlanArray = array();
//        take user name of logged in user
			$userName = $_COOKIE['userName'];
//        find active assignment plan that belongs to particular user
			//@TODO change database credentials
			$dbInstance = new Database;
			$dbInstance->establishTransaction('root', '');
			$sqlQuery = "SELECT assignmentPlanID FROM assignment_plan_conducted_by WHERE staffID='$userName'";
			$assignmentIDs = $dbInstance->executeTransaction($sqlQuery);

			foreach ($assignmentIDs as $assignmentID) {
				$assignmentPlanID = $assignmentID['assignmentPlanID'];
				$sqlQuery = "SELECT * FROM assignment_plan WHERE planID=$assignmentPlanID AND isActive=TRUE";
				$result = Database::executeQuery('root', '', $sqlQuery)[0];

//            create object for each assignment plan
				$newAssignmentPlan = new AssignmentPlan;
				$newAssignmentPlan->createAssignmentPlan($result['planID'], $result['subject'], $result['degreeStream'], $result['assignmentWeigh'], $result['totalAssignmentAmount'], $result['description']);
//            take out staff members conduct by each assignment plan

				$sqlQuery = "SELECT staffID FROM assignment_plan_conducted_by WHERE assignmentPlanID=$assignmentPlanID";
				$staffList = $dbInstance->executeTransaction($sqlQuery);
//            generate staff list and add those use object into staffArray
				$staffArray = array();
				foreach ($staffList as $staff) {
					$staffMember = new User;
					$staffMember->setUserName($staff['staffID']);
					$staffArray[] = $staffMember;
				}
//            set staff list of assignment plan object
				$newAssignmentPlan->setAssignmentConductBy($staffArray);

//            finally add complete assignment plan object into returning array
				$assignmentPlanArray[] = $newAssignmentPlan;
			}
			if ($dbInstance->getTransactionState()) {
//				if all query success return data out and close connection
				$dbInstance->closeConnection();
				return $assignmentPlanArray;
			} else {
				$dbInstance->closeConnection();
				return false;
			}
		}

		public static function addNewAssignmentPlanData($newAssignmentPlan, $conductStaffList) {
			//@TODO change database credentials
			$database = new Database;
			$database->establishTransaction('root', '');
//        insert assignment plan data into assignment plan data table
			$sqlQuery = "INSERT INTO assignment_plan (description, assignmentWeigh, totalAssignmentAmount, subject, degreeStream, isActive) VALUES ('" . $newAssignmentPlan->getDescription() . "'," . $newAssignmentPlan->getAssignmentWeight() . "," . $newAssignmentPlan->getTotalNumberOfAssignment() . ",'" . $newAssignmentPlan->getSubjectCode() . "','" . $newAssignmentPlan->getDegreeStream() . "',TRUE)";
			$isSuccess = $database->executeTransaction($sqlQuery);
			if ($isSuccess)
				$database->transactionAudit($sqlQuery, "assignment_plan", "INSERT", "create new Assignment Plan.");

//        get back assignment plan id
			$sqlQuery = "SELECT planID FROM assignment_plan WHERE description='" . $newAssignmentPlan->getDescription() . "' AND assignmentWeigh=" . $newAssignmentPlan->getAssignmentWeight() . " AND totalAssignmentAmount=" . $newAssignmentPlan->getTotalNumberOfAssignment() . " AND subject='" . $newAssignmentPlan->getSubjectCode() . "' AND degreeStream='" . $newAssignmentPlan->getDegreeStream() . "' AND isActive=TRUE LIMIT 1";
			$assignmentPlanID = $database->executeTransaction($sqlQuery)[0]['planID'];

//        convert staff list string into array
			$staffList = explode("\n", $conductStaffList);
//        assign each staff member to assignment plan
			foreach ($staffList as $staff) {
				$sqlQuery = "INSERT INTO assignment_plan_conducted_by(staffID, assignmentPlanID) VALUES ('$staff',$assignmentPlanID)";
				$isSuccess = $database->executeTransaction($sqlQuery);
				if ($isSuccess)
					$database->transactionAudit($sqlQuery, "assignment_plan_conducted_by", "INSERT", "Add staff member to assignment #$assignmentPlanID");
			}
			if ($database->getTransactionState()) {
//            commit transaction
				$isCommitted = $database->commitToDatabase();
				if ($isCommitted) {
					echo("<script>createToast('Success','Hall reservation request successfully placed.','S');</script>");

				} else {
					echo("<script>createToast('Warning (error code: #AOM01)','Failed to Create Assignment Plan.','W')</script>");
				}
			} else {
				echo("<script>createToast('Warning (error code: #AOM01)','Failed to Create Assignment Plan.','W')</script>");
			}
//        close connection
			$database->closeConnection();
		}

	}