<?php

class User{
    protected string $salutation;
    protected string $userName;
    protected string $firstName;
    protected string $lastName;
    protected string $fullName;
    protected string $personalEmail;
    protected string $universityEmail;
    protected string $nic;
    protected string $gender;
    protected string $address;
    protected string $teleNo;
    protected string $password;
    protected string $profilePictureURL;
    protected bool $isFirstLogIn;

    public function getSalutation():string{
        return $this->salutation;
    }

    public function getUserName():string{
        return $this->userName;
    }

    public function getFirstName():string{
        return $this->firstName;
    }

    public function getLastName():string{
        return $this->lastName;
    }

    public function getFullName():string{
        if(isset($this->fullName))
            return $this->fullName;
        else{
            //@TODO change database credentials
            $sqlQuery="SELECT fullName FROM user WHERE userName='".$this->userName."'";
            return Database::executeQuery('root','',$sqlQuery)[0]['fullName'];
        }
    }

    public function getProfilePictureURL():string{
        return $this->profilePictureURL;
    }

    public function getIsFirstLogIn():bool{
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

class AssignmentPlan{
    // attributes of AssignmentPlan
    private int $planID;
    private string $subjectCode;
    private string $degreeStream;
    private int $assignmentWeight;
    private int $totalNumberOfAssignment;
    private string $description;
    private array $assignments;
    private array $assignmentConductBy;


    public function getAssignmentConductBy():array{
        return $this->assignmentConductBy;
    }


    public function setAssignmentConductBy($assignmentConductBy): AssignmentPlan{
        $this->assignmentConductBy = $assignmentConductBy;
        return $this;
    }
    // methods of AssignmentPlan

    public function getPlanID():int{
        return $this->planID;
    }

    public function getSubjectCode():string{
        return $this->subjectCode;
    }

    public function getDegreeStream(): string{
        return $this->degreeStream;

    }

    public function getAssignmentWeight():int{
        return $this->assignmentWeight;
    }

    public function getTotalNumberOfAssignment():int{
        return $this->totalNumberOfAssignment;
    }

    public function getDescription():string{
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
//    this function is to get the subject name according to the subject code
    public function getAssignmentSubjectName():string{
        //@TODO change database credentials
        $sqlQuery="SELECT name FROM course_module WHERE courseCode='$this->subjectCode'";
        return Database::executeQuery('root','',$sqlQuery)[0]['name'];
    }

    public function addAssignment($assignment){
        return $this->assignments[]=$assignment;
    }
}

class Assignment{
    // attributes pf Assignment
    private int $assignmentID;
    private int $assignmentPlanID;
    private string $assignmentName;
    private int $type;
    private int $weight;
    private string $description;
    private array $marks;

    // methods of Assignment
    public function getAssignmentID(): int{
        return $this->assignmentID;
    }

    public function getAssignmentPlanID(): int{
        return $this->assignmentPlanID;
    }

    public function getAssignmentName(): string{
        return $this->assignmentName;
    }

    public function getType():int{
        return $this->type;
    }

    public function getWeight(): int{
        return $this->weight;
    }

    public function getDescription():string{
        return $this->description;
    }

    public function createAssignment($assignmentID,$assignmentPlanID,$assignmentName,$type,$weight,$description):Assignment{
        $this->assignmentID=$assignmentID;
        $this->assignmentPlanID=$assignmentPlanID;
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

class CourseModule{
    // attributes of courseModule
    private string $courseCode;
    private string $name;
    private int $creditVale;
    private int $semester;
    private string $description;

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
    public function getCourseCode(): string{
        return $this->courseCode;
    }
    public function getName(): string{
        return $this->name;
    }
    public function getCreditVale(): int{
        return $this->creditVale;
    }
    public function getSemester(): int{
        return $this->semester;
    }
    public function getDescription(): string{
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
?>
