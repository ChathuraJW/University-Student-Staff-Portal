<?php
class LoginModel extends Model{
    public static function checkUserName($userName){
        $sqlQuery = "SELECT * FROM user WHERE userName='$userName'";
        $result = Database::executeQuery("generalAccess", "generalAccess@16", $sqlQuery);
        if (sizeof($result) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public static function validateLogIn($userName, $password){
        $sqlQuery = "SELECT * FROM user WHERE userName='$userName'";
        $result = Database::executeQuery("generalAccess", "generalAccess@16", $sqlQuery);
        if (($result[0]["password"]) == $password) {
            return $result;
        } else {
            return array(false);
        }
    }

    public static function isFirstLogin($userName){
        $sqlQuery="SELECT isFirstLogIn FROM user WHERE userName ='$userName' LIMIT 1";
        $result= Database::executeQuery("generalAccess", "generalAccess@16", $sqlQuery);
        return $result[0]['isFirstLogIn'];
    }
}
