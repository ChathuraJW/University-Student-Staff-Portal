<?php
    class ViewIQACController extends Controller{
        public static function viewIQAC(){
            $subjectList=ViewIQACModel::getSubject();
            
            

            if(isset($_POST['search'])){
                $academicYear = $_POST['academicYear'];
                $batchYear = $_POST['batchYear'];
                $semester = $_POST['semester'];
                $subject = $_POST['subject']; 

                //check all feilds are filled
                if(!$academicYear || !$batchYear || !$semester || !$subject){
                    echo("<script>createToast('Warning(error code:#IQACM03)','All feilds reqired','W')</script>"); 
                }

                $searchFiles=ViewIQACModel::getSearch($academicYear,$batchYear,$semester,$subject); 
                $sendData = array($subjectList,$searchFiles);
                self::createView("viewIQACView",$sendData);

            }else{
                $recentFiles=ViewIQACModel::getRecentFiles();
                $sendingData=array($subjectList,$recentFiles);
                self::createView("viewIQACView",$sendingData);
            }
            
        }

    
    }
    ?> 