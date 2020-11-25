<?php
    class Database{
        private static $server="localhost";
        private static $database="ussp";
        private static function connect($userName,$password){
            //stop show warning
            error_reporting(E_ERROR | E_PARSE);
            $conn = new mysqli(self::$server,$userName,$password,self::$database);
            if ($conn -> connect_errno) {
                echo ("Exception ::: << ".$conn -> connect_error." >>");
                exit();
            }
            return $conn;
        }

        public static function executeQuery($userName,$password,$sqlQuery){
            try {
                $connection=self::connect($userName,$password);
                $result = $connection->query($sqlQuery);
                //check weather query success
                if($result){
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
                }else{
                    throw new mysqli_sql_exception("Query Failed.");
                }
            }catch (Exception $exception){
                echo ("Exception ::: << ".$exception->getMessage()." >>  ".$exception->getTraceAsString());
                return array();
            }
        }
}
?>