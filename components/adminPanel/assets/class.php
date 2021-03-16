<?php


	class User {
		//attributes of User
		protected string $salutation;
		protected string $userName;
		protected string $firstName;
		protected string $lastName;
		protected string $personalEmail;
		protected string $universityEmail;
		protected string $fullName;
		protected string $address;
		protected string $nic;
		protected string $dateOfBirth;
		protected string $password;
		protected string $userType;

		//methods of User
		public function createUser($userName, $firstName, $lastName, $fullName, $personalEmail, $universityEmail, $dob, $nic): User {
			$this->userName = $userName;
			$this->firstName = $firstName;
			$this->lastName = $lastName;
			$this->fullName = $fullName;
			$this->personalEmail = $personalEmail;
			$this->universityEmail = $universityEmail;
			$this->nic = $nic;
			$this->dateOfBirth = $dob;
			return $this;
		}

		public function createUserForAdminEdit($firstName, $lastName, $fullName, $universityEmail, $dob, $nic, $userType): User {
			$this->firstName = $firstName;
			$this->lastName = $lastName;
			$this->fullName = $fullName;
			$this->universityEmail = $universityEmail;
			$this->dateOfBirth = $dob;
			$this->nic = $nic;
			$this->userType = $userType;
			return $this;
		}

		public function createUserForPrivilegeSearch($salutation, $firstName, $lastName, $userName, $userType): User {
			$this->salutation = $salutation;
			$this->userName = $userName;
			$this->firstName = $firstName;
			$this->lastName = $lastName;
			$this->userType = $userType;
			return $this;
		}

		public function isStudent(): bool {
			if ($this->userType == 'ST')
				return true;
			else
				return false;
		}

		public function isAcademicStaff(): bool {
			if ($this->userType == 'AS')
				return true;
			else
				return false;
		}

		public function isSupportiveStaff(): bool {
			if ($this->userType == 'SP')
				return true;
			else
				return false;
		}

		public function isAdministrativeStaff(): bool {
			if ($this->userType == 'AD')
				return true;
			else
				return false;
		}

		public function getUserName(): string {
			return $this->userName;
		}

		public function setUserName(string $userName): User {
			$this->userName = $userName;
			return $this;
		}

		public function getFirstName(): string {
			return $this->firstName;
		}

		public function getLastName(): string {
			return $this->lastName;
		}

		public function getPersonalEmail(): string {
			return $this->personalEmail;
		}

		public function getUniversityEmail(): string {
			return $this->universityEmail;
		}

		public function getFullName(): string {
			return $this->fullName;
		}

		public function getAddress(): string {
			return $this->address;
		}

		public function getNic(): string {
			return $this->nic;
		}

		public function getDateOfBirth(): string {
			return $this->dateOfBirth;
		}

		public function getUserType(): string {
			return $this->userType;
		}

		public function getSalutation(): string {
			return $this->salutation;
		}

		public function getUserTypeAsWord(): string {
			switch ($this->userType) {
				case 'ST':
					return 'Student';
				case 'AS':
					return 'Academic Staff';
				case 'SP':
					return 'Academic Supportive Staff';
				case 'AA':
					return 'Administrator';
				case 'AD':
					return 'Administrative Staff';
			}
			return "Undefined";
		}


	}

	class Student extends User {
		// attributes of Student
		private int $indexNo;
		private string $group;

		public function createBasicStudent($userName, $indexNumber, $nic, $group, $firstName, $lastName, $fullName): Student {
			$this->userName = $userName;
			$this->indexNo = $indexNumber;
			$this->nic = $nic;
			$this->group = $group;
			$this->firstName = $firstName;
			$this->lastName = $lastName;
			$this->fullName = $fullName;
			return $this;
		}

		public function getIndexNo(): int {
			return $this->indexNo;
		}

		public function getGroup(): string {
			return $this->group;
		}


	}

	class SpecialRole {
		private int $entryID;
		private string $role;
		private string $userName;
		private string $displayUserName;

		public function createRole($entryID, $role, $userName, $salutation, $firstName, $lastName): SpecialRole {
			$this->entryID = $entryID;
			$this->role = $role;
			$this->userName = $userName;
			$this->displayUserName = "$salutation. $firstName $lastName";
			return $this;
		}

		public function getEntryID(): int {
			return $this->entryID;
		}

		public function getRole(): string {
			return $this->role;
		}

		public function getUserName(): string {
			return $this->userName;
		}

		public function getDisplayUserName(): string {
			return $this->displayUserName;
		}

	}

	class SystemParameters {
		private int $parameterID;
		private string $parameterKey;
		private string $parameterValue;

		public function setParameter($parameterID, $parameterKey, $parameterValue): SystemParameters {
			$this->parameterID = $parameterID;
			$this->parameterKey = $parameterKey;
			$this->parameterValue = $parameterValue;
			return $this;
		}

		public function getParameterID(): int {
			return $this->parameterID;
		}

		public function getParameterKey(): string {
			return $this->parameterKey;
		}

		public function getParameterValue(): string {
			return $this->parameterValue;
		}

	}

	class CourseModule {
		// attributes of courseModule
		private string $CourseCode;
		private string $name;
		private int $semester;

		public function createCourseModule($courseCode, $name, $semester): CourseModule {
			$this->CourseCode = $courseCode;
			$this->name = $name;
			$this->semester = $semester;
			return $this;
		}

		public function getCourseCode(): string {
			return $this->CourseCode;
		}

		public function getName(): string {
			return $this->name;
		}

		public function getStudentForYear(): int {
			return ceil($this->semester / 2);
		}

	}
