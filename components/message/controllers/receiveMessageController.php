<?php
    class receiveMessageController extends Controller{
        public static function receiveMessage(){
            $getMessageData = receiveMessageModel::getMessageData();
            /*$getTitle = receiveMessageModel::getTitle();
            $getMessage = receiveMessageModel::getMessage();
            $getSendBy = receiveMessageModel::getSendBy();*/
            
            /*$transferToView = array($getTime,$getTitle,$getMessage);*/
            
        

             
            self::createView("receiveMessageView",$getMessageData);
            if(isset($_GET['activity'])){
                $messageID=$_GET['messageIDForReadConfirm'];

                if(!$messageID){
                    echo("<script>createToast('Warning(error code:#UM03-T)','Failed to get messageID.','W')</script>");
                }

                //$messageDetail = new Message();
                //$messageDetail->setMessageDetail(NULL,NULL,NULL,$messageID,NULL,NULL,NULL);
                $insertMessageState = receiveMessageModel::insertMessageState($messageID);
            
            }


        }
    } 