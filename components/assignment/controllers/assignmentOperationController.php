<?php
class AssignmentOperationController extends Controller{
  public static function init(){
      if(isset($_GET['planID'])){
          $assignmentData=AssignmentOperationModel::loadAssignmentData($_GET['planID']);
          self::createView('assignmentOperationView');
      }
  }
}
