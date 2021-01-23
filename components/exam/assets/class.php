<?php

	class Result {
		// attributes of Result
		private string $courseCode;
		private string $courseName;
		private int $semester;
		private int $courseCredit;
		private string $yearOfExam;
		private string $result;
		private string $attempt;

		public function addResult($courseCode, $courseName, $courseCredit, $semester, $examinationYear, $result, $attempt): Result {
			$this->courseCode = $courseCode;
			$this->courseName = $courseName;
			$this->courseCredit = $courseCredit;
			$this->semester = $semester;
			$this->yearOfExam = $examinationYear;
			$this->result = $result;
			$this->attempt = $attempt;
			return $this;
		}

		public function getCourseCode(): string {
			return $this->courseCode;
		}

		public function getCourseName(): string {
			return $this->courseName;
		}

		public function getSemester(): int {
			return $this->semester;
		}

		public function getCourseCredit(): int {
			return $this->courseCredit;
		}

		public function getYearOfExam(): string {
			return $this->yearOfExam;
		}

		public function getResult(): string {
			return $this->result;
		}

		public function getAttempt(): string {
			return $this->attempt;
		}

		public function isRepeatedAttempt(): bool {
			if ($this->attempt == 'F')
				return false;
			else
				return true;
		}

	}

	class ResultFile {
		private int $fileID;
		private string $subjectCode;
		private int $semester;
		private string $yearOfExam;
		private string $attempt;
		private string $batch;
		private bool $isEncrypted;
		private string $fileName;
		private string $sendBy;

		public function setResultFile($subjectCode, $semester, $examinationYear, $attempt, $batch, $isEncrypted, $fileName): ResultFile {
			$this->subjectCode = $subjectCode;
			$this->semester = $semester;
			$this->yearOfExam = $examinationYear;
			$this->attempt = $attempt;
			$this->batch = $batch;
			$this->isEncrypted = $isEncrypted;
			$this->fileName = $fileName;
			return $this;
		}

		public function getSendBy(): string {
			return $this->sendBy;
		}

		public function setSendBy(string $sendBy): ResultFile {
			$this->sendBy = $sendBy;
			return $this;
		}

		public function getFileID(): int {
			return $this->fileID;
		}

		public function setFileID(int $fileID): ResultFile {
			$this->fileID = $fileID;
			return $this;
		}

		public function getSubjectCode(): string {
			return $this->subjectCode;
		}

		public function getSemester(): int {
			return $this->semester;
		}

		public function getYearOfExam(): string {
			return $this->yearOfExam;
		}

		public function getAttempt(): string {
			return $this->attempt;
		}

		public function getBatch(): string {
			return $this->batch;
		}

		public function isEncrypted(): bool {
			return $this->isEncrypted;
		}

		public function getFileName(): string {
			return $this->fileName;
		}

		public function getSenderFullName(): string {
			$sqlQuery = "SELECT fullName FROM user WHERE userName='" . $this->sendBy . "'";
			return Database::executeQuery('generalAccess', 'generalAccess@16', $sqlQuery)[0]['fullName'];
		}

		public function getSubjectName(): string {
			$sqlQuery = "SELECT name FROM course_module WHERE courseCode='" . $this->subjectCode . "'";
			return Database::executeQuery('generalAccess', 'generalAccess@16', $sqlQuery)[0]['name'];
		}

	}


	class CourseModule {
		// attributes of courseModule
		private string $CourseCode;
		private string $name;
		private int $creditVale;
		private int $semester;
		private string $description;

		public function createCourseModule($courseCode, $name, $creditValue, $semester, $description): CourseModule {
			$this->CourseCode = $courseCode;
			$this->name = $name;
			$this->creditVale = $creditValue;
			$this->semester = $semester;
			$this->description = $description;
			return $this;
		}

		public function getCourseCode(): string {
			return $this->CourseCode;
		}

		public function getName(): string {
			return $this->name;
		}

		public function getCreditVale(): int {
			return $this->creditVale;
		}

		public function getSemester(): int {
			return $this->semester;
		}

		public function getDescription(): string {
			return $this->description;
		}


	}
