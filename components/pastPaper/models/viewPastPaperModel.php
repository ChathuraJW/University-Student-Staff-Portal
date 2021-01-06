<?php


class ViewPastPaperModel extends Model{
    public static function getSubjectData():array|bool{
        $sqlQuery = "SELECT courseCode, name, semester FROM course_module ORDER BY semester";
        $subjects = Database::executeQuery('root','',$sqlQuery);

        //initialize the returning array
        if($subjects){
            $subjectList = array();
            foreach ($subjects as $row){
                $newSubject = new courseModule();
                $newSubject->setCourseModule($row['courseCode'], $row['name'], $row['semester']);
                $subjectList[] = $newSubject;
            }
            return $subjectList;
        }else{
            return  false;
        }
    }

    public static function getRecentUploads():array|bool{
        $sqlQuery = "SELECT  subjectCode, yearOfExam, semester, fileName FROM pastpaper ORDER BY paperID DESC LIMIT 15;";
        $recentUploads = Database::executeQuery('root','',$sqlQuery);

        //initialize the returning array
        if($recentUploads){
            $pastPaperList = array();
            foreach ($recentUploads as $row){
                $newPastPaper = new PastPaper();
                $newPastPaper->setPastPaper($row['subjectCode'],$row['yearOfExam'],$row['semester'],$row['fileName']);
                $pastPaperList[] = $newPastPaper;
            }
            return $pastPaperList;
        }else{
            return false;
        }

    }

    public static function showSearchResult($examinationYear,$realSemester,$subject):array|bool{
        $sqlQuery = "SELECT subjectCode, yearOfExam, semester, fileName FROM pastpaper WHERE";

        if($examinationYear != '0'){
            $sqlQuery.=" yearOfExam = $examinationYear AND";
        }
        if($realSemester != '0'){
            $sqlQuery.=" semester = $realSemester AND";
        }
        if($subject != '0'){
            $sqlQuery.=" subjectCode = $subject";
        }

        $sqlQuery=trim($sqlQuery,"AND");
        $sqlQuery=trim($sqlQuery,"WHERE");
//        echo($sqlQuery);
        $searchResult = Database::executeQuery('root','',$sqlQuery);


        //initialize the returning array
        if($searchResult){
            $pastPaperList = array();
            foreach ($searchResult as $row){
                $newPastPaper = new PastPaper();
                $newPastPaper->setPastPaper($row['subjectCode'],$row['yearOfExam'],$row['semester'],$row['fileName']);
                $pastPaperList[] = $newPastPaper;
            }
            return $pastPaperList;
        }else{
            return false;
        }

    }

}