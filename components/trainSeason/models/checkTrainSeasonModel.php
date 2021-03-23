<?php
    class CheckTrainSeasonModel extends Model{
        public static function getData(){
            $sqlQuery = "SELECT * FROM request_train_season WHERE isChecked=0";
            
            $requesterData = Database::executeQuery("root","",$sqlQuery);
             
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
        
    }
?>