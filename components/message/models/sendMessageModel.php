<?php
    class sendMessageModel extends Model{
        public static function getAcademic(){
            $sqlQuery = "SELECT userName,fullName FROM user WHERE role='AS'";
            return Database::executeQuery("generalAccess","generalAccess@16",$sqlQuery);
    
        }

        public static function getAdministrative(){
            $sqlQuery = "SELECT userName,fullName FROM user WHERE role='AD'";
            return Database::executeQuery("generalAccess","generalAccess@16",$sqlQuery);

        }

        public static function getAcademicSupportive(){
            $sqlQuery = "SELECT userName,fullName FROM user WHERE role='SP'";
            return Database::executeQuery("generalAccess","generalAccess@16",$sqlQuery);
        }

        public static function getStudent(){
            $sqlQuery = "SELECT userName,fullName FROM user WHERE role='ST'";
            return Database::executeQuery("generalAccess","generalAccess@16",$sqlQuery);
    
        }

        public static function addData($title,$message,$sendBy){
            $insertQuery="INSERT INTO message( `title`, `message`, `timestamp`, `sendBy`) VALUES ('$title','$message',NOW(),'$sendBy')";
            $selectQuery="SELECT messageID FROM message WHERE title='$title' AND message='$message' AND sendBy='$sendBy'";
        
            Database::executeQuery("generalAccess","generalAccess@16",$insertQuery );
            return Database::executeQuery("generalAccess","generalAccess@16",$selectQuery )[0]['messageID'];
        }
        //create function to add data into messaage  table
         
        //return messageID
        public static function insertData($splitData,$addData)
        {
            foreach($splitData as $value){
                $insertSplitDataQuery="INSERT INTO user_receive_message(messageID,receivedBy) VALUE($addData,'$value')";
                 
                Database::executeQuery("generalAccess","generalAccess@16",$insertSplitDataQuery );
            }

            
             
        }

        /*public static function getTime()
        {
            $sqlQueryGetTime = "SELECT * FROM message INNER JOIN user_receive_message ON message.messageID=user_receive_message.messageID";
            return Database::executeQuery("generalAccess","generalAccess@16",$sqlQueryGetTime);
        }*/

    }

?>