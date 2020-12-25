<?php
require_once('../../../assets/mvc/Database.php');
if(isset($_GET['fromDate'])){
    $fromDate=$_GET['fromDate'];
    $fromTime=$_GET['fromTime'];
    // $toDate=$_GET['toDate'];
    // $toTime=$_GET['toTime'];
//this query for select members who has free time slot that require 
    $query="SELECT * FROM user";
    $data=Database::executeQuery("root","","$query");
    echo (json_encode($data));
}
?>