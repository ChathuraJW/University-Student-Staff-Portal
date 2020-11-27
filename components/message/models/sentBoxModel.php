<?php
    class sentBoxModel extends Model{
         
        public static function sentBoxGetMessageData()
        {
            $userName=$_COOKIE['userName'];
            $sqlQueryGetTime = "SELECT * FROM message INNER JOIN user_receive_message ON message.messageID=user_receive_message.messageID AND message.sendBy='$userName'";
            return Database::executeQuery("generalAccess","generalAccess@16",$sqlQueryGetTime);
        }

         
         

         
             
        

         
        

        
    }
?>