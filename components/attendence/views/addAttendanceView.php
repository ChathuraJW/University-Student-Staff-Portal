<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="../../assets/css/gridSystem.css">
    <link rel="stylesheet"  href="assets/addAttendance.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css"/>
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
                        <label for="academicYearCSV">Academic Year:</label><br>
                        <select id="academicYearCSV" name="academicYear" class="dropDown"   required>
                            <option></option>
                            <option value="1">First Year</option>
                            <option value="2">Second Year</option>
                            <option value="3">Third Year</option>
                            <option value="4">Fourth Year</option>
                        </select>
                    </div>
                    <div class = "inputStyle">
                        <label for="semesterCSV">Semester:</label><br>
                        <select id="semesterCSV" name="semester" class="dropDown"   required>
                            <option></option>
                            <option value="1">First Semester</option>
                            <option value="2">Second Semester</option>
                        </select>
                    </div> 
                    <div class = "inputStyle">
                        <span><button onclick="location.reload();"><i class="fas fa-sync"></i></button></span>
                        <label for="subjectCSV">Subject:</label>
                        <select id="subjectCSV" name="subject" class="dropDown" required>
                            <option></option>
                        <?php
                        foreach ($controllerData[0] as $data){
                            $year=ceil($data[semester]/2) -1;
                            $semester=($data[semester]%2) ? 0 : 1 ;
                            $semList=Array(Array(1,2),Array(3,4),Array(5,6),Array(7,8));
                            echo ("<option value='$data[courseCode]'>".$semList[$year][$semester].". $data[name]</option>");
                        }
                        ?>
                        </select>
                    </div>
                </div>
                <div class="row col-3">
                    <div class = "inputStyle">
                        <label for="attendDate">Date:</label><br>
                        <input type="date" name="attendDate" class="dropDown" id="attendDate" required/>
<!--                        <i class="fas fa-calendar-alt" id="attendDate" ></i>-->
                    </div>
                    <div class = "inputStyle">
                        <label for="week">Week:</label><br>
                        <select id="week" name="week" class="dropDown">
                            <option></option>
                            <?php
                                for($week=1; $week<=15; $week++)
                                {
                                    echo("<option value='$week'>Week $week</option>");
                                }
                            ?>
                        </select>
                    </div>
                    <div class="inputStyle">
                        <label for="attemptCSV">Attempt:</label><br>
                        <select id="attemptCSV" name="attempt" class="dropDown">
                            <option></option>
                            <option value="F">First Attempt</option>
                            <option value="R">Repeat</option>
                        </select>
                    </div>
                </div>
                <div class="upload row col-1">
                <div class = "inputStyle">
                        <label for="attendanceFile" id="attendanceFileLabel">Upload CSV File Here</label>
                        <input type="file" id="attendanceFile" name="csvFile"  required>
                    </div>
                </div>
                <div class="row col-2" id="buttonsCSV" >
                    <div class = "buttonStyle">
                        <input type="reset" value = "Cancel"  class="submitCancelButton red">
                    </div>
                    <div class = "buttonStyle">
                        <input type ="submit" name="submit" value = "submit"  class="submitCancelButton green">
                    </div>
                    
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
                                $count=1;
                                foreach($controllerData[1] as $inquiryMessage){
                                    echo("
                                    
                                    <div class = 'inquiryMessage' class ='row col-1'>
                                        
                                        <label class='floatLeft'>Send By: ".$inquiryMessage['sendBy']."</label><br>
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
                            <div class = "inputStyle">
                                <label for="index">Index:</label><br>
                                <input class="textField" type="text" id="index" name="index" required>
                            </div>
                            <div class = "inputStyle">
                                <label for="academicYearForEdit">Academic Year:</label><br>
                                <select id="academicYearForEdit" name="academicYear" class="dropDown"   required>
                                    <option></option>
                                    <option value="1">First Year</option>
                                    <option value="2">Second Year</option>
                                    <option value="3">Third Year</option>
                                    <option value="4">Fourth Year</option>
                                </select>
                            </div>
                        </div>
                        <div id="editAttendance" class="row col-2">
                            <div class = "inputStyle">
                                <label for="semesterEdit">Semester:</label><br>
                                <select id="semesterEdit" class="dropDown"  required >
                                    <option></option>
                                    <option value="1">First Semester</option>
                                    <option value="2">Second Semester</option>
                                </select>
                            </div> 
                            <div class = "inputStyle">
                                <span><button onclick="location.reload();"><i class="fas fa-sync"></i></button></span>
                                <label for="subject">Subject:</label><br>
                                <select id="subject" name="subject" class="dropDown" required>
                                    <option></option>
                                    <?php
                                        foreach ($controllerData[0] as $data){
                                            $year=ceil($data[semester]/2) -1;
                                            $semester=($data[semester]%2) ? 0 : 1 ;
                                            $semList=Array(Array(1,2),Array(3,4),Array(5,6),Array(7,8));
                                            echo ("<option value='$data[courseCode]'>".$semList[$year][$semester].". $data[name]</option>");
                                        }
                                    ?>
                                </select>
                                <?php
//                                     print_r($controllerData[0]);
                                ?>
                            </div>
                        </div>
                        <div class = "row col-2">
                            <div  class="inputStyle">
                                <label for="attempt">Attempt:</label><br>
                                <select id="attempt" name="attempt" class="dropDown"  required>
                                    <option></option>
                                    <option value="F">First Attempt</option>
                                    <option value="R">Repeated Attempt</option>
                                </select>
                            </div>
                            <div></div>
                        </div>
                        <div id="buttons" class="row col-2">
                            <div class = "buttonStyle">
                                <button type="reset" value = "cancel"  class="submitCancelButton red">Cancel</button>
                            </div>
                            <div class = "buttonStyle">
                                <button  type="button" name="search" onclick="displayAttendance()" class=" submitCancelButton green">Search</button>
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
                                    for($att=0; $att<15;$att++)
                                    {
                                        $value = $att+1;
                                        
                                        echo("
                                        <div class='attendance' id='$att'>
                                        <input name='attendanceSet' type='radio' id='attendance$att' class='attendance' value='$value' onclick='editAttendanceForm(this)'>
                                        <label for='attendance$att' class='textStyle' id='week$att'></label><br>
                                        <label for='attendance$att' class='textStyle' id='date$att'></label><br>
                                        <label for='attendance$att' class='textStyle' id='attendanceType$att'></label><br>
                                        </div>");
                                    }
                                    
                                ?>
                                </div>   
                                <div style="display:block position:relative" class="editAttendanceForm row col-1" id="editAttendanceForm">
                                    <div class="editTopic row col-1">
                                        <p class="editAttendance">Edit Attendance</p>
                                    </div>
                                    <div class="row col-2">
                                        <div class="editSubTopic">
                                            <label for="editWeek">Week:</label>
                                            <input type="text" id="editWeek" disabled>
                                        </div>
                                        <div class="editSubTopic">
                                            <label for="editSunjectCode">Subject Code:</label>
                                            <input id="editSunjectCode" disabled>
                                        </div>
                                    </div>
                                    <div class="editRadioToolbar row col-2">
                                        <input value="1" type="radio"  id = "radioAttended"  name="formSelector">
                                        <label class ="containerPopup" for = "radioAttended">Attended</label>
                                        <input value="0" type="radio" id = "radioNotAttended" name="formSelector">
                                        <label class ="containerPopup" for ="radioNotAttended">Not Attended</label>
                                    </div>
                                    <div class="row col-1">
                                         <label for="editDescription">Description</label>
                                        <textarea name="editDescription" id="editDescription"></textarea>
                                    </div>
                                    <div class="row col-2" id="buttonsCSV" >
                                        <div class = "buttonStyle">
                                            <input type="submit" value = "Cancel"  class="submitCancelButton red ">
                                        </div>
                                        <div class = "buttonStyle">
                                            <input type ="button" value = "Update"  class="submitCancelButton green " onclick="updateAttendance()">
                                        </div>
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
        