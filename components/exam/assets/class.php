<?php

class User{
    //attributes of User
    protected $userName;
    protected $firstName;
    protected $lastName;
    protected $personalEmail;
    protected $universityEmail;
    protected $gender;
    protected $address;
    protected $nic;
    protected $password;
    protected $profilePictureURL;
    protected $teleNo;

    //methods of User

}

class Student extends User{
    // attributes of Student
    private $indexNo;
    private $regNo;
    private $group;

    //methods of Student

}

//this class for both academic and academic support staff

class RawResult{
    // attributes of RawResult
    private $courseCode;
    private $courseName;
    private $date;
    private $uploadedBy;
    private $submitTimestamp;
    private $fileLocation;
    // methods of RawResult
    protected function sendResult(){

    }
    protected function viewResult(){

    }
}

class Result{
    // attributes of Result
    private $coursECode;
    private $academicYear;
    private $yearOfExam;
    private $semester;
    private $result;
    private $GPA;
    private $updatedData;
    private $updatedBy;
    private $reviewedTimestamp;
    private $submitedBy;
    // mehtods of Result
    protected function addResultData(){

    }
    protected function displayResult(){

    }
}
class ResultFile{
	private string $subjectCode;
	private int $semester;
	private string $yearOfExam;
	private string $attempt;
	private string $batch;
	private bool $isEncrypted;
	private string $fileName;

	public function setResultFile($subjectCode,$semester,$examinationYear,$attempt,$batch,$isEncrypted, $fileName): ResultFile{
		$this->subjectCode=$subjectCode;
		$this->semester=$semester;
		$this->yearOfExam=$examinationYear;
		$this->attempt=$attempt;
		$this->batch=$batch;
		$this->isEncrypted=$isEncrypted;
		$this->fileName=$fileName;
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

}
class StudentMark{
    // attributes of StudentMark
    private $studentIndex;
    private $mark;
    // methods of StudentMark
    protected function setMarks(){

    }
}
class EnrollmentDetails{
    // attributes of EnrollmentDetails
    private $indexNo;
    private $courseCode;
    private $academicYear;
    private $attempt;
    private $activeState;
    private $result;
    private $enrolledDate;
    private $semester;
    // methods of EnrollmentDetails
    protected function makeEnrollment(){

    }

    protected function makeEnrollmentDeactivated(){

    }
}

class CourseModule{
    // attributes of courseModule
    private string $CourseCode;
    private string $name;
    private int $creditVale;
    private int $semester;
    private string $description;

    public function createCourseModule($courseCode,$name,$creditValue,$semester,$description): CourseModule {
    	$this->CourseCode=$courseCode;
    	$this->name=$name;
    	$this->creditVale=$creditValue;
    	$this->semester=$semester;
    	$this->description=$description;
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
class EnrollFor{
    // attributes of EnrollFor
    private $indexNo;
    private $courseCode;
    private $courseName;
    private $dailyAtendance;
    private $percentage;
    // methods of EnrollFor
    protected function calculatePercentage(){

    }
    protected function addDate(){

    }
    protected function viewAttendance(){

    }
}