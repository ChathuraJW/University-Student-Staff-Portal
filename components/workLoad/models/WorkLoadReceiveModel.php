<?php
    class WorkLoadReceiveModel extends Model{
        public static function getWorkLoadMessages($sign){
            $username=$_COOKIE['userName'];
            // print_r($sign);
            $workLoadMessageList=array();
            if($sign==1){
                $current=date("Y-m-d");
                $date= date('Y-m-d',strtotime('-2 week',strtotime($current)));
            }
            else{
                $date=date('Y-m-d');
            }
            $query="SELECT * FROM workload,academic_support_staff_workload,user WHERE academic_support_staff_workload.staffID='".$username."' AND academic_support_staff_workload.workloadID=workload.workloadID AND user.username=workload.workloadOwner AND academic_support_staff_workload.isChecked=".$sign." AND workload.Date>='$date'";
            $messages=Database::executeQuery("academicSupportiveGeneral","academicSupportiveGeneral@16","$query");
            foreach($messages as $message){
                $newMessage= new AllocatedWorkload;
                
                $newMessage->setWorkLoad($message['workloadOwner'],$message['title'],$message['description'],$message['location'],$message['Date'],$message['fromTime'],$message['toTime'],$message['salutation'],$message['fullName'],$message['requestDate'],$message['workloadID']);
                
                $workLoadMessageList[]=$newMessage;
                // print_r($workLoadMessageList);
            }
            return $workLoadMessageList;
        }
      //  // reply function

        public static function setReply($reply,$workloadID,$response,$username){
            $databaseInstance=new Database;
            $databaseInstance->establishTransaction('root','');
            $query="UPDATE academic_support_staff_workload SET reply='".$reply."',isChecked=1,response='".$response."' WHERE workloadID=".$workloadID." AND staffID='".$username."'";
            
            $databaseInstance->executeTransaction($query);

            if($databaseInstance->getTransactionState()){

                $databaseInstance->transactionAudit($query,"academic_support_staff_workload" , "UPDATE", "View the Workload Request");
                
                if($databaseInstance->getTransactionState()){
                    if($databaseInstance->commitToDatabase()){
        //                display success message
                        echo("<script>createToast('Success','Replied to Workload Message successfully.','S');</script>");
                    }
                }
                else{
    //                display fail message
                    echo("<script>createToast('Warning (error code: #WLR01)','Failed to Reply .','W');</script>");
                }
            }
            else{
                echo("<script>createToast('Warning (error code: #WLR01)','Failed to Reply  .','W');</script>");

            }
            $databaseInstance->closeConnection();

        }
        public static function setMyWorkload($title,$location,$date,$fromTime,$toTime,$description){
            $date=date('Y-m-d');
            $userName=$_COOKIE['userName'];
            $dbInstanceOne=new Database;
            $dbInstanceOne->establishTransaction('root','');
            $queryOne="INSERT INTO workload(workloadOwner,title,description, location, Date, fromTime, toTime, requestDate, checkValue) VALUES ('$userName','$title','$description','$location','$date','$fromTime','$toTime','$date',1)";
            $dbInstanceOne->executeTransaction($queryOne);
            $dbInstanceOne->transactionAudit($queryOne,"academic_support_staff_workload" , "INSERT", "Own workload inserted");
            
            
            if($dbInstanceOne->commitToDatabase()){
                $queryTwo="SELECT workloadID FROM workload WHERE workloadOwner='$userName' AND requestDate='$date' AND description='$description' AND location='$location' AND Date='$date' AND fromTime='$fromTime' AND toTime='$toTime' LIMIT 1";
                $id=Database::executeQuery('root','',$queryTwo)[0]['workloadID'];
                $dbInstanceTwo=new Database;
                $dbInstanceTwo->establishTransaction('root','');
                $queryThree="INSERT INTO academic_support_staff_workload(staffID, workloadID, allocationTimestamp, isChecked, response) VALUES ('$userName','$id',NOW(),1,'A')";
                $dbInstanceTwo->executeTransaction($queryThree);
                $dbInstanceTwo->transactionAudit($queryThree,"workload" , "INSERT", "Own workload inserted");
                if($dbInstanceTwo->commitToDatabase()){
    //                display success message
                    echo("<script>createToast('Success','Create own Workload Message successfully.','S');</script>");
                }
                else{
                    echo("<script>createToast('Warning (error code: #WLR02)','Failed to Create  .','W');</script>");
    
                }
            }
            else{
                echo("<script>createToast('Warning (error code: #WLR02)','Failed to Create  .','W');</script>");

            }
            $dbInstanceOne->closeConnection();
            $dbInstanceTwo->closeConnection();
            
            
        }
    }
?>