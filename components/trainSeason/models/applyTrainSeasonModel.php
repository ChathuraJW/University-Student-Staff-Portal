<?php
    class ApplyTrainSeasonModel extends Model{
        public static function getHistory(){
            $userName = $_COOKIE['userName'];
            $sqlQueryGetHistory = "SELECT * FROM request_train_season WHERE requester='$userName'";

            $requesterData = Database::executeQuery("root","",$sqlQueryGetHistory);
             
            $dataList = array();
            foreach($requesterData as $raw){
                $newRequesterData= new TrainSeason();

                $newRequesterData->setData($raw['requestID'],$raw['seasonID'],$raw['requester'],$raw['academicYear'],$raw['age'],$raw['address'],
                                            $raw['fromMonth'],$raw['toMonth'],$raw['nearRailwayStationHome'],$raw['nearRailwayStationUni'],$raw['submittedTimestamp'],NULL);
                $dataList[] = $newRequesterData;
                
            }
            return $dataList;   
             

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
                

                //if($count>=2){
                    //echo ("
                        //<script>
                            //alert('The number of times you request is over');
                        //</script>
                    //");
                //}
                $dbObject->closeConnection();
                return $newUserData;
            }else{
                return false;
            }



        }

        public static function getCount($age){
            $userName = $_COOKIE['userName'];

            $sqlQueryGetCount = "SELECT COUNT(requestID) AS applicationCount FROM request_train_season WHERE requester='$userName' AND age=$age";
            

            return Database::executeQuery("root","",$sqlQueryGetCount)[0]['applicationCount'];
        }

        public static function insertData($requesterDetail){
            $dbObject = new Database();
            $dbObject->establishTransaction('root','');
            $insertQuery = "INSERT INTO request_train_season(requester,address,academicYear,age,fromMonth,toMonth,nearRailwayStationHome,nearRailwayStationUni,submittedTimestamp) VALUES('".$requesterDetail->getRequester()."','".$requesterDetail->getAddress()."','".$requesterDetail->getAcademicYear()."',".$requesterDetail->getAge().",'".$requesterDetail->getFromMonth()."','".$requesterDetail->getToMonth()."','".$requesterDetail->getNearRailwayStationHome()."','".$requesterDetail->getNearRailwayStationUni()."',NOW())";
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
