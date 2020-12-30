<?php
    class ApplyTrainSeasonModel extends Model{
        public static function getData(){
            $userName = $_COOKIE['userName'];
            $sqlQuery = "SELECT * FROM user WHERE userName='$userName'";
            
            $userData=Database::executeQuery("root","",$sqlQuery)[0];
            print_r($userData);
            if($userData){
                $newUserData = new User();
                $newUserData->setUser($userData['firstName'],$userData['lastName'],$userData['userName'],$userData['address'],$userData['dob']);
                return $newUserData;
            }else{
                return false;
            }
            
        }
         

        public static function insertData($fullName,$regNo,$address,$fromMonth,$toMonth,$homeStation,$universityStation){
            $insertQuery = "INSERT INTO request_train_season(requester,regNo,address,fromMonth,toMonth,nearRailwayStationHome,nearRailwayStationUni)
            VALUES('$fullName','$regNo','$address','$fromMonth','$toMonth','$homeStation','$universityStation')";

            $insertData = Database::executeQuery("root","",$insertQuery);
            $insertDataList = array();
            foreach($insertData as $data){
                $newInsertData = new TrainSeason();
                
            }
        }
    }