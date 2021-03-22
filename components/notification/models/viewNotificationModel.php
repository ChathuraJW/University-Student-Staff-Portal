<?php


class viewNotificationModel extends Model {

    public static function getAllNotifications():array|bool{
        $userName = $_COOKIE['userName'];

        $userName = 'kpk';
//        print_r($userName);
        $sqlQuery = "SELECT * FROM notification WHERE reciever='$userName' AND isValid=1 ORDER by notificationID DESC ,isViewed";
        $notificationList =  Database::executeQuery('root','',$sqlQuery);
//        print_r($notificationList);

        if ($notificationList) {
            return self::returnNotification($notificationList);
        } else {
            return false;
        }


    }

    public static function getSortedNotification($notificationType):array|bool{
        $userName = $_COOKIE['userName'];
        $userName = 'kpk';
        $sqlQuery = "SELECT * FROM notification WHERE reciever='$userName' AND isValid=1 AND notificationType=$notificationType ORDER by notificationID DESC ,isViewed";
        $notificationList = Database::executeQuery("root",'',$sqlQuery);
//        print_r($notificationList);
        if($notificationList){
            return self::returnNotification($notificationList);
        }else{
            return false;
        }
    }

    public static function returnNotification($notificationList):array{
        $notifications = array();
        //read subject list and add them into above array as CourseModule objects
        foreach ($notificationList as $row) {
            $notification = new Notification() ;
            $notification->createNotification($row['title'], $row['content']);
            $notification->setSender($row['sender']);
//            echo ($row['timestamp']);
            $notification->setTimeStamp($row['timestamp']);
            $notifications[] = $notification;
        }
        return $notifications;
    }

}