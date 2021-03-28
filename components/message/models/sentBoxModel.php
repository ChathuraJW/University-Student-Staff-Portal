<?php
    class sentBoxModel extends Model{
         
        public static function sentBoxGetMessageData()
        {
            $userName=$_COOKIE['userName'];
            $sqlQueryGetTime = "SELECT * FROM message,user_receive_message WHERE message.messageID=user_receive_message.messageID AND message.sendBy='$userName'";
            $getDetail = Database::executeQuery("root","",$sqlQueryGetTime);
            echo($sqlQueryGetTime);

            if($getDetail){
                $getDeatilList = array();
                foreach($getDetail as $data){
                    $newDetail = new Message();
                    $newDetail->setMessageDetail($data['title'],$data['message'],$data['sendBy'],$data['messageID'],$data['receivedBy'],$data['isViewed'],$data['timestamp']);
                    $getDeatilList[] = $newDetail;
                }
                 
                return $getDeatilList;
            }else{
                return false;
            }


        }

         
         

         
             
        

         
        

        
    }
?>