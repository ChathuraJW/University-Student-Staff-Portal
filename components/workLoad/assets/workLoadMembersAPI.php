<?php
require_once('../../../assets/mvc/Database.php');
if(isset($_GET['fromDate'])){
    $fromDate=$_GET['fromDate'];
    $fromTime=$_GET['fromTime'];
    // $toDate=$_GET['toDate'];
    $toTime=$_GET['toTime'];
    $fromDate = date('d-m-Y', strtotime($_GET['fromDate']));
    // $fromTime = date('H:m:s', strtotime($_GET['fromTime']));
//this query for select members who has free time slot that require 
    $timeStamp=strtotime($fromDate);
    $dayName=strtoupper(date('D',$timeStamp));

    $freeStaffSet=array();
    $queryOne="SELECT userName FROM user WHERE role='SP'";
    $staffMembers=Database::executeQuery("root","",$queryOne);
    foreach($staffMembers as $staffMember){
        $value=0;
        $queryTwo="SELECT eventID FROM staff_conduct_session WHERE staffID='".$staffMember['userName']."'";
        $events=Database::executeQuery("root","",$queryTwo);
        foreach($events as $event){
            $queryThree="SELECT * FROM timetable WHERE eventID='".$event['eventID']."' AND day='$dayName' AND ((fromTime<='$fromTime' AND toTime>='$toTime') OR (fromTime>='$fromTime' AND toTime<='$toTime'))";
            $data=Database::executeQuery("root","",$queryThree);
            if($data){
                $value=1;
            }
        }
        if($value==0){
            $freeStaffSet[]=$staffMember['userName'];
        }
    }
    $staffDataSet=array();
    foreach($freeStaffSet as $freeStaff){
        $queryFour="SELECT * FROM user WHERE userName='".$freeStaff."'";
        $staffData=Database::executeQuery("root","",$queryFour);
        
        $staffDataSet[]=$staffData;
    }
    // $query="SELECT * FROM user";
    // $data=Database::executeQuery("root","","$query");
    // echo (json_encode($data));
    echo (json_encode($staffDataSet));

}
?>