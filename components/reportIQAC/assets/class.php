<?php

	class User {
		//attributes of User
		private $userName;
		private $fullName;


		//methods of User
		public function setUser($userName, $fullName) {
			$this->userName = $userName;
			$this->fullName = $fullName;
			return $this;
		}

		public function getUserName() {
			return $this->userName;
		}

		public function getFullName() {
			return $this->fullName;
		}
	}

	class IQACReport {

		private $staffID;
		private $subjectCode;
		private $fileLocation;
		private $semester;
		private $examinationYear;
		private $reportName;


		public function getStaffID() {
			return $this->staffID;
		}

		public function getExaminationYear() {
			return $this->examinationYear;
		}

		public function getFileLocation() {
			return $this->fileLocation;
		}


		public function getSemester() {
			return $this->semester;
		}


		public function getSubjectCode() {
			return $this->subjectCode;
		}

		public function getReportName() {
			return $this->reportName;
		}

		public function setReportDetail($staffID, $subjectCode, $examinationYear, $semester, $reportName, $fileLocation) {
			$this->staffID = $staffID;
			$this->subjectCode = $subjectCode;
			$this->examinationYear = $examinationYear;
			$this->semester = $semester;
			$this->reportName = $reportName;
			$this->fileLocation = $fileLocation;

			return $this;
		}

	}

	class courseModule {
		// attributes of courseModule
		private string $courseCode;
		private string $name;
		private string $creditVale;
		private string $description;
		private int $semester;

		// methods of courseModule

		public function setCourseModule($courseCode, $name, $semester) {
			$this->courseCode = $courseCode;
			$this->name = $name;
			$this->semester = $semester;
			return $this;
		}


		public function getCourseCode(): string {
			return $this->courseCode;
		}


		public function getName(): string {
			return $this->name;
		}


		public function getSemester(): int {
			return $this->semester;
		}

	}


