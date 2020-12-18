<?php
class ContactUnionController extends Controller{
    public static function init(){
    	$messageData=ContactUnionModel::getMessageData();
        self::createView('contactUnionView',$messageData);
    }
}