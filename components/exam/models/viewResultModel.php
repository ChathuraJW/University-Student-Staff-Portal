<?php
class ViewResultModel extends Model{
    public static function loadResultData(){
        $regNo=$_COOKIE['userName'];
        $sqlQuery="SELECT MAX(semester) as maxSemester FROM student_result WHERE regNo='$regNo'";
        $maxSemester=Database::executeQuery("student","student@16",$sqlQuery)[0]['maxSemester'];
        $returnValue=array();
        for($i=1;$i<=$maxSemester;$i++){
            $sqlQuery="SELECT * FROM student_result WHERE regNo='$regNo' AND semester=$i ORDER BY courseCode";
            $result=Database::executeQuery("student","student@16",$sqlQuery);
            array_push($returnValue,$result);
        }
        return $returnValue;
    }
    public static  function calculateTotalCredit(){
        $regNo=$_COOKIE['userName'];
        $sqlQuery="SELECT SUM(creditValue) as totalCredit FROM student_result WHERE regNo='$regNo'";
        return Database::executeQuery("student","student@16",$sqlQuery)[0]['totalCredit'];
    }
    public static function getCurrentGPA(){
        $regNo=$_COOKIE['userName'];
        $sqlQuery="SELECT currentGPA FROM student WHERE regNo ='$regNo'";
        return Database::executeQuery("student","student@16",$sqlQuery)[0]['currentGPA'];
    }
    public static function getCurrentRank(){
        return 31;
    }
}