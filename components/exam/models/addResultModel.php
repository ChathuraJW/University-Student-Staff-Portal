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
            $resultFile = fopen($location, "r");
            $isHeader = true;//to ignore header row use this variable
            $sqlQuery = "INSERT INTO result(enrollmentID, yearOfExam, academicYear, result,uploadTimestamp) VALUES ";
            while (!feof($resultFile)) {
                $resultEntry = explode(",", fgets($resultFile));
                if ($isHeader) {
                    $isHeader = false;
                    continue;
                } else {
                    $studentIndex = $resultEntry[1];
                    $result = $resultEntry[2];
                    $enrollmentID = self::getEnrollmentID($studentIndex, $subject, $attempt);
//                    print_r($enrollmentID);
                    $sqlQuery .= "($enrollmentID,'$examinationYear','$academicYear','$result',NOW()),";
                }
            }
            $sqlQuery = trim($sqlQuery, ",");
            $sqlQuery .= ";";
            Database::executeQuery("administrativeGeneral", "administrativeGeneral@16", $sqlQuery);
//            create audit trail
            $result = self::createAudit($sqlQuery, 'result', "INSERT", 'Insert all result as a bulk.');
            fclose($resultFile);
            return $result;
        }
        return false;
    }

    public static function getEnrollmentID($studentID, $courseCode, $attempt){
        $sqlQuery = "SELECT enrollmentID FROM student_enroll_course WHERE studentIndexNo='$studentID' AND courseCode='$courseCode' AND attempt='$attempt' AND isActive=TRUE LIMIT 1";
        return Database::executeQuery("administrativeGeneral", "administrativeGeneral@16", $sqlQuery)[0]['enrollmentID'];
    }
}