<?php

	class PastPaper {
		// attributes of Pastpapers
		private int $paperID;
		private string $examinationYear;
		private int $semester;
		private string $subjectName;
		private string $subjectCode;
		private string $paperName;
		private int $academicYear;


		public function getPaperID() {
			return $this->paperID;
		}

		public function getExaminationYear() {
			return $this->examinationYear;
		}

		public function getYear() {
			return $this->year;
		}


		public function getSemester() {
			return $this->semester;
		}

		public function getSubjectName() {
			return $this->subjectName;
		}

		public function setSubjectName($subjectName): PastPaper {
			$this->subjectName = $subjectName;
			return $this;
		}

		public function getSubjectCode() {
			return $this->subjectCode;
		}

		public function getPaperName() {
			return $this->paperName;
		}

		public function setPastPaper($subjectCode, $yearOfExam, $semester, $paperName): PastPaper {
//        $this->paperID = $paperID;
			$this->examinationYear = $yearOfExam;
			$this->subjectCode = $subjectCode;
			$this->semester = $semester;
			$this->paperName = $paperName;
//        $this->academicYear = $academicYear;
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


