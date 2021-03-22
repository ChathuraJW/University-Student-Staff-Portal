<?php
    function autoload($className){
        if(file_exists("../../assets/mvc/$className.php")){
            require_once "../../assets/mvc/$className.php";
        }else if(file_exists("./controllers/$className.php")){
            require_once "./controllers/$className.php";
        }else if(file_exists("./models/$className.php")){
            require_once "./models/$className.php";
        }
//        import class.php inside the component
        require_once ('./assets/class.php');
        require_once ('../../assets/php/sendMail.php');

    }
    spl_autoload_register('autoload');
    require_once('routes.php');

?>