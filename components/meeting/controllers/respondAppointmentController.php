<?php
class RespondAppointmentController extends Controller{
    public function __construct(){
        parent::__construct();
    }
    public static function open(){
        $pastData=RespondAppointmentModel::getPastData();
        $records=RespondAppointmentModel::getData();
        $passingData=array($pastData,$records);
        self::createView("respondAppointmentView",$passingData);
        if(isset($_POST['approve'])){
            
            $appointmentID=$_POST['appointmentID'];
            $approve='A';
            $validity=0;
            $reply=$_POST['reply'];
        

            RespondAppointmentModel::insertData($reply,$approve,$validity,$appointmentID);
            echo("
                <script>
                    document.getElementById('messageFirst').style.display = 'none';
                    window.location.href=document.location.href.toString().split('respondAppointment')[0]+'respondAppointment';
                </script>
            ");
        }
        if(isset($_POST['reject'])){
            $appointmentID=$_POST['appointmentID'];
            $approve='R';
            $validity=0;
            $reply=$_POST['reply'];
            RespondAppointmentModel::insertData($reply,$approve,$validity,$appointmentID);
            echo("
                <script>
                    document.getElementById('messageFirst').style.display = 'none';
                    window.location.href=document.location.href.toString().split('respondAppointment')[0]+'respondAppointment';
                </script>
            ");
        }
    } 
}
?>