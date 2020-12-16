<?php
class RequestAppointmentController extends Controller{
    // public function __construct(){
    //     parent::__construct();
    // }
    public static function open(){
       setcookie('userName','2018cs010');
        $studentID=$_COOKIE['userName'];
        $lecturers=RequestAppointmentModel::getLectures();
        $profiles=RequestAppointmentModel::getProfile();
        $records=RequestAppointmentModel::getData($studentID);
        
        $passingData=array($lecturers,$profiles,$records);
        
        self::createView("requestAppointmentView",$passingData);

        if(isset($_POST['submit'])){
            
            $lecturer=$_POST['lecturer'];
            $type=$_POST['type'];
            $title=$_POST['title'];
            $timeDuration=$_POST['durationInput'];
            $message=$_POST['msg'];
            $date=$_POST['date'];
            $time=$_POST['time'];
            if($type=="Academic Related"){
                $typecode=5100;
            }
            elseif($type=="Personal"){
                $typecode=5200;
            }
            elseif($type=="Social Related"){
                $typecode=5300;
            }
            else{
                $typecode=5400;
            }
            RequestAppointmentModel::insertData($lecturer,$typecode,$title,$timeDuration,$message,$studentID,$date,$time);
            echo ("
                <script>
                    window.location.href=document.location.href.toString().split('requestAppointment')[0]+'requestAppointment';
                </script>
            ");
        }
    }
    
}
?>