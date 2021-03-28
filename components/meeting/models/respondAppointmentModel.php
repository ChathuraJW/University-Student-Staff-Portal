<?php
    class RespondAppointmentModel extends Model{
        public static function getData(){
            setcookie('userName','kpk');
            $staffID=$_COOKIE['userName'];
            $current=date("Y-m-d");
            $queryOne="SELECT * FROM meeting_appointment WHERE staffID='$staffID' AND isApproved='N' AND appointmentDate>='$current' AND requesValidity=1";
            $appointmentList= array();
            $appointments=Database::executeQuery("academicStaff","academicStaff@16",$queryOne);
            foreach($appointments as $appointment){
                $newAppointment= new AppointmentsForMeeting;
                // $newUser= new User;
                // $newUser->setUser($appointment['userName'],$appointment['nic'],$appointment['gender'],$appointment['salutation'],$appointment['firstName'],$appointment['lastName'],$appointment['fullName'],$appointment['TPNO'],$appointment['personalEmail'],$appointment['universityEmail'],$appointment['role'],$appointment['profilePicURL']);
                
                $newAppointment->setAppointment($appointment['appointmentID'],$appointment['studentID'],$appointment['title'],$appointment['message'],$appointment['type'],$appointment['appointmentDate'],$appointment['appointmentTime'],$appointment['meetingDuration'],$appointment['reply'],$appointment['timestamp'],$appointment['requesValidity'],$appointment['isApproved']);
                
                // $newAppointment->setAppointmentFor($newUser);
                $appointmentList[]=$newAppointment;
            }
            return $appointmentList;

        }
        public static function getPastData(){
            setcookie('userName','kpk');
            $staffID=$_COOKIE['userName'];
            $current=date("Y-m-d");
            $past= date('Y-m-d',strtotime('-2 week',strtotime($current)));
            $query="SELECT * FROM meeting_appointment WHERE staffID='$staffID' AND appointmentDate>='$past' AND isApproved='A' OR isApproved='R'";
            $appointments=Database::executeQuery("academicStaff","academicStaff@16",$query);
            foreach($appointments as $appointment){
                $newAppointment= new AppointmentsForMeeting;
                // $newUser= new User;
                // $newUser->setUser($appointment['userName'],$appointment['nic'],$appointment['gender'],$appointment['salutation'],$appointment['firstName'],$appointment['lastName'],$appointment['fullName'],$appointment['TPNO'],$appointment['personalEmail'],$appointment['universityEmail'],$appointment['role'],$appointment['profilePicURL']);
                
                $newAppointment->setAppointment($appointment['appointmentID'],$appointment['studentID'],$appointment['title'],$appointment['message'],$appointment['type'],$appointment['appointmentDate'],$appointment['appointmentTime'],$appointment['meetingDuration'],$appointment['reply'],$appointment['timestamp'],$appointment['requesValidity'],$appointment['isApproved']);
                
                // $newAppointment->setAppointmentFor($newUser);
                $appointmentList[]=$newAppointment;
            }
            return $appointmentList;
        }
        public static function insertData($reply,$approve,$validity,$appointmentID){
            $databaseInstance=new Database;
            $databaseInstance->establishTransaction('root','');
            $query="UPDATE meeting_appointment SET reply='$reply' ,isApproved='$approve' ,requesValidity=$validity WHERE appointmentID=$appointmentID";

            $databaseInstance->executeTransaction($query);
            if($databaseInstance->getTransactionState()){
                $databaseInstance->transactionAudit($query, 'meeting_appointment', "UPDATE", 'Insert the Reply Message for an Appointment into the system.');
                if($databaseInstance->getTransactionState()){
                    if($databaseInstance->commitToDatabase()){
                         //                display success message
                        echo("<script>createToast('Success','Replied to Appointment Message successfully.','S');</script>");
                        }
                }
                else{
                //      display fail message
                    echo("<script>createToast('Warning (error code: #AMR01)','Failed to Reply .','W')</script>");
                }
            }
            else{
                echo("<script>createToast('Warning (error code: #AMR01)','Failed to Reply  .','W')</script>");

            }
            $databaseInstance->closeConnection();

            // Database::executeQuery("academicStaff","academicStaff@16",$query);
            // self::createAudit($query, 'meeting_appointment', "UPDATE", 'Insert the Reply Message for an Appointment into the system.');
        }
    }
?>