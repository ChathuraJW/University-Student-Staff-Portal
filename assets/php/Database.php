<?php
    class Database{
        private static $server="localhost";
        private static $database="ussp";
        private static function connect($userName,$password){
            $conn = new mysqli(self::$server,$userName,$password,self::$database);
            if ($conn -> connect_errno) {
                echo $conn -> connect_error;
                exit();
            }
            return $conn;
        }

        public static function executeQuery($userName,$password,$sqlQuery){
            $connection=self::connect($userName,$password);
            $result = $connection->query($sqlQuery);
            if($result !== TRUE){
                $data = array();
                foreach ($result as $row) {
                    $data[] = $row;
                }
            }else{
                $data=TRUE;
            }
            $connection -> close();
            return ($data);
        }
}
?>