<?php
class AssignmentManagementController extends Controller{
    public static function init(){
//    	load necessary data
        $subjectData=AssignmentManagementModel::loadSubjectData();
        $supportiveStaffData=AssignmentManagementModel::loadSupportiveStaffData();
        $assignmentData=AssignmentManagementModel::loadAssignmentPlan();
        $passingData=array($assignmentData,$subjectData,$supportiveStaffData);
//        call view creation function
        self::createView('assignmentManagementView',$passingData);
//        error message generate based on data load errors
        if(!$subjectData)
	        echo("<script>createToast('Warning (error code: #AOM02-C)','Fail to load basic data.','W');</script>");
		if(!$supportiveStaffData)
			echo("<script>createToast('Warning (error code: #AOM02-S)','Fail to load basic data.','W')</script>");
		if(!$assignmentData)
			echo("<script>createToast('Warning (error code: #AOM02-A)','Fail to load basic data.','W')</script>");

//		create plane operation
        if (isset($_POST['createPlan'])){
            $newAssignmentPlan= new AssignmentPlan;
            $newAssignmentPlan->createAssignmentPlan(0,$_POST['subject'],$_POST['degreeStream'],$_POST['assignmentWeight'],$_POST['totalAssignment'],$_POST['assignmentDescription']);
            AssignmentManagementModel::addNewAssignmentPlanData($newAssignmentPlan,$_POST['conductStaffList']);
        }
    }
}