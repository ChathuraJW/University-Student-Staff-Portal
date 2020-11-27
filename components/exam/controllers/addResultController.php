<?php

class AddResultController extends Controller
{
    public static function init()
    {
        $passedValue = AddResultModel::getSubjectData();
        self::createView("addResultView", $passedValue);
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
            $fileName = "$subject-$examinationYear-$attempt.csv";
            $semesterCode = array(array(1, 2), array(3, 4), array(5, 6), array(7, 8));
            $sem = $semesterCode[$year - 1][$semester - 1];
            $isQueryExecuted = AddResultModel::saveFileData($subject, $sem, $examinationYear, $attempt, $batch, $fileName);
            $isFileUploaded = false;
            if ($isQueryExecuted) {
                //upload file into directory
                $name = $_FILES['resultFile']['name'];
                $temp_name = $_FILES['resultFile']['tmp_name'];
                $location = "./assets/boardConfirmedResults/$fileName";
                if (isset($name) and !empty($name)) {
                    if (move_uploaded_file($temp_name, $location)) {
                        $isFileUploaded = true;
                    }
                }
            }
//            check operation status
            if ($isFileUploaded && $isQueryExecuted) {
                echo("<script>alert('Result file upload successful. Wait few times data begins to process.')</script>");
//                add result to database
                $isSuccess = AddResultModel::processFinalResultData($examinationYear, $attempt, $batch, $subject, $location);
                if ($isSuccess) {
                    echo("<script>alert('Operation Successful.')</script>");
                } else {
                    echo("<script>alert('Operation Failed.')</script>");
                }
            } else {
                echo("<script>alert('Something went wrong. Please try again.')</script>");
            }
        }
    }
}