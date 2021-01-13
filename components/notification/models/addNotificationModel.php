<?php

class AddNotificationModel extends Model{

    public static function saveNotificationDetails($senderRegNo, $notificationTitle,$notificationContent, $weeks, $notificationCategory, $receivers){
        $newNotification = new Notification();
        $newNotification->createNotification($notificationTitle,$notificationContent);
        $newNotification->setSender($senderRegNo);
        $newNotification->setTimeout($weeks);
        $newNotification->setReceivers($receivers);
//        $newNotification-> category
        $newNotification->publishNotification();
    }

    public static function getReceiverList($category){
        $activeUser = 0; // there can be two tables active.
        $activeStudent = 0; //to find out the active table and query

        $sqlQueryUser = "SELECT userName FROM user WHERE";
        $sqlQueryStudent = "SELECT regNo FROM student WHERE";

        if($category == '1100'){ //all users
            $sqlQuery = trim($sqlQueryUser,"WHERE");

        }elseif ($category == '1300'){ //academic staff
            $sqlQueryUser.=" role = 'AS'";
            $activeUser = 1;
        }elseif ($category == '1400'){ //academic supportive
            $sqlQueryUser.=" role = 'SP'";
            $activeUser = 1;
        }elseif ($category == '1500'){ //administrative staff
            $sqlQueryUser.=" role = 'AD'";
            $activeUser = 1;
        }elseif ($category == '1200'){ // student
            $sqlQueryUser.=" role = 'ST'";
            $activeUser = 1;
        }elseif ($category == '1210'){ // first years
            $sqlQueryStudent.=" studentGroup='' AND studentGroup='' AND studentGroup=''";
        }elseif ($category == '1211'){ // first year cs group 1
            $activeStudent = 1;
            $sqlQueryStudent.=" studentGroup=''";
        }elseif ($category == '1212'){ // first years group 2
            $sqlQueryStudent.=" studentGroup=''";
            $activeStudent = 1;
        }elseif ($category == '1213'){ // first years IS
            $sqlQueryStudent.=" studentGroup=''";
            $activeStudent = 1;
        }elseif ($category == '1220'){ // second  years
            $sqlQueryStudent.=" studentGroup='' AND studentGroup='' AND studentGroup=''";
        }elseif ($category == '1221'){ // second year cs group 1
            $activeStudent = 1;
            $sqlQueryStudent.=" studentGroup=''";
        }elseif ($category == '1222'){ // second years group 2
            $activeStudent = 1;
            $sqlQueryStudent.=" studentGroup=''";
        }elseif ($category == '1223'){ // second years IS
            $activeStudent = 1;
            $sqlQueryStudent.=" studentGroup=''";
        }elseif ($category == '1230'){ // third years
            $sqlQueryStudent.=" studentGroup='' AND studentGroup='' AND studentGroup=''";
            $activeStudent = 1;
        }elseif ($category == '1231'){ // third year cs
            $sqlQueryStudent.=" studentGroup=''";
            $activeStudent = 1;
        }elseif ($category == '1232'){ // third years IS
            $sqlQueryStudent.=" studentGroup=''";
            $activeStudent = 1;
        }elseif ($category == '1240'){ // fourth years
            $sqlQueryStudent.=" studentGroup='' AND studentGroup='' AND studentGroup=''";
            $activeStudent = 1;
        }elseif ($category == '1241'){ // fourth year cs group 1
            $sqlQueryStudent.=" studentGroup=''";
            $activeStudent = 1;
        }elseif ($category == '1242'){ // fourth years group 2
            $sqlQueryStudent.=" studentGroup=''";
            $activeStudent = 1;
        }elseif ($category == '1243'){ // fourth years IS
            $sqlQueryStudent.=" studentGroup=''";
            $activeStudent = 1;
        }
//        echo $sqlQueryUser;
//        echo $sqlQueryStudent;

        if($activeUser == 1){
            $resultArray = Database::executeQuery('root','',$sqlQueryUser);
            print_r($resultArray);
            return $resultArray;
        }elseif ($activeStudent == 1){
            $resultArray = Database::executeQuery('root','',$sqlQueryStudent);
            print_r($resultArray);
            return $resultArray;
        }

}
}