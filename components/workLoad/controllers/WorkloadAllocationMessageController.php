<?php
class WorkloadAllocationMessageController extends Controller{
    // public function __construct(){
    //     parent::__construct();
    // }
    public static function open(){
        $data=WorkLoadAllocationModel::getWorkLoad();
        self::createView("workloadAllocationMessageView",$data);

        if(isset($_POST["setMembers"])){
            $members=$_POST["members"];
            echo $members;
            $Date=$_POST['date'];
            $fromTime=$_POST['fromTime'];
            $toTime=$_POST['toTime'];
            
            $members=WorkLoadAllocationModel::setWorkload($members,$workloadID);
            // self::createView("workloadAllocationMessageView",$members);
        }

    }
    
}
?>