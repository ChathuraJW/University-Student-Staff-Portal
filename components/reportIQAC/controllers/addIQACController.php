<?php
    class AddIQACController extends Controller{
        public static function addIQAC(){
            $lecturerList=AddIQACModel::getLecturer();
            $subjectList=AddIQACModel::getSubject();
            $sendData=array($lecturerList,$subjectList);
            self::createView("addIQACView",$sendData);

            if(isset($_POST["submit"])){
                $staffID = $_POST['lecturer '];
                $subject = $_POST['subject'];
                $pname = rand(1000,10000)."-".$_FILES["file"]["name"];
                $tname = $_FILES["files"]["tmp_name"];
                $upload_dir = '/images';
                move_uploaded_file($tname,$upload_dir.'/'.$pname);
                $upload = AddIQACModel::uploadFile($pname,$staffID,$subject);
                 
            }


        }
    } 