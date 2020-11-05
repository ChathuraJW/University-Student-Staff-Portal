<?php
    class receiveMessageController extends Controller{
        public static function receiveMessage(){
            $getTitle = receiveMessageModel::getTitle();
            $getMessage = receiveMessageModel::getMessage();
            $getTime = receiveMessageModel::getTime();
            $getSendBy = receiveMessageModel::getSendBy();

             
            self::createView("receiveMessageView",$getTitle,$getMessage,$getTime,$getSendBy);


        }
    } 