<?php
    class CheckedApplicationModel extends Model{
        public static function getData(){
            $sqlQuery = "SELECT * FROM request_train_season WHERE isChecked=0";
            
            $requesterData = Database::executeQuery("root","",$sqlQuery);
            echo $requesterData; 
            if($requesterData){
                $requesterDataList = array();
                
                foreach($requesterData as $data){
                    $newRequesterData = new TrainSeason();
                    $newRequesterData->setData(NULL,$data['requester'],$data['academicYear'],$data['age'],$data['address'],$data['fromMonth'],
                                              $data['toMonth'],$data['nearRailwayStationHome'],$data['nearRailwayStationUni'],$data['submittedTimestamp']);
                    $requesterDataList[] = $newRequesterData;
                }
                return $requesterDataList;
            }else{
                return false;
            }
        }

        public static function insertSeasonID($insertSeasonID){
            $dbObject = new Database();
            $dbObject->establishTransaction('root','');

            $insertQuery = "INSERT INTO request_train_season(seasonID,completedTimestamp) VALUES(".$insertSeasonID->getSeasonID().",NOW())";

            $dbObject->executeTransaction($insertQuery);
            echo($insertQuery);
       
            //create audit trail
            $dbObject->transactionAudit($insertQuery,'request_train_season', 'INSERT',"Season ID is add to the system." );
            if($dbObject->getTransactionState()){
                if($dbObject->commitToDatabase()){
                    echo ("<script>createToast('Success','Operation successfully completed.','S')</script>");
                }else{
                    echo ("<script>createToast('Warning(error code: #TSM02)','Failed to confirm.','W')</script>");
                }
            }else{
                echo ("<script>createToast('Warning(error code: #TSM02)','Failed to confirm.','W')</script>");
            }


            //to do notification function

            $updateQuery = "UPDATE request_train_season SET isChecked = 1 WHERE seasonID=".$insertSeasonID->getSeasonID()."";
            $dbObject->executeTransaction($updateQuery);

            //create audit trail
            $dbObject->transactionAudit($updateQuery,'request_train_season', 'INSERT',"Update the value if checked the data." );
            if($dbObject->getTransactionState()){
                if($dbObject->commitToDatabase()){
                    echo ("<script>createToast('Success','Operation successfully completed.','S')</script>");
                }else{
                    echo ("<script>createToast('Warning(error code: #TSM03)','Failed to confirm.','W')</script>");
                }
            }else{
                echo ("<script>createToast('Warning(error code: #TSM03)','Failed to confirm.','W')</script>");
            }
        }
        
    }