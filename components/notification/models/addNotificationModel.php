<?php

class AddNotificationModel extends Model{

    public static function saveNotificationDetails($senderRegNo, $notificationTitle,$notificationContent, $weeks, $notificationCategory, $receivers){
        $newNotification = new Notification();
        $newNotification->createNotification($notificationTitle,$notificationContent);
        $newNotification->setSender($senderRegNo);
        $newNotification->setTimeout($weeks);
//        $newNotification->setReceivers(array('2018cs136','2018cs134'));
        $newNotification->publishNotification();
    }
}