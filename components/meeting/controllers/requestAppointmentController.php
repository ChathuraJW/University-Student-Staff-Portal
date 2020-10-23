<?php
class RequestAppointmentController extends Controller{
    // public function __construct(){
    //     parent::__construct();
    // }
    public static function open(){
        setcookie('userName','2018cs183');
        $studentID=$_COOKIE['userName'];
        $lecturers=RequestAppointmentModel::getLectures();
        $profiles=RequestAppointmentModel::getProfile();
        $records=RequestAppointmentModel::getData($studentID);
        $passingData=array($lecturers,$profiles,$records);
        
        
        self::createView("requestAppointmentView",$passingData);

        if(isset($_POST['submit'])){
            
            $lecturer=$_POST['lect'];
            $type=$_POST['type'];
            $title=$_POST['title'];
            $timeDuration=$_POST['durat'];
            $message=$_POST['msg'];
            if($type=="type 1"){
                $typecode=5100;
            }
            elseif($type=="type 2"){
                $typecode=5200;
            }
            elseif($type=="type 3"){
                $typecode=5300;
            }
            else{
                $typecode=5400;
            }
            RequestAppointmentModel::insertData($lecturer,$typecode,$title,$timeDuration,$message,$studentID);
            echo ("
                <script>
                    window.location.href=document.location.href.toString().split('requestAppointment')[0]+'requestAppointment';
                </script>
            ");
        }
    }
    
}
?>