<?php
    class CheckedApplicationController extends Controller{
        public static function checkedApplication(){
            $trainSeasonRequesterData = CheckedApplicationModel::getData();
        
            if(isset($_POST['submit'])){
                $seasonID = $_POST['seasonID'];

                $insertSeasonID = new TrainSeason();
                $insertSeasonID->setData($seasonID, NULL, NULL, NULL,NULL,NULL, NULL, NULL,NULL,NULL);
	            $insert =  checkedApplicationModel::insertSeasonID($insertSeasonID);

                 
            }

             
            self::createView("checkedApplicationView",$trainSeasonRequesterData);


        }
    } 