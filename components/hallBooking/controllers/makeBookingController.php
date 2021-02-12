<?php
class MakeBookingController extends Controller{
    public static function init(){
        $hallData=MakeBookingModel::getHallData();
        $reservationList=MakeBookingModel::getReservationRequestHistory();
        $passingData=[$hallData,$reservationList];
        self::createView('makeBookingView',$passingData);

//        handle create request operation
        if(isset($_POST['createRequest'])){
            $newAllocation=new HallAllocation;
            $fromDate=$_POST['fromData'];
            $fromTime=$_POST['fromTime'];
            $toDate=$_POST['toData'];
            $toTime=$_POST['toTime'];
            $selectedHall=$_POST['selectedHallOrLab'];
//            create timestamps based on user input
            $fromTS = date('Y-m-d H:i:s', strtotime("$fromDate $fromTime"));
            $toTS=date('Y-m-d H:i:s', strtotime("$toDate $toTime"));
            $fromDay = strtoupper(date('D', strtotime($fromDate)));
            $toDay = strtoupper(date('D', strtotime($toDate)));

//	        check for same slot hall reservations
            if(!MakeBookingModel::sameSlotReservations($selectedHall,$fromTS,$toTS)){
//            	can proceed to next step
//	            check weather there have same slot entries for timetable
	            if(!MakeBookingModel::sameSlotTimetableEntry($selectedHall,$fromTS,$toTS)){
//	            	can proceed
		            $newAllocation->createBasicAllocation($_COOKIE['userName'],$selectedHall,$_POST['description'],$_POST['bookingType'],$fromTS,$toTS);
	                MakeBookingModel::makeNewReservation($newAllocation);
	            }else{
//	                display error by saying timetable entry is there
		            echo("<script>createToast('Warning (error code: #HBM10)','Slot already reserved for timetable event.','W');</script>");
	            }

            }else{
	            echo("<script>createToast('Warning (error code: #HBM09)','Sorry to say that ,slot already occupied.','W');</script>");
//            	display error my saying slot is already occupy
            }
        }
    }
}