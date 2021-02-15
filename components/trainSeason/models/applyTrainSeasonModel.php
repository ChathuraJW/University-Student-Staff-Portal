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
            $dbObject = new Database();
            $dbObject->establishTransaction('root','');


            $userName = $_COOKIE['userName'];
            $sqlQuery = "SELECT * FROM user WHERE userName='$userName'";
            $userData=$dbObject->executeTransaction($sqlQuery)[0];

            if($userData){
                $newUserData = new User();
                $newUserData->setUser($userData['firstName'],$userData['lastName'],$userData['userName'],$userData['address'],$userData['dob']);
                $age=$newUserData->getAge();
                //get query count
                $sqlQuery2 = "SELECT COUNT(requestID) AS applicationCount FROM request_train_season WHERE requester='$userName' AND age=$age";
                $count=$dbObject->executeTransaction($sqlQuery2)[0]['applicationCount'];

                if($count>=2){
                    echo ("
                        <script>
                            alert('The number of times you request is over');
                        </script>
                    ");
                }
                $dbObject->closeConnection();
                return $newUserData;
            }else{
                return false;
            }



        }


        public static function insertData($requesterDetail){
            $dbObject = new Database();
            $dbObject->establishTransaction('root','');
            $insertQuery = "INSERT INTO request_train_season(requester,address,academicYear,age,fromMonth,toMonth,nearRailwayStationHome,nearRailwayStationUni) VALUES('".$requesterDetail->getRequester()."','".$requesterDetail->getAddress()."','".$requesterDetail->getAcademicYear()."',".$requesterDetail->getAge().",'".$requesterDetail->getFromMonth()."','".$requesterDetail->getToMonth()."','".$requesterDetail->getNearRailwayStationHome()."','".$requesterDetail->getNearRailwayStationUni()."')";
            echo $insertQuery;
             
            //execute the query
            $dbObject->executeTransaction($insertQuery);
            

            //create audit trial
            $dbObject->transactionAudit($insertQuery,'request_train_season','INSERT','Insert train season requester data into table.');

            //check transaction state
            if($dbObject->getTransactionState()){
                if($dbObject->commitToDatabase()){
                    echo ("<script>createToast('Success','Operation successfully completed.','S')</script>");
                }else{
                    echo ("<script>createToast('Warning(error code: #TSM01)','Failed to confirm.','W')</script>");
                }
            }else{
                echo ("<script>createToast('Warning(error code: #TSM01)','Failed to confirm.','W')</script>");
            }
            $dbObject->closeConnection();
        }
    }
