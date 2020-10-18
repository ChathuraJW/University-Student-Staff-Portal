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
    }

?>