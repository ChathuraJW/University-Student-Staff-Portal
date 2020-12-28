<?php
    class WorkLoadAllocationModel extends Model{ 
        public static function getWorkLoad(){
            $workLoadList= array();
            $workLoads=Database::executeQuery("root","","SELECT * FROM workload,User where workload.workloadOwner=User.userName AND workload.checkValue=0;");
            // print_r($workLoads);

            foreach($workLoads as $workLoad){
                $newWorkLoad= new AllocatedWorkload;
                
                $newWorkLoad->setWorkLoad($workLoad['workloadOwner'],$workLoad['title'],$workLoad['description'],$workLoad['location'],$workLoad['Date'],$workLoad['fromTime'],$workLoad['toTime'],$workLoad['salutation'],$workLoad['fullName'],$workLoad['requestDate'],$workLoad['workloadID']);
                
                $workLoadList[]=$newWorkLoad;
            }
            return $workLoadList;
        }
        // public static function setWorkload($members,$workloadID){
        //     $timestamp=date("F j, Y \a\t g:ia");
        //     $length
        //     for($i=0)
        //     $query="INSERT INTO academic_support_staff_workload(staffID, workloadID, allocationTimestamp, isChecked) VALUES (2,3,4,5)"
        // }
    }
?>