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
            echo $query;
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
    }
?>