<?php

class AddResultModel extends Model{
    public static function saveFileData($subjectCode, $semester, $examinationYear, $attempt, $batch, $fileData){
        $sqlQuery = "INSERT INTO result_data_file(subjectCode, semester, yearOfExam, attempt, batch, isEncrypted, fileLocation) VALUES ('$subjectCode',$semester,'$examinationYear'
                               ,'$attempt','$batch',FALSE,'boardConfirmedResults/$fileData')";
        $result = Database::executeQuery("administrativeGeneral", "administrativeGeneral@16", $sqlQuery);
//        create audit trail
        self::createAudit($sqlQuery, 'result_data_file', "INSERT", 'Insertion when file upload');
        return $result;
    }

    //hear academicYer is as same as batch value. that means to whom this exam for
    public static function processFinalResultData($examinationYear, $attempt, $academicYear, $subject, $location){
        if ($location !== "") {
//            get subject credit value
            $sqlQuery = "SELECT creditValue FROM course_module WHERE courseCode='$subject'";
            $creditForSubject = Database::executeQuery("administrativeGeneral", "administrativeGeneral@16", $sqlQuery)[0]['creditValue'];
//            file operation start here onward
            $resultFile = fopen($location, "r");
            $sqlQuery = "INSERT INTO result(enrollmentID, yearOfExam, academicYear, result,uploadTimestamp) VALUES ";
            $isHeader = true;
//            iterate through file and read data
            while (!feof($resultFile)) {
                $resultEntry = explode(",", fgets($resultFile));
//                to ignore header row use this condition checking
                if ($isHeader) {
                    $isHeader = false;
                    continue;
                } else {
                    $studentIndex = $resultEntry[1];
//                    cleanup string for take result value
                    $result = trim(preg_replace('/[^a-zA-Z0-9 + -]/s', '', $resultEntry[2]), ' ');
//                    $result=trim(explode($resultEntry[2],'\n')[0],' ');
                    $enrollmentID = self::getEnrollmentID($studentIndex, $subject, $attempt);
//                    update GPA of student
                    self::updateGPA($studentIndex, $creditForSubject, $result);
                    $sqlQuery .= "($enrollmentID,'$examinationYear','$academicYear','$result',NOW()),";
                }
            }
            $sqlQuery = trim($sqlQuery, ",");
            $sqlQuery .= ";";
            Database::executeQuery("administrativeGeneral", "administrativeGeneral@16", $sqlQuery);
//            create audit trail
            $returnValue = self::createAudit($sqlQuery, 'result', "INSERT", 'Insert all result as a bulk.');
            fclose($resultFile);
            return $returnValue;
        }
        return false;
    }

    public static function getEnrollmentID($studentID, $courseCode, $attempt){
        $sqlQuery = "SELECT enrollmentID FROM student_enroll_course WHERE studentIndexNo='$studentID' AND courseCode='$courseCode' AND attempt='$attempt' AND isActive=TRUE LIMIT 1";
        return Database::executeQuery("administrativeGeneral", "administrativeGeneral@16", $sqlQuery)[0]['enrollmentID'];
    }

    public static function updateGPA($studentIndex, $subjectCredit, $result){
        $sqlQuery = "SELECT SUM(creditValue) as totalCredit FROM student_result WHERE indexNo='$studentIndex'";
        $totalCredit = Database::executeQuery("student", "student@16", $sqlQuery)[0]['totalCredit'];
        $sqlQuery = "SELECT currentGPA FROM student WHERE indexNo='$studentIndex'";
        $currentGPA = Database::executeQuery("student", "student@16", $sqlQuery)[0]['currentGPA'];
        if ($currentGPA == 0 || $totalCredit == 0) {
            $newGPA = self::getGPV($result);
        } else {
            $newGPA = (($currentGPA * $totalCredit) + (self::getGPV($result) * $subjectCredit)) / ($totalCredit + $subjectCredit);
        }
        if ($newGPA > 4.0000) $newGPA = 4.0000;
        $sqlQuery = "UPDATE student SET currentGPA=$newGPA WHERE indexNo='$studentIndex'";

        Database::executeQuery("student", "student@16", $sqlQuery);
//        create audit trail
        self::createAudit($sqlQuery, 'student', "UPDATE", 'Modify GPA after add new result data into system.');
    }

    private static function getGPV($result){
        switch ($result) {
            case 'A+':
            case 'A':
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
}