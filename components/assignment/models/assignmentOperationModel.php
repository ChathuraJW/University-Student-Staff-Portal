<?php
class AssignmentOperationModel extends Model{
    public static function loadAssignmentData($assignmentID): AssignmentPlan{
//        get assignment plan data related to given assignment id
        //@TODO change database credentials
        $sqlQuery="SELECT * FROM assignment_plan WHERE planID=$assignmentID LIMIT 1";
        $result=Database::executeQuery('root','',$sqlQuery)[0];
//        create new object to store assignment plan data
        $assignmentPlanData=new AssignmentPlan;
        $assignmentPlanData->createAssignmentPlan($assignmentID,$result['subject'],$result['degreeStream'],$result['assignmentWeigh'],$result['totalAssignmentAmount'],$result['description']);
//        get assignment plan conducting staff
        //@TODO change database credentials
        $sqlQuery="SELECT staffID FROM assignment_plan_conducted_by WHERE assignmentPlanID=$assignmentID";
        $result=Database::executeQuery('root','',$sqlQuery);
        $conductingStaffList=array();
        foreach ($result as $row){
            $conductingStaff=new User;
            $conductingStaff->setUserName($row['staffID']);
            $conductingStaffList[]=$conductingStaff;
        }
        $assignmentPlanData->setAssignmentConductBy($conductingStaffList);
//        get assignments that belongs to corresponding assignment plan
        //@TODO change database credentials
        $sqlQuery="SELECT * FROM assignment WHERE assignmentPlanID=$assignmentID";
        $result=Database::executeQuery('root','',$sqlQuery);
        $assignmentList=array();
        foreach ($result as $row){
            $assignmentPlanItem=new Assignment;
            $assignmentPlanItem->createAssignment($row['assignmentID'],$row['assignmentPlanID'],$row['assignmentName'],$row['type'],$row['weight'],$row['description']);
            $assignmentList[]=$assignmentPlanItem;
        }
        $assignmentPlanData->addAssignment($assignmentList);
        return $assignmentPlanData;
    }
    public static function editAssignment($assignment){
//    	establish transaction to update assignment data
	    $database=new Database;
//	    @TODO change database credentials
	    $database->establishTransaction('root','');
	    $sqlQuery="UPDATE assignment SET assignmentName='".$assignment->getAssignmentName()."',type=".$assignment->getType().",description='"
		    .$assignment->getDescription()."',weight=".$assignment->getWeight()." WHERE assignmentID=".$assignment->getAssignmentID();
    	$database->executeTransaction($sqlQuery);
    	$database->transactionAudit($sqlQuery,'assignment',"UPDATE","Update existing assignment(#".$assignment->getAssignmentID().") on assignment Plan #" .$assignment->getAssignmentPlanID());
    	if($database->getTransactionState()){
    		$database->commitToDatabase();
    		//@TODO Add success message
	    }else{
		    //@TODO Add fail message message
	    }
    	$database->closeConnection();
    }
    public static function createNewAssignment($assignment){
//	    establish transaction to update assignment data
	    $database=new Database;
//	    @TODO change database credentials
	    $database->establishTransaction('root','');

	    $sqlQuery="INSERT INTO assignment(assignmentPlanID, assignmentName, type, description, weight) VALUES (".$assignment->getAssignmentPlanID()
		    .",'".$assignment->getAssignmentName()."',".$assignment->getType().",'".$assignment->getDescription()."',".$assignment->getWeight().")";
	    $database->executeTransaction($sqlQuery);
	    $database->transactionAudit($sqlQuery,'assignment',"UPDATE","Add new assignment for assignment Plan #" .$assignment->getAssignmentPlanID());

//	    get assignment id
	    $sqlQuery="SELECT assignmentID FROM assignment WHERE assignmentPlanID=".$assignment->getAssignmentPlanID()." AND assignmentName='".
		    $assignment->getAssignmentName()."' AND type=".$assignment->getType()." AND description='".$assignment->getDescription()."' AND  weight=".$assignment->getWeight();
	    $assignmentID=$database->executeTransaction($sqlQuery)[0]['assignmentID'];

//	    get student list to fill assignment mark table

//	    find subject code for given $assignment plan
	    $sqlQuery="SELECT subject FROM assignment_on_active_assignment_plan WHERE assignmentPlanID=".$assignment->getAssignmentPlanID()." LIMIT 1";
	    $subjectCode=$database->executeTransaction($sqlQuery)[0]['subject'];

//	    query student enroll course table for find enrollment for given subject code
		$sqlQuery="SELECT studentIndexNo FROM student_enroll_course WHERE isActive=TRUE AND courseCode='$subjectCode'";
		$enrollmentList=$database->executeTransaction($sqlQuery);
//		use for get student list as a string to add to audit
		$studentList="";

//		disable foreign key check temporary
		$database->executeTransaction("SET FOREIGN_KEY_CHECKS=0;");
		foreach ($enrollmentList as $row){
			$studentID=$row['studentIndexNo'];
			$sqlQuery="INSERT INTO assignment_mark(assignmentID, studentID, mark) VALUE ($assignmentID,'$studentID',0)";
			echo $sqlQuery;
			$database->executeTransaction($sqlQuery);
//			update student list with values
			$studentList.=$studentID;
			$studentList.=", ";
		}
//		enable foreign key check again
	    $database->executeTransaction("SET FOREIGN_KEY_CHECKS=1;");

//		create audit for above operation
	    $studentList= trim($studentList,' ');
	    $database->transactionAudit("INSERT INTO assignment_mark(assignmentID, studentID, mark) VALUE ($assignmentID,'studentID',0);",
		    "assignment_mark","INSERT","Add student bulk assignment mark table for newly created assignment.[$studentList]");
	    if($database->getTransactionState()){
		    $database->commitToDatabase();
		    echo("<script>createToast('Success','New assignment created for the assignment plan.','S')</script>");
	    }else{
		    echo("<script>createToast('Warning (error code: #AOM03)','Fail to create a new assignment..','W')</script>");
	    }
	    $database->closeConnection();
    }
}