<?php
require_once('../../../assets/mvc/Database.php');
require_once('class.php');
if(isset($_GET['code'])){
    $code=$_GET['code'];
    $query="SELECT * FROM timetable WHERE eventID='".$code."'";
    $halls=Database::executeQuery("admin","admin@16",$query);
    // print_r($courses);
    $hall=$halls[0];
        $newCourse= new courseModule;
        
        // $newCourse->setCourse($course['courseCode'],$course['name'],$course['semester'],$course['creditValue'],$course['description']);
        // print_r($newCourse);
    echo (json_encode($halls));

}
if(isset($_GET['groupName'])){
    // $s=$_COOKIE['groupName'];
    // echo $s;
    $groupName=$_GET['groupName'];
    $query="SELECT * FROM timetable WHERE relatedGroup='".$groupName."' AND entryValidity=1";
    $entries=Database::executeQuery("admin","admin@16",$query);
    // print_r($courses);
    $entry=$entries[0];
        $newCourse= new courseModule;
        
        // $newCourse->setCourse($course['courseCode'],$course['name'],$course['semester'],$course['creditValue'],$course['description']);
        // print_r($newCourse);
    echo (json_encode($entries));
}
?>