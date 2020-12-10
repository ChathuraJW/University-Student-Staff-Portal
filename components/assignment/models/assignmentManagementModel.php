<?php

class AssignmentManagementModel extends Model{
    public static function loadSubjectData(): array{
        //@TODO change database credentials
        $sqlQuery = "SELECT * FROM course_module ORDER BY semester";
        $result = Database::executeQuery('root', '', $sqlQuery);
        $subjectDataList = array();
        foreach ($result as $row) {
            $subjectDataItem = new CourseModule;
            $subjectDataItem->createCourseModule($row['courseCode'], $row['name'], $row['creditValue'], $row['semester'], $row['description']);
            $subjectDataList[] = $subjectDataItem;
        }
        return $subjectDataList;
    }

    public static function loadSupportiveStaffData(): array{
        //@TODO change database credentials
        $sqlQuery = "SELECT * FROM user WHERE role='SP'";
        $result = Database::executeQuery('root', '', $sqlQuery);
        $subjectDataList = array();
        foreach ($result as $row) {
            $subjectDataItem = new User();
            $subjectDataItem->createBasicUser($row['salutation'], $row['userName'], $row['firstName'], $row['lastName']);
            $subjectDataList[] = $subjectDataItem;
        }
        return $subjectDataList;
    }

    public static function addNewAssignmentPlanData($newAssignmentPlan, $conductStaffList){
        try {
            //@TODO change database credentials
//        insert assignment plan data into assignment plan data table
            $sqlQuery = "INSERT INTO assignment_plan (description, assignmentWeigh, totalAssignmentAmount, subject, degreeStream, isActive) VALUES ('" . $newAssignmentPlan->getDescription() . "'," . $newAssignmentPlan->getAssignmentWeight() . "," . $newAssignmentPlan->getTotalNumberOfAssignment() . ",'" . $newAssignmentPlan->getSubjectCode() . "','" . $newAssignmentPlan->getDegreeStream() . "',TRUE)";
            $isSuccess = Database::executeQuery('root', '', $sqlQuery);
            if ($isSuccess)
                Model::createAudit($sqlQuery, 'assignment_plan', 'INSERT', 'Create new Assignment Plan.');

//        get back assignment plan id
            //@TODO change database credentials
            $sqlQuery = "SELECT planID FROM assignment_plan WHERE description='" . $newAssignmentPlan->getDescription() . "' AND assignmentWeigh=" . $newAssignmentPlan->getAssignmentWeight() . " AND totalAssignmentAmount=" . $newAssignmentPlan->getTotalNumberOfAssignment() . " AND subject='" . $newAssignmentPlan->getSubjectCode() . "' AND degreeStream='" . $newAssignmentPlan->getDegreeStream() . "' AND isActive=TRUE LIMIT 1";
            $assignmentPlanID = Database::executeQuery('root', '', $sqlQuery)[0]['planID'];

//        convert staff list string into array
            $staffList = explode("\n", $conductStaffList);
//        assign each staff member to assignment plan
            foreach ($staffList as $staff) {
                //@TODO change database credentials
                $sqlQuery = "INSERT INTO assignment_plan_conducted_by(staffID, assignmentPlanID) VALUES ('$staff',$assignmentPlanID)";
                $isSuccess = Database::executeQuery('root', '', $sqlQuery);
                if ($isSuccess)
                    Model::createAudit($sqlQuery, 'assignment_plan_conducted_by', 'INSERT', 'Add staff member to assignment #$assignmentPlanID');
            }
            echo("
                <script>alert('Assignment Plan Creation Successful.')</script>
            ");
        } catch (Exception $e) {
            echo("
                <script>alert('Failed to Create Assignment Plan.')</script>
            ");
        }
    }

    public static function loadAssignmentPlan():array{
//        initialization of returning array
        $assignmentPlanArray=array();
//        take user name of logged in user
        $userName=$_COOKIE['userName'];
//        find active assignment plan that belongs to particular user
        //@TODO change database credentials
        $sqlQuery="SELECT assignmentPlanID FROM assignment_plan_conducted_by WHERE staffID='$userName'";
        $assignmentIDs=Database::executeQuery('root','',$sqlQuery);

        foreach ($assignmentIDs as $assignmentID){
            //@TODO change database credentials
            $assignmentPlanID=$assignmentID['assignmentPlanID'];
            $sqlQuery="SELECT * FROM assignment_plan WHERE planID=$assignmentPlanID AND isActive=TRUE";
            $result=Database::executeQuery('root','',$sqlQuery)[0];
//            print_r($result);
//            create object for each assignment plan
            $newAssignmentPlan=new AssignmentPlan;
            $newAssignmentPlan->createAssignmentPlan($result['planID'],$result['subject'],$result['degreeStream'],$result['assignmentWeigh'],$result['totalAssignmentAmount'],$result['description']);
//            take out staff members conduct by each assignment plan
            //@TODO change database credentials
            $sqlQuery="SELECT staffID FROM assignment_plan_conducted_by WHERE assignmentPlanID=$assignmentPlanID";
            $staffList=Database::executeQuery('root','',$sqlQuery);
//            generate staff list and add those use object into staffArray
            $staffArray=array();
            foreach ($staffList as $staff){
                $staffMember=new User;
                $staffMember->setUserName($staff['staffID']);
                $staffArray[]=$staffMember;
            }
//            set staff list of assignment plan object
            $newAssignmentPlan->setAssignmentConductBy($staffArray);

//            finally add complete assignment plan object into returning array
            $assignmentPlanArray[]=$newAssignmentPlan;
        }
        return $assignmentPlanArray;
    }

}