<?php
class ConfirmBookingController extends Controller{
    public static function init(){
        $reviewList=ConfirmBookingModel::loadReviewList();
//        if user press entry to review
        if(isset($_GET['operation']) && isset($_GET['requestID'])){
            $requestID=$_GET['requestID'];
            $result=ConfirmBookingModel::loadSelectedRequest($requestID);
            if($result){
//                load view with review section
                self::createView('confirmBookingView',[$reviewList,$result]);
            }else{
//                default view
                self::createView('confirmBookingView',[$reviewList]);
            }
        }else{
//            default view
            self::createView('confirmBookingView',[$reviewList]);
        }
    }
}