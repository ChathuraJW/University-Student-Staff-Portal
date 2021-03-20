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
        //Get the most frequent unreaded notification, limit - 8
        $userName=$_COOKIE['userName'];
        $sqlQuery = "SELECT notificationID FROM user_view_notification WHERE userName='$userName' AND isViewed=0 ORDER BY notificationID DESC LIMIT 8";
        $notificationIdList = Database::executeQuery('root','',$sqlQuery);


        $notificationArray = array();
        foreach($notificationIdList as $notificationId){
             $notificationId = $notificationId['notificationID'];
//             print_r($notificationId);
            $sqlQuery = "SELECT title,content,timestamp,publishedByUser FROM notification_detail WHERE notificationID=$notificationId AND isValid=1";
            $notificationContent = Database::executeQuery('root','',$sqlQuery);
            $notificationArray[]= $notificationContent;
        }
//        print_r($notificationArray);
        return $notificationArray;
    }
    public static function countNotification(){
        //get the notification count of unread notifications.
        $userName=$_COOKIE['userName'];
        $sqlQuery = "SELECT COUNT(notificationID) FROM user_view_notification WHERE userName='$userName' AND isViewed=0";
        return Database::executeQuery('root','',$sqlQuery)[0];

    }

    public static function timetable(){
        $userName=$_COOKIE['userName'];
        $role = self::getRole();
//        print_r($role);

        $day = date("l");// get the current day
        $day = strtoupper(substr($day,0,3));// get the first three letters of day and convert in to uppercase

        if($day =='MON' OR $day =='TUE'OR $day =='WED' OR $day == 'TUR' OR $day == 'FRI'){
            if($role == "ST"){
                $sqlQuery = "SELECT studentGroup FROM student WHERE regNo='$userName' LIMIT 1";
                $studentGroup = Database::executeQuery('root','',$sqlQuery)[0]['studentGroup'];
//            echo $studentGroup;

//            echo $day;
                $sqlQuery = "SELECT * FROM timetable WHERE relatedGroup='$studentGroup' AND date='$day'";
                //            print_r($eventList);
                return Database::executeQuery('root','',$sqlQuery);



            }elseif ($role == "AS" OR $role =='AD' ){
                $sqlQuery ="SELECT eventID FROM staff_conduct_session WHERE staffID='$userName' ORDER by eventID ASC ";
                $eventIdList = Database::executeQuery('root','',$sqlQuery);
//            print_r($eventIdList);

                $eventList = array();
                foreach($eventIdList as $eventId){
                    $eventId= $eventId['eventID'];
//                    echo($eventId);
                    $sqlQuery = "SELECT * FROM timetable WHERE eventID=$eventId AND date='$day';";
                    $event = Database::executeQuery('root','',$sqlQuery);
                    $eventList[] = $event[0];

                }
//            print_r($eventList);
                return $eventList;
            }
        }

    }

    public static function getRole(){
        $userName=$_COOKIE['userName'];
        $sqlQuery = "SELECT role FROM user WHERE userName='$userName' LIMIT 1;";
        return Database::executeQuery('root','',$sqlQuery)[0]['role'];
    }
}