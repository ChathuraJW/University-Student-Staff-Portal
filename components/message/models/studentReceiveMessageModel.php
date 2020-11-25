<?php
    class studentReceiveMessageModel extends Model{
        public static function getTime()
        {
            $sqlQueryGetTime = "SELECT * FROM message INNER JOIN user_receive_message ON message.messageID=user_receive_message.messageID";
            return Database::executeQuery("generalAccess","generalAccess@16",$sqlQueryGetTime);
        }

         

        public static function insertMessageState($messageID){
            $userName=/*$_COOKIE['userName']*/'2018cs183';
            $sqlQueryMessageState="UPDATE user_receive_message SET isViewed=1 WHERE messageID=$messageID AND receivedBy='$userName'";
            $isUpdated=Database::executeQuery("generalAccess","generalAccess@16",$sqlQueryMessageState);
            if($isUpdated){
                //create audit trail
                self::createAudit($sqlQueryMessageState,'user_receive_message',"UPDATE",'Change the state of the message. (not view->view)');
                echo ("<script>prompt('State successfully updated.')</script>");
            }

             
        }

         
        

        
    }