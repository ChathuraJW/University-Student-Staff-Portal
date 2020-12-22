<?php

class User {
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

class Student extends User {
    // attributes of Student
    private $indexNo;
    private $regNo;
    private $group;

    //methods of Student

}

//this class for both academic and academic support staff
class Staff extends User {
    //attributes of Staff
    protected $staffID;

    //methods of User

}

class AdministrativeStaff extends Staff {
    //attributes of AdministrativeStaff
    private $roleID;

    //methods for AdministrativeStaff
}

class courseModule {
    // attributes of courseModule
    private $CourseCode;
    private $name;
    private $creditVale;
    private $description;

    // methods of courseModeule
    protected function createModule() {

    }

    protected function editModule() {

    }

    protected function removeModule() {

    }
}

class EnrollFor {
    // attributes of EnrollFor
    private $indexNo;
    private $courseCode;
    private $courseName;
    private $dailyAtendance;
    private $percentage;

    // methods of EnrollFor
    protected function calculatePercentage() {

    }

    protected function addDate() {

    }

    protected function viewAttendance() {

    }
}

class HallAllocation {
    // attributes of HallAllocation
    private int $reservationID;
    private string $reservedBy;
    private string $hallID;
    private int $reservationType;
    private string $from;
    private string $to;
    private string $description;
    private string $approvedBy;
    private string $reservationState;
    private string $approvalTimestamp;
    private string $requestMadeAt;

    // methods of HallAllocation
    public function setAllocation($reservationID, $reserveUserName, $hallID, $description, $type, $fromTimestamp,
                                  $toTimestamp, $requestMadeAt, $reservationStates, $approvedBy, $approvalTimestamp): HallAllocation {
        $this->reservationID = $reservationID;
        $this->reservedBy = $reserveUserName;
        $this->hallID = $hallID;
        $this->description = $description;
        $this->reservationType = $type;
        $this->from = $fromTimestamp;
        $this->to = $toTimestamp;
        $this->requestMadeAt = $requestMadeAt;
        $this->reservationState = $reservationStates;
        $this->approvedBy = $approvedBy;
        $this->approvalTimestamp = $approvalTimestamp;
        return $this;
    }

    public function createBasicAllocation($reserveUserName, $hallID, $description, $type, $fromTimestamp, $toTimestamp): HallAllocation {
        $this->reservedBy = $reserveUserName;
        $this->hallID = $hallID;
        $this->description = $description;
        $this->reservationType = $type;
        $this->from = $fromTimestamp;
        $this->to = $toTimestamp;
        return $this;
    }

    public function getReservationID(): int {
        return $this->reservationID;
    }

    public function getReservedBy(): string {
        return $this->reservedBy;
    }

    public function getHallID(): string {
        return $this->hallID;
    }

    public function getReservationType(): string {
        switch ($this->reservationType) {
            case 3100:
                return "Lecture";
            case 3200:
                return "Tutorial";
            case 3300:
                return "Staff Meeting";
            case 3400:
                return "Club Meeting";
            case 3500:
                return "Student Meeting";
        }
    }

    public function getReservationTypeAsInt(): int {
        return $this->reservationType;
    }


    public function getFrom(): string {
        return $this->from;
    }

    public function getTo(): string {
        return $this->to;
    }

    public function getRequestMadeAt(): string {
        return $this->requestMadeAt;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function getApprovedBy(): string {
        return $this->approvedBy;
    }

    //TODO think on default case of switch
    public function getReservationState(): string {
        switch ($this->reservationState) {
            case "A":
                return "Approved";
            case "R":
                return "Rejected";
            case "T":
                return "Time Out";
            case "N":
                return "Pending";
        }
    }

    //TODO think on default case of switch
    public function getColorClassForReservationState(): string {
        switch ($this->reservationState) {
            case "A":
                return "successEntry";
            case "R":
                return "warningEntry";
            case "T":
                return "ideaEntry";
            case "N":
                return "normalEntry";
        }
    }

    public function getApprovalTimestamp(): string {
        return $this->approvalTimestamp;
    }


}

class Hall {
    // attributes of Hall
    private string $hallID;
    private int $capacity;
    private string $type;

    // methods of Hall
    public function createHall($hallID, $capacity, $type): Hall {
        $this->hallID = $hallID;
        $this->capacity = $capacity;
        $this->type = $type;
        return $this;
    }

    public function getHallID(): string {
        return $this->hallID;
    }

    public function getCapacity(): int {
        return $this->capacity;
    }

    public function getType(): string {
        return $this->type;
    }

    public function isLecturerHall(): bool {
        if ($this->type === 'LEC')
            return true;
        else
            return false;
    }


}

?>