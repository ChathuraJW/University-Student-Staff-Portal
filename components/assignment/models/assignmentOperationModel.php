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
}