<?php
    class Route{
        public static array $validRoutes =array();

        public static function set($route,$function){
//        	initiate timezone for server
	        date_default_timezone_set('Asia/Colombo');
            self::$validRoutes[]=$route;
            if($_GET['url']==$route){
                $function->__invoke();
            }
        }
    }
?>