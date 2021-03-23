<?php
require_once('../../../assets/mvc/Database.php');
if(isset($_GET['activity'])& $_GET['activity']=="markAsRead"){
    $userName = $_GET['userName'];
    $marked = $_GET['mark'];
    echo $userName;
    echo $marked;
}