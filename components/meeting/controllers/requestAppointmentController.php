<?php
class RequestAppointmentController extends Controller{
    public function __construct(){
        parent::__construct();
    }
    public static function open(){
        $lecturers=RequestAppointmentModel::getLectures();
        $profiles=RequestAppointmentModel::getProfile();
        $records=RequestAppointmentModel::getData();
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
            // echo "$lecture";
            // $lecturer=$this->input->post('lect');
            // $date=$this->input->post('date');
            // $time=$this->input->post('time');
            // $timeDuration=$this->input->post('durat');
            // $message=$this->input->post('msg');
            RequestAppointmentModel::insertData($lecturer,$typecode,$title,$timeDuration,$message);

        }
        if(isset($_POST['chose'])){

        }
    }
    // public static function selectData(){
    //     $appointId=$this->input->post('id');
    //     $data=RespondAppointmentModel::getAppointmentData($appointId);
    //     self::createView("requestMeeting",$data);
    // }

    public static function saveData(){
        
    }
}
?>