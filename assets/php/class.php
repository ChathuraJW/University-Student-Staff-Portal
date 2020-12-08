<?php

class User{
    //attributes of User
    protected $salutation;
    protected $userName;
    protected $firstName;
    protected $lastName;
    protected $fullName;
    protected $personalEmail;
    protected $universityEmail;
    protected $nic;
    protected $gender;
    protected $address;
    protected $teleNo;
    protected $password;
    protected $profilePictureURL;
    protected $isFirstLogIn;

    public function getSalutation(){
        return $this->salutation;
    }

    public function getUserName(){
        return $this->userName;
    }

    public function getFirstName(){
        return $this->firstName;
    }

    public function getLastName(){
        return $this->lastName;
    }

    public function getFullName(){
        return $this->fullName;
    }

    public function getProfilePictureURL(){
        return $this->profilePictureURL;
    }

    public function getIsFirstLogIn(){
        return $this->isFirstLogIn;
    }

    public function setUserName($userName): User{
        $this->userName = $userName;
        return $this;
    }


    //methods of User
    public function createUser($salutation,$userName,$firstName,$lastName,$fullName,$personalEmail,$universityEmail,$nic,$gender,$address,$teleNo,$password,$profilePictureURL,$isFirstLogIn): User{
        $this->salutation=$salutation;
        $this->userName=$userName;
        $this->firstName=$firstName;
        $this->lastName=$lastName;
        $this->fullName=$fullName;
        $this->personalEmail=$personalEmail;
        $this->universityEmail=$universityEmail;
        $this->nic=$nic;
        $this->gender=$gender;
        $this->address=$address;
        $this->teleNo=$teleNo;
        $this->password=$password;
        $this->profilePictureURL=$profilePictureURL;
        $this->isFirstLogIn=$isFirstLogIn;
        return $this;
    }
    public function createBasicUser($salutation,$userName,$firstName,$lastName): User{
        $this->salutation=$salutation;
        $this->userName=$userName;
        $this->firstName=$firstName;
        $this->lastName=$lastName;
        return $this;
    }
}

class Student extends User{
    // attributes of Student
    private $indexNo;
    private $regNo;
    private $group;

    //methods of Student

}

//this class for both academic and academic support staff
class Staff extends User{
    //attributes of Staff
    protected $staffID;

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
class AssignmentPlan{
    // attributes of AssignmentPlan
    private $planID;
    private $subjectCode;
    private $degreeStream;
    private $assignmentWeight;
    private $totalNumberOfAssignment;
    private $description;
    private $assignments;
    private $assignmentConductBy;


    public function getAssignmentConductBy(){
        return $this->assignmentConductBy;
    }


    public function setAssignmentConductBy($assignmentConductBy): AssignmentPlan{
        $this->assignmentConductBy = $assignmentConductBy;
        return $this;
    }
    // methods of AssignmentPlan

    public function getPlanID(){
        return $this->planID;
    }

    public function getSubjectCode(){
        return $this->subjectCode;
    }

    public function getDegreeStream(): string{
        return $this->degreeStream;

    }

    public function getAssignmentWeight(){
        return $this->assignmentWeight;
    }

    public function getTotalNumberOfAssignment(){
        return $this->totalNumberOfAssignment;
    }

    public function getDescription(){
        return $this->description;
    }

    public function createAssignmentPlan($planID,$subjectCode,$degreeStream,$assignmentWeight,$totalNumberOfAssignment,$description): AssignmentPlan{
        $this->planID=$planID;
        $this->subjectCode=$subjectCode;
        $this->degreeStream=$degreeStream;
        $this->assignmentWeight=$assignmentWeight;
        $this->totalNumberOfAssignment=$totalNumberOfAssignment;
        $this->description=$description;
        return $this;
    }
    public function addDataToSystem(){
        $sqlQuery="";
    }
    public function addAssignment($assignment){
        return $this->assignments[]=$assignment;
    }
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
    private $type;
    private $weight;
    private $description;
    private $marks;

    // methods of Assignment
    public function getAssignmentID(){
        return $this->assignmentID;
    }

    public function getAssignmentName(){
        return $this->assignmentName;
    }

    public function getType(){
        return $this->type;
    }

    public function getWeight(){
        return $this->weight;
    }

    public function getDescription(){
        return $this->description;
    }

    public function createAssignment($assignmentID,$assignmentName,$type,$weight,$description):Assignment{
        $this->assignmentID=$assignmentID;
        $this->assignmentName=$assignmentName;
        $this->type=$type;
        $this->weight=$weight;
        $this->description=$description;
        return $this;
    }
    public function addMarks($mark){
        return $this->marks[]=$mark;
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
class CourseModule{
    // attributes of courseModule
    private $courseCode;
    private $name;
    private $creditVale;
    private $semester;
    private $description;

    // methods of courseModule
    public function createCourseModule($courseCode,$name,$creditVale,$semester,$description): CourseModule{
        $this->courseCode=$courseCode;
        $this->name=$name;
        $this->creditVale=$creditVale;
        $this->semester=$semester;
        $this->description=$description;
        return $this;
    }
//    getter function
    public function getCourseCode(){
        return $this->courseCode;
    }
    public function getName(){
        return $this->name;
    }
    public function getCreditVale(){
        return $this->creditVale;
    }
    public function getSemester(){
        return $this->semester;
    }
    public function getDescription(){
        return $this->description;
    }
//    other function
    public function getForYear(): int{
        return ceil($this->semester / 2) - 1;
    }
    public function getForSemester(): int{
        return ($this->semester % 2) ? 0 : 1;
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
