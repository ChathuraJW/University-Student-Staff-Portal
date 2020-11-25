<?php
class GetRawResultController extends Controller{
    public static function init(){
        $passingData=GetRawResultModel::loadReviewData();
        self::createView("getRawResultView",$passingData);

        if(isset($_POST['confirmation'])){
            $result=GetRawResultModel::sendResultReceiveConfirmation($_GET['fileID']);
            if($result){
                echo("
                    <script>
                        alert('Successfully send confirmation.');
                        window.location.href=document.location.href.toString().split('getRawResult')[0]+'getRawResult';
                    </script>
                ");
            }else{
                echo("
                    <script>
                        alert('Sorry, something went wrong.');
                    </script>
                ");
            }
        }
    }
}
