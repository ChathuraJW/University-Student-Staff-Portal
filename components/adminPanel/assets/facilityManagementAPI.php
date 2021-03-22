<?php
require_once('../../../assets/mvc/Database.php');
require_once('class.php');
if(isset($_GET['code'])){
    $code=$_GET['code'];
    $query="SELECT * FROM hall_and_lab WHERE hallID='".$code."'";
    $halls=Database::executeQuery("admin","admin@16",$query);
    // print_r($courses);
    $hall=$halls[0];
        $newCourse= new courseModule;
        
        // $newCourse->setCourse($course['courseCode'],$course['name'],$course['semester'],$course['creditValue'],$course['description']);
        // print_r($newCourse);
    echo (json_encode($halls));

}
?>