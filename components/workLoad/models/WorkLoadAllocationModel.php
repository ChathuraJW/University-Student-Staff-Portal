<?php
    class WorkLoadAllocationModel extends Model{ 
        public static function getWorkLoad(){
            $workLoadList= array();
            $workLoads=Database::executeQuery("root","","SELECT * FROM workload,User where workload.workloadOwner=User.userName AND workload.checkValue=0;");
            // print_r($workLoads);

            foreach($workLoads as $workLoad){
                $newWorkLoad= new AllocatedWorkload;
                
                $newWorkLoad->setWorkLoad($workLoad['workloadOwner'],$workLoad['title'],$workLoad['description'],$workLoad['location'],$workLoad['Date'],$workLoad['fromTime'],$workLoad['toTime'],$workLoad['salutation'],$workLoad['fullName'],$workLoad['requestDate']);
                
                $workLoadList[]=$newWorkLoad;
            }
            return $workLoadList;
        }
        public static function searchMembers($fromDate,$fromTime,$toDate,$toTime){
            $membersList=array();
            $members=Database::executeQuery("root","","SELECT ");
        }
    }
?>