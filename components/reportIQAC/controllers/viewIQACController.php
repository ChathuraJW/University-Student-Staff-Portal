<?php
class ViewIQACController extends Controller{

    public static function viewIQACReport(){
         
        $getSubject=ViewIQACModel::getSubjectData();

        if(isset($_POST['search'])){
            $examinationYear = $_POST['examinationYear'];
            $subject = $_POST['subject'];

            //check whether all inputs are set or not
            if(!$examinationYear || !$subject){
                echo("<script>createToast('Warning(error code:#IQAC03-T)','Failed to get inputs from input feilds.','W')</script>");
            }

            $searchReports = ViewIQACModel::searchReport($examinationYear,$subject);

            $sendData = array($getSubject, $searchReports,"Your Search Report");
            self::createView("viewIQACView",$sendData);


             
        }else{
            
            $searchReports = ViewIQACModel::searchReport(false,false);

            $sendData = array($getSubject, $searchReports,"Your Recent Reports");
            self::createView("viewIQACView",$sendData);
        }
    }
}


