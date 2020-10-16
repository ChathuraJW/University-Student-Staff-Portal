<?php
header('Access-Control-Allow-Origin: *');
require_once('Database.php');
if(isset($_GET['dataSet'])){
    //dataSet=subjectData
    if($_GET['dataSet']=='subjectData'){
        $sqlQuery="SELECT * FROM course_module";
        $dataSet=Database::executeQuery("academicStaff","academicStaff@16",$sqlQuery);
        echo(json_encode($dataSet));
    }
}else if(isset($_GET['username'])){
    $userName=$_GET['username'];
    $password=$_GET['password'];
    $sqlQuery="SELECT * FROM user WHERE userName='$userName' and role='AC' LIMIT 1";
    $result=Database::executeQuery("academicStaff","academicStaff@16",$sqlQuery);
    $returnValue=false;
    if(sizeof($result)>0){
        $sqlQuery = "SELECT userName,password, salutation, fullName, role FROM `user` WHERE `userName`='$userName'";
        $result=Database::executeQuery("academicStaff","academicStaff@16",$sqlQuery);
        if(($result[0]["password"]) == $password) {
            $returnValue=$result;
        }
    }
    echo(json_encode($returnValue));
}else if(isset($_GET['task'])){
    $sqlQuery="SELECT publicKey FROM public_key WHERE isSAR=true";
    $result=Database::executeQuery("academicStaff","academicStaff@16",$sqlQuery);
    echo(json_encode($result));
}else if(isset($_GET['subjectCode'])){
    $subjectCode=$_GET['subjectCode'];
    $attempt=$_GET['attempt'];
    $sqlQuery="SELECT studentIndexNo FROM student_enroll_course WHERE courseCode='$subjectCode' AND attempt='$attempt' AND isActive=true";
    $result=Database::executeQuery("academicStaff","academicStaff@16",$sqlQuery);
    echo(json_encode($result));
}else if(isset($_GET['loadSubjectData'])){
    $sqlQuery="SELECT courseCode,name FROM course_module";
    $result=Database::executeQuery("academicStaff","academicStaff@16",$sqlQuery);
    echo(json_encode($result));
}