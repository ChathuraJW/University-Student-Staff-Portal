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
    <?php require('../../assets/php/commonHeader.php')?>
    
    <div class="featureBody">
        <div class="radioToolbar">
            <div class="row col-2">
                <!-- <div> -->
                    <input value="1" type="radio"  id = "radioCSV" name="formSelector" onClick="displayForm(this)"></input>
                    <label class ="container" for = "radioCSV">Upload CSV File</label>
                <!-- </div> -->
                <!-- <div> -->
                    <input value="2" type="radio" id = "radioEdit" name="formSelector" onClick="displayForm(this)"></input>
                    <label class ="container" for ="radioEdit">Edit Attendance</label>
                <!-- </div> -->
            </div>
        </div>
        <!-- Upload csv files -->
        <div style="position:relative";  id="csvFormContainer"  >
            <form id="csvForm" method="post">
                <div class="row col-3" >
                    <!-- <label>--Upload CSV Files--</label>  -->
                    <div class = "inputStyle">
                        <label for="academicYearForUpload">Academic Year:</label><br>
                        <select id="academicYearForUpload" class="dropDown"  required>
                        </select>
                    </div>
                    <div class = "inputStyle">
                        <label for="semester">Semester:</label><br>
                        <select id="semester" class="dropDown" required>
                        <?php
                            for($sem=1; $sem<=8; $sem++){
                                echo("<option value='$sem'>$sem</option>");
                            }
                        ?>
                        </select>
                    </div> 
                    <div class = "inputStyle">
                        <label for="subject">Subject:</label><br>
                        <select id="subject" class="dropDown" required>
                        <?php
                                    
                            foreach($controllerData as $data){
                                echo("<option value='".$data['courseCode']."'>".$data['name']."</option>");
                            }
                        ?>
                        </select>
                    </div>
                </div>
                <div class="row col-3">
                    <div class = "inputStyle">
                        <label for="attendD ate">Date:</label><br>
                        <input type="date" name="attendDate" class="dropDown" id="attendDate" required/>
                        <i class="fas fa-calendar-alt" id="attendDate" ></i>
                    </div>
                    <div class = "inputStyle">
                        <label for="week">Week:</label><br>
                        <select id="week" class="dropDown">
                            <?php
                                for($week=1; $week<=15; $week++)
                                {
                                    echo("<option value='$week'>$week</option>");
                                }
                            ?>
                        </select>
                    </div>
                    <div class = "inputStyle">
                        <label for="">CSV File:</label><br>
                        <input type="file" id="myFile" name="filename">
                    </div>
                </div>
                <div id="buttonsCSV" class="row col-2">
                    <div class = "buttonStyle">
                        <input type="submit" value = "cancel" id="cancelUploadFile"class="fileUploadButton ">
                    </div>
                    <div class = "buttonStyle">
                        <input type ="submit" value = "Upload" id="uploadFile"class="fileUploadButton ">
                    </div>
                </div>
            </form> 
            </div>
            <!-- end of upload csv files -->

            <!-- Edit attendance -->
            <div style="display:none; position:relative" id="singleAttendanceContainer" >
                <div class ="row col-2">
                    <div>
                        <form>
                            <?php
                                for($row=1; $row<=5; $row++)
                                {
                                    echo("
                                    <div id = 'inquiryMessage' class ='row col-1'>
                                    <span>The visibility property allows the author to show or hide an element. It is similar to the display property. However, the difference is that if you set display:none, it hides the entire element, while visibility:hidden means that the contents of the element will be invisible, but the element stays in its original position and size.</span>
                                    </div>
                                    ");
                                }
                            ?>
                        </form>
                    </div>
                    <!-- Edit attendance -->
                    <div>
                        <div id="editAttendance" class="row col-2">
                            <div class = "inputStyle">
                                <label for="index">Index:</label><br>
                                <input class="textField" type="text" id="index" name="index">
                            </div>
                            <div class = "inputStyle">
                                <label for="academicYear">Academic Year:</label>
                                <select id="academicYearForEdit" class="dropDown"  required>
                                </select>
                            </div>
                        </div>
                        <div id="editAttendance" class="row col-2">
                        <div class = "inputStyle">
                            <label for="semester">Semester:</label>
                            <select id="semester" class="dropDown" required>
                            <?php
                                for($sem=1; $sem<=8; $sem++){
                                    echo("<option value='$sem'>$sem</option>");
                                }
                            ?>
                            </select>
                        </div> 
                        <div class = "inputStyle">
                            <label for="subject">Subject:</label>
                            <select id="subject" class="dropDown" required>
                                <?php
                                    
                                    foreach($controllerData as $data){
                                        echo("<option value='".$data['courseCode']."'>".$data['name']."</option>");
                                    }
                                ?>
                            </select>
                            <?php
                                // print_r($controllerData);
                            ?>
                        </div>
                        </div>
                        <div id="buttons" class="row col-2">
                            <div class = "buttonStyle">
                                <button type="submit" value = "cancel" id="cancelUploadFile" class="fileUploadButton">Cancel</button>
                            </div>
                            <div class = "buttonStyle">
                                <button onclick=" displayAttendance();" value = "Search" id="uploadFile"class=" fileUploadButton">Search</button>
                            </div>
                        </div>
                        <div style="display:none; position:relative" id="attendanceTable">
                            <div class='attendanceContainer' >
                                <label class="labelStyle">Search Result</label>
                                <div id='attendanceInnerContainer' class='row col-5'>
                                <?php
                                    for($row=1; $row<=3;$row++)
                                    {
                                        for($col=1;$col<=5;$col++)
                                    {
                                        echo("
                                        <button class='attendance' onclick='openForm()'>
                                        <span class='textStyle'>$col Week</span><br>
                                        <span class='textStyle'>19/10/2020</span><br>
                                        <span>General </span><br>
                                        </button>");
                                    }
                                    }
                                ?>
                                </div>
                            </div>
                        </div>
                        <div style="display:none; position:relative" class="form-popup" id="myForm">
<form action="/action_page.php" class="form-container">
    <h1>Login</h1>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <button type="submit" class="btn">Login</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>
                    </div>
                </div>
        </div>
            <!-- end of edit attendance -->

            <div style = "display:none; position:relative" id="inquiryContainer">
                
            </div>

    <script src="assets/addAttendance.js"></script>
    <script src="assets/jquery-3.5.1.js"></script>
    </div>
    

    
    <!-- include footer section -->
    <?php require('../../assets/php/commonFooter.php')?>
</body>
</html>
        