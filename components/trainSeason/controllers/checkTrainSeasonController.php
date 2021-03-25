<?php
    class CheckTrainSeasonController extends Controller{
        public static function checkTrainSeason(){
             
            $trainSeasonRequesterData = CheckTrainSeasonModel::getData();
            $completedApplicationDAta = CheckTrainSeasonModel::getCompletedApplicationData();

            $sendData = array($trainSeasonRequesterData,$completedApplicationDAta,$fullName);
            self::createView("checkTrainSeasonView",$sendData);
        



        }
    } 