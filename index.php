<?php

// if cookie is set
if(isset($_COOKIE['userName'])){
    if($_COOKIE['fullName']===""){
        header("Location: core/registration");
    }else{
        header("Location: core/home");
    }
}else{
    header("Location: core/login");
}


?>