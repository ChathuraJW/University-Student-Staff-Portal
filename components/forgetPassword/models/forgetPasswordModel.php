<?php
    class ForgetPasswordModel extends Model{                              
        public static function getName($userName){
            $databaseInstance=new Database;
            // echo $userName;
            $databaseInstance->establishTransaction('root','');
            

            $query="SELECT firstName FROM user WHERE userName='".$userName."'";
            // $firstName =$databaseInstance->executeTransaction($query);
            return Database::executeQuery("root","",$query);
        
    //             $databaseInstance->transactionAudit($query, 'user', "SELECT", 'Search firstName for rest password.',$userName);
                
    //             if($databaseInstance->getTransactionState()){
    //                 if($databaseInstance->commitToDatabase()){
    //                 //    display success message
    //                     echo("<script>createToast('Success','Search firstName successfully.','S');</script>");
    //                 }
    //             }
    //             else{
    // //                display fail message
    //                 echo("<script>createToast('Warning (error code: #RST01)','Failed Audit .','W')</script>");
    //             }
            
    //         $databaseInstance->closeConnection();
            // $x=$firstName[0];
            // $y=$x[0];

            // echo $y['firstName'];
            // print_r(array($y));
            // print_r(array($x));
            // print_r(array($firstName));
            // return $firstName;

            // Database::executeQuery("student","student@16",$query);
            // self::createAudit($query, 'meeting_appointment', "INSERT", 'Insert a new Appointment Message into the system.');
        }
        
    }
?>