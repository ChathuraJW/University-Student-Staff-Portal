<?php
    class ViewIQACModel extends Model{
        public static function getSubject(){
            $sqlQuery = "SELECT courseCode,name FROM course_module";
            $subjects = Database::executeQuery("root","",$sqlQuery);

            if($subjects){
                $subjectList = array();
                foreach($subjects as $data){
                    $newSubject = new courseModule();
                    $newSubject->setSubjects($data['courseCode'],$data['name']);
                    $subjectList[]=$newSubject;
                }
                return $subjectList;
            }else{
                return false;
            }
        }

        public static function getRecentFiles(){
            $userName = $_COOKIE['userName']; 
            $sqlQueryGetRecent = "SELECT * FROM iqac_report WHERE userName=$userName ORDER BY reportID DESC LIMIT 10;";
            $recentFiles = Database::executeQuery("root","",$sqlQueryGetRecent);

            if($recentFiles){
                $recentFileList = array();
                foreach($recentFiles as $data){
                    $newFileData = new IQACReport();
                    $newFileData->setDetail($data['staffID'],$data['subjectCode'],$data['academicYear'],$data['batchYear'],$data['semester'],$data['fileLocation'],$data['reportName']);
                    $recentFileList[]=$newFileData;
                }
                return $recentFileList ;
            }else{
                return false;
            }
        }

        public static function getSearch($academicYear,$batchYear,$semester,$subject){
            $userName = $_COOKIE['userName'];
            $sqlQueryGetSearch = "SELECT * FROM iqac_report WHERE userName=$userName";

            if($academicYear != '0'){
                $sqlQuery = " academicYear=$academicYear AND";
            }

            if($batchYear==1){
                $sqlQuery = " semester=1 AND semester=2 AND";
            }else if($batchYear==2){
                $sqlQuery = " semester=3 AND semester=4 AND";
            }else if($batchYear==3){
                $sqlQuery = " semester=5 AND semester=6 AND";
            }else if($batchYear==4){
                $sqlQuery = " semester=7 AND semester=8 AND";
            }

            if($semester==2){
                $sqlQuery = " semester=2 OR semester=4 OR semester=6 OR semester=8 AND";
            }else if($semester==1){
                $sqlQuery = " semester=1 OR semester=3 OR semester=5 OR semester=7 AND";
            }

            if($subject != '0'){
                $sqlQuery = " subjectCode='$subject'";
            }

            $sqlQuery = trim($sqlQuery,"AND");
            $sqlQuery = trim($sqlQuery,"WHERE");

            $searchResult = Database::executeQuery("root","",$sqlQuery);

            if($searchResult){
                $reportList=array();
                foreach($searchResult as $data){
                    $newFileData = new IQACReport();
                    $newFileData->setDetail($data['staffID'],$data['subjectCode'],$data['academicYear'],$data['batchYear'],$data['semester'],$data['fileLocation'],$data['reportName']);
                    $reportList[]=$newFileData; 
                }
                return $reportList;
            }else{
                return false;
            }
        }
    }

?>