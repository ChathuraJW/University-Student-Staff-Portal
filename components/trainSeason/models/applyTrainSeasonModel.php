<?php
    class ApplyTrainSeasonModel extends Model{
        public static function getHistory(){
            $userName = $_COOKIE['userName'];
            $sqlQueryGetHistory = "SELECT * FROM request_train_season WHERE requester='$userName'";
            
            $requesterData = Database::executeQuery("root","",$sqlQueryGetHistory)[0];
            if($requesterData){
                $newRequesterData= new TrainSeason();
                
                $newRequesterData->setData($requesterData['requester'],$requesterData['academicYear'],$requesterData['age'],$requesterData['address'],
                                            $requesterData['fromMonth'],$requesterData['toMonth'],$requesterData['nearRailwayStationHome'],$requesterData['nearRailwayStationUni']);
                return $newRequesterData;
            }else{
                return false;
            }

        }
        public static function getData(){
            
            $userName = $_COOKIE['userName'];
            $sqlQuery = "SELECT * FROM user WHERE userName='$userName'";
            
            $userData=Database::executeQuery("root","",$sqlQuery)[0];
        
            if($userData){
                $newUserData = new User();
                $newUserData->setUser($userData['firstName'],$userData['lastName'],$userData['userName'],$userData['address'],$userData['dob']);
                return $newUserData;
            }else{
                return false;
            }
            
        }
         

        public static function insertData($name,$regNo,$address,$fromMonth,$toMonth,$homeStation,$universityStation){
            $dbObject = new Database();
            $dbObject->establishTransaction('root','');
            $insertQuery = "INSERT INTO request_train_season(requester,regNo,address,fromMonth,toMonth,nearRailwayStationHome,nearRailwayStationUni)
            VALUES('$name','$regNo','$address','$fromMonth','$toMonth','$homeStation','$universityStation')";
            //execute the query
            $dbObject->executeTransaction($insertQuery);

            //create audit trial
            $dbObject->transactionAudit($insertQuery,'request_train_season','INSERT','Insert train season requester data into table.');

            //check transaction state
            if($dbObject->getTransactionState()){
                if($dbObject->commitToDatabase()){
                    echo ("<script>createToast('Success','Operation successfully completed.','S')</script>");
                }else{
                    echo ("<script>createToast('Warning(error code: #ERM04)','Failed to confirm.','W')</script>");
                }
            }else{
                echo ("<script>createToast('Warning(error code: #ERM04)','Failed to confirm.','W')</script>");
            }
            $dbObject->closeConnection();
        }
    }