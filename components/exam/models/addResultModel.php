<?php
class AddResultModel extends Model{
    public static function getSubjectData(){
        $sqlQuery="Select * from course_module";
        return Database::executeQuery("root","",$sqlQuery);
    }
    public static function saveFileData($subjectCode,$semester,$examinationYear,$attempt,$batch,$fileData){
        $sqlQuery="INSERT INTO result_data_file(subjectCode, semester, yearOfExam, attempt, batch, isEncrypted, fileLocation) VALUES ('$subjectCode',$semester,'$examinationYear'
                               ,'$attempt','$batch',FALSE,'boardConfirmedResults/$fileData')";
        $result= Database::executeQuery("root","",$sqlQuery);
//        create audit trail
//        self::createAudit($sqlQuery,'result_data_file',"INSERT",'Insertion when file upload');
        return $result;
    }
}