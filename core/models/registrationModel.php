<?php
    class RegistrationModel extends Model{
        public static function getData(){
            setcookie('userName','2018cs183');
        $userName=$_COOKIE['userName'];

            $query="SELECT * FROM user WHERE userName='$userName'";
            return Database::executeQuery("root","",$query);

        }
        public static function first($passcodeen,$firstName,$lastName,$fullName,$gender,$occupation,$nic,$dob,$tele,$address,$email,$uniMail){
            $userName='1111';
            $query="INSERT INTO user(userName,password, nic, gender, salutation, firstName, lastName, fullName, dob, address, TPNO, personalEmail, universityEmail, profilePicURL) VALUES ('$userName','$passcodeen','$nic','$gender','$occupation','$firstName','$lastName','$fullName',$dob,'$address','$tele','$email','$uniMail')";
            Database::executeQuery("root","",$query);
            self::createAudit($query, 'user', "INSERT", 'Add a new user into the system.');
        }
    }
?>