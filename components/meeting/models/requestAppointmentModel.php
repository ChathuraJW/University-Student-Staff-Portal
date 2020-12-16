<?php
    class RequestAppointmentModel extends Model{                              
        public static function insertData($lecturer,$typecode,$title,$timeDuration,$message,$studentID,$date,$time){
            
            $timestamp=date('Y-m-d H:i:s');

            $query="INSERT INTO meeting_appointment(studentID,staffID, title, message, type, meetingDuration, timestamp,appointmentTIme,appointmentDate) VALUES ('$studentID','$lecturer','$title','$message',$typecode,'$timeDuration','$timestamp','$time','$date')";
            Database::executeQuery("student","student@16",$query);
            self::createAudit($query, 'meeting_appointment', "INSERT", 'Insert a new Appointment Message into the system.');
        }
        public static function getData($studentID){
            $appointmentList= array();
            $appointments=Database::executeQuery("student","student@16","SELECT * FROM meeting_appointment M,user U WHERE M.studentID='$studentID' and M.staffID=U.userName");
            foreach($appointments as $appointment){
                print_r($appointment);
                $newAppointment= new AppointmentsForMeeting;
                $newUser= new User;
                // echo("hello");
                // echo("$appointment['userName']");
                $newUser->setUser($appointment['userName'],$appointment['password'],$appointment['nic'],$appointment['gender'],$appointment['salutation'],$appointment['firstName'],$appointment['lastName'],$appointment['fullName'],$appointment['dob'],$appointment['TPNO'],$appointment['personalEmail'],$appointment['universityEmail'],$appointment['role'],$appointment['profilePicURL'],$appointment['isFirstLogin']);
                
                $newAppointment->setAppointment($appointment['appointmentID'],$appointment['studentID'],$appointment['staffID'],$appointment['title'],$appointment['message'],$appointment['type'],$appointment['appointmentDate'],$appointment['appointmentTime'],$appointment['meetingDuration'],$appointment['reply'],$appointment['timestamp'],$appointment['requesValidity'],$appointment['isApproved']);
                $newAppointment->setAppointmentFor($newUser);
                $appointmentList[]=$newAppointment;
            }
            
            return $appointmentList;
        }
        public static function getProfile(){
            $query="SELECT user.universityEmail,user.fullName,user.userName,user.salutation,academic_staff.availableFrom,academic_staff.availableTo,academic_staff.lastUpdateDate FROM user INNER JOIN academic_staff ON academic_staff.staffID=user.userName";
            return Database::executeQuery("academicStaff","academicStaff@16",$query);
        }
        public static function getLectures(){
            $query="SELECT firstName,lastName,userName,salutation FROM user WHERE role='AS'";
            return Database::executeQuery("student","student@16",$query);
        }

        
    }
?>