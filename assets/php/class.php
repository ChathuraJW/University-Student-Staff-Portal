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

?>