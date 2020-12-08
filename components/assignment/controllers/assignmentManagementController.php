<?php
class AssignmentManagementController extends Controller{
    public static function init(){
        $subjectData=AssignmentManagementModel::loadSubjectData();
        $supportiveStaffData=AssignmentManagementModel::loadSupportiveStaffData();
        $assignmentData=AssignmentManagementModel::loadAssignmentPlan();
        $passingData=array($assignmentData,$subjectData,$supportiveStaffData);
        self::createView('assignmentManagementView',$passingData);
        if (isset($_POST['createPlan'])){
            $newAssignmentPlan= new AssignmentPlan;
            $newAssignmentPlan->createAssignmentPlan(0,$_POST['subject'],$_POST['degreeStream'],$_POST['assignmentWeight'],$_POST['totalAssignment'],$_POST['assignmentDescription']);
            AssignmentManagementModel::addNewAssignmentPlanData($newAssignmentPlan,$_POST['conductStaffList']);
        }
    }
}