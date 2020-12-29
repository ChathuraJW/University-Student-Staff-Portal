<?php
    class Controller{
        public static function createView($viewName,$data=[]){
            $controllerData=$data;
            require_once("./views/$viewName.php");
        }
    }
?>