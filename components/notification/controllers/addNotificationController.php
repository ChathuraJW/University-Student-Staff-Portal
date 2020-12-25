<?php
class AddNotificationController extends Controller{

    public static function addNotification(){
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