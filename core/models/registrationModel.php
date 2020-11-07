<?php
    class RegistrationModel extends Model{
        public static function first($passcodeen,$firstName,$lastName,$fullName,$gender,$occupation,$nic,$dob,$tele,$address,$email,$uniMail){
            $userName='1111';
            $query="INSERT INTO user(userName,password, nic, gender, salutation, firstName, lastName, fullName, dob, address, TPNO, personalEmail, universityEmail, profilePicURL) VALUES ('$userName','$passcodeen','$nic','$gender','$occupation','$firstName','$lastName','$fullName',$dob,'$address','$tele','$email','$uniMail')";
            Database::executeQuery("root","",$query);
            self::createAudit($query, 'user', "INSERT", 'Add a new user into the system.');
        }
    }
?>