<?php
    class RegistrationModel extends Model{
        public static function getData(){
            $userName=$_COOKIE['userName'];
            $query="SELECT * FROM user WHERE userName='$userName' LIMIT 1";
            return Database::executeQuery("generalAccess","generalAccess@16",$query);
        }

        public static function updateUserData($hashedPassword,$gender,$salutation,$telephone,$address,$personalEmail,$profilePicURL){
            $userName=$_COOKIE['userName'];
            $query="UPDATE user SET password='$hashedPassword',gender='$gender',salutation='$salutation',address='$address',TPNO='$telephone',personalEmail='$personalEmail',profilePicURL='$profilePicURL' ,isFirstLogIn='false' WHERE userName='$userName'";
            Database::executeQuery("generalAccess","generalAccess@16",$query);
            self::createAudit($query, 'user', "INSERT", 'Update user basic information when initial login to the system.');
        }
    }