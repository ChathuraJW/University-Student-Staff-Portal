<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet"  href="assets/viewAttendance.css" >
    <link rel="stylesheet" href="../../assets/css/gridSystem.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css"/>
</head>
<body>
    <!-- include header section -->
    <?php require('../../assets/php/basicLoader.php')?>
    <?php BasicLoader::loadHeader('../../')?>
    
    <div class="featureBody">
        <?php
            // print_r($controllerData[1][1]);
            foreach($controllerData[1] as $row){
                // print_r($row);
            }
            // print_r($controllerData[1][1]);
            // $temp  = ($controllerData[1][1])
            // print_r($controllerData[1][1]);
        ?>
        <form method="post">
        <div class="sidebar">
        <a id="inquiryButton"><i class="fa fa-question-circle" ></i>Inquiry</a>
            <div id="myModal" class="modal">
            <!-- Modal content -->
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <p class="popupTopic">Inquiry</p>
                    <div class="row col-2">
                        <div class = "inputStyle">
                            <label for="week">Week:</label><br>
                            <select id="week" name= "week" class="dropDown">
                                <?php
                                    for($week=1; $week<=15; $week++)
                                    {
                                        switch($week){
                                            case 1:
                                            echo("<option value='$week'>$week<sup>st</sup></option>");  
                                            break;
                                        case 2:
                                            echo("<option value='$week'>$week<sup>nd</sup></option>");  
                                            break;
                                        case 3:
                                            echo("<option value='$week'>$week<sup>rd</sup></option>");  
                                            break;
                                        default:
                                            echo("<option value='$week'>$week<sup>th</sup></option>"); 
                                        }
                                    
                                    }
                                ?>
                            </select>
                        </div>
                        <div class = "inputStyle">
                            <label for="subject">Subject:</label><br>
                            <select id="subject" name="subject" class="dropDown" required>
                                <?php
                                    $subjectCount=0;
                                    foreach($controllerData[0] as $data){
                                        $subjectCount++;
                                        echo("<option value='".$data['courseCode']."'>".$data['name']."</option>");
                                    }
                                    ;
                                ?>
                            </select>
                            <?php
                                    // print_r($subjectCount)
                                // print_r($controllerData);
                            ?>
                        </div>

                    </div>
                    <div class="row col 1">
                        <!-- <input type="textarea">  -->
                        <textarea name="message" placeholder = "message"></textarea>
                    </div>
                    <div class="row col-3" id="buttonsCSV" >
                            <div class = "">
                                <input type="reset" value = "Cancel" id="cancelUploadFile"class="fileUploadButton ">
                            </div>
                            <div></div>
                            <div class = "">
                                <input type ="submit" value = "Send" name="send" id="uploadFile"class="fileUploadButton ">
                            </div>
                            
                    </div>
                </div>
            </div>
        <!-- <button id="myBtn">Open Modal</button> -->
            <!-- <button onclick="div_show()">Inquiry</button Inquiry</button> -->
        </div>
        </form>

        <div>
            <!-- <button><i class="fa fa-question-circle" aria-hidden="true"></i></button> -->
            <label id="myAttendance">My Attendance</label>
        </div>
        <?php
            $markedSubjects = 0;
            $sumOfPercentage = 0;
            $totalPercentage = 0;
            $maxWeek = 0;
            foreach($controllerData[1] as $courseDetails){
                $attendedDays = 0;
                $totalDays = 0;
                $subjectPercentage = 0;
                foreach($courseDetails[1] as $attendance){
                    if($attendance['attendance']){
                        $attendedDays++;
                    }
                    $totalDays++;
                    if($totalDays>=$maxWeek){
                        $maxWeek = $totalDays;
                    }

                }
                if($totalDays != 0){
                    $subjectPercentage = ($attendedDays/$totalDays)*100;
                    $sumOfPercentage = $subjectPercentage +$sumOfPercentage;
                    $markedSubjects+=1;
                }
                

            }
            $totalPercentage = $sumOfPercentage/$markedSubjects;
            ?>
        <div id="container1" class="row col-4">
            <div class="basicStyle">
                <label>Current Percentage</label>
                <div class='innerDiv'>
                <?php echo("<label class='innerLabel'>$totalPercentage%</label>"); ?>
                    
                </div>
            </div >
            
            <div class="basicStyle">
                <label>Weeks Up to</label>
                <div class="innerDiv">
                    <?php echo("<label class='innerLabel'>$maxWeek</label>"); ?>
                    
                </div>
            </div>
            <div class="basicStyle">
                <label>Remaining Weeks</label>
                <div class="innerDiv">
                <?php 
                    $remainingWeek = 15-$maxWeek;
                    echo("<label class='innerLabel'>$remainingWeek</label>"); ?>
                </div>
            </div>
            <div class="basicStyle">
                <label>Subjects</label>
                <div class="innerDiv">
                    <?php echo("<label class='innerLabel'> $subjectCount </label>"); ?>
                </div>
            </div>
        </div>
        <!-- <div class="row col-1"> -->
            <!-- <div class="attendanceDetail"> -->
            <div class="row col-2">
            <?php 
                foreach($controllerData[1] as $courseDetails){
                    $attendedDays = 0;
                    $totalDays = 0;
                    $subjectPercentage = 0;
                    foreach($courseDetails[1] as $attendance){
                        if($attendance['attendance']){
                            $attendedDays++;
                        }
                        $totalDays++;

                    }
                    if($totalDays != 0){
                        $subjectPercentage = ($attendedDays/$totalDays)*100;
                    }
                    
                    // print_r($courseDetails[0]);
                    echo("

                        <div class='attendanceContainer'>
                            <div class='row col-2'>
                                <div class='courseDetail'>
                                    <div class='attendanceDetailTopicLeft'><label class='attendanceDetailTopicLeft'>".$courseDetails[0]['courseCode']."</label></div>
                                    <div><label id='subjectFont' class='attendanceDetailTopicLeft'>".$courseDetails[0]['name']."</label></div>
                                </div>
                                <div class='courseDetail' id='attendancePercentage'>
                                    <div class='attendanceStyle'>
                                        <span id='hiddenPercentage1' class='attendanceDetailTopicRight'>$subjectPercentage%</span>
                                    </div>
                                </div>
                            </div>");

                            if($totalDays == 0){
                                echo("
                                    <div class='row col-1'>
                                        <label  class='EmptyAttendanceMessage' >Attendance of this subject is not added yet. </label>
                                    </div>
                                ");
                            }
                            else{
                            echo("
                            <div class='row col-5'>");
                                foreach($courseDetails[1] as $attendance){
                                    $color = ($attendance['attendance'])? 'green':'red';
                                    echo("
                                        <div  class='attendance' style='background-color:$color'>
                                            <span class='textStyle'>".$attendance['week']." Week</span><br>
                                            <span class='textStyle'>".$attendance['date']."</span><br>
                                            <span class='textStyle' id='attendanceDescription'>".$attendance['description']."</span><br>
                                        </div>
                                    ");
                                }
                            echo("</div>");
                            }
                            echo("</div>
                    ");
                            
                }
            ?> 
            </div>
            
            

            <script src="assets/viewAttendance.js"></script>
            </div>
        <!-- </div> -->
    
        
    <!-- include footer section -->
    <?php BasicLoader::loadFooter('../../')?>
</body>
</html>