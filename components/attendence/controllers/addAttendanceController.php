<?php
class AddAttendanceController extends Controller{
    
    public static function addAttendance(){


        $passingSubjects=AddAttendanceModel::getSubjectData();
        $passingInquiryMessage = AddAttendanceModel::getInquiryMessage();
        // print_r($passingInquiryMessage);
        $sendData = array($passingSubjects,$passingInquiryMessage);
        self::createView("addAttendanceView",$sendData);
        
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
            // echo(" $temp_name");
            // print_r($_FILES);
            $isSuccess = AddAttendanceModel::ProcessAttendanceData( $subject,$date,$week, $attempt, $fileLocation);
        }
        // elseif (isset($_POST['search'])){
        //     $index = $_POST['index'];
        //     $academicYear = $_POST['academicYear'];
        //     $subject = $_POST['subject'];
        //     $attempt = $_POST['attempt'];
        //     // echo("$index $academicYear $subject $attempt");
        //     $attendanceData = AddAttendanceModel::getAttendanceDataFromDatabase($index, $subject,$attempt);
        //     // print_r($attendanceData);
        //     self::createView("addAttendanceView",$passingSubjects,$attendanceData);

        // }
        // elseif(isset($_POST['edit'])){

        // }
        

        
        // print_r($passingSubjects);
        

        // Add CSV Files
    //     if(isset($_POST['submit'])){
            
    //     }

    //     // Edit attendance data
    //     if(isset($_POST['search'])){
            // $index = $_POST['index'];
            // $academicYear = $_POST['academicYear'];
            // $subject = $_POST['subject'];
            // $attempt = $_POST['attempt'];
            // // echo("$index $academicYear $subject $attempt");
            // $attendanceData = AddAttendanceModel::getAttendanceDataFromDatabase($index, $subject,$attempt);
            // print_r($attendanceData);
            // self::createView("addAttendanceView",$passingSubjects,$attendanceData);
    //     }
    }
}
