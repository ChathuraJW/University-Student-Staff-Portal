<?php
class subjectManagementController extends Controller{
    // public function __construct(){
    //     parent::__construct();
    // }
    public static function subjectManagementOpen(){
        // setcookie("userName","kek");
        $data=subjectManagementModel::getCourse();
        self::createModularView("subjectManagementView","subjectManagementView",$data);

        if(isset($_POST['add'])){
            $courseCode=$_POST['courseCode'];
            $courseName=$_POST['courseName'];
            $semester=$_POST['semester'];
            $creditValue=$_POST['creditValue'];
            $description=$_POST['description'];
            echo ("
            <script>
                confirm('Confirm Add this Course ');
            </script>
        ");

        subjectManagementModel::addCourse($courseCode,$courseName,$semester,$creditValue,$description);
        //     echo ("
        //     <script>
        //         location.reload();
        //     </script>
        // ");

        }
        if(isset($_POST['edit'])){
            $courseCode=$_POST['courseCodeHidden'];
            $courseName=$_POST['courseName'];
            $semester=$_POST['semester'];
            $creditValue=$_POST['creditValue'];
            $description=$_POST['description'];
            echo ("
            <script>
                confirm('Confirm edit this Course Details');
            </script>
        ");

        subjectManagementModel::editCourse($courseCode,$courseName,$semester,$creditValue,$description);

        }
        if(isset($_POST['delete'])){
            $courseCode=$_POST['deleteCourseCodeInput'];
            echo ("
            <script>
                confirm('Confirm Delete this Course ');
            </script>
        ");

        subjectManagementModel::deleteCourse($courseCode);
        // window.location.href=document.location.href.toString().split('requestAppointment')[0]+'requestAppointment';

        }



        
        
    }
    
}
?>