<?php
    class studentReceiveMessageController extends Controller{
        public static function studentReceiveMessage(){
            $getTime = studentReceiveMessageModel::getTime();
            /*$getTitle = receiveMessageModel::getTitle();
            $getMessage = receiveMessageModel::getMessage();
            $getSendBy = receiveMessageModel::getSendBy();*/
            
            /*$transferToView = array($getTime,$getTitle,$getMessage);*/
            
        

             
            self::createView("studentReceiveMessageView",$getTime);
            if(isset($_GET['activity'])){
                $messageID=$_GET['messageIDForReadConfirm'];
                $insertMessageState=receiveMessageModel::insertMessageState($messageID);
            }


        }
    } 