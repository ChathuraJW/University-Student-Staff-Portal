<?php

class ViewResultController extends Controller{
    public static function init(){
        $resultData=ViewResultModel::loadResultData();
        $totalCredit=ViewResultModel::calculateTotalCredit();
        $currentGPA=ViewResultModel::getCurrentGPA();
	    $classGPA=ViewResultModel::getClassGPA();
        $currentRank=ViewResultModel::getCurrentRank();
        $sendData=array($currentGPA,$currentRank,$totalCredit,$resultData,$classGPA);

        self::createView("viewResultView",$sendData);

        if(!$resultData || !$totalCredit || !$currentGPA || !$currentRank)
	        echo("<script>createToast('Warning (error code: #ERM07)','Failed to load data.','W')</script>");
    }
}