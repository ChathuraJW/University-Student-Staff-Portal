<?php
class GetRawResultModel extends Model{
    public static function loadReviewData(){
        $sqlQuery="SELECT * FROM submit_raw_result WHERE isReceived=false";
        $fileList=Database::executeQuery("root","",$sqlQuery);
        $returnDataset=Array();
        foreach ($fileList as $row){
            $fileID=$row['fileID'];
            $sqlQuery="SELECT * FROM result_data_file WHERE fileID=$fileID LIMIT 1";
            $fileInfo=Database::executeQuery("root","",$sqlQuery);
//            replace subject code with subject code and name
            $fileInfo[0]['subjectCode']=$fileInfo[0]['subjectCode']."_".self::getSubjectName($fileInfo[0]['subjectCode']);
            array_push($returnDataset,Array(0=>$row['staffID'],1=>$fileInfo[0]));
        }
        return $returnDataset;
    }

    public static function sendResultReceiveConfirmation($fileID){
        $sqlQuery="UPDATE submit_raw_result SET isReceived=true,receivedTimestamp=NOW() WHERE fileID=$fileID";
        $result=Database::executeQuery("root","",$sqlQuery);
//        create audit trail
        self::createAudit($sqlQuery,'submit_raw_result',"UPDATE",'Update table after SAR take raw result file.');
        return $result;
    }
}