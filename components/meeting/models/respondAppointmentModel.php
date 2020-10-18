<?php
    class RespondAppointmentModel{
        public static function getData(){
            $staffID=$_COOKIE['user'];
            return Database::executeQuery("root","","SELECT * FROM meeting_appointment WHERE staffID='$staffID' AND isApproved='N' AND requesValidity=1");
        }
        public static function getPastData(){
            $staffID=$_COOKIE['user'];
            $query="SELECT * FROM meeting_appointment WHERE staffID='$staffID' AND isApproved='A' OR isApproved='R'";
            return Database::executeQuery("root","",$query);
        }
        public static function insertData($reply,$approve,$validity,$appointmentID){
            $query="INSERT INTO meeting_appointment(reply,isApproved,requesValidity) VALUES ('$reply','$approve',$validity) WHERE appointmentID=$appointmentID";
            Database::executeQuery("root","",$query);
        }
    }
?>