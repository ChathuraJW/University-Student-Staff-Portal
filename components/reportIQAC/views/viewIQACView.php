<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="assets/viewIQACStyle.css">
    <link rel="stylesheet" href="../../assets/css/gridSystem.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" />

</head>
<body>
<!-- include header section -->
<?php require_once('../../assets/php/basicLoader.php') ?>
<?php basicLoader::loadHeader('../../'); ?>

<!-- feature body section -->


<div class="featureBody">
    <div class="row col-1">
        <h1 class="heading"><b>View IQAC Report</b></h1><br>
    </div>
    <form method="post" enctype="multipart/form-data"> 
    <div class="row col-2">
        <div>
            <div class="Container row col-2">
                <div class="dropDownList">
                    <label>Academic Year</label>
                    <select name="academicYear" id="academicYear" required>
                    </select>
                </div>

                <div class="dropDownList">
                    <label >Batch Year</label>
                    <select name="batchYear" id="batchYear" required>
                        <option value=1>1<sup>st</sup> Year</option>
                        <option value=2>2<sup>nd</sup> Year</option>
                        <option value=3>3<sup>rd</sup> Year</option>
                        <option value=4>4<sup>th</sup> Year</option>
                    </select>
                </div>
            </div>
            <div class=" dropdownContainer row col-2">
                <div class="dropDownList">
                    <label >Semester</label>
                    <select name="semester" required>
                        <option value=1>1</option>
                        <option value=2>2</sup></option>
                         
                    </select>
                </div>
                <div class="dropDownList">
                    <label >Subject</label>
                    <select name="subject" required>
                    <?php
                        foreach($controllerData as $data){
                          echo("<option value='".$data->getCourseCode()."'>" .$data->getCourseCode(). " - " .$data->getName(). "</option>");
                        }
                    ?>
                    </select>
                </div>
            </div>
            <div class="row col-2">
                <div>
                    <button class="submitButton red">Cancel</button>
                </div>
                <div>
                    <button name="search" class="submitButton green" type="button" onclick="searchResult();">Search</button>
                </div>
            </div>
        </div>
        <div class="search">
            <div class="row col-1" id="recentDetail">
                <label class="labelStyle" >Recent Files:</label>
                <hr>
                <div style="overflow: hidden" class="row col-3">
                <?php
//                  print_r($controllerData[1]);
                    function getFileExtension($file_name) {
                        return substr(strrchr($file_name,'.'),1);
                    }




                    foreach ($controllerData[1] as $recent ){
                        $extension = getFileExtension($recent->getReportName());

//                      convert real semesters in to academic yaer and semester format
                        if($recent->getSemester%2==0){
                            $semester = "Semester 2";
                        }else{
                            $semester = "Semester 1";
                        }
                                 
                        switch ($recent->getSemester()){
                            case 1:
                            case 2:
                                $batchYear = "Year 1";
                                break;
                            case 3:
                            case 4:
                                $batchYear = "Year 2";
                                break;
                            case 5:
                            case 6:
                                $batchYear = "Year 3";
                                break;
                            case 7:
                            case 8:
                                $batchYear = "Year 4";
                                break;
                        }

                        echo ("         
                            <div class='pastPaperTile'>
                                <a class='subjectName' href='' target='_blank'>
                                    <span >$recent->get</span><br>
                                    <span >".$recent->getSubject()."</span><br>
                                    <span >$batchYear </span>
                                    <span >$semester</span><br>
                                    <span >".$recent->getAcademicYear()."</span><br>
                                    <span><i class='fa fa-download' aria-hidden='true'></i></span>
                                </a>
                            </div>                    
                                    
                                ");
                    }

                ?>
  
                        
                </div>
                    
                 
            </div>

        </div>
        </form>

</div>


<!-- include footer section -->
<?php basicLoader::loadFooter('../../'); ?>

<script>
    // function searchFunction(){
    //     document.getElementById('download').removeAttribute('disabled');
    //
    // }
    //
    function download() {
        alert("Download Successfully!");
    }
    function searchResult(){
        //document.getElementById("recentDetail").style.visibility = 'hidden';
        document.getElementById("recentDetail").style.display = 'none';
        //document.getElementById("searchResult").style.visibility = 'visible';
        document.getElementById("searchResult").style.display = '';

    }

</script>

<script src="assets/viewIQAC.js"></script>
</body>
</html>
