<?php
//require_once "assets/Notification.php";
class AddNotificationController extends Controller{

    public static function addNotification(){
//        $newNotification = new Notification();
//        $newNotification->createNotification('Hi','shubangi');
//        $newNotification->setSender('asd');
//        $newNotification->setTimeout(4);
//        $newNotification->setReceivers(array('2018cs136','2018cs134'));
//        $newNotification->publishNotification();

        self::createView("addNotificationView");

        if(isset($_POST['send'])){
            $notificationTitle = $_POST['title'];
            $notificationContent = $_POST['message'];
            $notificationCategory = $_POST['category'];
            $weeks = $_POST['weeks'];

            if(!empty($_POST['receiverList'])){

            // Loop to store and display values of individual checked checkbox.
                $receiversTemp = array();
                $temp =0;
                foreach($_POST['receiverList'] as $selected){
//                    echo $selected."</br>";
                    if($selected == '1100'){ // all users
                        $receiversTemp[] = $selected;
                        break;
                    }elseif ($selected == '1200'){// all students
                        $receiversTemp[] = $selected;
                        break;
                    }elseif($selected == '1210'){// first years
                        $receiversTemp[] = $selected;
                        $temp = 3;
                        continue;
                    }elseif($selected == '1220'){// second years
                        $receiversTemp[] = $selected;
                        $temp = 3;
                        continue;
                    }elseif($selected == '1230'){// third years
                        $receiversTemp[] = $selected;
                        $temp = 2;
                        continue;
                    }elseif($selected == '1240'){// fourth years
                        $receiversTemp[] = $selected;
                        $temp = 3;
                        continue;
                    }elseif($temp == 0){
                        $receiversTemp[] = $selected;
                    }else{
                        $temp--;
                    }


                }
                print_r($receiversTemp);
            }
//            print_r("$notificationTitle $notificationContent $notificationCategory,$weeks");

        }
    }

}