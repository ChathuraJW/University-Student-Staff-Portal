<?php
    class studentSendMessageController extends Controller{
        public static function studentSendMessage(){
            $getStudent=studentSendMessageModel::getStudent();
            $getTime = studentSendMessageModel::getTime();
            $sendData=array($getStudent,$getTime);
            
             
            self::createView("studentSendMessageView",$sendData);
            if(isset($_POST['submit'])){
                $title=$_POST['title'];
                $message=$_POST['message'];
                $sendBy="2018cs183";//$_COOKIE['userName'];
                //addd data to message table
                $addData=studentSendMessageModel::addData($title,$message,$sendBy);
                
                $contacts=$_POST['contacts'];
                $splitData=explode(" ",trim($contacts," "));
                print_r($splitData);
            
                $insertData=studentSendMessageModel::insertData($splitData,$addData);

                
                 

                  
            }


            

             
             
        }

    
    }
    ?>