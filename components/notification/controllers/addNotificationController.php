<?php
require_once "assets/Notification.php";
class AddNotificationController extends Controller{

    public static function addNotification(){
        $newNotification = new Notification();
        $newNotification->createNotification('Hi','shubangi');
        $newNotification->setSender('asd');
        $newNotification->setTimeout(4);
        $newNotification->setReceivers(array('2018cs136','2018cs134'));
        $newNotification->publishNotification();

        self::createView("addNotificationView");

        if(isset($_POST['send'])){
//            echo("hi");
            $notificationTitle = $_POST['title'];
            $notificationContent = $_POST['message'];
            $notificationCategory = $_POST['category'];
//            $targetAudience = $_POST[''];
            print_r("$notificationTitle $notificationContent $notificationCategory");
        }
    }

}