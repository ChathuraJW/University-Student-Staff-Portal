<?php
    class RequestAppointmentModel{
        public static function getAppointmentData(){
        // return Database::executeQuery("root","","SELECT * FROM ");
        }                               
        public static function insertData($lecturer,$typecode,$title,$timeDuration,$message){
            $studentID=$_COOKIE['user'];
            $date=date('Y-m-d H:i:s');
            echo $lecturer." ";
            echo $title." "; 
            echo $typecode." "; 
            echo $timeDuration." "; 
            echo $message." ";
            echo $date;
            // Database::executeQuery("root","","INSERT INTO meeting_appointment VALUES ( '',$lecturer','$title','$message',$type,'$date',' ','$time',' ','$timeDuration')");
            // $query="INSERT INTO meeting_appointment(staffID, title, message, type,meetingDuration,timestamp) VALUES ('$lecturer','$title','$message',$type,'$timeDuration',$date')";
            // Database::executeQuery("root","",$query);
            $query="INSERT INTO meeting_appointment(studentID,staffID, title, message, type, meetingDuration, timestamp) VALUES ('$studentID','$lecturer','$title','$message',$typecode,'$timeDuration','$date')";
            Database::executeQuery("root","",$query);
        }
        public static function getData(){
            $studentID=$_COOKIE['user'];
            return Database::executeQuery("root","","SELECT * FROM meeting_appointment WHERE studentID='$studentID'");
        }
        public static function getProfile(){
            $query="SELECT user.universityEmail,user.fullName,user.userName,academic_staff.availableFrom,academic_staff.availableTo,academic_staff.lastUpdateDate FROM user INNER JOIN academic_staff ON academic_staff.staffID=user.userName";
            return Database::executeQuery("root","",$query);
        }
        public static function getLectures(){
            $query="SELECT staffID FROM academic_staff";
            return Database::executeQuery("root","",$query);
        }
    }
?>