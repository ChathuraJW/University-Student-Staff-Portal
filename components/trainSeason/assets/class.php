<?php

class User{
    //attributes of User
    private $userName;
    private $firstName;
    private $lastName;
    
    private $address;
    private $dob;

    public function setUser($firstName,$lastName,$regNo,$address,$dob): User{
        $this->userName=$regNo;
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
        return $this->userName;
        
    }

    public function getAddress(): string{
        return $this->address;
        
    }
    
    public function getAge(): int{
        
        $dob = new DateTime($this->dob);
        $today   = new DateTime('today');
        return $dob->diff($today)->y;

        
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
 
class TrainSeason{
    // attributes of TrainSeason
    private $requesterFullName;
    private $requestID;
    private $seasonID;
    private $requester;
    private $academicYear;
    private $age;
    private $address; 
    private $fromMonth;
    private $toMonth;
    private $nearRailwayStationHome;
    private $nearRailwayStationUni;
    private $submittedTimestamp;
    private $collectedPerson;
     
    public function setRequesterFullName($fullName){
        $this->requesterFullName = $fullName;
        return $this;
    }
    // methods of Trainseason
    public function setData($requestID,$seasonID,$requester,$academicYear,$age,$address,$fromMonth,$toMonth,$nearRailwayStationHome,$nearRailwayStationUni,$submittedTimestamp,$collectedPerson){
        $this->requestID = $requestID;
        $this->seasonID = $seasonID;
        $this->requester = $requester;
        $this->academicYear = $academicYear;
        $this->age = $age;
        $this->address = $address;
        $this->fromMonth = $fromMonth;
        $this->toMonth = $toMonth;
        $this->nearRailwayStationHome = $nearRailwayStationHome;
        $this->nearRailwayStationUni = $nearRailwayStationUni;
        $this->submittedTimestamp = $submittedTimestamp;
        $this->collectedPerson = $collectedPerson;

        return $this;
    }

    public function getRequseterFullName(): string{
        return $this->requesterFullName;
    }

    public function getRequestID(): int{
        return $this->requestID;
    }

    public function getSeasonID(): int{
        return $this->seasonID;
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

    public function getTimeStamp(): string{
        return $this->submittedTimestamp;
    }

    public function getCollectedPerson(): string{
        return $this->collectedPerson;
    }
}

 
 
?>