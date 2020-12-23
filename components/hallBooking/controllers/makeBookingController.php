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
//            create timestamps based on user input
            $fromTS = date('Y-m-d H:i:s', strtotime("$fromDate $fromTime"));
            $toTS=date('Y-m-d H:i:s', strtotime("$toDate $toTime"));
            $fromDay = strtoupper(date('D', strtotime($fromDate)));
            $toDay = strtoupper(date('D', strtotime($toDate)));

            //TODO check weather there have booking for same slot or are there have timetable entry
            
            $newAllocation->createBasicAllocation($_COOKIE['userName'],$_POST['selectedHallOrLab'],$_POST['description'],$_POST['bookingType'],$fromTS,$toTS);
            MakeBookingModel::makeNewReservation($newAllocation);
        }
    }
}