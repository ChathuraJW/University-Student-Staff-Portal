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
    	$sqlQuery="UPDATE assignment SET assignmentName='".$assignment->getAssignmentName()."',type=".$assignment->getType().",description='"
		    .$assignment->getDescription()."',weight=".$assignment->getWeight()." WHERE assignmentID=".$assignment->getAssignmentID();
//    	establish transaction to update assignment data
    	$database=new Database;
//	    @TODO change database credentials
    	$database->establishTransaction('root','');
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
	    $assignment=new Assignment();
	    $sqlQuery="INSERT INTO assignment(assignmentPlanID, assignmentName, type, description, weight) VALUES (".$assignment->getAssignmentPlanID()
		    .",'".$assignment->getAssignmentName()."',".$assignment->getType().",'".$assignment->getDescription()."',".$assignment->getWeight().")";
	    //    	establish transaction to update assignment data
	    $database=new Database;
//	    @TODO change database credentials
	    $database->establishTransaction('root','');
	    $database->executeTransaction($sqlQuery);
	    $database->transactionAudit($sqlQuery,'assignment',"UPDATE","Add new assignment for assignment Plan #" .$assignment->getAssignmentPlanID());
	    if($database->getTransactionState()){
		    $database->commitToDatabase();
		    //@TODO Add success message
	    }else{
		    //@TODO Add fail message message
	    }
	    $database->closeConnection();
    }
}