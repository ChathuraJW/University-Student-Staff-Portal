<?php
    class CheckTrainSeasonModel extends Model{
        public static function getData(){
            $sqlQuery = "SELECT * FROM request_train_season WHERE isChecked=0";
            
            $requesterData = Database::executeQuery("root","",$sqlQuery);
             
            if($requesterData){
                $requesterDataList = array();
                
                foreach($requesterData as $data){
                    $newRequesterData = new TrainSeason();
                    $newRequesterData->setData($data['requestID'],NULL,$data['requester'],$data['academicYear'],$data['age'],$data['address'],$data['fromMonth'],
                                              $data['toMonth'],$data['nearRailwayStationHome'],$data['nearRailwayStationUni'],$data['submittedTimestamp'],NULL);
                    $requesterDataList[] = $newRequesterData;
                }
                return $requesterDataList;
            }else{
                return false;
            }
        }


        public static function getCompletedApplicationData(){
            $sqlQuery = "SELECT * FROM request_train_season WHERE isChecked=1";
            
            $requesterData = Database::executeQuery("root","",$sqlQuery);
             
            if($requesterData){
                $requesterDataList = array();
                
                foreach($requesterData as $data){
                    $newRequesterData = new TrainSeason();
                    $newRequesterData->setData($data['requestID'],NULL,$data['requester'],$data['academicYear'],$data['age'],$data['address'],$data['fromMonth'],
                                              $data['toMonth'],$data['nearRailwayStationHome'],$data['nearRailwayStationUni'],$data['submittedTimestamp'],NULL);
                    $requesterDataList[] = $newRequesterData;
                }
                return $requesterDataList;
            }else{
                return false;
            }
        }

         
        
    }
?>