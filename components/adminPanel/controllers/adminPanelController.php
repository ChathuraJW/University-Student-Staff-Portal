<?php
class AdminPanelController extends Controller{
    // public function __construct(){
    //     parent::__construct();
    // }
    public static function open(){
        $data=AdminPanelModel::getCourse();
        self::createView("adminPanelView",$data);

        
    }
    
}
?>