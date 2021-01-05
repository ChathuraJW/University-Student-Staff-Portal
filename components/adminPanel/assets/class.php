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
    // attributes of Pastpapers
    private $paperID;
    private $examinationYear;
    private $year;
    private $semester;
    private $subjectName;
    private $subjectCode;
    // mothods of Pastpapers
    protected function addPastpapers(){

    }
    protected function viewPastpaper(){

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
    private $addres;
    private $contactNumber;
    private $dob;
    private $ageToNextBirthDay;
    private $fromMonth;
    private $toMonth;
    private $nearRailwayStationHome;
    private $nearRailwayStationUnivercity;
    private $requestId;
    private $requestDate;
    private $completeDate;
    private $collectedDate;
    // methods of Trainseason
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
    // atrributes of AppointmentType
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
    private $workloadID;
    private $workLoadOwner;
    private $workLoadDescription;
    private $title;
    private $location;
    private $Date;
    private $fromTime;
    // private $toDate;
    private $toTime;
    private $salutation;
    private $fullName;
    private $requestDate;

    // mothods of AllocatedWorkload
    
    public function getWorkLoadOwner(){
        return $this->workLoadOwner;
    }
    public function getWorkLoadDescription(){
        return $this->workLoadDescription;
    }
    public function getTitle(){
        return $this->title;
    }
    public function getLocation(){
        return $this->location;
    }
    public function getDate(){
        return $this->Date;
    }
    public function getFromTime(){
        return $this->fromTime;
    }
    // public function getToDate(){
    //     return $this->toDate;
    // }
    public function getToTime(){
        return $this->toTime;
    }
    public function getSalutation(){
        return $this->salutation;
    }
    public function getFullName(){
        return $this->fullName;
    }
    public function getRequestDate(){
        return $this->requestDate;
    }
    public function getWorkloadID(){
        return $this->workloadID;
    }
        
    
    public function setWorkLoad($workLoadOwner,$title,$workLoadDescription,$location,$Date,$fromTime,$toTime,$salutation,$fullName,$requestDate,$workloadID){
        $this->workLoadOwner=$workLoadOwner;
        $this->workLoadDescription=$workLoadDescription;
        $this->title=$title;
        $this->location=$location;
        $this->Date=$Date;
        $this->fromTime=$fromTime;
        $this->toTime=$toTime;
        $this->salutation=$salutation;
        $this->fullName=$fullName;
        $this->requestDate=$requestDate;
        $this->workloadID=$workloadID;
        return $this;
    }

}
class AssignmentPlan{
    // attributes of AssignmentPlan
    private $planID;
    private $subject;
    private $academicYear;
    private $assignmentWeight;
    private $totalNumberofAssignment;
    private $degreeStreem;
    private $assignment;
    private $description;
    // methods of AssignmentPlan
    protected function addAssignment(){

    }
    protected function changeAssignmentPlanSetting(){

    }
    protected function addInstructors(){

    }
    protected function genarateFinalReport(){

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
    private $notificationConten;
    private $notificationType;
    private $timeStamp;
    private $sender;
    private $validityEndTimeStamp;
    private $isViewed;
    private $viewTimeStamp;
    private $targetAudiance;
    // methods of Notification
    protected function setNotification(){

    }
    protected function updateView(){

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
class NotificationType{
    // attributes of NotificationType
    private $notificationCode;
    private $notificationColor;
    private $notificationName;
}
class AssignmentType{
    // attributes of AssignmentType
    private $assignmentName;
    private $assingmentCode;
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
    protected function addassignment(){

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
class courseModule{
    // attributes of courseModule
    private $courseCode;
    private $name;
    private $semester;
    private $creditVale;
    private $description;
    // methods of courseModeule
    
    public function getCourseCode(){
        return $this->courseCode;
    }
    public function getName(){
        return $this->name;
    }
    public function getSemester(){
        return $this->semester;
    }
    public function getCreditVale(){
        return $this->creditVale;
    }
    public function getDescription(){
        return $this->description;
    }   
    
    public function setCourse($courseCode,$name,$semester,$creditValue,$description){
        $this->courseCode=$courseCode;
        $this->name=$name;
        $this->semester=$semester;
        $this->creditVale=$creditValue;
        $this->description=$description;
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
    private $hallType;
    // methods of Hall
    public function getHallID(){
        return $this->hallID;
    }
    public function getCapacity(){
        return $this->capacity;
    }
    public function getHallType(){
        return $this->hallType;
    }
        
    
    public function setHall($hallID,$capacity,$hallType){
        $this->hallID=$hallID;
        $this->capacity=$capacity;
        $this->hallType=$hallType;
    }
}
class BookingCategory{
    // attributes of BookingCategory
    private $categoryCode;
    private $categoryColor;
    private $categoryName;
}
?>