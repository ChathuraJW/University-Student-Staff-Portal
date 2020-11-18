<?php
    class RegistrationController extends Controller{
        public static function open(){
            $data=registrationModel::getData();
            // $passingData=array($data);
            self::createView("registrationView",$data);
            if(isset($_POST['submit'])){
                $password=$_POST['password'];
                $rePassword=$_POST['repeatPassword'];
                $fName=$_POST['fName'];
                $lName=$_POST['lName'];
                $flName=$_POST['fullName'];
                $gender=$_POST['gender'];
                $salutation=$_POST['salutation'];
                $nic=$_POST['nic'];
                $dob=$_POST['dob'];
                $tele=$_POST['tele'];
                $adrs=$_POST['address'];
                $email=$_POST['personalEmail'];
                $uniMail=$_POST['universityMail'];
                $image=$_POST['image'];
                $passcodeen = hash('sha256', (get_magic_quotes_gpc() ? stripslashes($password) : $password));
                $firstName=ucwords($fName);
                $lastName=ucwords($lName);
                $fullName=ucwords($flName);
                $address=ucwords($adrs);
                    
                $image_name=$_FILES['image']['name'];
                $image_tmpName=$_FILES['image']['tmp_name'];
                // $location='C:\xampp\htdocs\USSP\core\assets\profile picture';
                
                echo "helllo";
                echo  $fName;
                echo  $lastName;
                echo  $fullName;
                echo  $address;
                echo  $gender;
                // $image_name." ".$image_tmpName." ".$email." ".$uniMail." ".$passcodeen." ".$tele." ".$dob." ".$nic." ".$fPassword;
                // move_uploaded_file($image_tmpName,$location);
                registrationModel::first($passcodeen,$firstName,$lastName,$fullName,$gender,$salutation,$nic,$dob,$tele,$address,$email,$uniMail);

            }
        }
    }
?>