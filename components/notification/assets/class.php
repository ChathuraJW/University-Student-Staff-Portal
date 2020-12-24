<?php
class Notification{
    // attributes of Notification
    private int $notificationID;
    private $notificationTitle;
    private $notificationConten;
    private $notificationType;
    private $timeStamp;
    private $sender;
    private $validityEndTimeStamp;
    private $isViewed;
    private $viewTimeStamp;
    private $targetAudiance;
    // methods of Notification
    protected function setNotification(){

    }
    protected function updateView(){

    }
}