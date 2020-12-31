<?php
    class AdminPanelModel extends Model{

        public static function getCourse(){
            $courseList= array();
            $query="SELECT * FROM course_module";
            $courses=Database::executeQuery("root","",$query);
            foreach($courses as $course){
                $newCourse= new courseModule;
                
                $newCourse->setCourse($course['courseCode'],$course['name'],$course['semester'],$course['creditValue'],$course['description']);
                
                $courseList[]=$newCourse;
            }
            return $courseList;

        }
    }
?>