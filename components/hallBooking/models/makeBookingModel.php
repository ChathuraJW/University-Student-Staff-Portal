<?php
	class MakeBookingModel extends Model{

    public static function getHallData(): array {
//        query DB for get hall and lab data
        $sqlQuery="SELECT * FROM hall_and_lab ORDER BY hallType DESC";
        $result=Database::executeQuery('generalAccess','generalAccess@16',$sqlQuery);
//        create array to store objects
        $hallList=array();
//        add object to array
        foreach ($result as $row){
            $hall=new Hall;
            $hall->createHall($row['hallID'],$row['capacity'],$row['hallType']);
            $hallList[]=$hall;
        }
        return $hallList;
    }

    public static function getReservationRequestHistory(): array {
//        get userName form cookie
        $userName=$_COOKIE['userName'];
//        query DB for get all request belong to the current logged in user
        $sqlQuery="SELECT * FROM hall_reservation_details WHERE reserveUserName='$userName' ORDER BY reservationID DESC;";
        $result=Database::executeQuery('generalAccess','generalAccess@16',$sqlQuery);
//        create array yo store objects
        $requestList=array();
//        insert object by object to array
        foreach ($result as $row){
            $fullName=$row['salutation'].'. '.$row['fullName'];
            $request=new HallAllocation();
//            call function to set data to the object
            $request->setAllocationFull($row['reservationID'], $row['reserveUserName'], $row['hallID'], $row['description'],
            $row['type'], $row['fromTimestamp'], $row['toTimestamp'],$row['requestMadeAt'], $row['reservationStates'],
                $row['approvedBy'], $row['approvalTimestamp'],$fullName);
//            add object to  the list
            $requestList[]=$request;
        }
        return $requestList;
    }

//    check same slot already occupy
	public static function sameSlotTimetableEntry($hallID,$fromTS,$toTS): bool {
//    	get date form timestamps
		$fromDay = strtoupper(date('D', strtotime($fromTS)));
		$toDay = strtoupper(date('D', strtotime($toTS)));
		$fromTime=date('H:m:s', strtotime($fromTS));
		$toTime=date('H:m:s', strtotime($toTS));

//		these value for further improvement of query
		$hours=(strtotime($toTS)-strtotime($fromTS))/3600;
		$days=$hours/24;

		//think about query for further modification to improve efficiency
		$sqlQuery="SELECT * FROM timetable WHERE hallID='$hallID' AND day='$fromDay' 
                          AND ((fromTime < '$toTime' AND toTime > '$fromTime') OR fromTime='$fromTime')";
		$result=Database::executeQuery('root','',$sqlQuery);
//		check whether there have result, if have that mean can not book the slot
		if(sizeof($result)!==0){
			return true;
		}else{
			return false;
		}
	}

    public static function sameSlotReservations($hallID,$fromTS,$toTS):bool{
//	    list out same slot request states
    	$sqlQuery = "SELECT reservationID,reservationStates FROM hall_reservation_details 
		WHERE hallID='$hallID' AND ((fromTimestamp < '$toTS' AND toTimestamp > '$fromTS') OR fromTimestamp='$fromTS') ORDER BY reservationStates";
	    $result=Database::executeQuery('generalAccess','generalAccess@16',$sqlQuery);
	    $isSlotReserved=false;
//	    check whether one of them was already occupy the slot
	    foreach ($result as $row){
	    	if($row['reservationStates']==='A'){
			    $isSlotReserved=true;
			    break;
		    }
	    }
	    return $isSlotReserved;
    }

    public static function makeNewReservation($reservation){
//        get database instance
        $databaseInstance=new Database;
        $databaseInstance->establishTransaction('generalAccess','generalAccess@16');
        $sqlQuery="INSERT INTO user_receive_hall(reserveUserName, hallID, description, type, fromTimestamp, toTimestamp, requestMadeAt) 
        VALUES ('".$reservation->getReservedBy()."','".$reservation->getHallID()."','".$reservation->getDescription()."',
        ".$reservation->getReservationTypeAsInt().",'".$reservation->getFrom()."','".$reservation->getTo()."',NOW())";
//        execute query
        $databaseInstance->executeTransaction($sqlQuery);
//        create audit
        $databaseInstance->transactionAudit($sqlQuery,'user_receive_hall','INSERT','Create a new reservation request.');

        if($databaseInstance->getTransactionState()){
            if($databaseInstance->commitToDatabase()){
//                display success message
                echo("<script>createToast('Success','Hall reservation request successfully placed.','S');</script>");
            }else{
//                display fail message
                echo("<script>createToast('Warning (error code: #HBM08)','Hall reservation request failed placed.','W')</script>");
            }
        }else{
//            display fail message
            echo("<script>createToast('Warning (error code: #HBM08)','Hall reservation request failed placed.','W')</script>");
        }
//        close connection
	    $databaseInstance->closeConnection();
    }
}