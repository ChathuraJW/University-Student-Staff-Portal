<?php
    class sentBoxModel extends Model{
         
        public static function getTime()
        {
            $sqlQueryGetTime = "SELECT * FROM message INNER JOIN user_receive_message ON message.messageID=user_receive_message.messageID";
            return Database::executeQuery("root","",$sqlQueryGetTime);
        }

         
         

         
             
        

         
        

        
    }
?>