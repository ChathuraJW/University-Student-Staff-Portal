<?php
//import database class
require_once "../../assets/mvc/Database.php";
class Notification{
//    parameters
    private int $notificationID;
    private string $notificationTitle;
    private string $notificationContent;
    private int $notificationType=7;
    private string $timeStamp;
    private string $sender;
    private string $validWeeks;
    private array $receivers;

//    TODO constructor
    function __construct(){
        $this->notificationType = 7;
        $this->validWeeks = 4;
    }

    public function createNotification($title, $content):Notification{
        $this->notificationTitle = $title;
        $this->notificationContent = $content;
        return $this;

    }
    public function setSender($sender){
        $this->sender = $sender;
        return $this;
    }
    public function setReceivers(array $receiver){
        $this->receivers = $receiver;
        return $this;
    }
    public function setTimeout($weeks){
        $this->validWeeks = $weeks;
        return $this;
}
    public function publishNotification():bool{
        // get database instance
        $databaseInstance = new Database();
        $databaseInstance->establishTransaction('root','');

        $validUntil = $this->calculateValidityPeriod();
        $validUntil = '2020-12-09 04:00:00';//get the last date of  validity period.
//        echo ($validUntil);
//        entre data to notification details table
        $notificationDetailSqlQuery = "INSERT INTO notification_detail(title, content, notificationType, timestamp, validUntil, publishedByUser) 
            VALUES ('".$this->notificationTitle."','".$this->notificationContent."',".$this->notificationType.",now(),'$validUntil','".$this->sender."')";
//        echo ($notificationDetailSqlQuery);
        $databaseInstance->executeTransaction($notificationDetailSqlQuery);
        $databaseInstance->transactionAudit($notificationDetailSqlQuery,'notification_detail','INSERT', 'Publish notification Details');

//        get notification id for just entered notification details
         $this->getNotificationId($validUntil);
        echo("hiNotification id-");
        echo($this->receivers);
        echo ($this->notificationID);
//        Send data to the target audience table
        $targetAudienceSqlQuery = "INSERT INTO target_audience(targetAudience, notificationID) VALUES ('Custom',".$this->notificationID.")";
        $databaseInstance->executeTransaction($notificationDetailSqlQuery);
        $databaseInstance->transactionAudit($targetAudienceSqlQuery,'target_audience','INSERT','Keep ');



//            calculate time out
        if($databaseInstance->getTransactionState()){
            if($databaseInstance->commitToDatabase()){
                echo("Success");
            }else{
                echo("Fail");
            }
        }else{
            echo("Transaction fail");
        }
        $databaseInstance->closeConnection();
    }


    private function getNotificationId($validUntil){
        $sqlQuery = "SELECT notificationID FROM notification_detail WHERE title='".$this->notificationTitle."' 
            AND content='".$this->notificationContent."' AND notificationType=".$this->notificationType." 
            AND validUntil='$validUntil' AND publishedByUser='".$this->sender."' ORDER BY notificationID DESC LIMIT 1";
//        echo ($sqlQuery);
        echo ($this->notificationID);
        return  Database::executeQuery('root','',$sqlQuery);
    }

    private function calculateValidityPeriod(){
        $today = date('y":m:d');
        $numberOfWeeks = $this->validWeeks;
        $numberOfDays = $numberOfWeeks*7;
        return date('y:m:d',strtotime('$numberOfDays '));
    }
}