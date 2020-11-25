<?php

class AssignmentManagementController extends Controller{
    public static function init(){
        $data=array("Data structurs and algorithms 12","EPC","AT");
        self::createView('assignmentManagementView',$data);
    }
}