<?php
class HomeController extends Controller{
    public static function init(){
        $basicInfo=HomeModel::loadBasicInfo();
        $notifications = HomeModel::notification();
        $notificationCount = HomeModel::countNotification();
        $academicSchedule = HomeModel::timetable();
        $userRole = HomeModel::getRole();
        $sendArray=array($basicInfo,$notifications,$notificationCount,$academicSchedule,$userRole);
//        print_r($notificationCount);
//        print_r($sendArray);
//        print_r($academicSchedule);
        self::createView("homeView",$sendArray);
    }
}