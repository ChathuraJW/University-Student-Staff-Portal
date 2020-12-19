<?php

	class User {
		protected string $salutation;
		protected string $userName;
		protected string $fullName;

		public function getSalutation(): string {
			if (isset($this->salutation))
				return $this->salutation;
			else {
				//@TODO change database credentials
				$sqlQuery = "SELECT salutation FROM user WHERE userName='" . $this->userName . "'";
				return Database::executeQuery('root', '', $sqlQuery)[0]['salutation'];
			}
		}
		public function getFullName(): string {
			if (isset($this->fullName))
				return $this->fullName;
			else {
				//@TODO change database credentials
				$sqlQuery = "SELECT fullName FROM user WHERE userName='" . $this->userName . "'";
				return Database::executeQuery('root', '', $sqlQuery)[0]['fullName'];
			}
		}
		public function setUserName(string $userName): User {
			$this->userName = $userName;
			return $this;
		}

	}
	class ContactUnion{
    // attributes of contactUnion
	private int $messageID;
    private string $title;
    private string $message;
    private string $timeStamp;
    private string $sender;
    private bool $isAnonymous;
    // methods of contactUnion

	public function setMessage($messageID, $title, $message, $sender, $sendTimestamp, $isAnonymous): contactUnion {
		$this->messageID=$messageID;
		$this->title=$title;
		$this->message=$message;
		$this->sender=$sender;
		$this->timeStamp=$sendTimestamp;
		$this->isAnonymous=$isAnonymous;
		return $this;
	}
	public function setBasicMessage($title, $message, $sender): contactUnion {
		$this->title=$title;
		$this->message=$message;
		$this->sender=$sender;
		return $this;
	}

	public function getMessageID(): int {
		return $this->messageID;
	}

	public function getTitle(): string {
		return $this->title;
	}

	public function getMessage(): string {
		return $this->message;
	}

	public function getTime(): string {
		return explode(' ',$this->timeStamp)[1];
	}
	public function getData(): string {
		return explode(' ',$this->timeStamp)[0];
	}

	public function getSender(): string {
		return $this->sender;
	}

	public function isAnonymous(): bool {
		return $this->isAnonymous;
	}

}
?>