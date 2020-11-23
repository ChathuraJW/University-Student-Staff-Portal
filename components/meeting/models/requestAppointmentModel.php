<?php
    class RequestAppointmentModel extends Model{                              
        public static function insertData($lecturer,$typecode,$title,$timeDuration,$message,$studentID,$date,$time){
            
            $timestamp=date('Y-m-d H:i:s');

            $query="INSERT INTO meeting_appointment(studentID,staffID, title, message, type, meetingDuration, timestamp,appointmentTIme,appointmentDate) VALUES ('$studentID','$lecturer','$title','$message',$typecode,'$timeDuration','$timestamp','$time','$date')";
            Database::executeQuery("root","",$query);
            self::createAudit($query, 'meeting_appointment', "INSERT", 'Insert a new Appointment Message into the system.');
        }
        public static function getData($studentID){
            
            return Database::executeQuery("root","","SELECT * FROM meeting_appointment M,user U WHERE M.studentID='2018cs183' and M.staffID=U.userName");
        }
        public static function getProfile(){
            $query="SELECT user.universityEmail,user.fullName,user.userName,user.salutation,academic_staff.availableFrom,academic_staff.availableTo,academic_staff.lastUpdateDate FROM user INNER JOIN academic_staff ON academic_staff.staffID=user.userName";
            return Database::executeQuery("root","",$query);
        }
        public static function getLectures(){
            $query="SELECT firstName,lastName,userName,salutation FROM user WHERE role='AS'";
            return Database::executeQuery("root","",$query);
        }

        
    }
?>