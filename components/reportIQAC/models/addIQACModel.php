<?php
    class AddIQACModel extends Model{
        public static function getLecturer(){
            $sqlQuery = "SELECT userName,fullName FROM user WHERE role='AS'";
            return Database::executeQuery("root","",$sqlQuery);
        }

        public static function getSubject(){
            $sqlQuery = "SELECT courseCode,name FROM course_module";
            return Database::executeQuery("root","",$sqlQuery);
        }

        public static function uploadFile($pname,$staffID,$subject){
            $sql = "INSERT INTO iqac_report(staffID,fileLocation,subjectCode) VALUES('staffID','$pname','$subject')"; 
            print_r($sql);
        }
        
         
    }