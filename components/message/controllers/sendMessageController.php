<?php
    class sendMessageController extends Controller{
        public static function sendMessage(){
            $academic=sendMessageModel::getAcademic();
            $administrative=sendMessageModel::getAdministrative();
            $academicSupportive=sendMessageModel::getAcademicSupportive();
            $sendData=array($academic,$administrative,$academicSupportive);
            self::createView("sendMessageView",$sendData);

             
        }
    }