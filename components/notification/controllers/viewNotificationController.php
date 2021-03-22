<?php
class ViewNotificationController extends Controller{

    public static function viewNotification(){

        if(isset($_POST['notificationName'])) {
            //
            $notificationType = $_POST['notificationName'];
//            print_r($notificationType);
            $sortedNotifications = viewNotificationModel::getSortedNotification($notificationType);
            self::createView("viewNotificationView",$sortedNotifications);

        }else{
            $allNotifications = viewNotificationModel::getAllNotifications();
            self::createView("viewNotificationView",$allNotifications);
        }
    }
}