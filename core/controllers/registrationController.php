<?php
    class RegistrationController extends Controller{
        public static function open(){
            self::createView("registrationView");
            if(isset($_POST['submit'])){
                $fPassword=$_POST['psw'];
                $rPassword=$_POST['psw-repeat'];
                $fName=$_POST['fName'];
                $lName=$_POST['lName'];
                $flName=$_POST['fullName'];
                $gender=$_POST['gender'];
                $occupation=$_POST['occupation'];
                $nic=$_POST['nic'];
                $dob=$_POST['dob'];
                $tele=$_POST['tele'];
                $adrs=$_POST['address'];
                $email=$_POST['email'];
                $uniMail=$_POST['uniMail'];
                $image=$_POST['image'];
                $passcodeen = hash('sha256', (get_magic_quotes_gpc() ? stripslashes($fPassword) : $fPassword));
                $firstName=ucwords($fName);
                $lastName=ucwords($lName);
                $fullName=ucwords($flName);
                $address=ucwords($adrs);
                    
                registrationModel::first($firstName,$lastName,$fullName,$gender,$occupation,$nic,$dob,$tele,$address,$email,$uniMail);

            }
        }
    }
?>