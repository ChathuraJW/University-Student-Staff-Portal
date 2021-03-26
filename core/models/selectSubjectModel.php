<?php
    class SelectSubjectModel extends Model{

        public static function subjects(){
            setcookie('userName','2018cs134');
            $regNo=$_COOKIE['userName'];
            $queryOne="SELECT parameterValue FROM system_parameters WHERE parameterKey='current_semester'";
            $semester=Database::executeQuery('root','',$queryOne);
            $sem=$semester[0]['parameterValue'];
            $queryTwo="SELECT studentGroup FROM student WHERE regNo='$regNo'";
            $year=Database::executeQuery('root','',$queryTwo);
            $yearNumber=$year[0]['studentGroup'][0];
            // echo $yearNumber;

            if($yearNumber=='3'&& $sem=='1'){
                $semNo=5;
            }
            elseif($yearNumber=='4'&& $sem=='1'){
                $semNo=7;
            }
            elseif($yearNumber=='4'&& $sem=='2'){
                $semNo=8;
            }
            $queryFour="SELECT * FROM course_module WHERE semester='".$semNo."' AND courseValidity=1";
            $subjects=Database::executeQuery('root','',$queryFour);
            return $subjects;
            echo "   ";
            
        }
        public static function enroll($array){
            if(empty($array)){
                echo("<script>createToast('Warning (error code: #SBS01)','Cannot enroll without select subjects','W')</script>");
            }
            else{
                $userName=$_COOKIE['userName'];
                $querySub="SELECT indexNo FROM student WHERE regNo='$userName'";
                $indexNo=Database::executeQuery('root','',$querySub);
                $index=$indexNo[0]['indexNo'];
                $date=date('Y-m-d');
                $dbInstance=new Database;
                $enrollState=false;
                $dbInstance->establishTransaction('root','');
                foreach($array as $record){
                    $query="INSERT INTO student_enroll_course(studentIndexNo,courseCode,attempt,enrollDate) VALUES('".$index."','".$record."','F','".$date."')";
                        $dbInstance->executeTransaction($query);
                        $dbInstance->transactionAudit($query, 'student_enroll_course', "INSERT", 'Successfully enroll for Course Module.');
                        echo "   ";
                
                }
                if($dbInstance->getTransactionState()){
                    $dbInstance->commitToDatabase();
                    echo("<script> createToast('Success','Enroll for courses successfully.','S');
                    setTimeout(function(){ window.location.href='home';}, 3000);
                    </script>");
                    // header("location: home");
                }else{
                    echo("<script>createToast('Warning (error code: #SBS02)','Enroll Failed for '$record'','W')</script>");
                }
            }
        }
    }
?>