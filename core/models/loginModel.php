<?php

class LoginModel extends Model{
    public static function checkUserName($userName){
        $sqlQuery = "SELECT * FROM user WHERE userName='$userName'";
        $result = Database::executeQuery("root", "", $sqlQuery);
        if (sizeof($result) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public static function validateLogIn($userName, $password){
        $sqlQuery = "SELECT * FROM user WHERE userName='$userName'";
        $result = Database::executeQuery("root", "", $sqlQuery);
        if (($result[0]["password"]) == $password) {
            return $result;
        } else {
            return array(false);
        }
    }
}
