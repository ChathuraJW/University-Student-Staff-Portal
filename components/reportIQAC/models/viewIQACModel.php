<?php


class ViewIQACModel extends Model{
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

    /*public static function getRecentUploads():array|bool{
        $userName = $_COOKIE['userName'];
        $sqlQuery = "SELECT  staffID, subjectCode, examinationYear, semester, reportName, fileLocation FROM iqac_report ORDER BY reportID DESC LIMIT 15";
        $recentUploads = Database::executeQuery('root','',$sqlQuery);
        echo $sqlQuery;
        //initialize the returning array
        if($recentUploads){
            $pastPaperList = array();
            foreach ($recentUploads as $row){
                $newReport = new IQACReport();
                $newReport->setReportDetail($row['staffID'],$row['subjectCode'],$row['examinationYear'],$row['semester'],$row['reportName'],$row['fileLocation']);
                $reportList[] = $newReport;
            }
            return $reportList;
        }else{
            return false;
        }

    }*/

    public static function searchReport($examinationYear,$subject):array|bool{
        $userName = $_COOKIE['userName'];
        if(!$examinationYear && !$subject){
            $sqlQuery = "SELECT * FROM iqac_report WHERE staffID='$userName'";
        }else if(!$examinationYear && $subject){
            $sqlQuery = "SELECT * FROM iqac_report WHERE staffID='$userName' AND subjectCode='$subject'";
        }else if($examinationYear && !$subject){
            $sqlQuery = "SELECT * FROM iqac_report WHERE staffID='$userName' AND examinationYear=$examinationYear";
        }else{
            $sqlQuery = "SELECT * FROM iqac_report WHERE staffID='$userName' AND examinationYear=$examinationYear AND subjectCode='$subject'";
        }
        
         
        echo($sqlQuery);
        $searchResult = Database::executeQuery('root','',$sqlQuery);

         


        //initialize the returning array
        if($searchResult){
            $reportList = array();
            foreach ($searchResult as $row){
                $newReport = new IQACReport();
                $newReport->setReportDetail($row['staffID'],$row['subjectCode'],$row['examinationYear'],$row['semester'],$row['reportName'],$row['fileLocation']);
                $reportList[] = $newReport;
            }
            return $reportList;
        }else{
            return false;
        }

    }

}