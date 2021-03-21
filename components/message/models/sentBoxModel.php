<?php
    class sentBoxModel extends Model{
         
        public static function sentBoxGetMessageData()
        {
            $userName=$_COOKIE['userName'];
            $sqlQueryGetTime = "SELECT * FROM message INNER JOIN user_receive_message ON message.messageID=user_receive_message.messageID AND message.sendBy='$userName'";
            $getDetail = Database::executeQuery("root","",$sqlQueryGetTime);

            if($getDetail){
                $newDetail = new Message();
                $newDetail->setMessageDetail($getDetail['title'],$getDetail['message'],$getDetail['sendBy'],$getDetail['messageID'],$getDetail['receivedBy'],$getDetail['isViewed']);
                return $newDetail;
            }else{
                return false;
            }
        }

         
         

         
             
        

         
        

        
    }
?>