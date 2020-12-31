<?php


class ViewPastPaperModel extends Model{
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

    public static function getRecentUploads():array{
        $sqlQuery = "SELECT  subjectCode, yearOfExam, semester, fileName FROM pastpaper ORDER BY paperID DESC LIMIT 15;";
        $recentUploads = Database::executeQuery('root','',$sqlQuery);

        $pastPaperList = array();
        foreach ($recentUploads as $row){
            $newPastPaper = new PastPaper();
            $newPastPaper->setPastPaper($row['subjectCode'],$row['yearOfExam'],$row['semester'],$row['fileName']);
            $pastPaperList[] = $newPastPaper;
//            print_r($newPastPaper->getPaperName());

        }
//        print_r($pastPaperList);
        return $pastPaperList;
    }

    public static function showSearchResult($examinationYear,$realSemester,$subject){
        $sqlQuery = "SELECT subjectCode, yearOfExam, semester, fileName FROM pastpaper WHERE subjectCode='$subject' OR yearOfExam=$examinationYear OR semester=$realSemester ";
        echo($sqlQuery);
        $rearchResult = Database::executeQuery('root','',$sqlQuery);

        $pastPaperList = array();
        foreach ($rearchResult as $row){
            $newPastPaper = new PastPaper();
            $newPastPaper->setPastPaper($row['subjectCode'],$row['yearOfExam'],$row['semester'],$row['fileName']);
            $pastPaperList[] = $newPastPaper;
//            print_r($newPastPaper->getPaperName());

        }
        echo($pastPaperList);
        return $pastPaperList;
    }

}