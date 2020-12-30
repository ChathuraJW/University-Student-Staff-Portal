<?php


class AddPastPaperModel extends Model
{


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
        echo($sqlQuery);
//        create audit trail
        $databaseInstance->transactionAudit($sqlQuery,'pastpaper', 'INSERT',"PastPaper uploaded to the system." );


        if($databaseInstance->getTransactionState()){
            if($databaseInstance->commitToDatabase()){
                echo("success");
            }

        }else{
            echo("<script>createToast('Warning(error code:#PPM01-T)','Failed to submit past Paper.','W')</script>");
        }
        $databaseInstance->closeConnection();
    }

    public static function getSubjectName($subjectCode){
        $sqlQuery = "SELECT name FROM course_module WHERE courseCode = '$subjectCode'";
        return Database::executeQuery('root', '',$sqlQuery)[0]['name'];

    }

}