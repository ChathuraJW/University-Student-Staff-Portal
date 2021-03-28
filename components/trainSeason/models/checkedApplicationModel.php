<?php
    class CheckedApplicationModel extends Model{
        public static function getData($getRequestID){
            $sqlQuery = "SELECT * FROM request_train_season WHERE isChecked=0 AND requestID=$getRequestID";
            
            $requesterData = Database::executeQuery("root","",$sqlQuery);
             
            if($requesterData){
                $requesterDataList = array();
                
                foreach($requesterData as $data){
                    $getNameQuery = "SELECT fullName FROM user WHERE userName='".$data['requester']."'";
                    $getName = Database::executeQuery("root","",$getNameQuery)[0]['fullName'];

                    $newRequesterData = new TrainSeason();
                    $newRequesterData->setData($data['requestID'],NULL,$data['requester'],$data['academicYear'],$data['age'],$data['address'],$data['fromMonth'],
                                              $data['toMonth'],$data['nearRailwayStationHome'],$data['nearRailwayStationUni'],$data['submittedTimestamp'],NULL);
                    $newRequesterData->setRequesterFullName($getName);
                    $requesterDataList[] = $newRequesterData;
                }
                return $requesterDataList;
            }else{
                return false;
            }
        }

        public static function getCompletedApplicationData($getRequestID){
            $sqlQuery = "SELECT * FROM request_train_season WHERE isChecked=1 AND requestID=$getRequestID";
            
            $requesterData = Database::executeQuery("root","",$sqlQuery);
             
            if($requesterData){
                $requesterDataList = array();
                
                foreach($requesterData as $data){
                    $getNameQuery = "SELECT fullName FROM user WHERE userName='".$data['requester']."'";
                    $getName = Database::executeQuery("root","",$getNameQuery)[0]['fullName'];

                    $newRequesterData = new TrainSeason();
                    $newRequesterData->setData($data['requestID'],$data['seasonID'],$data['requester'],$data['academicYear'],$data['age'],$data['address'],$data['fromMonth'],
                                              $data['toMonth'],$data['nearRailwayStationHome'],$data['nearRailwayStationUni'],$data['submittedTimestamp'],NULL);
                    $newRequesterData->setRequesterFullName($getName);
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
            $updateSeasonID = "UPDATE request_train_season SET seasonID=".$insertSeasonID->getSeasonID()." ,completedTimestamp=NOW() WHERE requestID=".$insertSeasonID->getRequestID()."";
             
            
            $dbObject->executeTransaction($updateSeasonID);
            
            //create audit trail
            $dbObject->transactionAudit($updateSeasonID,'request_train_season', 'UPDATE',"Season ID is add to the system." );
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

            header("location:checkTrainSeason");
        }

        public static function updateCollectedState($insertData){
            $dbObject = new Database();
            $dbObject->establishTransaction('root','');
            $updateCollectedState = "UPDATE request_train_season SET collectedPerson='".$insertData->getCollectedPerson()."' ,collectedTimestamp=NOW() WHERE requestID=".$insertData->getRequestID()."";
             
             
            $dbObject->executeTransaction($updateCollectedState);
            
            //create audit trail
            $dbObject->transactionAudit($updateCollectedState,'request_train_season', 'UPDATE',"Updated Successfully." );
            if($dbObject->getTransactionState()){
                if($dbObject->commitToDatabase()){
                    echo ("<script>createToast('Success','Operation successfully completed.','S')</script>");
                }else{
                    echo ("<script>createToast('Warning(error code: #TSM02)','Failed to confirm.','W')</script>");
                }
            }else{
                echo ("<script>createToast('Warning(error code: #TSM02)','Failed to confirm.','W')</script>");
            }

            header("location:checkTrainSeason");
        }
        
    }