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
                $insertMessageState=receiveMessageModel::insertMessageState($messageID);
            }


        }
    } 