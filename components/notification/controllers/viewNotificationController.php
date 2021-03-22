<?php
class ViewNotificationController extends Controller{

    public static function viewNotification(){
        $allNotifications = viewNotificationModel::getAllNotifications();
        self::createView("viewNotificationView",$allNotifications);

        if(isset($_POST['notificationName'])) {
            //
            $notificationType = $_POST['notificationName'];
            print_r($notificationType);
        }
    }
}