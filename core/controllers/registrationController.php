<?php
    class RegistrationController extends Controller{
        public static function open(){
            $data=RegistrationModel::getData();
            self::createView("registrationView",$data);
            if(isset($_POST['submit'])){
                $password=$_POST['password'];
                $repeatPassword=$_POST['repeatPassword'];
                $gender=$_POST['gender'];
                $salutation=$_POST['salutation'];
                $telephone=$_POST['telephone'];
                $address=ucwords($_POST['address']);
                $personalEmail=$_POST['personalEmail'];
//                backend password validation
        
//                save image to directory
                $fileName=$_COOKIE['userName'].'.png';
                $name = $_FILES['profilePic']['name'];
                $temp_name = $_FILES['profilePic']['tmp_name'];
                $isFileUploaded = false;
                if (isset($name) and !empty($name)) {
                    $location = './assets/profile picture/';
                    if (move_uploaded_file($temp_name, $location . $fileName)) {
                        $isFileUploaded = true;
                    }
                }
                else{
                    if($gender=='M'){
                        $location = './assets/profile picture/userMale.jpg';
                    }
                    else{
                        $location = './assets/profile picture/userFemale.jpg';
                    }
                }
                if(isset($isFileUploaded) & $isFileUploaded){
                    if($password===$repeatPassword)
                        $isUpdated=RegistrationModel::updateUserData($password,$gender,$salutation,$telephone,$address,$personalEmail,$fileName);
                        
                    else
                        die("Invalid password pair.");
                    if(!$isUpdated)
                        die();
                    else{
                        //redirect to home
                        header("location: home");
                    }
                } else
                    die();
            }
        }
    }
