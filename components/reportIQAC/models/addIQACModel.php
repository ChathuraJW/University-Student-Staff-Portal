<?php
    class ReceiveMessageModel extends Model{
        public static function getTime()
        {
            $sqlQueryGetTime = "SELECT * FROM message INNER JOIN user_receive_message ON message.messageID=user_receive_message.messageID";
            return Database::executeQuery("root","",$sqlQueryGetTime);
        }

        /*public static function getTitle()
        {
            $sqlQueryGetTitle = "SELECT title FROM message INNER JOIN user_receive_message ON message.messageID=user_receive_message.messageID";
            return Database::executeQuery("root","",$sqlQueryGetTitle);
        }
        
        public static function getMessage()
        {
            $sqlQueryGetMsg = "SELECT message FROM message INNER JOIN user_receive_message ON message.messageID=user_receive_message.messageID";
            return Database::executeQuery("root","",$sqlQueryGetMsg);
        }

        

        public static function getSendBy()
        {
            $sqlQueryGetSendBy = "SELECT sendBy FROM message INNER JOIN user_receive_message ON message.messageID=user_receive_message.messageID";
            return Database::executeQuery("root","",$sqlQueryGetSendBy);
        }*/
        
    }