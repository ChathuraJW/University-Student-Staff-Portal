<?php
    class sendMessageController extends Controller{
        public static function sendMessage(){
            $academic=sendMessageModel::getAcademic();
            $administrative=sendMessageModel::getAdministrative();
            $academicSupportive=sendMessageModel::getAcademicSupportive();
            $sendData=array($academic,$administrative,$academicSupportive);
             
            self::createView("sendMessageView",$sendData);
            if(isset($_POST['submit'])){
                $title=$_POST['title'];
                $message=$_POST['message'];
                $sendBy=$_COOKIE['userName'];
                //addd data to message table
                $addData=sendMessageModel::addData($title,$message,$sendBy);
                //take message id
                $contactList=$_POST['contacts']; abc,2012cs123,dfx
                split $contactList by ,
                foreach

                 
            }

             
             
        }
    }