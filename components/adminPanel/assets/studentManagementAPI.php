<?php
require_once('../../../assets/mvc/Database.php');
require_once('class.php');
if(isset($_GET['code'])){
    $code=$_GET['code'];
    $query="SELECT * FROM course_module WHERE courseCode='".$code."'";
    $courses=Database::executeQuery("root","",$query);
    // print_r($courses);
    $course=$courses[0];
        $newCourse= new courseModule;
        
        // $newCourse->setCourse($course['courseCode'],$course['name'],$course['semester'],$course['creditValue'],$course['description']);
        // print_r($newCourse);
    echo (json_encode($courses));

}
?>