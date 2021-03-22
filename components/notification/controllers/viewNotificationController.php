<?php
class ViewNotificationController extends Controller{

    public static function viewNotification(){

        $notificationCount = viewNotificationModel::getNotificationCount();
        if(isset($_POST['notificationName'])) {
            //
            $notificationType = $_POST['notificationName'];
//            print_r($notificationType);
            $sortedNotifications = viewNotificationModel::getSortedNotification($notificationType);
            $controllerData = array($sortedNotifications,$notificationCount);
            self::createView("viewNotificationView",$controllerData);

        }elseif (isset($_POST['search'])){
            $keyWord = $_POST['keyWord'];
            $searchResult = viewNotificationModel::search($keyWord);
            echo $keyWord;
            $controllerData = array($searchResult,$notificationCount);
            self::createView("viewNotificationView",$controllerData);

        }else{
            $allNotifications = viewNotificationModel::getAllNotifications();
            $controllerData = array($allNotifications,$notificationCount);
            self::createView("viewNotificationView",$controllerData);
        }
    }
}