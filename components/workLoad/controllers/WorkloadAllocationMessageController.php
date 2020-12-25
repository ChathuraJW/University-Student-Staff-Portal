<?php
class WorkloadAllocationMessageController extends Controller{
    // public function __construct(){
    //     parent::__construct();
    // }
    public static function open(){
        $data=WorkLoadAllocationModel::getWorkLoad();
        self::createView("workloadAllocationMessageView",$data);

        if(isset($_POST['submit'])){
            
            $fromDate=$_POST['fromDate'];
            $fromTime=$_POST['fromTime'];
            $toDate=$_POST['toDate'];
            $toTime=$_POST['toTime'];
            
            $members=WorkLoadAllocationModel::searchMembers($fromDate,$fromTime,$toDate,$toTime);
            // self::createView("workloadAllocationMessageView",$members);
        }

    }
    
}
?>