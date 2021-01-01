<?php

class User{
    //attributes of User
    private $userName;
    private $firstName;
    private $lastName;
     
    private $address;
    private $dob;

    public function setUser($firstName,$lastName,$regNo,$address,$dob): User{
        $this->userName=$userName;
        $this->firstName=$firstName;
        $this->lastName=$lastName;
        $this->address=$address;
        $this->dob=$dob;

        return $this;
    }

    public function getFullName(): string{
        return $this->firstName." ".$this->lastName;
        
    }


    public function getRegNo(): string{
        return $this->regNo;
        
    }

    public function getAddress(): string{
        return $this->address;
        
    }
    
    public function getAge(): int{
        
        $bday = new DateTime('$this->dob'); // Your date of birth
        $today = new Datetime(date('m.d.y'));
        $diff = $today->diff($bday);
        return $diff->y; 
        
    }

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
    
    private $requester;
    private $academicYear;
    private $age;
    private $address; 
    private $fromMonth;
    private $toMonth;
    private $nearRailwayStationHome;
    private $nearRailwayStationUni;
     
    // methods of Trainseason
    public function setData($requester,$academicYear,$age,$address,$fromMonth,$toMonth,$nearRailwayStationHome,$nearRailwayStationUni){
        $this->requester = $requester;
        $this->academicYear = $academicYear;
        $this->age = $age;
        $this->address = $address;
        $this->fromMonth = $fromMonth;
        $this->toMonth = $toMonth;
        $this->nearRailwayStationHome = $nearRailwayStationHome;
        $this->nearRailwayStationUni = $nearRailwayStationUni;

        return $this;
    }

    public function getRequester(): string{
        return $this->requester;
    }

    public function getAcademicYear(): string{
        return $this->academicYear;
    }

    public function getAge(): string{
        return $this->age;
    }

    public function getAddress(): string{
        return $this->address;
    }

    public function getFromMonth(): string{
        return $this->fromMonth;
    }

    public function getToMonth(): string{
        return $this->toMonth;
    }

    public function getNearRailwayStationHome(): string{
        return $this->nearRailwayStationHome;
    }

    public function getNearRailwayStationUni(): string{
        return $this->nearRailwayStationUni;
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
    private $workLoadOwner;
    private $workLoadDescription;
    private $senderTimestamp;
    private $date;
    private $where;
    private $from;
    private $to;
    private $title;
    private $allocateDate;
    // mothods of AllocatedWorkload
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
    private $CourseCode;
    private $name;
    private $creditVale;
    private $description;
    // methods of courseModeule
    protected function createModule(){

    }
    protected function editModule(){

    }
    protected function removeModule(){

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