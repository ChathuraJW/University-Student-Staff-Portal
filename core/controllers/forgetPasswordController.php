<?php
require_once('../assets/php/sendMail.php');
class ForgetPasswordController extends Controller{
    
    public static function open(){
        
        self::createView("forgetPasswordView");

        if(isset($_POST['submit'])){
            
            $userName=$_POST['userName'];

            // Store the cipher method 
            $ciphering = "AES-128-CTR"; 
            
            // Use OpenSSl Encryption method 
            $iv_length = openssl_cipher_iv_length($ciphering); 
            $options = 0; 
            
            // Non-NULL Initialization Vector for encryption 
            $encryption_iv = '1234567891011121'; 
            
            // Store the encryption key 
            $encryption_key = "@cs#@24TRC##"; 
            
            // Use openssl_encrypt() function to encrypt the data 
            $encryption = openssl_encrypt($userName, $ciphering,$encryption_key, $options, $encryption_iv);

            $name=ForgetPasswordModel::getName($userName);
            $title="Reset The USSP Password";
            $link="http://localhost/USSP/components/forgetPassword/resetPassword?secret=".$encryption."";
            $message="
            
                <p>Dear ".$name."</p><br><br><br>
                <p>You recently requested to reset your password for your USSP account. Click the link bellow to reset it.</p>
                <a href='".$link."'>Reset Password</a><br><br>
                <p>If you did not requested, please ignore this email or reply to let us know.</p><br>
                <p>Thank you</p> 
            
            ";
            
            sendMail($title, $message, false, array($userName));

        }
    }
    
}
?>
