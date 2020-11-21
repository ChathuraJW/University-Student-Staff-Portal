<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="../../assets/css/gridSystem.css">
    <link rel="stylesheet"  href="assets/addAttendance.css" >
</head>

<body>
    <!-- include header section -->
    <?php require('../../assets/php/basicLoader.php')?>
    <?php BasicLoader::loadHeader('../../')?>
    
    <div class="featureBody">
        <?php
            // print_r($controllerData);
        ?>
        <div class="radioToolbar">
            <div class="row col-2">
                <!-- <div> -->
                    <input value="1" type="radio"  id = "radioCSV" name="formSelector" onClick="displayForm(this)">
                    <label class ="container" for = "radioCSV">Upload CSV File</label>
                <!-- </div> -->
                <!-- <div> -->
                    <input value="2" type="radio" id = "radioEdit" name="formSelector" onClick="displayForm(this)">
                    <label class ="container" for ="radioEdit">Edit Attendance</label>
                <!-- </div> -->
            </div>
        </div>
        <!-- Upload csv files -->
        <div style="position:relative";  id="csvFormContainer"  >
            <form id="csvForm" method="post" enctype="multipart/form-data">
                <div class="row col-3" >
                    <!-- <label>--Upload CSV Files--</label>  -->
                    <div class = "inputStyle">
                        <label for="academicYearForUpload">Academic Year:</label><br>
                        <select id="academicYearForUpload" name="" class="dropDown"  required>
                        </select>
                    </div>
                    <div class = "inputStyle">
                        <label for="semester">Semester:</label><br>
                        <select id="semester" name="semester" class="dropDown" required>
                        <?php
                            for($sem=1; $sem<=8; $sem++){
                                echo("<option value='$sem'>$sem</option>");
                            }
                        ?>
                        </select>
                    </div> 
                    <div class = "inputStyle">
                        <label for="subject">Subject:</label><br>
                        <select id="subject" name="subject" class="dropDown" required>
                        <?php
                                    
                            foreach($controllerData[0] as $data){
                                echo("<option value='".$data['courseCode']."'>".$data['name']."</option>");
                            }
                        ?>
                        </select>
                    </div>
                </div>
                <div class="row col-3">
                    <div class = "inputStyle">
                        <label for="attendDate">Date:</label><br>
                        <input type="date" name="attendDate" class="dropDown" id="attendDate" required/>
                        <i class="fas fa-calendar-alt" id="attendDate" ></i>
                    </div>
                    <div class = "inputStyle">
                        <label for="week">Week:</label><br>
                        <select id="week" name="week" class="dropDown">
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
                    <div class="inputStyle">
                        <label for="attempt">Attempt:</label><br>
                        <select id="attempt" name="attempt" class="dropDown">
                            <option value="F">First Attempt</option>
                            <option value="R">Repeat</option>
                        </select>
                    </div>
                </div>
                <div class="row col-1">
                <div class = "inputStyle">
                        <label for="">CSV File:</label>
                        <input type="file" id="myFile" name="csvFile" required>
                    </div>
                </div>
                <div class="row col-4" id="buttonsCSV" >
                    <div></div>
                    <div class = "">
                        <input type="reset" value = "Cancel" id="cancelUploadFile" class="fileUploadButton ">
                    </div>
                    <div class = "">
                        <input type ="submit" name="submit" value = "submit" id="uploadFile" class="fileUploadButton ">
                    </div>
                    <div></div>
                    
                </div>
            </form> 
            </div>
            <!-- end of upload csv files -->

            <!-- Edit attendance -->
            
            <div style="display:none; position:relative" id="singleAttendanceContainer"  >
                <div class ="row col-2">
                    <div>
                        <form>
                            <?php
                                echo("
                                <div >
                                    <p class='subHeading'>Inquiries:</p><hr>
                                </div>");
                                foreach($controllerData[1] as $inquiryMessage){
                                    echo("
                                
                                    <div id = 'inquiryMessage' class ='row col-1'>
                                        <input type='checkbox'>
                                        <label>Sent By : ".$inquiryMessage['sendBy']."</label>
                                        <label>".$inquiryMessage['message']."</label>
                                    
                                    </div>
                                    ");
                                }
                            ?>
                        </form>
                    </div>
                    <!-- Edit attendance -->
                    
                <div>
                    <form method="post">
                        <div id="editAttendance" class="row col-2">
                            <div class = "inputStyle1">
                                <label for="index">Index:</label><br>
                                <input class="textField" type="text" id="index" name="index" required>
                            </div>
                            <div class = "inputStyle1">
                                <label for="academicYearForEdit">Academic Year:</label><br>
                                <select id="academicYearForEdit" name="academicYear" class="dropDown"  required>
                                    <option value=1>First Year</option>
                                    <option value=2>Second Year</option>
                                    <option value=3>Third Year</option>
                                    <option value=4>Fourth Year</option>
                                </select>
                            </div>
                        </div>
                        <div id="editAttendance" class="row col-2">
                            <div class = "inputStyle1">
                                <label for="semester">Semester:</label><br>
                                <select id="semester" class="dropDown" required>
                                <?php
                                    for($sem=1; $sem<=8; $sem++){
                                        echo("<option value='$sem'>$sem</option>");
                                    }
                                ?>
                                </select>
                            </div> 
                            <div class = "inputStyle1">
                                <label for="subject">Subject:</label><br>
                                <select id="subject" name="subject" class="dropDown" required>
                                    <?php
                                    
                                        foreach($controllerData[0] as $data){
                                            echo("<option value='".$data['courseCode']."'>".$data['name']."</option>");
                                        }
                                    ?>
                                </select>
                                <?php
                                    // print_r($controllerData);
                                ?>
                            </div>
                        </div>
                        <div class = "row col-1">
                            <div  class="inputStyle1">
                                <label for="attempt">Attempt:</label><br>
                                <select id="attempt" name="attempt" class="dropDown"  required>
                                    <option value="F">First Attempt</option>
                                    <option value="R">Repeated Attempt</option>
                                </select>
                            </div>
                        </div>
                        <div id="buttons" class="row col-2">
                            <div class = "buttonStyle">
                                <button type="reset" value = "cancel" id="cancelUploadFile" class="fileUploadButton">Cancel</button>
                            </div>
                            <div class = "buttonStyle">
                                <button  type="button" name="search" onclick="displayAttendance()" class=" fileUploadButton">Search</button>
                            </div>
                        </div>
                    </form>
                        <div style="display:none; position:relative" id="attendanceTable">
                            <div class='attendanceContainer' >
                                <label class="labelStyle">Search Result</label>
                                <div id='attendanceInnerContainer' class='row col-5'>
                                    <?php
                                        // print_r($controllerData[2]);
                                    ?>
                                <?php
                                    for($att=1; $att<=15;$att++)
                                    {
                                        
                                        echo("
                                        <div class='attendance'>
                                        <input name='attendanceSet' type='radio' id='attendance$att' class='attendance' value='$att' onclick='editAttendanceForm()'>
                                        <label for='attendance$att' class='textStyle' id='week$att'></label><br>
                                        <label for='attendance$att' class='textStyle' id='date$att'></label><br>
                                        <label for='attendance$att' id='attendanceType$att'></label><br>
                                        </div>");
                                    }
                                    
                                ?>
                                </div>   
                                <div style="display:block position:relative" class="editAttendanceForm row col-1" id="editAttendanceForm">
                                    <div class="editTopic row col-1">
                                        <p>Edit Attendance</p>
                                    </div>
                                    <div class="row col-2">
                                        <div class="editSubTopic">
                                            <label>2<sup>nd</sup>Week</label>
                                        </div>
                                        <div class="editSubTopic">
                                            <label>Computer Science</label>
                                        </div>
                                    </div>
                                    <div class="editRadioToolbar row col-2">
                                        <input value="1" type="radio"  id = "radioAttended" name="formSelector">
                                        <label class ="containerPopup" for = "radioAttended">Attended</label>
                                        <input value="2" type="radio" id = "radioNotAttended" name="formSelector">
                                        <label class ="containerPopup" for ="radioNotAttended">Not Attended</label>
                                    </div>
                                    <div class="row col-1">
                                         <label for="editDescription">Description</label>
                                        <textarea name="editDescription" id="editDescription"></textarea>
                                    </div>
                                    <div class="row col-4" id="buttonsCSV" >
                                        <div></div>
                                        <div class = "">
                                            <input type="submit" value = "Cancel" id="cancelUploadFile" class="fileUploadButton ">
                                        </div>
                                        <div class = "">
                                            <input type ="submit" value = "Upload" id="uploadFile" class="fileUploadButton ">
                                        </div>
                                        <div></div>
                                    </div>
                                </div>  
                            </div>
                        </div>
                    
                </div>
        </div>
            <!-- end of edit attendance -->
                <script src="../../assets/js/jquery.js"></script>
                <script src="assets/addAttendance.js"></script>

    </div>
    <!-- include footer section -->
    <?php BasicLoader::loadFooter('../../')?>
</body>
</html>
        