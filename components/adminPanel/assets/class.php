<?php

class User{
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
    protected string $profilePictureURL;
    protected string $teleNo;
    protected string $userType;

    //methods of User
	public function createUser($userName,$firstName,$lastName,$fullName,$personalEmail,$universityEmail,$dob,$nic): User{
		$this->userName=$userName;
		$this->firstName=$firstName;
		$this->lastName=$lastName;
		$this->fullName=$fullName;
		$this->personalEmail=$personalEmail;
		$this->universityEmail=$universityEmail;
		$this->nic=$nic;
		$this->dateOfBirth=$dob;
		return $this;
	}

	public function createUserForAdminEdit($firstName,$lastName,$fullName,$universityEmail,$dob,$nic,$userType): User {
		$this->firstName=$firstName;
		$this->lastName=$lastName;
		$this->fullName=$fullName;
		$this->universityEmail=$universityEmail;
		$this->dateOfBirth=$dob;
		$this->nic=$nic;
		$this->userType=$userType;
		return $this;
	}

	public function createUserForPrivilegeSearch($salutation,$firstName,$lastName,$userName,$userType):User{
		$this->salutation=$salutation;
		$this->userName=$userName;
		$this->firstName=$firstName;
		$this->lastName=$lastName;
		$this->userType=$userType;
		return $this;
	}

	public function setUserName(string $userName): User {
		$this->userName = $userName;
		return $this;
	}


	public function isStudent(): bool {
		if($this->userType=='ST')
			return true;
		else
			return false;
	}
	public function isAcademicStaff(): bool {
		if($this->userType=='AS')
			return true;
		else
			return false;
	}
	public function isSupportiveStaff(): bool {
		if($this->userType=='SP')
			return true;
		else
			return false;
	}
	public function isAdministrativeStaff(): bool {
		if($this->userType=='AD')
			return true;
		else
			return false;
	}
	public function getUserName(): string {
		return $this->userName;
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
		switch ($this->userType){
			case 'ST':return 'Student';
			case 'AS':return 'Academic Staff';
			case 'SP':return 'Academic Supportive Staff';
			case 'AA':return 'Administrator';
			case 'AD':return 'Administrative Staff';
		}
	}


}

class Student extends User{
    // attributes of Student
    private int $indexNo;
    private string $group;

    public function createBasicStudent($userName,$indexNumber,$nic,$group,$firstName,$lastName,$fullName):Student{
		$this->userName=$userName;
		$this->indexNo=$indexNumber;
		$this->nic=$nic;
		$this->group=$group;
		$this->firstName=$firstName;
		$this->lastName=$lastName;
		$this->fullName=$fullName;
		return $this;
    }

	public function getIndexNo(): int {
		return $this->indexNo;
	}

	public function getGroup(): string {
		return $this->group;
	}


}

class SpecialRole{
	private int $entryID;
	private string $role;
	private string $userName;
	private string $displayUserName;

	public function createRole($entryID,$role,$userName,$salutation,$firstName,$lastName):SpecialRole{
		$this->entryID=$entryID;
		$this->role=$role;
		$this->userName=$userName;
		$this->displayUserName="$salutation. $firstName $lastName";
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

class SystemParameters{
	private int $parameterID;
	private string $parameterKey;
	private string $parameterValue;

	public function setParameter($parameterID,$parameterKey,$parameterValue):SystemParameters{
		$this->parameterID=$parameterID;
		$this->parameterKey=$parameterKey;
		$this->parameterValue=$parameterValue;
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

//this class for both academic and academic support staff
class Staff extends User{
    //attributes of Staff
    protected string $staffID;

    //methods of User

}

class AdministrativeStaff extends Staff{
    //attributes of AdministrativeStaff
    private $roleID;

    //methods for AdministrativeStaff
}
class Timetable {
    // attributes of Timetable
    private $entryID;
    private $hallID;
    private $subjectCode;
    private $conductingLecture;
    private $group;
    private $day;
    private $from;
    private $to;
    // methods of Timetable
    function setTimetable(){

    }
    function showTimetable(){

    }
}
class PastPaper{
    // attributes of PastPapers
    private $paperID;
    private $examinationYear;
    private $year;
    private $semester;
    private $subjectName;
    private $subjectCode;
    // methods of PastPapers
    protected function addPastPapers(){

    }
    protected function viewPastPaper(){

    }
}
class contactUnion{
    // attributes of contactUnion
    private $title;
    private $message;
    private $timeStamp;
    private $sender;
    // methods of contactUnion
    protected function pushNotification(){

    }
    protected function operateMail(){

    }
}
class TrainSeason{
    // attributes of TrainSeason
    private $trainSeasonIndex;
    private $studentName;
    private $academicYear;
    private $address;
    private $contactNumber;
    private $dob;
    private $ageToNextBirthDay;
    private $fromMonth;
    private $toMonth;
    private $nearRailwayStationHome;
    private $nearRailwayStationUniversity;
    private $requestId;
    private $requestDate;
    private $completeDate;
    private $collectedDate;
    // methods of TrainSeason
    protected function requestSeason(){

    }
    protected function setReady(){

    }
    protected function setCollect(){

    }
}
class AppointmentsForMeeting{
    // attributes of AppointmentsForMeeting
    private $title;
    private $message;
    private $sender;
    private $sendDate;
    private $type;
    private $requestValidity;
    private $reply;
    // methods of AppointmentsForMeeting
    protected function makeAppointment(){

    }
    protected function respondForAppointment(){

    }
}
class AppointmentType{
    // attributes of AppointmentType
    private $appointmentCode;
    private $appointmentColor;
    private $appointmentName;
}
class IQACReport{
    // attributes of IQACReport
    private $reportID;
    private $subject;
    private $fileLocation;
    private $issuedDate;
    // methods of IQACReport
    protected function addReport(){

    }
    protected function viewReport(){

    }
}
class LectureAvailability{
    // attributes of LectureAvailability
    private $lectureCode;
    private $lectureName;
    private $lastUpdateDate;
    private $location;
    private $description;
    private $availableFrom;
    private $availableTo;
    // methods of LectureAvailability
    protected function addAvailability(){

    }
    protected function viewAvailability(){

    }
}
class AllocatedWorkload{
    // attributes of AllocatedWorkload
    private $workLoadOwner;
    private $workLoadDescription;
    private $senderTimestamp;
    private $date;
    private $where;
    private $from;
    private $to;
    private $title;
    private $allocateDate;
    // methods of AllocatedWorkload
    protected function addWorkload(){

    }
    protected function notifyWorkload(){

    }
}
class AssignmentPlan{
    // attributes of AssignmentPlan
    private $planID;
    private $subject;
    private $academicYear;
    private $assignmentWeight;
    private $totalNumberOfAssignment;
    private $degreeStream;
    private $assignment;
    private $description;
    // methods of AssignmentPlan
    protected function addAssignment(){

    }
    protected function changeAssignmentPlanSetting(){

    }
    protected function addInstructors(){

    }
    protected function generateFinalReport(){

    }
}
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
class Notification{
    // attributes of Notification
    private $notificationID;
    private $notificationTitle;
    private $notificationContent;
    private $notificationType;
    private $timeStamp;
    private $sender;
    private $validityEndTimeStamp;
    private $isViewed;
    private $viewTimeStamp;
    private $targetAudience;
    // methods of Notification
    protected function setNotification(){

    }
    protected function updateView(){

    }
}
class Result{
    // attributes of Result
    private $courseECode;
    private $academicYear;
    private $yearOfExam;
    private $semester;
    private $result;
    private $GPA;
    private $updatedData;
    private $updatedBy;
    private $reviewedTimestamp;
    private $submittedBy;
    // methods of Result
    protected function addResultData(){

    }
    protected function displayResult(){

    }
}
class NotificationType{
    // attributes of NotificationType
    private $notificationCode;
    private $notificationColor;
    private $notificationName;
}
class AssignmentType{
    // attributes of AssignmentType
    private $assignmentName;
    private $assignmentCode;
}
class Assignment{
    // attributes pf Assignment
    private $assignmentID;
    private $assignmentName;
    private $weight;
    private $marks;
    private $description;
    private $type;
    // methods of Assignment
    protected function addAssignment(){

    }
    protected function addMark(){

    }
    protected function changeSettings(){

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
class SelectedGroupMessage{
    // attribute of SelectedGroupMessage
    private $title;
    private $message;
    private $sender;
    private $timeStamp;
    private $viewTimeStamp;
    // method of SelectedGroupMessage
    protected function sendMessage(){

    }
    protected function pushMessageNotification(){

    }
}
class AttendanceInstance{
    // attribute of AttendanceInstance
    private $entryID;
    private $description;
    private $date;
    private $week;
    private $attendance;
    private $uploadedTime;
    // method of AttendanceInstance
    protected function addAttendance(){

    }
    protected function viewAttendance(){

    }
}
	class CourseModule {
		// attributes of courseModule
		private string $CourseCode;
		private string $name;
		private int $semester;

		public function createCourseModule($courseCode, $name,$semester): CourseModule {
			$this->CourseCode = $courseCode;
			$this->name = $name;
			$this->semester=$semester;
			return $this;
		}

		public function getCourseCode(): string {
			return $this->CourseCode;
		}

		public function getName(): string {
			return $this->name;
		}

		public function getStudentForYear(): int {
			return ceil($this->semester/2);
		}

	}

class EnrollFor{
    // attributes of EnrollFor
    private $indexNo;
    private $courseCode;
    private $courseName;
    private $dailyAttendance;
    private $percentage;
    // methods of EnrollFor
    protected function calculatePercentage(){

    }
    protected function addDate(){

    }
    protected function viewAttendance(){

    }
}
class HallAllocation{
    // attributes of HallAllocation
    private $reservationID;
    private $hallID;
    private $from;
    private $to;
    private $category;
    private $bookedBy;
    private $description;
    private $approvedBy;
    private $approvalTime;
    // methods of HallAllocation
    protected function makeAllocation(){

    }
    protected function confirmAllocation(){

    }
    protected function rejectAllocationRequest(){

    }
}
class Hall{
    // attributes of Hall
    private $hallID;
    private $capacity;
    private $type;
    // methods of Hall
    protected function createHall(){

    }
    protected function deleteHall(){

    }
    protected function editHall(){

    }
}
class BookingCategory{
    // attributes of BookingCategory
    private $categoryCode;
    private $categoryColor;
    private $categoryName;
}
?>