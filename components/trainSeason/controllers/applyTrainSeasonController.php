<?php
    class ApplyTrainSeasonController extends Controller{
        public static function applyTrainSeason(){
            $trainSeasonUserData = ApplyTrainSeasonModel::getData();
            self::createView("applyTrainSeasonView",$trainSeasonUserData);
            if(isset($_POST['submit'])){
                if(!empty($_POST['fullName']) && !empty($_POST['name']) && !empty($_POST['regNo']) && !empty($_POST['address']) 
                && !empty($_POST['fromMonth']) && !empty($_POST['toMonth']) && !empty($_POST['homeStation']) && !empty($_POST['universityStation'])){

                    //$name = $_POST['userName'];
                    $fullName = $_POST['fullName'];
                    $regNo = $_POST['regNo'];
                    $academicYear = $_POST['acYear'];
                    $address = $_POST['address'];
                    $fromMonth = $_POST['fromMonth'];
                    $toMonth = $_POST['toMonth'];
                    $homeStation = $_POST['homeStation'];
                    $universityStation = $_POST['universityStation'];

                    $sendData = ApplyTrainSeasonModel::insertData($fullName,$regNo,$academicYear,$address,$fromMonth,$toMonth,$homeStation,$universityStation);

                }else{
                    echo "All feilds required";
                }
            }
        

             
            


        }
    } 