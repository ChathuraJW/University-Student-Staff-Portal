<?php
    class receiveMessageController extends Controller{
        public static function receiveMessage(){
            $getTime = receiveMessageModel::getTime();
            /*$getTitle = receiveMessageModel::getTitle();
            $getMessage = receiveMessageModel::getMessage();
            $getSendBy = receiveMessageModel::getSendBy();*/
            
            /*$transferToView = array($getTime,$getTitle,$getMessage);*/
            
        

             
            self::createView("receiveMessageView",$getTime);


        }
    } 