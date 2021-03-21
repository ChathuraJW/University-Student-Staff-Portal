<?php
    class facilityManagementModel extends Model{

        public static function getHall(){
            $hallList= array();
            $query="SELECT * FROM  hall_and_lab WHERE hallValidity=0";
            $halls=Database::executeQuery("admin","admin@16",$query);
            foreach($halls as $hall){
                $newHall= new Hall;
                
    // public function setHall($hallID,$capacity,$hallType){
        // echo $hallID.$hallType.$capacity;
        
        $newHall->setHall($hall['hallID'],$hall['capacity'],$hall['hallType']);
                
                $hallList[]=$newHall;
            }
            return $hallList;

        }

        public static function editHall($hallID,$capacity,$hallType){
            $databaseInstance=new Database;
            $databaseInstance->establishTransaction('admin','admin@16');
            $query="UPDATE hall_and_lab SET capacity='".$capacity."',hallType='".$hallType."' WHERE hallID='".$hallID."'";
        
            $databaseInstance->executeTransaction($query);
            if ($databaseInstance->getTransactionState()){
                $databaseInstance->commitToDatabase();
                $databaseInstance->transactionAudit($query, 'Edit Hall', 'UPDATE', 'Update a Hall Detail.');
                echo("<script>createToast('Success','Hall Update Successfully.','S');</script>");
            } else {
//			show failed toast
                echo("<script>createToast('Warning (error code: #ADMIN-FM-01)','Update Query failed. Please Try Again.','W');</script>");
            }
//		close db connection
            $databaseInstance->closeConnection();
                
        }

        public static function addHall($hallID,$capacity,$hallType){
            $databaseInstance=new Database;
            $databaseInstance->establishTransaction('admin','admin@16');

            $query="INSERT INTO hall_and_lab(hallID, capacity, hallType) VALUES ('".$hallID."','".$capacity."','".$hallType."')";
            
            $databaseInstance->executeTransaction($query);
            if ($databaseInstance->getTransactionState()) {
                $databaseInstance->commitToDatabase();
                $databaseInstance->transactionAudit($query, 'Add Hall', 'INSERT', 'Add a New hall.');
                echo("<script>createToast('Success','Hall insert Successfully.','S');</script>");
            } else {
//			show failed toast
                echo("<script>createToast('Warning (error code: #ADMIN-FM-02)','Insert Query failed. Please Try Again.','W');</script>");
            }
//		close db connection
            $databaseInstance->closeConnection();
        }
        public static function deleteHall($hallID){
            $databaseInstance=new Database;
            $databaseInstance->establishTransaction('admin','admin@16');

            $query="UPDATE hall_and_lab SET hallValidity=1 WHERE hallID='".$hallID."'";
            
            $databaseInstance->executeTransaction($query);
            if ($databaseInstance->getTransactionState()) {
                $databaseInstance->commitToDatabase();
                $databaseInstance->transactionAudit($query, 'Delete hall', 'UPDATE', 'Delete a hall.');
                echo("<script>createToast('Success','Deleted a hall Successfully.','S');</script>");
            } else {
//			show failed toast
                echo("<script>createToast('Warning (error code: #ADMIN-FM-03)','Delete Query failed. Please Try Again.','W');</script>");
            }
//		close db connection
            $databaseInstance->closeConnection();
        }
    }
?>