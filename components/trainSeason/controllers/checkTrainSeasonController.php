<?php
    class CheckTrainSeasonController extends Controller{
        public static function checkTrainSeason(){
            $trainSeasonRequesterData = CheckTrainSeasonModel::getData();
            self::createView("checkTrainSeasonView",$trainSeasonRequesterData);


        }
    } 