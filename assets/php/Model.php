<?php
class Model{
    public static function createAudit($sqlQuery,$affectedTable,$eventType,$description){
        $user="stu";//take from cookies
        $auditQuery="INSERT INTO audit_log(userID, executedQuery,
                        affectedTable, eventType, description, timestamp)
                        VALUES ('$user','$sqlQuery','$affectedTable','$eventType','$description',time())";
        echo($auditQuery);
        Database::executeQuery("root","",$auditQuery);
    }
}