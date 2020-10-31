<?php
    class receiveMessageModel extends Model{
        public static function getTitle()
        {
            $sqlQueryGetTitle = "SELECT title FROM message";
            return Database::executeQuery("root","",$sqlQueryGetTitle);
        }
        
        public static function getMessage()
        {
            $sqlQueryGetMsg = "SELECT message FROM message";
            return Database::executeQuery("root","",$sqlQueryGetMsg);
        }

        public static function getTime()
        {
            $sqlQueryGetTime = "SELECT timestamp FROM message";
            return Database::executeQuery("root","",$sqlQueryGetTime);
        }

        public static function getSendBy()
        {
            $sqlQueryGetSendBy = "SELECT sendBy FROM message";
            return Database::executeQuery("root","",$sqlQueryGetSendBy);
        }
        
    }