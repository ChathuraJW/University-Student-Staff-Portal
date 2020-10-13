<?php
class Model{
    public static function createAudit($sqlQuery,$affectedTable,$eventType,$description){
        $user="stu";//take from cookies
        $executedQuery=explode("$affectedTable",str_replace("'","",$sqlQuery))[1];
        $auditQuery="INSERT INTO audit_log(userID, executedQuery,
                        affectedTable, eventType, description, timestamp)
                        VALUES ('$user','$executedQuery','$affectedTable','$eventType','$description','time()')";
        Database::executeQuery("root","",$auditQuery);
    }

    //subject data getting function
    public static function getSubjectData(){
        $sqlQuery="Select * from course_module";
        return Database::executeQuery("root","",$sqlQuery);
    }
}