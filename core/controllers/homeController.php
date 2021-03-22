<?php
class HomeController extends Controller{
    public static function init(){
        $basicInfo=HomeModel::loadBasicInfo();
        $notifications = HomeModel::notification();
        $notificationCount = HomeModel::countNotification();
        $academicSchedule = HomeModel::timetable();
        $userRole = HomeModel::getRole();
        $sendArray=array($basicInfo,$notifications,$notificationCount,$academicSchedule,$userRole);
        self::createView("homeView",$sendArray);
    }
}