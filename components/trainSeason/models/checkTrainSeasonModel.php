<?php
    class CheckTrainSeasonModel extends Model{
        public static function getData(){
            $sqlQuery = "SELECT * FROM request_train_season";
            $requesterData = Database::executeQuery("root","",$sqlQuery); 
            if($data){
                $requesterDataList = array();
                
                foreach($requesterData as $data){
                    $newRequesterData = new TrainSeason();
                    $newRequesterData->setData($data['requester'],$data['academicYear'],$data['age'],$data['address'],$data['fromMonth'],
                                              $data['toMonth'],$data['nearRailwayStationHome'],$data['nearRailwayStationUni']);
                    $requesterDataList[] = $newRequesterData;
                }
                return $requesterDataList;
            }else{
                return false;
            }
        }
        
    }
?>