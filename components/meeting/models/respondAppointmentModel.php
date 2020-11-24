<?php
    class RespondAppointmentModel extends Model{
        public static function getData(){
//            setcookie('userName','mnj');
            $staffID=$_COOKIE['userName'];
            return Database::executeQuery("academicStaff","academicStaff@16","SELECT * FROM meeting_appointment WHERE staffID='$staffID' AND isApproved='N' AND requesValidity=1");
        }
        public static function getPastData(){
//            setcookie('userName','mnj');
            $staffID=$_COOKIE['userName'];
            $query="SELECT * FROM meeting_appointment WHERE staffID='$staffID' AND isApproved='A' OR isApproved='R'";
            return Database::executeQuery("academicStaff","academicStaff@16",$query);
        }
        public static function insertData($reply,$approve,$validity,$appointmentID){
            $query="UPDATE meeting_appointment SET reply='$reply' ,isApproved='$approve' ,requesValidity=$validity WHERE appointmentID=$appointmentID";
            Database::executeQuery("academicStaff","academicStaff@16",$query);
            self::createAudit($query, 'meeting_appointment', "UPDATE", 'Insert the Reply Message for an Appointment into the system.');
        }
    }
?>