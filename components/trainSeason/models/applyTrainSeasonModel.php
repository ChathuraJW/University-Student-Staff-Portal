<?php
    class ApplyTrainSeasonModel extends Model{
        public static function insertData($fullName,$name,$regNo,$address,$fromMonth,$toMonth,$homeStation,$universityStation){
            $sqlQuery = "INSERT INTO request_train_season(fullName,nameWithIntials,regNo,address,fromMonth,toMonth,nearRailwayStationHome,nearRailwayStationUni)
                          VALUES('$fullName','$name','$regNo','$address','$fromMonth','$toMonth','$homeStation','$universityStation')";
            echo $sqlQuery;
            Database::executeQuery("root","",$sqlQuery);
        }
        
    }