<?php
    class ResetPasswordModel extends Model{
        public static function resetPassword($userName,$password){
            $hashedPassword = self::getHashPassword($userName,$password);
            $queryOne="UPDATE user SET password='$hashedPassword' WHERE userName='$userName'";/** Update the new password's hash value */
            $databaseInstance=new Database;

            $databaseInstance->establishTransaction('root','');
            $databaseInstance->executeTransaction($queryOne);
            if($databaseInstance->getTransactionState()){
                $databaseInstance->transactionAudit($queryOne, 'user', "UPDATE", 'Update a new Password cause of forget.',$userName);
                if($databaseInstance->commitToDatabase($userName)){
            // display success message
                    echo("<script>createToast('Success','Update password successfully.','S');</script>");
                }
                
                else{
            // display fail message
                    echo("<script>createToast('Warning (error code: #FPWD01)','Failed to Update .','W')</script>");
                }
            }
            else{
                echo("<script>createToast('Warning (error code: #FPWD01)','Failed to Update .','W')</script>");

            }
            
        }
        private static function getHashPassword($userName,$password){
            $salt=bin2hex(random_bytes(8)); /*create a salt value*//** There create a new salt value for every password changing time. */
            $databaseInstance=new Database;

            $databaseInstance->establishTransaction('root','');
            $query="UPDATE user SET passwordSalt='$salt' WHERE userName='$userName'"; /**update the salt value */
            $databaseInstance->executeTransaction($query);
            if($databaseInstance->getTransactionState()){

                $databaseInstance->transactionAudit($query, 'user', "UPDATE", 'Update a new salt value.',$userName);
                $databaseInstance->commitToDatabase($userName);
            
            }
            $passwordHash=hash('sha256',"$password$salt");/** create the hash value of the password and salt value */
            return $passwordHash;
        }
    }
?>