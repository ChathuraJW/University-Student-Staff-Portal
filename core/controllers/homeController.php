<?php
class HomeController extends Controller{
    public static function init(){
        self::createView("homeView");
    }
}