<?php
class WorkloadReceiveController extends Controller{
    // public function __construct(){
    //     parent::__construct();
    // }
    public static function open(){
        
        $checked=1;
        $unChecked=0;

        $newMessages=WorkLoadReceiveModel::getWorkLoadMessages($unChecked);
        $viewedMessages=WorkLoadReceiveModel::getWorkLoadMessages($checked);
        $passingData=array($newMessages,$viewedMessages);
        self::createView("workloadReceiveView",$passingData);

        if(isset($_POST["submit"])){
            $reply=$_POST["reply"];
            $workloadID=$_POST["workloadID"];
            WorkLoadReceiveModel::setReply($reply,$workloadID);
    
        }
    }
// repling for workload message

    
    
}
?>