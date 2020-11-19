<?php
    class RegistrationController extends Controller{
        public static function open(){
            $data=registrationModel::getData();
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
                if($password===$repeatPassword)
                    $hashedPassword = hash('sha256', $password);
                else
                    die("Invalid password pair.");
//                save image to directory
                $fileName=$_COOKIE['userName'].'.png';
                $name = $_FILES['profilePic']['name'];
                $temp_name = $_FILES['profilePic']['tmp_name'];
                if (isset($name) and !empty($name)) {
                    $location = './assets/profile picture/';
                    if (move_uploaded_file($temp_name, $location . $fileName)) {
                        $isFileUploaded = true;
                    }
                }
                if(isset($isFileUploaded) & $isFileUploaded){
                    $isUpdated=registrationModel::updateUserData($hashedPassword,$gender,$salutation,$telephone,$address,$personalEmail,$fileName);
                    if(!$isUpdated)
                        die();
                } else
                    die();
            }
        }
    }
?>