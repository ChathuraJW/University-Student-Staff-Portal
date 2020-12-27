<?php

	class AssignmentOperationModel extends Model {
		public static function loadAssignmentData($assignmentID): AssignmentPlan|bool {
			$dbInstance = new Database;
			//@TODO change database credentials
			$dbInstance->establishTransaction('root', '');
//        get assignment plan data related to given assignment id
			$sqlQuery = "SELECT * FROM assignment_plan WHERE planID=$assignmentID AND isActive=TRUE LIMIT 1";
			$result = $dbInstance->executeTransaction($sqlQuery)[0];
			$dbInstance->executeTransaction($sqlQuery)[0];
//        create new object to store assignment plan data
			$assignmentPlanData = new AssignmentPlan;
			$assignmentPlanData->createAssignmentPlan($assignmentID, $result['subject'], $result['degreeStream'], $result['assignmentWeigh'], $result['totalAssignmentAmount'], $result['description']);
//        get assignment plan conducting staff
			$sqlQuery = "SELECT staffID FROM assignment_plan_conducted_by WHERE assignmentPlanID=$assignmentID";
			$result = $dbInstance->executeTransaction($sqlQuery);
//        add staff list to this array
			$conductingStaffList = array();
//        iterate through query result and add data to the array declare above
			foreach ($result as $row) {
				$conductingStaff = new User;
				$conductingStaff->setUserName($row['staffID']);
				$conductingStaffList[] = $conductingStaff;
			}
//        set conducting staff list to the assignment plan object
			$assignmentPlanData->setAssignmentConductBy($conductingStaffList);

//        get assignments that belongs to corresponding assignment plan
			$sqlQuery = "SELECT * FROM assignment WHERE assignmentPlanID=$assignmentID AND isActive=TRUE";
			$result = $dbInstance->executeTransaction($sqlQuery);
			$assignmentList = array();
			foreach ($result as $row) {
				$assignmentPlanItem = new Assignment;
				$assignmentPlanItem->createAssignment($row['assignmentID'], $row['assignmentPlanID'], $row['assignmentName'], $row['type'], $row['weight'], $row['description']);
				$assignmentList[] = $assignmentPlanItem;
			}
//        add assignment list to the assignment plan object
			$assignmentPlanData->addAssignment($assignmentList);
//        check weather all queries execute successfully, then after close connection and return data out
			if ($dbInstance->getTransactionState()) {
				$dbInstance->closeConnection();
				return $assignmentPlanData;
			} else {
				$dbInstance->closeConnection();
				return false;
			}
		}

		public static function editAssignment($assignment) {
//    	establish transaction to update assignment data
			$database = new Database;
			//TODO change database credentials
			$database->establishTransaction('root', '');
			$sqlQuery = "UPDATE assignment SET assignmentName='" . $assignment->getAssignmentName() . "',type=" . $assignment->getType() . ",description='"
				. $assignment->getDescription() . "',weight=" . $assignment->getWeight() . " WHERE assignmentID=" . $assignment->getAssignmentID();
			$database->executeTransaction($sqlQuery);
			$database->transactionAudit($sqlQuery, 'assignment', "UPDATE", "Update existing assignment(#" . $assignment->getAssignmentID() . ") on assignment Plan #" . $assignment->getAssignmentPlanID());
//    	set assignment id for down usages
			$assignmentID = $assignment->getAssignmentID();
			if ($database->getTransactionState()) {
				if ($database->commitToDatabase()) {
//			    operation success
					echo("<script>createToast('Success','Assignment(#$assignmentID) information successfully updated..','S')</script>");
				} else {
//    			display operation fail message
					echo("<script>createToast('Warning (error code: #AOM05)','Fail to update assignment(#$assignmentID) information.','W')</script>");
				}
			} else {
//    		display operation fail message
				echo("<script>createToast('Warning (error code: #AOM05)','Fail to update assignment(#$assignmentID) information.','W')</script>");
			}
			$database->closeConnection();
		}

//    delete/disable assignment
		public static function deleteAssignment($assignmentID) {
			$dbInstance = new Database;
			//TODO change database credentials
			$dbInstance->establishTransaction('root', '');
//    	change isActive to false on given assignment plan
			$sqlQuery = "UPDATE assignment SET isActive=FALSE WHERE assignmentID=$assignmentID";
			$dbInstance->executeTransaction($sqlQuery);
//		create audit for operation
			$dbInstance->transactionAudit($sqlQuery, 'assignment', 'UPDATE', "Disable assignment where assignmentID #$assignmentID");
			echo $dbInstance->getTransactionState();

			if ($dbInstance->getTransactionState()) {
				if ($dbInstance->commitToDatabase()) {
					echo("<script>createToast('Success','Assignment(#$assignmentID) delete successfully.','S')</script>");
					$dbInstance->commitToDatabase();
				} else {
//				display error by saying failed to delete assignment
					echo("<script>createToast('Warning (error code: #AOM04)','Fail to delete the assignment(#$assignmentID).','W')</script>");
				}
			} else {
//			display error by saying failed to delete assignment
				echo("<script>createToast('Warning (error code: #AOM04)','Fail to delete the assignment(#$assignmentID).','W')</script>");
			}
			$dbInstance->closeConnection();
		}

		public static function createNewAssignment($assignment) {
//	    establish transaction to update assignment data
			$database = new Database;
//	        TODO change database credentials
			$database->establishTransaction('root', '');

			$sqlQuery = "INSERT INTO assignment(assignmentPlanID, assignmentName, type, description, weight) VALUES (" . $assignment->getAssignmentPlanID()
				. ",'" . $assignment->getAssignmentName() . "'," . $assignment->getType() . ",'" . $assignment->getDescription() . "'," . $assignment->getWeight() . ")";
			$database->executeTransaction($sqlQuery);
			$database->transactionAudit($sqlQuery, 'assignment', "UPDATE", "Add new assignment for assignment Plan #" . $assignment->getAssignmentPlanID());

//	    get assignment id
			$sqlQuery = "SELECT assignmentID FROM assignment WHERE assignmentPlanID=" . $assignment->getAssignmentPlanID() . " AND assignmentName='" .
				$assignment->getAssignmentName() . "' AND type=" . $assignment->getType() . " AND description='" . $assignment->getDescription() . "' AND  weight=" . $assignment->getWeight();
			$assignmentID = $database->executeTransaction($sqlQuery)[0]['assignmentID'];

//	    get student list to fill assignment mark table

//	    find subject code for given $assignment plan
			$sqlQuery = "SELECT subject FROM assignment_on_active_assignment_plan WHERE assignmentPlanID=" . $assignment->getAssignmentPlanID() . " LIMIT 1";
			$subjectCode = $database->executeTransaction($sqlQuery)[0]['subject'];

//	    query student enroll course table for find enrollment for given subject code
			$sqlQuery = "SELECT studentIndexNo FROM student_enroll_course WHERE isActive=TRUE AND courseCode='$subjectCode'";
			$enrollmentList = $database->executeTransaction($sqlQuery);
//		use for get student list as a string to add to audit
			$studentList = "";

//		disable foreign key check temporary
			$database->executeTransaction("SET FOREIGN_KEY_CHECKS=0;");
			foreach ($enrollmentList as $row) {
				$studentID = $row['studentIndexNo'];
				$sqlQuery = "INSERT INTO assignment_mark(assignmentID, studentID, mark) VALUE ($assignmentID,'$studentID',0)";
				echo $sqlQuery;
				$database->executeTransaction($sqlQuery);
//			update student list with values
				$studentList .= $studentID;
				$studentList .= ", ";
			}
//		enable foreign key check again
			$database->executeTransaction("SET FOREIGN_KEY_CHECKS=1;");

//		create audit for above operation
			$studentList = trim($studentList, ' ');
			$database->transactionAudit("INSERT INTO assignment_mark(assignmentID, studentID, mark) VALUE ($assignmentID,'studentID',0);",
				"assignment_mark", "INSERT", "Add student bulk assignment mark table for newly created assignment.[$studentList]");
			if ($database->getTransactionState()) {
				if ($database->commitToDatabase()) {
//		    	operation successful
					echo("<script>createToast('Success','New assignment created for the assignment plan.','S')</script>");
				} else {
//		    	operation failed
					echo("<script>createToast('Warning (error code: #AOM03)','Fail to create a new assignment.','W')</script>");
				}
			} else {
//	    	operation failed
				echo("<script>createToast('Warning (error code: #AOM03)','Fail to create a new assignment.','W')</script>");
			}
			$database->closeConnection();
		}

		public static function loadDataForAddMark($assignmentID): array|bool {
			$sqlQuery = "SELECT * FROM student_assignment_mark WHERE assignmentID=$assignmentID";
			$result = Database::executeQuery('root', '', $sqlQuery);
			if ($result) {
				$studentWithMarkList = array();
				foreach ($result as $row) {
					$studentWithMark = new StudentMark;
					$studentWithMark->setMarks($row['studentID'], $row['regNo'], $row['mark'], $row['markID']);
//					add created object to the list
					$studentWithMarkList[] = $studentWithMark;
				}
				return $studentWithMarkList;
			} else {
//				fail to load data
				return false;
			}
		}

//		use for get assignment information
		public static function assignmentDetails($assignmentID): Assignment|bool {
			$dbInstance = new Database;
			//TODO change database credentials
			$dbInstance->establishTransaction('root', '');

			$sqlQuery = "SELECT * FROM assignment WHERE assignmentID=$assignmentID AND isActive=TRUE LIMIT 1";
			$assignmentDataResult = $dbInstance->executeTransaction($sqlQuery)[0];
			$assignment = new Assignment;
			$assignment->createAssignment($assignmentDataResult['assignmentID'], $assignmentDataResult['assignmentPlanID'], $assignmentDataResult['assignmentName'], $assignmentDataResult['type'], $assignmentDataResult['weight'], $assignmentDataResult['description']);

			//get total number of enrolment
			$sqlQuery = "SELECT COUNT(studentID) AS studentCount,AVG(mark) AS markAVG FROM assignment_mark WHERE assignmentID=$assignmentID";
			$countAndAvgData = $dbInstance->executeTransaction($sqlQuery)[0];
			$totalEnrollment = $countAndAvgData['studentCount'];
			$markAverage = $countAndAvgData['markAVG'];

//			get number of current attempts
			$sqlQuery = "SELECT COUNT(studentID) AS currentAttempts FROM assignment_mark WHERE assignmentID=$assignmentID AND mark!=0";
			$currentAttempts = $dbInstance->executeTransaction($sqlQuery)[0]['currentAttempts'];

			if ($dbInstance->getTransactionState()) {
//				set statistics to object and return it
				$assignment->setStatisticData($totalEnrollment, $currentAttempts, $markAverage);
				$dbInstance->closeConnection();
				return $assignment;
			} else {
				$dbInstance->closeConnection();
				return false;
			}
		}
		public static function closeAssignmentPlan($planID){
			$dbInstance=new Database;
			//TODO change database credentials
			$dbInstance->establishTransaction('root','');
			$sqlQuery="UPDATE assignment_plan SET isActive=FALSE WHERE planID=$planID";
			$dbInstance->executeTransaction($sqlQuery);
			if($dbInstance->getTransactionState()){
				if($dbInstance->commitToDatabase()){
//					operation success
					echo("<script>createToast('Success','Assignment Plan(#$planID) Close Successfully.','S')</script>");
					//TODO navigate to assignmentManagement page
					//TODO send mail notification to all staff members as well
				}else{
//					display fail message
					echo("<script>createToast('Warning (error code: #AOM10)','Fail to close assignment plan.','W')</script>");
				}
			}else{
//				display fail message
				echo("<script>createToast('Warning (error code: #AOM10)','Fail to close assignment plan.','W')</script>");
			}
			$dbInstance->closeConnection();

		}
	}