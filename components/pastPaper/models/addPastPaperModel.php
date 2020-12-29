<?php


class AddPastPaperModel extends Model
{
    public static function getRecentUploads():array{
        $sqlQuery = "SELECT paperID, subjectCode, yearOfExam, semester FROM pastpaper ORDER BY paperID DESC LIMIT 10";
        $recentUploads = Database::executeQuery('root','',$sqlQuery);

        $pastPaperList = array();
        foreach ($recentUploads as $row){
            $newPastPaper = new PastPaper();
            $newPastPaper->setPastPaper($row['paperID'],$row['subjectCode'],$row['yearOfExam'],$row['semester']);
            $pastPaperList[] = $newPastPaper;

        }
        return $pastPaperList;
    }

    public static function getSubjectData(){
        $sqlQuery = "SELECT courseCode, name, semester FROM course_module ORDER BY semester";
        $subjects = Database::executeQuery('root','',$sqlQuery);

        $subjectList = array();
        foreach ($subjects as $row){
            $newSubject = new courseModule();
            $newSubject->setCourseModule($row['courseCode'], $row['name'], $row['semester']);
            $subjectList[] = $newSubject;
        }
        return $subjectList;
    }

    public static function addPastPaperDetails($pastPaper){
        $databaseInstance = new Database();
        $databaseInstance->establishTransaction('root','');
        $sqlQuery = "INSERT INTO pastpaper(subjectCode, yearOfExam, semester) VALUES ('".$pastPaper->getSubjectCode()."',".$pastPaper->getExaminationYear().",".$pastPaper->getSemester().")";
        $databaseInstance->executeTransaction($sqlQuery);
//        create audit trail
        $databaseInstance->transactionAudit($sqlQuery,'pastpaper', 'PastPaper uploaded to the system.' );
        echo($sqlQuery);

        if($databaseInstance->getTransactionState()){

        }
        $databaseInstance->closeConnection();
    }

}