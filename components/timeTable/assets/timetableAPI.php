<?php
require_once('../../../assets/mvc/Database.php');
if(isset($_GET['username'])){
    $userName=$_GET['username'];
    $length=strlen($userName);
// start the transactions

// if($length>3){
//     $queryOne="SELECT studentGroup FROM student WHERE regNo='$userName'";
//     $group=Database::executeQuery("root","",$queryOne);
//     $groupNumber=$group[0]['studentGroup'];
    
//     $queryTwo="SELECT * FROM timetable WHERE relatedGroup='$groupNumber'";
//     $timetableData=Database::executeQuery("root","",$queryTwo);
//     // echo $timetableData;
// }

    $databaseInstance=new Database;
    $databaseInstance->establishTransaction('root','');

    if($length>3){
        $queryOne="SELECT studentGroup FROM student WHERE regNo='$userName'";
        $group=$databaseInstance->executeTransaction($queryOne);
        if($databaseInstance->getTransactionState()){
            $groupNumber=$group[0]['studentGroup'];
        
            $queryTwo="SELECT * FROM timetable WHERE relatedGroup='$groupNumber'";
            $timetableData=$databaseInstance->executeTransaction($queryTwo);
            if($databaseInstance->getTransactionState()){
                echo("<script>createToast('Success','Workload Allocated successfully.','S');</script>");
            }
            else{
                echo("<script>createToast('Warning (error code: #TTV01)','Timetable Data Selecting Failed.','W')</script>");
            }
            // $timetableData=Database::executeQuery("root","",$queryTwo);
        }
        else{
            echo("<script>createToast('Warning (error code: #TTV01)','Timetable Data Selecting Failed.','W')</script>");
        }
        // $group=Database::executeQuery("root","",$queryOne);
        
            //        close connection
            $databaseInstance->closeConnection();
    }
    else{
        $queryThree="SELECT * FROM staff_conduct_session,timetable WHERE staff_conduct_session.staffID='$userName' AND staff_conduct_session.eventID=timetable.eventID";
        $timetableData=Database::executeQuery("root","",$queryThree);
    }
    echo (json_encode($timetableData));
}
?>