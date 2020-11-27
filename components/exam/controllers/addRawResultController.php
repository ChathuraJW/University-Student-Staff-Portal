<?php
class AddRawResultController extends Controller{
    public static function init(){
        $resultData=AddRawResultModel::getSubjectData();
        self::createView("addRawResultView",$resultData);
        //get data and store in variable to save in DB
        if (isset($_POST['submit'])) {
            $year = $_POST['examinationName'];
            $semester = $_POST['semester'];
            $attempt = $_POST['attempt'];
            $batch = 'NA';
            if ($attempt == 'F')
                $batch = $_POST['batch'];
            $subject = $_POST['subject'];
            $examinationYear = $_POST['examinationYear'];
//            echo("$year $semester $attempt $batch $subject $examinationYear");
            $user=$_COOKIE['userName'];//take from cookie
            $fileName = "$subject-$examinationYear-$attempt-$user.ussp";

            $semesterCode = array(array(1, 2), array(3, 4), array(5, 6), array(7, 8));
            $sem = $semesterCode[$year - 1][$semester - 1];
            $fileID = AddRawResultModel::saveFileData($subject, $sem, $examinationYear, $attempt, $batch, $fileName);
            $isQueryExecuted=AddRawResultModel::resultFileOwnerData($user,$fileID);
            $isFileUploaded = false;
            if ($isQueryExecuted) {
                //upload file into directory
                $name = $_FILES['rawResultFile']['name'];
                $temp_name = $_FILES['rawResultFile']['tmp_name'];
                if (isset($name) and !empty($name)) {
                    $location = './assets/rawResults/';
                    if (move_uploaded_file($temp_name, $location . $fileName)) {
                        $isFileUploaded = true;
                    }
                }
            }
//            check operation status
            if ($isFileUploaded && $isQueryExecuted) {
                echo("
                    <script>alert('Operation successful. Result data send to examination SAR.')</script>
                ");
            } else {
                echo("
                    <script>alert('Something went wrong. Please try again.')</script>
                ");
            }
        }
    }
}