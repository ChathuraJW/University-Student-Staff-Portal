<?php
    class ApplyTrainSeasonController extends Controller{
        public static function applyTrainSeason(){
            self::createView("applyTrainSeasonView");
            if(isset($_POST['submit'])){
                if(!empty($_POST['fullName']) && !empty($_POST['name']) && !empty($_POST['regNo']) && !empty($_POST['address']) 
                && !empty($_POST['fromMonth']) && !empty($_POST['toMonth']) && !empty($_POST['homeStation']) && !empty($_POST['universityStation'])){

                    $fullName = $_POST['name'];
                    $name = $_POST['name'];
                    $regNo = $_POST['regNo'];
                    $address = $_POST['address'];
                    $fromMonth = $_POST['fromMonth'];
                    $toMonth = $_POST['toMonth'];
                    $homeStation = $_POST['homeStation'];
                    $universityStation = $_POST['universityStation'];

                    $sendData = ApplyTrainSeasonModel::insertData($fullName,$name,$regNo,$address,$fromMonth,$toMonth,$homeStation,$universityStation);

                }else{
                    echo "All feilds required";
                }
            }
        

             
            


        }
    } 