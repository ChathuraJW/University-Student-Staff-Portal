<?php

	class User {
		//attributes of User
		private $userName;
		private $firstName;
		private $lastName;

		private $address;
		private $dob;

		public function setUser($firstName, $lastName, $regNo, $address, $dob): User {
			$this->userName = $regNo;
			$this->firstName = $firstName;
			$this->lastName = $lastName;
			$this->address = $address;
			$this->dob = $dob;


			return $this;
		}

		public function getFullName(): string {
			return $this->firstName . " " . $this->lastName;

		}


		public function getUserName(): string {
			return $this->userName;

		}

		public function getAddress(): string {
			return $this->address;

		}

		public function getAge(): int {

			$dob = new DateTime($this->dob);
			$today = new DateTime('today');
			return $dob->diff($today)->y;


		}

		//methods of User

	}

	class Message {
		private $title;
		private $message;
		private $timestamp;
		private $sendBy;
		private $messageID;
		private $receivedBy;
		private $isViewed;

		public function setMessageDetail($title, $message, $sendBy, $messageID, $receivedBy, $isViewed, $timestamp) {
			$this->title = $title;
			$this->message = $message;
			$this->timestamp = $timestamp;
			$this->sendBy = $sendBy;
			$this->messageID = $messageID;
			$this->receivedBy = $receivedBy;
			$this->isViewed = $isViewed;

			return $this;
		}

		public function getTitle(): string {
			return $this->title;
		}

		public function getMessage(): string {
			return $this->message;
		}

		public function getTimestamp() {
			return $this->timestamp;
		}

		public function getSendBy(): string {
			return $this->sendBy;
		}

		public function getMessageID(): int {
			return $this->messageID;
		}

		public function getReceivedBy(): array {
			return $this->receivedBy;
		}

		public function getIsViewed(): int {
			return $this->isViewed;
		}
	}

	class Student extends User {
		// attributes of Student
		private $indexNo;
		private $regNo;
		private $group;

		//methods of Student

	}

//this class for both academic and academic support staff
	class Staff extends User {
		//attributes of Staff
		private $staffID;

		//methods of User

	}

	class AdministrativeStaff extends Staff {
		//attributes of AdministrativeStaff
		private $roleID;

		//methods for AdministrativeStaff
	}

	class courseModule {
		// attributes of courseModule
		private $CourseCode;
		private $name;
		private $creditVale;
		private $description;

		// methods of courseModeule
		protected function createModule() {

		}

		protected function editModule() {

		}

		protected function removeModule() {

		}
	}

?>