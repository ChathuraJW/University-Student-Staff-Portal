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
                $gend=$_POST['gender'];
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
                if($gend=='Male'){
                    $gender='M';
                }else{
                    $gender='F';
                }
                    
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
                registrationModel::first($passcodeen,$firstName,$lastName,$fullName,$gender,$occupation,$nic,$dob,$tele,$address,$email,$uniMail);

            }
        }
    }
?>