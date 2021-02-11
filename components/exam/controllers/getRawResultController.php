<?php
class GetRawResultController extends Controller{
    public static function init(){
        $passingData=GetRawResultModel::loadReviewData();
        self::createView("getRawResultView",$passingData);
//        display error toast for data loading error
		if(!$passingData)
			echo("<script>createToast('Warning (error code: #ERM03-F)','Failed to load review list.','W')</script>");

//		confirm result receive section
        if(isset($_POST['confirmation'])){
            GetRawResultModel::sendResultReceiveConfirmation($_GET['fileID']);
        }
    }
}
