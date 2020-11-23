<?php
class AddAttendanceController extends Controller{
    
    public static function addAttendance(){


        $passingSubjects=AddAttendanceModel::getSubjectData();
        $passingInquiryMessage = AddAttendanceModel::getInquiryMessage();
        // print_r($passingInquiryMessage);
        $sendData = array($passingSubjects,$passingInquiryMessage);
        // self::createView("addAttendanceView",$sendData);
        
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
            self::createView("addAttendanceView",$sendData);

        }elseif (isset($_POST['search'])){
            echo("in search function");
            $index = $_POST['index'];
            $academicYear = $_POST['academicYear'];
            $subject = $_POST['subject'];
            $attempt = $_POST['attempt'];
            echo("$index $academicYear $subject $attempt");
            $attendanceData = AddAttendanceModel::getAttendanceDataFromDatabase($index, $subject,$attempt);
            array_push($sendData,$attendanceData);
            
        //     // print_r($attendanceData);
            self::createView("addAttendanceView",$sendData);
            echo("<script>
                document.getElementById('attendanceTable').style.display = '';

            </script>");
            print_r($sendData);

        }elseif(isset($_POST[''])) {

        } else{
            self::createView("addAttendanceView",$sendData);
        }
        
    }
}

