<?php
    class sendMessageModel extends Model{
        public static function getAcademic()
        {
            $sqlQuery1 = "SELECT userName,fullName FROM user WHERE role='ac'";
            return Database::executeQuery("root","",$sqlQuery1);
    
        }

        public static function getAdministrative()
        {
            $sqlQuery2 = "SELECT userName,fullName FROM user WHERE role='ad'";
            return Database::executeQuery("root","",$sqlQuery2);

        }

        public static function getAcademicSupportive()
        {
            $sqlQuery3 = "SELECT userName,fullName FROM user WHERE role='as'";
            return Database::executeQuery("root","",$sqlQuery3);
        }

        public static function addData($title,$message,$sendBy)
        {
            $insertQuery="INSERT INTO message( `title`, `message`, `timestamp`, `sendBy`) VALUES ($title,$message,NOW(),$sendBy)"
            $selectQuery5="SELECT messageID FROM message WHERE title=$title AND message=$message AND sendBy=$sendBy";
             
         
            return Database::executeQuery("root","",$selectQuery);
        }
        //create function to add data into messaage  table
         
        //return messageID
    }

?>