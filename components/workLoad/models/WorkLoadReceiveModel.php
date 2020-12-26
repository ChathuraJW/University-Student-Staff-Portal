<?php
    class WorkLoadReceiveModel extends Model{
        public static function getWorkLoadMessages($sign){
            // print_r($sign);
            $workLoadMessageList=array();
            $query="SELECT * FROM workload,academic_support_staff_workload,user WHERE academic_support_staff_workload.staffID='kek' AND academic_support_staff_workload.workloadID=workload.workloadID AND user.username='kek' AND academic_support_staff_workload.isChecked=$sign";
            $messages=Database::executeQuery("root","","$query");
            foreach($messages as $message){
                $newMessage= new AllocatedWorkload;
                
                $newMessage->setWorkLoad($message['workloadOwner'],$message['title'],$message['description'],$message['location'],$message['Date'],$message['fromTime'],$message['toTime'],$message['salutation'],$message['fullName'],$message['requestDate']);
                
                $workLoadMessageList[]=$newMessage;
                // print_r($workLoadMessageList);
            }
            return $workLoadMessageList;
        }

        
    }
?>