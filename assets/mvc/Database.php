<?php

class Database{

    private static string $serverStatic = "localhost";
    private static string $databaseStatic = "ussp";
    private string $server = "localhost";
    private string $database = "ussp";
    private bool $transactionState = true;
    private mysqli $connection;
    private string $auditDescription="";

    public static function executeQuery($userName, $password, $sqlQuery){
        try {
            $connection = self::connect($userName, $password);
            $result = $connection->query($sqlQuery);
            //check weather query success
            if ($result) {
                if ($result !== TRUE) {
                    $data = array();
                    foreach ($result as $row) {
                        $data[] = $row;
                    }
                } else {
                    $data = TRUE;
                }
                $connection->close();
                return ($data);
            } else {
                throw new mysqli_sql_exception("Query Failed.");
            }
        } catch (Exception $exception) {
            echo("Exception ::: << " . $exception->getMessage() . " >>  " . $exception->getTraceAsString());
            return array();
        }
    }

    private static function connect($userName, $password): mysqli{
        //stop show warning
        error_reporting(E_ERROR | E_PARSE);
        $conn = new mysqli(self::$serverStatic, $userName, $password, self::$databaseStatic);
        if ($conn->connect_errno) {
            echo("Exception ::: << " . $conn->connect_error . " >>");
            exit();
        }
        return $conn;
    }

//        transaction management functions

    public function establishTransaction($userName, $password){
        error_reporting(E_ERROR | E_PARSE);
        $conn = new mysqli($this->server, $userName, $password, $this->database);
        if ($conn->connect_errno) {
            echo("Exception ::: << " . $conn->connect_error . " >>");
            exit();
        } else {
//                assign connection values to variable
            $this->connection = $conn;
//                turn off auto commit
            $this->connection->autocommit(false);
        }
    }

    public function commitToDatabase(): bool{
//        take from cookies
        $user = $_COOKIE['userName'];
//        get log description
        $description = $this->auditDescription;
//        create log
        $auditQuery = "INSERT INTO database_log(userID, executedQuery,
                        affectedTable, eventType, description, timestamp)
                        VALUES ('$user','TRANSACTION [Multiple Queries Possible]','TRANSACTION [Multiple Relations Possible]','TRANSACTION','$description',NOW())";
        $this->executeTransaction($auditQuery);

//        finally commit the transaction
        if ($this->getTransactionState())
            return $this->connection->commit();
        else
            return false;
    }

    public function executeTransaction($sqlQuery){
        try {
            $result = $this->connection->query($sqlQuery);
            //check weather query success
            if ($result) {
                if ($result !== TRUE) {
                    $data = array();
                    foreach ($result as $row) {
                        $data[] = $row;
                    }
                } else {
                    $data = TRUE;
                }
                return ($data);
            } else {
                $this->transactionState = false;
                throw new mysqli_sql_exception("Query Failed.");
            }
        } catch (Exception $exception) {
            $this->transactionState = false;
            echo("Exception ::: << " . $exception->getMessage() . " >>  " . $exception->getTraceAsString());
            return array();
        }
    }

    public function getTransactionState(): bool{
        return $this->transactionState;
    }

    public function transactionAudit($sqlQuery, $affectedTable, $eventType, $description){
//        take from cookies
        $user = $_COOKIE['userName'];
//        make log
        $executedQuery = explode($affectedTable, str_replace("'", "", $sqlQuery))[1];
        $auditQuery = "INSERT INTO database_log(userID, executedQuery,
                        affectedTable, eventType, description, timestamp)
                        VALUES ('$user','$executedQuery','$affectedTable','$eventType','$description',NOW())";
        $timestamp = date("Y-m-d H:i:s");

//        add each query executions to description
        $this->auditDescription .= "
           ---------
           Timestamp= $timestamp\n
           Event type= $eventType\n
           Affected table= $affectedTable\n
           Query description= $executedQuery\n
           Description= $description\n
           ---------\n
        ";
        return $this->executeTransaction($auditQuery);
    }

    public function closeConnection(){
        $this->connection->close();
    }
}