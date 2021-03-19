<?php
class HomeController extends Controller{
    public static function init(){
        $basicInfo=HomeModel::loadBasicInfo();
        $notifications = HomeModel::notification();
        $notificationCount = HomeModel::countNotification();
        $sendArray=array($basicInfo,$notifications,$notificationCount);
        print_r($notificationCount);
//        print_r($sendArray);
        self::createView("homeView",$sendArray);
    }
}