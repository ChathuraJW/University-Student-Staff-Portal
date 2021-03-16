<?php
    class ResetPasswordModel extends Model{
        public static function resetPassword($userName,$password){
            $hashedPassword = hash('sha256', $password);
            $queryOne="UPDATE user SET password='$hashedPassword' WHERE userName='$userName'";
            Database::executeQuery("root","",$queryOne);
            
        }
        
    }
?>