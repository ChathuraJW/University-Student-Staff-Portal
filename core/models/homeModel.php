<?php
class HomeModel extends Model{
    public static function loadBasicInfo(){
        $userName=$_COOKIE['userName'];
        $sqlQuery="SELECT gender, salutation, firstName, lastName, personalEmail, universityEmail,salutation,gender,profilePicURL FROM user WHERE userName='$userName'";
        $resultUser=Database::executeQuery('generalAccess','generalAccess@16',$sqlQuery);
        if($_COOKIE['role']==='ST'){
            $sqlQuery="SELECT currentGPA FROM student WHERE regNo='$userName'";
            $resultGPA=Database::executeQuery('student','student@16',$sqlQuery)[0]['currentGPA'];
        }else{
            $resultGPA=0.0000;
        }
        $resultUser[0]['currentGPA']=$resultGPA;
        return $resultUser;
    }
    
}