<?php
    class studentSendMessageModel extends Model{
        public static function getStudent()
        {
            $sqlQuery1 = "SELECT userName,fullName FROM user WHERE role='st'";
            return Database::executeQuery("root","",$sqlQuery1);
    
        }

        

        public static function addData($title,$message,$sendBy)
        {
            $insertQuery="INSERT INTO message( `title`, `message`, `timestamp`, `sendBy`) VALUES ('$title','$message',NOW(),'$sendBy')";
            
            $selectQuery="SELECT messageID FROM message WHERE title='$title' AND message='$message' AND sendBy='$sendBy'";
        
            $isExecuted=Database::executeQuery("root","",$insertQuery );
            print_r($isExecuted);
            $query=Database::executeQuery("root","",$selectQuery )[0]['messageID'];
            return $query;
        }
        //create function to add data into messaage  table
         
        //return messageID
        public static function insertData($splitData,$addData)
        {
            foreach($splitData as $value){
                $insertSplitDataQuery="INSERT INTO user_receive_message(messageID,receivedBy) VALUE($addData,'$value')";
                print_r($insertSplitDataQuery);
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