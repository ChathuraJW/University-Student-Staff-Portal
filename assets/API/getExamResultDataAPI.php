<?php
require_once('../php/Database.php');
if (isset($_GET['activity']) & $_GET['activity'] == 'GPADistribution') {
//    batch GPA distribution
    $regNo = $_GET['regNo'];
    $sqlQuery = "SELECT studentGroup FROM `student` WHERE regNo='$regNo'";
    $group = Database::executeQuery("student", "student@16", $sqlQuery)[0]['studentGroup'];
    //create student batch identification Eg: 16CS1 ==> 16CS
    if (strlen($group) == 5)
        $group = rtrim(rtrim($group, "1"), "2");
//    echo($group);
    $sqlQuery = "SELECT currentGPA FROM student WHERE studentGroup LIKE '$group%'";
    $result = Database::executeQuery("student", "student@16", $sqlQuery);
    $pointGPA = array('0' => 0, '0.1' => 0, '0.2' => 0, '0.3' => 0, '0.4' => 0, '0.5' => 0, '0.6' => 0, '0.7' => 0, '0.8' => 0, '0.9' => 0, '1' => 0, '1.1' => 0, '1.2' => 0, '1.3' => 0, '1.4' => 0, '1.5' => 0, '1.6' => 0, '1.7' => 0, '1.8' => 0, '1.9' => 0, '2' => 0, '2.1' => 0, '2.2' => 0, '2.3' => 0, '2.4' => 0, '2.5' => 0, '2.6' => 0, '2.7' => 0, '2.8' => 0, '2.9' => 0, '3' => 0, '3.1' => 0, '3.2' => 0, '3.3' => 0, '3.4' => 0, '3.5' => 0, '3.6' => 0, '3.7' => 0, '3.8' => 0, '3.9' => 0, '4' => 0);
    foreach ($result as $elementGPA) {
        $roundedGPA = (string)round($elementGPA['currentGPA'], 1);
        $pointGPA[$roundedGPA]++;
    }
    $returnResult = array();
    foreach ($pointGPA as $studentCount) {
        array_push($returnResult, $studentCount);
    }
    echo(json_encode($returnResult));


} elseif (isset($_GET['activity']) & $_GET['activity'] == 'IndividualGPADistribution') {
//    individual GPA distribution
    $regNo = $_GET['regNo'];
    $sqlQuery = "SELECT MAX(semester) as maxSemester FROM student_result WHERE regNo='$regNo'";
    $maxSemester = Database::executeQuery("student", "student@16", $sqlQuery)[0]['maxSemester'];
    $returnValue = array();
    for ($i = 1; $i <= $maxSemester; $i++) {
        $sqlQuery = "SELECT * FROM student_result WHERE regNo='$regNo' AND semester=$i ORDER BY courseCode";
        $result = Database::executeQuery("student", "student@16", $sqlQuery);
        $totalCreditSem = 0;
        $fxValue = 0;
        foreach ($result as $subjectData) {
            $totalCreditSem = $totalCreditSem + $subjectData['creditValue'];
            $fxValue = $fxValue + getGPV($subjectData['result']) * $subjectData['creditValue'];
        }
        $semGPA = round($fxValue / $totalCreditSem, 4);
        array_push($returnValue, $semGPA);
    }
    echo(json_encode($returnValue));

} elseif (isset($_GET['activity']) & $_GET['activity'] == 'GradeContribution') {
//    grade contribution
    $regNo = $_GET['regNo'];
    $sqlQuery = "SELECT MAX(semester) as maxSemester FROM student_result WHERE regNo='$regNo'";
    $maxSemester = Database::executeQuery("student", "student@16", $sqlQuery)[0]['maxSemester'];
    $returnValue = array();
    for ($i = 1; $i <= $maxSemester; $i++) {
        $sqlQuery = "SELECT result FROM student_result WHERE regNo='$regNo' AND semester=$i";
        $result = Database::executeQuery("student", "student@16", $sqlQuery);
        $resultGrade = array('A+' => 0, 'A' => 0, 'A-' => 0, 'B+' => 0, 'B' => 0, 'B-' => 0, 'C+' => 0, 'C' => 0, 'C-' => 0, 'D+' => 0, 'D' => 0, 'E' => 0, 'F' => 0);
        foreach ($result as $row) {
            $resultGrade[$row['result']]++;
        }
        $gradeCount = array();
        foreach ($resultGrade as $entry) {
            array_push($gradeCount, $entry);
        }
        array_push($returnValue, $gradeCount);
    }

    echo(json_encode($returnValue));
}
function getGPV($result)
{
    switch ($result) {
        case 'A':
        case 'A+':
            $returnValue = 4.0000;
            break;
        case 'A-':
            $returnValue = 3.7000;
            break;
        case 'B+':
            $returnValue = 3.3000;
            break;
        case 'B':
            $returnValue = 3.0000;
            break;
        case 'B-':
            $returnValue = 2.7000;
            break;
        case 'C+':
            $returnValue = 2.3000;
            break;
        case 'C':
            $returnValue = 2.0000;
            break;
        case 'C-':
            $returnValue = 1.7000;
            break;
        case 'D+':
            $returnValue = 1.3000;
            break;
        case 'D':
            $returnValue = 1.0000;
            break;
        default:
            $returnValue = 0.0;
    }
    return $returnValue;
}