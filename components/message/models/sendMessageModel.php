<?php
    class sendMessageModel extends Model{
        public static function getData1()
        {
            $sqlQuery1 = "SELECT userName FROM user WHERE role='ac'";
            $data1=Database::executeQuery("root","",$sqlQuery1);
    
        }

        public static function getData2()
        {
            $sqlQuery2 = "SELECT userName FROM user WHERE role='ad'";
            $data2=Database::executeQuery("root","",$sqlQuery2);

        }

        public static function getData3()
        {
            $sqlQuery3 = "SELECT userName FROM user WHERE role='as'";
            $data3=Database::executeQuery("root","",$sqlQuery3);
        }
    }

?>