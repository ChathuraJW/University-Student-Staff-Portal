<?php
    class RespondAppointmentModel extends Model{
        public static function getData(){
            setcookie('userName','mnj');
            $staffID=$_COOKIE['userName'];
            return Database::executeQuery("root","","SELECT * FROM meeting_appointment WHERE staffID='$staffID' AND isApproved='N' AND requesValidity=1");
        }
        public static function getPastData(){
            setcookie('userName','mnj');
            $staffID=$_COOKIE['userName'];
            $query="SELECT * FROM meeting_appointment WHERE staffID='$staffID' AND isApproved='A' OR isApproved='R'";
            return Database::executeQuery("root","",$query);
        }
        public static function insertData($reply,$approve,$validity,$appointmentID){
            $query="INSERT INTO meeting_appointment(reply,isApproved,requesValidity) VALUES ('$reply','$approve',$validity) WHERE appointmentID=$appointmentID";
            Database::executeQuery("root","",$query);
            self::createAudit($query, 'meeting_appointment', "INSERT", 'Insert the Reply Message for an Appointment into the system.');
        }
    }
?>