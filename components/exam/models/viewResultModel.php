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
        $regNo=$_COOKIE['userName'];
        $sqlQuery="SELECT studentGroup,currentGPA FROM student WHERE regNo='$regNo'";
        $result=Database::executeQuery("student","student@16",$sqlQuery);
        $userGroup=  $result[0]['studentGroup'];
        $userGPA=  $result[0]['currentGPA'];
//        create student batch identification Eg: 16CS1 ==> 16CS
        if (strlen($userGroup) == 5)
            $userGroup = rtrim(rtrim($userGroup, "1"), "2");
//        echo($userGroup);
        $sqlQuery = "SELECT currentGPA FROM student WHERE studentGroup LIKE '$userGroup%'";
        $result = Database::executeQuery("student", "student@16", $sqlQuery);
        $resultSet=array();
        foreach ($result as $userEntry){
            array_push($resultSet,$userEntry['currentGPA']);
        }
        $rank=1;
        $i=1;
//        error clean variable is deal if more than one student have same GPA situation
        $errorClean=0;
        foreach ($resultSet as $pointGPA){
//            check user GAP with dataset
            if($pointGPA!==$userGPA){
                if($pointGPA!==$resultSet[$i]){
                    $rank+=$errorClean;
                    $rank++;
                    $errorClean=0;
                }else{
                    $errorClean++;
                }
            }else{
                break;
            }
            $i++;
        }
        return $rank;
    }
}