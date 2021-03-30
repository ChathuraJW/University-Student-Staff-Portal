<?php
    class workloadRequestModel extends Model{                              
        public static function insertData($userName,$title,$description,$location,$Date,$fromTime,$toTime,$requestDate){
            $databaseInstance=new Database;
            $databaseInstance->establishTransaction('root','');

            $query="INSERT INTO workload(workloadOwner, title, description, location, Date, fromTime, toTime, requestDate) VALUES ('$userName','$title','$description','$location','$Date','$fromTime','$toTime','$requestDate')";
            $databaseInstance->executeTransaction($query);
            if($databaseInstance->getTransactionState()){

                $databaseInstance->transactionAudit($query, 'workload', "INSERT", 'Insert a new workload request Message into the system.');
                
                if($databaseInstance->getTransactionState()){
                    if($databaseInstance->commitToDatabase()){
        //                display success message
                        echo("<script>createToast('Success','Request a workload Message successfully.','S');</script>");
                    }
                }
                else{
    //                display fail message
                    echo("<script>createToast('Warning (error code: #WLR02)','Failed to Request .','W')</script>");
                }
            }
            else{
                echo("<script>createToast('Warning (error code: #WLR02)','Failed to Request  .','W')</script>");

            }
            $databaseInstance->closeConnection();

        }
        public static function getData($userName){
            $appointmentList= array();
            $current=date("Y-m-d");
            $past= date('Y-m-d',strtotime('-2 week',strtotime($current)));
            $query="SELECT * FROM workload WHERE workloadOwner='$userName' AND requestDate>='$past' ";
            return Database::executeQuery("root","",$query);
            
        }

        public static function getHall(){
            $query="SELECT hallID FROM hall_and_lab";
            return Database::executeQuery('root','',$query);
        }
        

        
    }
?>