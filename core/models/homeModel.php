<?php
class HomeModel extends Model{
    public static function loadBasicInfo(){
        $userName=$_COOKIE['userName'];
        $sqlQuery="SELECT gender, salutation, firstName, lastName, personalEmail, universityEmail,salutation,gender,profilePicURL FROM user WHERE userName='$userName'";
        $resultUser=Database::executeQuery('generalAccess','generalAccess@16',$sqlQuery);
        if($_COOKIE['role']==='ST'){
            $sqlQuery="SELECT currentGPA FROM student WHERE regNo='$userName'";
            $resultGPA=Database::executeQuery('student','student@16',$sqlQuery)[0]['currentGPA'];
        }else{
            $resultGPA=0.0000;
        }
        $resultUser[0]['currentGPA']=$resultGPA;
        return $resultUser;
    }

    public static function notification(){
        $userName=$_COOKIE['userName'];
        $sqlQuery = "SELECT notificationID FROM user_view_notification WHERE userName='$userName' AND isViewed=0 ORDER BY notificationID DESC LIMIT 8";
        $notificationIdList = Database::executeQuery('root','',$sqlQuery);

        $notificationArray = array();
        foreach($notificationIdList as $notificationId){
             $notificationId = $notificationId['notificationID'];
             print_r($notificationId);
            $sqlQuery = "SELECT title,content,timestamp,publishedByUser FROM notification_detail WHERE notificationID=$notificationId AND isValid=1";
            $notificationContent = Database::executeQuery('root','',$sqlQuery);
            $notificationArray[]= $notificationContent;
        }
//        print_r($notificationArray);
        return $notificationArray;
    }
    public static function countNotification(){
        $userName=$_COOKIE['userName'];
        $sqlQuery = "SELECT COUNT(notificationID) FROM user_view_notification WHERE userName='$userName' AND isViewed=0";
        return Database::executeQuery('root','',$sqlQuery)[0];

    }

    public static function timetable(){
        $userName=$_COOKIE['userName'];

    }
}