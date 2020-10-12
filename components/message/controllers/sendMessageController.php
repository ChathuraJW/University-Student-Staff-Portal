<?php
    class sendMessageController extends Controller{
        public static function sendMessage(){
            self::createView("sendMessageView") ;
        }
    }