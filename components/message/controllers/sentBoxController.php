<?php
    class sentBoxController extends Controller{
        public static function sentBox(){
            
                $getTime = sentBoxModel::sentBoxGetMessageData();
                 
                /*$getTitle = receiveMessageModel::getTitle();
                $getMessage = receiveMessageModel::getMessage();
                $getSendBy = receiveMessageModel::getSendBy();*/
                
                 
                
            
    
                 
                self::createView("sentBoxView",$getTime);
                 
             


        }
    } 