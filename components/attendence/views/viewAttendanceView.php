<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet"  href="assets/viewAttendance.css" >
    <link rel="stylesheet" href="../../assets/css/gridSystem.css">
</head>
<body>
    <!-- include header section -->
    <?php require('../../assets/php/commonHeader.php')?>
    
    <div class="featureBody">
        <div  class="row col-1">
            <label id="myAttendance">My Attendance</label>
        </div>
        <div id="container1" class="row col-4">
            <div class="basicStyle">
                <label>Current Percentage</label>
                <div class="innerDiv">
                    <label class="innerLabel">68%</label>
                </div>
            </div >
            <div class="basicStyle">
                <label>Weeks Up to</label>
                <div class="innerDiv">
                    <label class="innerLabel">8</label>
                </div>
            </div>
            <div class="basicStyle">
                <label>Remaining Weeks</label>
                <div class="innerDiv">
                    <label class="innerLabel">7</label>
                </div>
            </div>
            <div class="basicStyle">
                <label>Subjects</label>
                <div class="innerDiv">
                    <label class="innerLabel">8</label>
                </div>
            </div>
        </div>
        <!-- <div class="row col-1"> -->
            <!-- <div class="attendanceDetail"> -->
        <?php
            for($row1=1; $row1<=8;$row1++)
            {
            echo("
            <form class='border'>
            <div id='attendanceDetail' class='row col-2'>
                <div class='courseDetail'>
                    <span class='attendanceDetailTopic'>SCS2212</span><br>
                    <span class='attendanceDetailTopic'>Computer Science</span>
                </div>
                <div  class='courseDetail id='attendancePercentage'>
                <span id='currentPercentage'>Current Percentage:</span><br>
                    <div class='attendanceStyle'>
                        <span class='attendanceDetailTopic1'>78%</span>
                    </div>
                </div>
            </div>
            <div id='attendanceContainer' class='row col-5'>");
                
                    for($row=1; $row<=3;$row++)
                    {
                        for($col=1;$col<=5;$col++)
                        {
                            echo (" 
                            <div class='attendance'>
                                <span class='textStyle'>Week</span><br>
                                <span class='textStyle'>Date</span><br>
                                <span>Description</span><br>
                            </div>
                            ");
                        }
                    }
                
            echo("</div>
        </form>");
                }
        ?>
        <form id="inquiryContainer">
            <div class="row col-1">
                <label id="inquiry">Inquiry</label>
            </div>
            <div id="editAttendance" class="row col-3">
            <div class = "inputStyle">
                    <label for="subject">Subject</label><br>
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
                <div class = "inputStyle">
                    <label for="week">Week</label><br>
                    <select id="week" class="dropDown"  required>
                        <option value="">-Select-</option>
                        <?php
                            for($row=1; $row<=15; $row++)
                            {
                                echo("<option value=$row>$row</option>");
                            }
                        ?>
                    </select>
                </div>
                <div class = "inputStyle">
                <label for="attendD ate">Date:</label><br>
                        <input type="date" name="lDate" class="dropDown" id="attendDate" required/>
                        <i class="fas fa-calendar-alt"id="attendDate" ></i>
                </div> 
                </div>
                <div class="row col-1">
                <div class = "inputStyle">
                    <label for="index">Message</label><br>
                    <input class="textField" type="text" id="message" name="index">
                </div>
                </div>
                </div>
                <div id="buttons" class="row col-2">
                    <div class = "buttonStyle">
                        <input type="submit" value = "cancel" id="cancelUploadFile"class="fileUploadButton ">
                    </div>
                    <div class = "buttonStyle">
                        <input type="submit" value = "Send" id="uploadFile"class="fileUploadButton ">
                    </div>
                </div>
            </form>   
            <!-- </div> -->
        <!-- </div> -->
    </div>
        
    <!-- include footer section -->
    <?php require('../../assets/php/commonFooter.php')?>
</body>
</html>