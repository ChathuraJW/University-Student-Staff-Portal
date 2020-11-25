<?php
class AddRawResultModel extends Model{
    public static function saveFileData($subjectCode,$semester,$examinationYear,$attempt,$batch,$fileData){
        $sqlQuery="INSERT INTO result_data_file(subjectCode, semester, yearOfExam, attempt, batch, isEncrypted, fileLocation) VALUES ('$subjectCode',$semester,'$examinationYear'
                               ,'$attempt','$batch',TRUE,'assets/rawResults/$fileData')";
        $result= Database::executeQuery("root","",$sqlQuery);
//        create audit trail
        self::createAudit($sqlQuery,'result_data_file','INSERT','Insert when academic staff send raw result file. Related to storing file information.');

        if($result){
            $sqlQuery="SELECT fileID FROM result_data_file WHERE fileLocation='assets/rawResults/$fileData' LIMIT 1";
            $result=Database::executeQuery("root","",$sqlQuery);
            return ($result[0]['fileID']);
        }else{
            return false;
        }
    }

    public static function resultFileOwnerData($owner,$fileID){
        $sqlQuery="INSERT INTO submit_raw_result(staffID, fileID, submitTimestamp) VALUES ('$owner',$fileID,NOW())";
        $result=Database::executeQuery("root","",$sqlQuery);
//        create audit trail
        self::createAudit($sqlQuery,'submit_raw_result',"INSERT",'Insert when academic staff send raw result file. Related to storing file owner information.');
        return $result;
    }
}
