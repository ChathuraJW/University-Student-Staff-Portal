<?php
class Notification{
    // attributes of Notification
    private int $notificationID;
    private string $notificationTitle;
    private string $notificationContent;
    private int $notificationType;
    private string $timeStamp;
    private string $sender;
    private string $validityEndTimeStamp;
    private bool $isViewed;
    private string $viewTimeStamp;
    private string $targetAudience;

    // methods of Notification
    public function getNotificationID(): int
    {
        return $this->notificationID;
    }

    public function getNotificationTitle(): string
    {
        return $this->notificationTitle;
    }

    public function getNotificationContent(): string
    {
        return $this->notificationContent;
    }

    public function getNotificationType(): int
    {
        return $this->notificationType;
    }

    public function getTimeStamp(): string
    {
        return $this->timeStamp;
    }

    public function getSender(): string
    {
        return $this->sender;
    }

    public function getValidityEndTimeStamp(): string
    {
        return $this->validityEndTimeStamp;
    }

    public function isViewed(): bool
    {
        return $this->isViewed;
    }

    public function getViewTimeStamp(): string
    {
        return $this->viewTimeStamp;
    }

    public function getTargetAudience(): string
    {
        return $this->targetAudience;
    }

    public function setNotification(){

    }


}