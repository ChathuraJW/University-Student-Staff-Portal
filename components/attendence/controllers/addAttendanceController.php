<?php
class AddAttendanceController extends Controller{
    
    public static function addAttendance(){


        $passingSubjects=AddAttendanceModel::getSubjectData();
        $passingInquiryMessage = AddAttendanceModel::getInquiryMessage();
//        print_r($passingSubjects);
//         print_r($passingInquiryMessage);
        $sendData = array($passingSubjects,$passingInquiryMessage);
//        print_r($sendData);
        // self::createView("addAttendanceView",$sendData);
        
        if(isset($_POST['submit'])){
            $semester=$_POST['semester'];
            $subject=$_POST['subject'];
            $date=$_POST['attendDate'];
            $week=$_POST['week'];
            $attempt=$_POST['attempt'];
            // $name = $_FILES['csvFile']['name'];
            $fileLocation = $_FILES['csvFile']['tmp_name'];
//             echo("$semester $subject $date $week $attempt");
//             echo(" $fileLocation");
            if(!$fileLocation){
                echo("<script>createToast('Warning (error code: #SAM01)','Need to upload attendance file.','W')</script>");


            }
            $attendanceFile = fopen($fileLocation,"r");
                $isHeader = true;//to ignore header
                $description = "General";
                $result = NULL;
                // get data from the csv file
                while(!feof($attendanceFile)){
                    $attendanceEntry = explode(",",fgets($attendanceFile));
                    if($isHeader){
                        $isHeader = false;
                    }else{
                        $studentIndex = $attendanceEntry[1];
                        $attendance = $attendanceEntry[2];
                        if(!$studentIndex && !$attendance){
                            $enrollmentID =  AddAttendanceModel::getEnrollmentID($studentIndex,$subject,$attempt);
                            $singleAttendance = new AttendanceInstance();
                            $singleAttendance->setAttendance($attendance,$week,$date,$description,$enrollmentID);
                            $result = AddAttendanceModel::processAttendanceData($singleAttendance);
                        }
                    }
                }
            self::createView("addAttendanceView",$sendData);
            if($result){
                echo("<script>createToast('Success','Attendance file successfully uploaded','S');</script>");
            }else{
                echo("<script>createToast('Warning (error code: #SAM01)','Failed submit attendance file.','W')</script>");
            }

        }elseif (isset($_POST['search'])){
            echo("in search function");
            $index = $_POST['index'];
            $academicYear = $_POST['academicYear'];
            $subject = $_POST['subject'];
            $attempt = $_POST['attempt'];
            echo("$index $academicYear $subject $attempt");
            $attendanceData = AddAttendanceModel::getAttendanceDataFromDatabase($index, $subject,$attempt);
            array_push($sendData,$attendanceData);
            
             // print_r($attendanceData);
            self::createView("addAttendanceView",$sendData);
            echo("<script>
                document.getElementById('attendanceTable').style.display = '';

            </script>");
            print_r($sendData);

        } else{
            self::createView("addAttendanceView",$sendData);
        }
        
    }
}

