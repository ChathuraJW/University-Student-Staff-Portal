<?php
class ContactUnionController extends Controller{
    public static function init(){
    	$messageData=ContactUnionModel::getMessageData();
        self::createView('contactUnionView',$messageData);
        if(isset($_POST['sendMessage'])){
        	$newUnionMessage=new ContactUnion;
        	$newUnionMessage->setBasicMessage($_POST['messageTitle'],$_POST['messageContent'],$_COOKIE['userName']);
            ContactUnionModel::createMail($newUnionMessage);
        }
    }
}