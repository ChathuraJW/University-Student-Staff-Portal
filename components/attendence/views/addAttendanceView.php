<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="../../assets/css/gridSystem.css">
    <link rel="stylesheet"  href="assets/addAttendanceStyle.css" >
</head>

<body>
    <!-- include header section -->
    <?php require('../../assets/php/commonHeader.php')?>
    
    <div class="featureBody" >
        
        <!-- <label><h1>Select:</h1></label> -->
        <form>
            <div class="radioToolbar">
                <div class="row col-2">
                    <input value="1" type="radio"  id = "radio1" name="formSelector" onClick="displayForm(this)"></input>
                    <label class ="container" for = "radio1">Upload CSV File</label>
                    <input value="2" type="radio" id = "radio2" name="formSelector" onClick="displayForm(this)"></input>
                    <label class ="container" for ="radio2">Edit Attendance</label>
                </div>
            </div>
        </form>
        
        <div style= "position:relative"  id="csvFormContainer" >
            <form id="csvForm" method="post">
                <div class="row col-3" >
                    <!-- <label>--Upload CSV Files--</label> -->
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
                        <i class="fas fa-calendar-alt"id="attendDate" ></i>
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
                    <input  value = "Upload" id="uploadFile"class="fileUploadButton ">
                    </div>
                </div>
            </form>
        </div>
        <div style="visibility:hidden; position:relative" id="singleAttendance" >
            <form id="singleAttendance">
                <div id="editAttendance" class="row col-4">
                    <div class = "inputStyle1">
                        <label for="index">Index:</label><br>
                        <input class="textField" type="text" id="index" name="index">
                    </div>
                    <div class = "inputStyle1">
                        <label for="academicYear">Academic Year:</label>
                        <select id="academicYear" class="dropDown"  required>
                            <option value="">-Select-</option>
                            <option value="2016">2016/17</option>
                            <option value="2017">2017/18</option>
                            <option value="2018">2018/19</option>
                            <option value="2019">2019/20</option>
                        </select>
                    </div>
                    <div class = "inputStyle1">
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
                    <div class = "inputStyle1">
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
                    <button onclick=" displayAttendance()" value = "Search" id="uploadFile"class=" fileUploadButton">Search</botton>
                    </div>
            
                </div>
                <div style="visibility:hidden; position:relative" id="attendanceTable">
                    <div class="row col-1">
                    <table   >
                    <?php
                        
                        echo"<th></th>";
                        // echo"<th>Attendance</th>";
                        for($header=1; $header<=15; $header++)
                        {
                            echo"<th>week $header</th>";
                        }
                        for ($row=1; $row <= 4; $row++) 
                        { 
                            echo "<tr> \n";
                            for ($col=1; $col <= 16; $col++)     
                            { 
                                if($col==1 && $row==2)
                                {
                                    echo "<td>Date</td>";
                                }
                                elseif($col==1 && $row==3)
                                {
                                    echo "<td>Attendance</td> \n";
                                }
                                elseif($col==1 && $row==4)
                                {
                                    echo "<td>Description</td> \n";
                                }
                                elseif($row==2 && $col<=16)
                                {
                                    echo"<td>21/10/2020</td>";
                                }
                                elseif($row==3 && $col<=16)
                                {
                                    echo"<td>p</td>";
                                }
                                elseif($row==4 && $col<=16)
                                {
                                    echo"<td>General</td>";
                                }
                            }
                            echo "</tr>";
                        }
                    ?>
                    </table>
                    </div>
                </div>
            </form>
        </div>
        <!-- java script -->
        <script type="text/javascript">
            // change the visibility of two forms
            function displayForm(c){
                if(c.value=="1")
                {
                    document.getElementById("csvFormContainer").style.visibility='visible';
                    document.getElementById("singleAttendance").style.visibility='hidden';
                    document.getElementById("csvFormContainer").style.display="";
                    document.getElementById("singleAttendance").style.display='none';
                    document.getElementById("attendanceTable").style.visibility='hidden';
                    document.getElementById("attendanceTable").style.display='none';
                }
                else if(c.value=="2")
                {
                    document.getElementById("csvFormContainer").style.visibility='hidden';
                    document.getElementById("singleAttendance").style.visibility='visible';
                    document.getElementById("csvFormContainer").style.display='none';
                    document.getElementById("singleAttendance").style.display="";
                    document.getElementById("attendanceTable").style.display='none';
                }
                else{}
                
            }
            // change visibility of table
            function displayAttendance(){
                document.getElementById("attendanceTable").style.visibility='visible';
                document.getElementById("attendanceTable").style.display="";
            }
            // $("#table tr").click(function()){
            //     $(this).addClass('selected').siblings().removeClass('selected');
            //     var value = $(this).find('td:first').html();
            //     alert(value);
            // }

            // $('.ok').on('click',function(e){
            //     alerts($("#table tr.selected td:first").html());
            // });

            
        </script>

    </div>
    <!-- include footer section -->
    <?php require('../../assets/php/commonFooter.php')?>
</body>
</html>