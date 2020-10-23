<?php
    class RequestAppointmentModel extends Model{                              
        public static function insertData($lecturer,$typecode,$title,$timeDuration,$message,$studentID){
            
            $date=date('Y-m-d H:i:s');

            $query="INSERT INTO meeting_appointment(studentID,staffID, title, message, type, meetingDuration, timestamp) VALUES ('$studentID','$lecturer','$title','$message',$typecode,'$timeDuration','$date')";
            Database::executeQuery("root","",$query);
            self::createAudit($query, 'meeting_appointment', "INSERT", 'Insert a new Appointment Message into the system.');
        }
        public static function getData($studentID){
            
            return Database::executeQuery("root","","SELECT * FROM meeting_appointment WHERE studentID='$studentID'");
        }
        public static function getProfile(){
            $query="SELECT user.universityEmail,user.fullName,user.userName,user.salutation,academic_staff.availableFrom,academic_staff.availableTo,academic_staff.lastUpdateDate FROM user INNER JOIN academic_staff ON academic_staff.staffID=user.userName";
            return Database::executeQuery("root","",$query);
        }
        public static function getLectures(){
            $query="SELECT staffID FROM academic_staff";
            return Database::executeQuery("root","",$query);
        }
    }
?>