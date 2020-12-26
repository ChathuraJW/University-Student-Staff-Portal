<?php
require_once('../../../assets/mvc/Database.php');
if(isset($_GET['fromDate'])){
    $fromDate=$_GET['fromDate'];
    $fromTime=$_GET['fromTime'];
    // $toDate=$_GET['toDate'];
    $toTime=$_GET['toTime'];
//this query for select members who has free time slot that require 
    $timeStamp=strtotime($fromDate);
    $dayName=date('l',$timeStamp);

    if($dayName=="Monday"){
        $day=1;
    }
    else if($dayName=="Tuesday"){
        $day=2;
    }
    else if($dayName=="Wednesday"){
        $day=3;
    }
    else if($dayName=="Thursday"){
        $day=4;
    }
    else if($dayName=="Friday"){
        $day=5;
    }
    $freeStaffSet=array();
    $queryOne="SELECT userName FROM user WHERE role='SP'";
    $staffMembers=Database::executeQuery("root","","$queryOne");
    foreach($staffMembers as $staffMember){
        $value=0;
        $queryTwo="SELECT eventID FROM staff_conduct_session WHERE staffID='$staffMember'";
        $events=Database::executeQuery("root","","$queryTwo");
        foreach($events as $event){
            $queryThree="SELECT * FROM timetable WHERE eventID='$event' AND day='$day' AND fromTime='$fromTime' AND toTime='$toTime'";
            $data=Database::executeQuery("root","","$queryThree");
            if($data){
                $value=1;
            }
        }
        if($value==0){
            $freeStaffSet[]=$staffMember;
        }
    }
    $staffDataSet=array();
    foreach($freeStaffSet as $freeStaff){
        $staffData=Database::executeQuery("root","","SELECT * FROM user WHERE userName='$freeStaff'");
        $staffDataSet[]=$staffData;
    }
    // $query="SELECT * FROM user";
    // $data=Database::executeQuery("root","","$query");
    // echo (json_encode($data));
    echo (json_encode($staffDataSet));

}
?>