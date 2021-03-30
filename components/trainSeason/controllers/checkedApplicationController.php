<?php
    class CheckedApplicationController extends Controller{
        public static function checkedApplication(){
             

            if(isset($_GET['requestID'])){
                $requestID = $_GET['requestID'];
                
                if(isset($_POST['submit'])){
                    $seasonID = $_POST['seasonID'];
    
                    $insertSeasonID = new TrainSeason();
                    $insertSeasonID->setData($requestID,$seasonID,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
                    $insert =  checkedApplicationModel::insertSeasonID($insertSeasonID);

                     

                }

                if(isset($_POST['collected'])){
                    $collectedPerson = $_POST['collectedPerson'];
                    $insertData = new TrainSeason();
                    $insertData->setData($requestID,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,$collectedPerson);
                    $isCollected = checkedApplicationModel::updateCollectedState($insertData);
                }

                $completedApplicationData = CheckedApplicationModel::getCompletedApplicationData($requestID);
                $trainSeasonRequesterData = CheckedApplicationModel::getData($requestID);
                $sendData = array($trainSeasonRequesterData,$completedApplicationData);
                self::createView("checkedApplicationView",$sendData);
            }  
        
             

             
             


        }
    } 