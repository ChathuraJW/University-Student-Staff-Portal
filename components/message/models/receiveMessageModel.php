<?php
    class receiveMessageModel extends Model{
        public static function getMessageData()
        {
            $userName=$_COOKIE['userName'];
            $sqlQueryGetTime = "SELECT * FROM message INNER JOIN user_receive_message ON message.messageID=user_receive_message.messageID AND user_receive_message.receivedBy='$userName'";
            return Database::executeQuery("generalAccess","generalAccess@16",$sqlQueryGetTime);
        }

         

        public static function insertMessageState($messageID){
            $userName=$_COOKIE['userName'];
            $sqlQueryMessageState="UPDATE user_receive_message SET isViewed=1 WHERE messageID=$messageID AND receivedBy='$userName'";
            $isUpdated=Database::executeQuery("generalAccess","generalAccess@16",$sqlQueryMessageState);
            if($isUpdated){
                //create audit trail
                self::createAudit($sqlQueryMessageState,'user_receive_message',"UPDATE",'Change the state of the message. (not view->view)');
                echo ("<script>prompt('State successfully updated.')</script>");
            }

             
        }
}