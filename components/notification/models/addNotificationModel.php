<?php

class AddNotificationModel extends Model{

    public static function saveNotificationDetails($senderRegNo, $notificationTitle,$notificationContent, $weeks, $notificationCategory, $receivers,$targetAudience){
        $newNotification = new Notification();
        $newNotification->createNotification($notificationTitle,$notificationContent);
        $newNotification->setSender($senderRegNo);
        $newNotification->setTimeout($weeks);
        $newNotification->setNotificationType($notificationCategory);
        $newNotification->setReceivers($receivers);
        $newNotification->targetAudience($targetAudience);
        $newNotification->publishNotification();
        if($newNotification){
            echo("<script>createToast('Success','Announcement published successfully.','S')</script>");//TODO
        }else{
            echo("<script>createToast('Warning (error code: #AM01)','Failed to publish Announcement.','W')</script>");
        }
    }

    public static function getReceiverList($category){
        $activeUser = 0; // there can be two tables active.
        $activeStudent = 0; //to find out the active table and query

        $sqlQueryUser = "SELECT userName FROM user WHERE";
        $sqlQueryStudent = "SELECT regNo FROM student WHERE";

        switch ($category){
            case '1100': // All users
                $sqlQueryUser = trim($sqlQueryUser,"WHERE");
                $activeUser = 1;
                break;
            case '1300': // Academic staff
                $sqlQueryUser.=" role = 'AS'";
                $activeUser = 1;
                break;
            case '1400': // Academic supportive staff
                $sqlQueryUser.=" role = 'SP'";
                $activeUser = 1;
                break;
            case '1500': // Administrative staff
                $sqlQueryUser.=" role = 'AD'";
                $activeUser = 1;
                break;
            case '1200':  // All students
                $sqlQueryUser.=" role = 'ST'";
                $activeUser = 1;
                break;
            case '1210': // All First Years
                $sqlQueryStudent.=" studentGroup='1CS1' AND studentGroup='1CS2' AND studentGroup='1IS'";
                break;
            case '1211': // First Year CS group one
                $sqlQueryStudent.=" studentGroup='1CS1'";
                $activeStudent = 1;
                break;
            case '1212': // First year CS group two
                $sqlQueryStudent.=" studentGroup='1CS2'";
                $activeStudent = 1;
                break;
            case '1213': // First Year IS
                $sqlQueryStudent.=" studentGroup='1IS'";
                $activeStudent = 1;
                break;
            case '1220': // All second Years
                $sqlQueryStudent.=" studentGroup='2CS1' AND studentGroup='2CS2' AND studentGroup='2IS'";
                $activeStudent = 1;
                break;
            case '1221': // Second year CS group one
                $sqlQueryStudent.=" studentGroup='2CS1'";
                $activeStudent = 1;
                break;
            case '1222': // Second year CS group two
                $sqlQueryStudent.=" studentGroup='2CS2'";
                $activeStudent = 1;
                break;
            case '1223': // Second year IS group
                $sqlQueryStudent.=" studentGroup='2IS'";
                $activeStudent = 1;
                break;
            case '1230': // All Third Years
                $sqlQueryStudent.=" studentGroup='3CSG' AND studentGroup='3CSC' AND studentGroup='3CSS' AND studentGroup='3ISG' AND studentGroup='3IS'";
                $activeStudent = 1;
                break;
            case '1231': // Third year CS general
                $sqlQueryStudent.=" studentGroup='3CSG'";
                $activeStudent = 1;
                break;
            case '1232': // Third year CS special
                $sqlQueryStudent.=" studentGroup='3CSC'";
                $activeStudent = 1;
                break;
            case '1233': // Third year SE special
                $sqlQueryStudent.=" studentGroup='3CSS'";
                $activeStudent = 1;
                break;
            case '1234': // Third year IS general
                $sqlQueryStudent.=" studentGroup='3ISG'";
                $activeStudent = 1;
                break;
            case '1235': // Third year IS special
                $sqlQueryStudent.=" studentGroup='3IS'";
                $activeStudent = 1;
                break;
            case '1240': // All fourth Years
                $sqlQueryStudent.=" studentGroup='4CSC' AND studentGroup='4CSS' AND studentGroup='4IS'";
                $activeStudent = 1;
                break;
            case '1241': // Fourth year CS special
                $sqlQueryStudent.=" studentGroup='4CSC'";
                $activeStudent = 1;
                break;
            case '1242': // Fourth year SE special
                $sqlQueryStudent.=" studentGroup='4CSS'";
                $activeStudent = 1;
                break;
            case '1243': // Fourth year IS special
                $sqlQueryStudent.=" studentGroup='4IS'";
                $activeStudent = 1;
                break;
        }

        if($activeUser == 1){
            return Database::executeQuery('root','',$sqlQueryUser);
        }elseif ($activeStudent == 1){
            return Database::executeQuery('root','',$sqlQueryStudent);
        }

}
}