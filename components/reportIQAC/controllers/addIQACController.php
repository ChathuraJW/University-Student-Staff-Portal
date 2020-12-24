<?php
    class AddIQACController extends Controller{
        public static function addIQAC(){
            $lecturerList=AddIQACModel::getLecturer();
            $subjectList=AddIQACModel::getSubject();
            $sendData=array($lecturerList,$subjectList);
            self::createView("addIQACView",$sendData);

            if(isset($_POST["submit"])){
                //$staffID = $_POST[];
                $pname = rand(1000,10000)."-".$_FILES["file"]["name"];
                $tname = $_FILES["files"]["tmp_name"];
                $upload_dir = '/images';
                move_uploaded_file($tname,$upload_dir.'/'.$pname);
                $sql = "INSERT INTO iqac_report(file_directory) VALUES('$pname')"; 
            }


        }
    } 