<?php
    class sendMessageController extends Controller{
        public static function sendMessage(){
            $academic=sendMessageModel::getAcademic();
            $administrative=sendMessageModel::getAdministrative();
            $academicSupportive=sendMessageModel::getAcademicSupportive();
            $student=sendMessageModel::getStudent();
            $sendData=array($academic,$administrative,$academicSupportive,$student);
                         
            self::createView("sendMessageView",$sendData);
            if(isset($_POST['submit'])){
                $title=$_POST['title'];
                $message=$_POST['message'];
                $sendBy=$_COOKIE['userName'];
                 
                if(!$title || !$message || !$sendBy){
                    echo("<script>createToast('Warning(error code:#UM01-T)','Failed to get inputs.','W')</script>"); 
                }else{
                    //addd data to message table
                $contacts=$_POST['contacts'];
                $indexListString = trim($contacts,' ');
                $splitData=(explode(" ",$indexListString));
                $messageDetail = new Message();
                $messageDetail->setMessageDetail($title,$message,$sendBy,NULL,$splitData,NULL,NULL);
                $addDetail = sendMessageModel::addData($messageDetail);
                print_r($addDetail);
                //$contacts=$_POST['contacts'];
                //$indexListString = trim($contacts,' ');
                //$splitData=(explode(" ",$indexListString));
                //print_r($splitData);
                //$receiverDetail = new Message();
                //$receiverDetail->setMessageDetail(NULL,NULL,NULL,$addDetail,$splitData,NULL);
                //$insertData = sendMessageModel::insertData($receiverDetail);
            
                //send notification
                $informConfirmation = new Notification;
                $informConfirmation->setReceivers($splitData);
                $informConfirmation->setSender($_COOKIE['userName']);
                $informConfirmation->createNotification($messageDetail->getTitle(), $messageDetail->getMessage());
                $informConfirmation->publishNotification(false);
                }
                 

                
                 

                  
            }


            

             
             
        }

    
    }
    ?>