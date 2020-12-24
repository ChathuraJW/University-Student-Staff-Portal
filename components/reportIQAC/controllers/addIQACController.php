<?php
    class AddIQACController extends Controller{
        public static function addIQAC(){
            $lecturerList=AddIQACModel::getLecturer();
            $subjectList=AddIQACModel::getSubject();
            $sendData=array($lecturerList,$subjectList);
            self::createView("addIQACView",$sendData);


        }
    } 