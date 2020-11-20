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
            $insertQuery="INSERT INTO message( `title`, `message`, `timestamp`, `sendBy`) VALUES ('$title','$message',NOW(),'$sendBy')";
            $selectQuery="SELECT messageID FROM message WHERE title='$title' AND message='$message' AND sendBy='$sendBy'";
        
            Database::executeQuery("root","",$insertQuery );
            return Database::executeQuery("root","",$selectQuery )[0]['messageID'];
        }
        //create function to add data into messaage  table
         
        //return messageID
        public static function insertData($splitData,$addData)
        {
            foreach($splitData as $value){
                $insertSplitDataQuery="INSERT INTO user_receive_message(messageID,receivedBy) VALUE($addData,'$value')";
                 
                Database::executeQuery("root","",$insertSplitDataQuery );
            }

            
             
        }

        public static function getTime()
        {
            $sqlQueryGetTime = "SELECT * FROM message INNER JOIN user_receive_message ON message.messageID=user_receive_message.messageID";
            return Database::executeQuery("root","",$sqlQueryGetTime);
        }

    }

?>