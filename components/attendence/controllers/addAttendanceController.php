<?php
class AddAttendanceController extends Controller{
    
    public static function addAttendance(){
        
        $passingSubjects=AddAttendanceModel::getSubjectData();
        // print_r($passingSubjects);
        self::createView("addAttendanceView",$passingSubjects);

        if(isset($_POST['submit'])){
            $semester=$_POST['semester'];
            $subject=$_POST['subject'];
            $date=$_POST['attendDate'];
            $week=$_POST['week'];
            $attempt=$_POST['attempt'];
            // echo("$semester $subject $date $week $attempt");
            // file operation
            //upload file into directory
            // $name = $_FILES['csvFile']['name'];
            $fileLocation = $_FILES['csvFile']['tmp_name'];
            echo(" $temp_name");
            print_r($_FILES);
            $isSuccess = AddAttendanceModel::ProcessAttendanceData( $subject,$date,$week, $attempt, $fileLocation);
            
        }
    }
}
