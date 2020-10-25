<?php
class HomeController extends Controller{
    public static function init(){
        $basicInfo=HomeModel::loadBasicInfo();
        $sendArray=array($basicInfo,array());
//        print_r($sendArray);
        self::createView("homeView",$sendArray);
    }
}