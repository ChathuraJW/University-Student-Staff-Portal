<?php
    class SelectSubjectController extends Controller{

        public static function open() {
            $subjects=SelectSubjectModel::subjects();
            self::createView("selectSubjectView",$subjects);
            if(isset($_POST['submit'])){

                $array=$_POST['checkingBox'];
                SelectSubjectModel::enroll($array);
            }

        }
    }
?>