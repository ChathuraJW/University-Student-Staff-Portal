<?php

	class User {
		//attributes of User
		protected $userName;
		protected $password;
		protected $nic;
		protected $gender;
		protected $salutation;
		protected $firstName;
		protected $lastName;
		protected $fullName;
		protected $dob;
		protected $address;
		protected $TPNO;
		protected $personalEmail;
		protected $universityEmail;
		protected $role;
		protected $profilePicURL;
		protected $isFirstLogin;

		public function getUserName() {
			return $this->userName;
		}

		public function getNic() {
			return $this->nic;
		}

		public function getGender() {
			return $this->gender;
		}

		public function getSalutation() {
			return $this->salutation;
		}

		public function getFirstName() {
			return $this->firstName;
		}

		public function getLastName() {
			return $this->lastName;
		}

		public function getFullName() {
			return $this->fullName;
		}

		public function getDob() {
			return $this->dob;
		}

		public function getAddress() {
			return $this->address;
		}

		public function getTPNO() {
			return $this->TPNO;
		}

		public function getPersonalEmail() {
			return $this->personalEmail;
		}

		public function getUniversityEmail() {
			return $this->universityEmail;
		}

		public function getRole() {
			return $this->role;
		}

		public function setUser($userName, $nic, $gender, $salutation, $firstName, $lastName, $fullName, $TPNO, $personalEmail, $universityEmail, $role, $profilePicURL) {
			$this->userName = $userName;
//			$this->password = $password;
			$this->nic = $nic;
			$this->gender = $gender;
			$this->salutation = $salutation;
			$this->firstName = $firstName;
			$this->lastName = $lastName;
			$this->fullName = $fullName;
//			$this->dob = $dob;
//			$this->address = $address;
			$this->TPNO = $TPNO;
			$this->personalEmail = $personalEmail;
			$this->universityEmail = $universityEmail;
			$this->role = $role;
			$this->profilePicURL = $profilePicURL;
//			$this->isFirstLogin = $isFirstLogin;

			return $this;
		}

		public function setUserSetting($firstName,$lastName,$personalEmail,$address,$telephone){
			$this->firstName = $firstName;
			$this->lastName = $lastName;
			$this->personalEmail = $personalEmail;
			$this->address = $address;
			$this->TPNO = $telephone;
		}

	}


//this class for both academic and academic support staff
	class Staff extends User {
		//attributes of Staff
		protected $staffID;
		private $availableFrom;
		private $availableTo;
		private $availableLocation;
		private $availableDescription;
		private $lastUpdateDate;

		public function getStaffID() {
			return $this->staffID;
		}

		public function getAvailableFrom() {
			return $this->availableFrom;
		}

		public function getAvailableTo() {
			return $this->availableTo;
		}

		public function getAvailableLocation() {
			return $this->availableLocation;
		}

		public function getAvailableDescription() {
			return $this->availableDescription;
		}

		public function getLastUpdateDate() {
			return $this->lastUpdateDate;
		}

		public function setStaff($universityEmail, $fullName, $userName, $salutation, $availableFrom, $availableTo, $availableLocation, $availableDescription, $lastUpdateDate) {
			$this->universityEmail = $universityEmail;
			$this->fullName = $fullName;
			$this->userName = $userName;
			$this->salutation = $salutation;
//			$this->staffID = $staffID;
			$this->availableFrom = $availableFrom;
			$this->availableTo = $availableTo;
			$this->availableLocation = $availableLocation;
			$this->availableDescription = $availableDescription;
			$this->lastUpdateDate = $lastUpdateDate;
		}
		//methods of User

	}


	class AppointmentsForMeeting {
		// attributes of AppointmentsForMeeting
		private $appointmentID;
		private $title;
		private $message;
		private $studentID;
		private $timestamp;
		private $type;
		private $meetingDuration;
		private $requestValidity;
		private $reply;
		private $isApproved;
		private $appointmentDate;
		private $appointmentTime;
		private $appointmentFor;

		// methods of AppointmentsForMeeting
		public function getAppointmentID() {
			return $this->appointmentID;
		}

		public function getTitle() {
			return $this->title;
		}

		public function getMessage() {
			return $this->message;
		}

		public function getStudentID() {
			return $this->studentID;
		}

		public function getTimestamp() {
			return $this->timestamp;
		}

		public function getType() {
			return $this->type;
		}

		public function getMeetingDuration() {
			return $this->meetingDuration;
		}

		public function getRequestValidity() {
			return $this->requestValidity;
		}

		public function getReply() {
			return $this->reply;
		}

		public function getIsApproved() {
			return $this->isApproved;
		}

		public function getAppointmentDate() {
			return $this->appointmentDate;
		}

		public function getAppointmentTime() {
			return $this->appointmentTime;
		}

		public function getAppointmentFor() {
			return $this->appointmentFor;
		}

		public function setAppointmentFor($user) {
			$this->appointmentFor = $user;
			return $this;
		}

		public function setAppointment($appointmentID, $studentID, $title, $message, $type, $appointmentDate, $appointmentTime, $meetingDuration, $reply, $timestamp, $requestValidity, $isApproved) {

			$this->appointmentID = $appointmentID;
			$this->title = $title;
			$this->message = $message;
			$this->studentID = $studentID;
			$this->timestamp = $timestamp;
			$this->type = $type;
			$this->meetingDuration = $meetingDuration;
			$this->requestValidity = $requestValidity;
			$this->reply = $reply;
			$this->isApproved = $isApproved;
			$this->appointmentDate = $appointmentDate;
			$this->appointmentTime = $appointmentTime;
			return $this;
		}

		protected function makeAppointment() {

		}

		protected function respondForAppointment() {

		}
	}


	class SystemFeature {
		private string $featureID;
		private string $featureName;
		private string $featurePath;
		private string $featureIcon;

		public function createFeature($featureID, $name, $path, $icon): SystemFeature {
			$this->featureID = $featureID;
			$this->featureName = $name;
			$this->featurePath = $path;
			$this->featureIcon = $icon;
			return $this;
		}

		public function getFeatureID(): string {
			return $this->featureID;
		}

		public function getFeatureName(): string {
			return $this->featureName;
		}

		public function getFeaturePath(): string {
			return $this->featurePath;
		}

		public function getFeatureIcon(): string {
			return $this->featureIcon;
		}

	}

