<?php

class ViewResultController extends Controller{
    public static function init(){
        $resultData=ViewResultModel::loadResultData();
        $totalCredit=ViewResultModel::calculateTotalCredit();
        $currentGPA=ViewResultModel::getCurrentGPA();
        $currentRank=ViewResultModel::getCurrentRank();
        $sendData=array($currentGPA,$currentRank,$totalCredit,$resultData);
        self::createView("viewResultView",$sendData);
    }
}