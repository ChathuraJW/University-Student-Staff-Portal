<?php
    class sendMessageController extends Controller{
        public static function sendMessage(){
            $data1=sendMessageModel::getData1();
            $data2=sendMessageModel::getData2();
            $data3=sendMessageModel::getData3();
            self::createView("sendMessageView",$data1,$data2,$data3);
        }
    }