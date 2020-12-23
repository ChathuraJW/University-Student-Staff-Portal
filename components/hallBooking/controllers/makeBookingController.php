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
            $fromTS=$_POST['fromData']+' '+$_POST['fromTime'];
            $toTS=$_POST['toData']+' '+$_POST['toTime'];
            //TODO formTS and toTS creation is not happen correctly so need to look on that timestamp creation
            
            $newAllocation->createBasicAllocation($_COOKIE['userName'],$_POST['selectedHallOrLab'],$_POST['description'],$_POST['bookingType'],$fromTS,$toTS);
            MakeBookingModel::makeNewReservation($newAllocation);
        }
    }
}