<?php
    class sendMessageModel extends Model{
        public static function getAcademic(){
            $sqlQuery = "SELECT userName,fullName FROM user WHERE role='AS'";
            $getAcademic = Database::executeQuery("root","",$sqlQuery);

            if($getAcademic){
                $getAcademicList = array();
                foreach($getAcademic as $data){
                    $newAcademic = new User();
                    $newAcademic->setUser(NULL,$data['fullName'],$data['userName'],NULL,NULL);
                    $getAcademicList[]=$newAcademic;
                }
                return $getAcademicList;
            }else{
                return false;
            }
    
        }

        public static function getAdministrative(){
            $sqlQuery = "SELECT userName,fullName FROM user WHERE role='AD'";
            $getAdministrative = Database::executeQuery("root","",$sqlQuery);

            if($getAdministrative){
                $getAdministrativeList = array();
                foreach($getAdministrative as $data){
                    $newAdministrative = new User();
                    $newAdministrative->setUser(NULL,$data['fullName'],$data['userName'],NULL,NULL);
                    $getAdministrativeList[]=$newAdministrative;
                }
                return $getAdministrativeList;
            }else{
                return false;
            }

        }

        public static function getAcademicSupportive(){
            $sqlQuery = "SELECT userName,fullName FROM user WHERE role='SP'";
            $getAcademicSupportive = Database::executeQuery("root","",$sqlQuery);

            if($getAcademicSupportive){
                $getAcademicSupportiveList = array();
                foreach($getAcademicSupportive as $data){
                    $newAcademicSupportive = new User();
                    $newAcademicSupportive->setUser(NULL,$data['fullName'],$data['userName'],NULL,NULL);
                    $getAcademicSupportiveList[]=$newAcademicSupportive;
                }
                return $getAcademicSupportiveList;
            }else{
                return false;
            }
        }

        public static function getStudent(){
            $sqlQuery = "SELECT userName,fullName FROM user WHERE role='ST'";
            $getStudent = Database::executeQuery("root","",$sqlQuery);

            if($getStudent){
                $getStudentList = array();
                foreach($getStudent as $data){
                    $newStudent = new User();
                    $newStudent->setUser(NULL,$data['fullName'],$data['userName'],NULL,NULL);
                    $getStudentList[]=$newStudent;
                }
                return $getStudentList;
            }else{
                return false;
            }
    
        }

        public static function addData($messageDetail){
            $databaseInstance = new Database();
            $databaseInstance->establishTransaction('root','');
            $insertQuery = "INSERT INTO message(`title`, `message`, `timestamp`, `sendBy`) VALUES ('".$messageDetail->getTitle()."','".$messageDetail->getMessage()."',NOW(),'".$messageDetail->getSendBy()."')";
            $databaseInstance->executeTransaction($insertQuery)[0]['messageID'];
            echo($insertQuery);

            //create audit trail
            $databaseInstance->transactionAudit($insertQuery,'message', 'INSERT',"Message details are uploaded to the system." );

            $selectQuery="SELECT messageID FROM message WHERE title='".$messageDetail->getTitle()."' AND message='".$messageDetail->getMessage()."' AND sendBy='".$messageDetail->getSendBy()."' ";
            $messageID= $databaseInstance->executeTransaction($selectQuery)[0]['messageID'];

            foreach($messageDetail->getReceivedBy() as $value){
                $insertSplitDataQuery="INSERT INTO user_receive_message(messageID,receivedBy) VALUE($messageID,'$value')";
                echo($insertSplitDataQuery);
                $databaseInstance->executeTransaction($insertSplitDataQuery);

            }

            //create audit trail
            $databaseInstance->transactionAudit($insertQuery,'user_receive_message', 'INSERT','Message details are uploaded to the system.' );
            
            //check transaction state
            if($databaseInstance->getTransactionState()){
                if($databaseInstance->commitToDatabase()){
                    echo ("<script>createToast('Success','Message details successfully send','S')</script>");
                    
                }else{
                    echo("<script>createToast('Warning(error code:#UM02-T)','Failed to send.','W')</script>");
                }
            }else{
                echo("<script>createToast('Warning(error code:#UM02-T)','Failed to send.','W')</script>");
            }
             
            //$selectQuery="SELECT messageID FROM message WHERE title='$title' AND message='$message' AND sendBy='$sendBy'";

            //$details = Database::executeQuery("root","",$selectQuery )[0]['messageID'];
            //if($details){
                //$newDetail = new Message();
                //$newDetail->setMessageDetail(NULL,NULL,NULL,$details['messageID'],NULL,NULL);
                //return $newDetail;
            //}else{
                //return false;
            //}

            $databaseInstance->closeConnection();
        }

        //create function to add data into messaage  table
         
        //return messageID
        // public static function insertData($receiverDetail)
        // {
        //     $databaseInstance = new Database();
        //     $databaseInstance->establishTransaction('root','');
        //     print_r($receiverDetail);
        //     foreach($receiverDetail->getReceivedBy() as $value){
        //         $insertSplitDataQuery="INSERT INTO user_receive_message(messageID,receivedBy) VALUE(".$receiverDetail->getMessageID().",'$value')";
        //         echo($insertSplitDataQuery);
        //         $databaseInstance->executeTransaction($insertSplitDataQuery);

        //     }
            
        //     //create audit trail
        //     $databaseInstance->transactionAudit($insertQuery,'user_receive_message', 'INSERT','Message details are uploaded to the system.' );

        //     //check transaction state
        //     if($databaseInstance->getTransactionState()){
        //         if($databaseInstance->commitToDatabase()){
        //             echo ("<script>createToast('Success','Message details successfully uploaded','S')</script>");
        //         }else{
        //             echo("<script>createToast('Warning(error code:#UM03-T)','Failed to upload.','W')</script>");
        //         }
        //     }else{
        //         echo("<script>createToast('Warning(error code:#UM03-T)','Failed to upload.','W')</script>");
        //     }

        //     $databaseInstance->closeConnection(); 
             
        // }

        /*public static function getTime()
        {
            $sqlQueryGetTime = "SELECT * FROM message INNER JOIN user_receive_message ON message.messageID=user_receive_message.messageID";
            return Database::executeQuery("generalAccess","generalAccess@16",$sqlQueryGetTime);
        }*/

    }

?>