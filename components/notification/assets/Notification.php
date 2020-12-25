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

    public function createNotification($title, $content){
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

//        entre data to notification details table
        $notificationDetailSqlQuery = "INSERT INTO notification_detail(title, content, notificationType, timestamp, validUntil, publishedByUser) 
            VALUES ('".$this->notificationTitle."','".$this->notificationContent."',".$this->notificationType.",now(),".$this->validWeeks.",'".$this->sender."')";
        $databaseInstance->executeTransaction($notificationDetailSqlQuery);
        $databaseInstance->transactionAudit($notificationDetailSqlQuery,'notification_detail','INSERT', 'Publish notification Details');

//        get notification id for just entered notification details
        $this->notificationID = $this->getNotificationId();

        //target audience custom
//        user view msg nm 3
//            calculate time out

    }


    private function getNotificationId(){
        $sqlQuery = "SELECT notificationID FROM notification_detail WHERE title='".$this->notificationTitle."' AND content='".$this->notificationContent."' AND notificationType=".$this->notificationType." AND validUntil=".$this->validWeeks." AND publishedByUser='".$this->sender."' ORDER BY notificationID DESC LIMIT 1";
        return  Database::executeQuery('root','',$sqlQuery);
    }

    private function calculateValidityPeriod(){
        $today = date('y":m:d');
        $numberOfWeeks = $this->validWeeks;
        $numberOfDays = $numberOfWeeks*7;
        return date('y:m:d',strtotime('+$numberOfDays days'));
    }
}