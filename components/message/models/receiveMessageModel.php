<?php
    class receiveMessageModel extends Model{
        public static function getMessageData()
        {
            $userName=$_COOKIE['userName'];
            $sqlQueryGetTime = "SELECT * FROM message INNER JOIN user_receive_message ON message.messageID=user_receive_message.messageID AND user_receive_message.receivedBy='$userName'";
            $getDetail = Database::executeQuery("root","",$sqlQueryGetTime);

            if($getDetail){
                $newDetail = new Message();
                $newDetail->setMessageDetail($getDetail['title'],$getDetail['message'],$getDetail['sendBy'],$getDetail['messageID'],$getDetail['receivedBy'],$getDetail['isViewed']);
                return $newDetail;
            }else{
                return false;
            }
        }

         

        public static function insertMessageState($messageDetail){
            $databaseInstance = new Database();
            $databaseInstance->establishTransaction('root','');

            $userName=$_COOKIE['userName'];
            $sqlQueryMessageState="UPDATE user_receive_message SET isViewed=1 WHERE messageID=$messageDetail->getMessageID() AND receivedBy='$userName'";
            $isUpdated=$databaseInstance->executeTransaction($sqlQueryMessageState);

            //create audit trail
            $databaseInstance->transactionAudit($sqlQueryMessageState,'user_receive_message', 'UPDATE',"Change the state of the message. (not view->view)." );

            //check transaction state
            if($databaseInstance->getTransactionState()){
                if($databaseInstance->commitToDatabase()){
                    echo ("<script>createToast('Success','Successfully updated the state','S')</script>");
                }else{
                    echo("<script>createToast('Warning(error code:#UM04-T)','Failed to updated.','W')</script>");
                }
            }else{
                echo("<script>createToast('Warning(error code:#UM04-T)','Failed to updated.','W')</script>");
            }

             

             
        }
}