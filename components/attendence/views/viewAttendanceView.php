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
            for($row2=1; $row2<=4;$row2++)
            {
            echo("
        <div  class='row col-2'>");
            for($row1=1; $row1<=2;$row1++)
            {
            echo("
            <div>
            <div class='attendanceContainer' >
                <div  class='row col-2'>
                    <div class='courseDetail'>
                        <span class='attendanceDetailTopicLeft'>SCS2212</span>
                        <span class='attendanceDetailTopicLeft'>&nbspComputer Science</span>
                    </div>
                    <div  class='courseDetail' id='attendancePercentage'>
                        <!-- <span id='currentPercentage'>Current Percentage:</span><br> -->
                        <div class='attendanceStyle'>
                            <span class='attendanceDetailTopicRight'>78%</span>
                        </div>
                    </div>
                </div>
            
            <div id='attendanceInnerContainer' class='row col-5'>");
                
                    for($row=1; $row<=3;$row++)
                    {
                        for($col=1;$col<=5;$col++)
                        {
                            echo("
                            <div class='attendance'>
                                <span class='textStyle'>$col Week</span><br>
                                <span class='textStyle'>19/10/2020</span><br>
                                <span>General </span><br>
                            </div>");
                            
                        }
                    }
                    echo("
                    </div>
                    </div>
                    </div>
                    ");
                }
            echo(" </div> ");
            }
            ?>    
        
            <!-- </div> -->
        <!-- </div> -->
    
        
    <!-- include footer section -->
    <?php require('../../assets/php/commonFooter.php')?>
</body>
</html>