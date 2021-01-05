<?php
class AdminPanelController extends Controller{
    // public function __construct(){
    //     parent::__construct();
    // }
    public static function open(){
        setcookie("userName","kek");
        
        self::createView("adminPanelView");

        
    }
    
}
?>