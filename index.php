<?php
require_once ('assets/mvc/Database.php');
function isFirstLogin($userName){
    $sqlQuery="SELECT isFirstLogIn FROM user WHERE userName ='$userName' LIMIT 1";
    $result= Database::executeQuery("generalAccess", "generalAccess@16", $sqlQuery);
    return $result[0]['isFirstLogIn'];
}

// if cookie is set
if(isset($_COOKIE['userName'])){
    if(isFirstLogin($_COOKIE['userName'])){
        echo('First');
        header("Location: core/registration");
    }else{
        echo('any');
        header("Location: core/home");
    }
}else{
    header("Location: core/login");
}

?>