<?php
    class subjectManagementModel extends Model{

        public static function getCourse(){
            $courseList= array();
            $query="SELECT * FROM course_module WHERE courseValidity=1";
            $courses=Database::executeQuery("admin","admin@16",$query);
            foreach($courses as $course){
                $newCourse= new courseModule;
                
                $newCourse->setCourse($course['courseCode'],$course['name'],$course['semester'],$course['creditValue'],$course['description']);
                
                $courseList[]=$newCourse;
            }
            return $courseList;

        }
        public static function editCourse($courseCode,$courseName,$semester,$creditValue,$description){
            
            if($courseCode==""||$courseName==""||$semester==""||$creditValue==""||$description==""){
                echo("<script>createToast('Warning (error code: #ADMIN-SM-01)','Cannot set null fields. Please Try Again.','W');</script>");
            }else{
                $databaseInstance=new Database;
                $databaseInstance->establishTransaction('admin','admin@16');
                $query="UPDATE course_module SET name='".$courseName."',semester='".$semester."',creditValue='".$creditValue."',description='".$description."' WHERE courseCode='".$courseCode."'";
                // echo $query;
                $databaseInstance->executeTransaction($query);
                if ($databaseInstance->getTransactionState()){
                    $databaseInstance->commitToDatabase();
                    $databaseInstance->transactionAudit($query, 'Edit Course', 'UPDATE', 'Update a Course Detail.');
                    echo("<script>createToast('Success','Course Update Successfully.','S');</script>");
                } else {
    //			show failed toast
                    echo("<script>createToast('Warning (error code: #ADMIN-SM-02)','Update Query failed. Please Try Again.','W');</script>");
                }
    //		close db connection
                $databaseInstance->closeConnection();
            }
                
                    
        }
        public static function addCourse($courseCode,$courseName,$semester,$creditValue,$description){
            
            if($courseCode==""||$courseName==""||$semester==""||$creditValue==""||$description==""){
                echo("<script>createToast('Warning (error code: #ADMIN-SM-01)','Cannot set null fields. Please Try Again.','W');</script>");
            }else{
                $databaseInstance=new Database;
                $databaseInstance->establishTransaction('admin','admin@16');

                $query="INSERT INTO course_module(courseCode, name, semester, creditValue, description) VALUES ('".$courseCode."','".$courseName."','".$semester."','".$creditValue."','".$description."')";
                // echo $courseCode.$courseName.$semester.$creditValue.$description;
                // echo $query;
                $databaseInstance->executeTransaction($query);
                if ($databaseInstance->getTransactionState()) {
                    $databaseInstance->commitToDatabase();
                    $databaseInstance->transactionAudit($query, 'Add course', 'INSERT', 'Add a New course.');
                    echo("<script>createToast('Success','Course insert Successfully.','S');</script>");
                } else {
    //			show failed toast
                    echo("<script>createToast('Warning (error code: #ADMIN-SM-02)','Insert Query failed. Please Try Again.','W');</script>");
                }
    //		close db connection
                $databaseInstance->closeConnection();
            }
        }
        public static function deleteCourse($courseCode){
            $databaseInstance=new Database;
            $databaseInstance->establishTransaction('admin','admin@16');

            $query="UPDATE course_module SET courseValidity=0 WHERE courseCode='".$courseCode."'";
            // echo $courseCode.$courseName.$semester.$creditValue.$description;
            // echo $query;
            $databaseInstance->executeTransaction($query);
            if ($databaseInstance->getTransactionState()) {
                $databaseInstance->commitToDatabase();
                $databaseInstance->transactionAudit($query, 'Delete course', 'UPDATE', 'Delete a course.');
                echo("<script>createToast('Success','Delete a course Successfully.','S');</script>");
            } else {
//			show failed toast
                echo("<script>createToast('Warning (error code: #ADMIN-SM-03)','Delete Query failed. Please Try Again.','W');</script>");
            }
//		close db connection
            $databaseInstance->closeConnection();
        }


    }
?>