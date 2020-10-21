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
            <div class="row col-3">
                <!-- <div> -->
                    <input value="1" type="radio"  id = "radio1" name="formSelector" onClick="displayForm(this)"></input>
                    <label class ="container" for = "radio1">Upload CSV File</label>
                <!-- </div> -->
                <!-- <div> -->
                    <input value="2" type="radio" id = "radio2" name="formSelector" onClick="displayForm(this)"></input>
                    <label class ="container" for ="radio2">Edit Attendance</label>
                <!-- </div> -->
                <!-- <div> -->
                    <input value="3" type="radio" id = "radio3" name="formSelector" onClick="displayForm(this)"></input>
                    <label class ="container" for ="radio3">Inquiry</label>
                <!-- </div> -->
            </div>
        </div>
        <!-- Upload csv files -->
        <div style="position:relative";  id="csvFormContainer"  >
            <form id="csvForm" method="post">
                <div class="row col-3" >
                    <!-- <label>--Upload CSV Files--</label>  -->
                    <div class = "inputStyle">
                        <label for="academicYear">Academic Year:</label>
                        <select id="academicYear" class="dropDown"  required>
                            <option value="">-Select-</option>
                            <option value="2016">2016/17</option>
                            <option value="2017">2017/18</option>
                            <option value="2018">2018/19</option>
                            <option value="2019">2019/20</option>
                        </select>
                    </div>
                    <div class = "inputStyle">
                        <label for="semester">Semester:</label><br>
                        <select id="semester" class="dropDown" required>
                            <option value="">-Select-</option>
                            <option value="sem1">1</option>
                            <option value="sem2">2</option>
                            <option value="sem3">3</option>
                            <option value="sem4">4</option>
                            <option value="sem5">5</option>
                            <option value="sem6">6</option>
                            <option value="sem7">7</option>
                            <option value="sem8">8</option>
                        </select>
                    </div> 
                    <div class = "inputStyle">
                        <label for="subject">Subject:</label><br>
                        <select id="subject" class="dropDown" required>
                            <option value="">-Select-</option>
                            <option value="sbu1">DSA</option>
                            <option value="sub2">SE</option>
                            <option value="sub3">CS</option>
                            <option value="sub4">RAD</option>
                            <option value="sub5">MM</option>
                            <option value="sub6">PLC</option>
                            <option value="sub7">FP</option>
                        </select>
                    </div>
                </div>
                <div class="row col-3">
                    <div class = "inputStyle">
                        <label for="attendD ate">Date:</label><br>
                        <input type="date" name="lDate" class="dropDown" id="attendDate" required/>
                        <i class="fas fa-calendar-alt" id="attendDate" ></i>
                    </div>
                    <div class = "inputStyle">
                        <label for="week">Week:</label><br>
                        <select id="week" class="dropDown" required>
                            <option>-Select-</option>
                            <?php
                                for($week=1; $week<=15; $week++)
                                {
                                    echo("<option>$week</option>");
                                }
                            ?>
                        </select>
                    </div>
                    <div class = "inputStyle">
                        <label for="">CSV File:</label><br>
                        <input type="file" id="myFile" name="filename">
                    </div>
                </div>
                <div id="buttons" class="row col-2">
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
                <form id="singleAttendance">
                    <div id="editAttendance" class="row col-4">
                        <div class = "inputStyle1">
                            <label for="index">Index:</label><br>
                            <input class="textField" type="text" id="index" name="index">
                        </div>
                        <div class = "inputStyle">
                            <label for="academicYear">Academic Year:</label>
                            <select id="academicYear" class="dropDown"  required>
                                <option value="">-Select-</option>
                                <option value="2016">2016/17</option>
                                <option value="2017">2017/18</option>
                                <option value="2018">2018/19</option>
                                <option value="2019">2019/20</option>
                            </select>
                        </div>
                        <div class = "inputStyle">
                            <label for="semester">Semester:</label>
                            <select id="semester" class="dropDown" required>
                                <option value="">-Select-</option>
                                <option value="sem1">1</option>
                                <option value="sem2">2</option>
                                <option value="sem3">3</option>
                                <option value="sem4">4</option>
                                <option value="sem5">5</option>
                                <option value="sem6">6</option>
                                <option value="sem7">7</option>
                                <option value="sem8">8</option>
                            </select>
                        </div> 
                        <div class = "inputStyle">
                            <label for="subject">Subject:</label>
                            <select id="subject" class="dropDown" required>
                                <option value="">-Select-</option>
                                <option value="sbu1">DSA</option>
                                <option value="sub2">SE</option>
                                <option value="sub3">CS</option>
                                <option value="sub4">RAD</option>
                                <option value="sub5">MM</option>
                                <option value="sub6">PLC</option>
                                <option value="sub7">FP</option>
                            </select>
                        </div>
                    </div>
                    <div id="buttons" class="row col-2">
                        <div class = "buttonStyle">
                            <input type="submit" value = "cancel" id="cancelUploadFile" class="fileUploadButton">
                        </div>
                        <div class = "buttonStyle">
                            <button onclick=" displayAttendance()" value = "Search" id="uploadFile"class=" fileUploadButton">Search</button>
                        </div>
                    </div>
                    <div style="display:none; position:relative" id="attendanceTable">
                        <div id="attendanceContainer" class="row col-5">
                        <?php
                        for($row=1; $row<=3;$row++)
                        {
                            for($col=1;$col<=5;$col++)
                            {
                                echo ("
                                <a href='' class='clickableDiv'>
                                <button type='button' class='attendance' id='shu' onclick='editAttendanceForm1()'>
                                    <span class='textStyle'>Week</span><br>
                                    <span class='textStyle'>Date</span><br>
                                    <span>Description</span><br>
                                </button>
                                </a>
                                ");
                            }
                        }
                        ?>
                        </div>
                    </div>
                    <div  class="row col-1"  >
                        <div id="editAttendanceForm">
                            <h1>hihihi</h1>
                        </div>
                    </div>
                </form>
            </div>
            <!-- end of edit attendance -->

            <div style = "display:none; position:relative" id="inquiryContainer">
                <form>
                    <?php
                        for($row=1; $row<=10; $row++)
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

    <script src="assets/addAttendance.js"></script>
    <script src="assets/jquery-3.5.1.js"></script>
    </div>
    

    
    <!-- include footer section -->
    <?php require('../../assets/php/commonFooter.php')?>
</body>
</html>
        