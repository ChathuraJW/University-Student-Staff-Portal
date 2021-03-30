<?php
class TimetableController extends Controller{
    // public function __construct(){
    //     parent::__construct();
    // }
    public static function open(){
        
        self::createView("timetableView");
    }
    
}
?>