<?php
    class receiveMessageController extends Controller{
        public static function receiveMessage(){
            $getTitle = receiveMessageModel::getTitle();
            $getMessage = receiveMessageModel::getMessage();
            $getTime = receiveMessageModel::getTime();
            $getSendBy = receiveMessageModel::getSendBy();

            $sendData = array($getTitle,$getMessage,$getTime,$getSendBy);
            self::createView("receiveMessageView",$sendData);


        }
    }