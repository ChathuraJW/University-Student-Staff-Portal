<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet"  href="addAttendanceStyle.css" >
</head>
<body>
    <!-- include header section -->
    <?php require('../../assets/php/commonHeader.php')?>
    
    <div class="featureBody">
        <div class = "selection">
        <label>Select:</label>
        <form>
            <input value="1" type="radio" name="formSelector" onClick="displayForm(this)"></input>Upload CSV File
            <div class = "csvFile">
                <span>Font end</span>
            <div>
            <input value="2" type="radio" name="formSelector" onClick="displayForm(this)"></input>Update Single Attendance
        </form>
        </div>
        <div style="visibility:hidden; position:relative " id="csvFormContainer">
            <form id="csvForm">
                <!-- <label>--Upload CSV Files--</label> -->
                <p>Date</p>
                <input type="date" name="lDate" required/>
                <i class="fas fa-calendar-alt"></i>
                <p>Course Details</p>
                <select required>
                    <option value="">-Academic Year-</option>
                    <option value="1Year">First Year</option>
                    <option value="2Year">Second Year</option>
                    <option value="3Year">Third Year</option>
                    <option value="4Year">Fourth Year</option>
                    </select>
                    <input type="text" name="subjectCode" placeholder="Subject Code"/><br>
                    <input type="file" id="myFile" name="filename">
                    <input type="submit">
            </form>
        </div>
        <div style="visibility:hidden; position:relative" id="singleAttendance">
            <form id="singleAttendance">
                <label for="index">Index:</label>
                <input type="text" id="index" name="index">
                <br>
                <label for="academicYear">Academic Year:</label>
                <select id="academicYear"  required>
                    <option value="">-Select-</option>
                    <option value="2016">2016/17</option>
                    <option value="2017">2017/18</option>
                    <option value="2018">2018/19</option>
                    <option value="2019">2019/20</option>
                </select>
                <br>
                <label for="semester">Semester:</label>
                <select id="semester" required>
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
                <br>
                <label for="subject">Subject:</label>
                <select id="subject" required>
                    <option value="">-Select-</option>
                    <option value="sbu1">DSA</option>
                    <option value="sub2">SE</option>
                    <option value="sub3">CS</option>
                    <option value="sub4">RAD</option>
                    <option value="sub5">MM</option>
                    <option value="sub6">PLC</option>
                    <option value="sub7">FP</option>
                </select>
                <br>
                <button type="button" onclick = "displayAttendance()" >Search</button>
                <div style="visibility:hidden; position:relative" id="attendanceTable">
                    <table id ="attendanceTable" >
                        <tr>
                            <th>Date</th>
                            <th>Week<th>
                            <th>Attendance</th>
                            <th>Description</th> 
                        </tr>
                        <tr>
                            <td>2019-05-08</td>
                            <td>1</td>
                            <td>p</td>
                        </tr>
                        <tr>
                            <td>2019-05-15</td>
                            <td>2</td>
                            <td>p</td>
                        </tr>
                        <tr>
                            <td>2019-05-22</td>
                            <td>3</td>
                            <td>ab</td>
                        </tr>
                        <tr>
                            <td>2019-05-01</td>
                            <td>4</td>
                            <td>p</td>
                        </tr>
                        <tr>
                            <td>2019-05-01</td>
                            <td>5</td>
                            <td>p</td>
                        </tr>
                    </table>
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
                    
                    
                }
                else if(c.value=="2")
                {
                    document.getElementById("csvFormContainer").style.visibility='hidden';
                    document.getElementById("singleAttendance").style.visibility='visible';
                    document.getElementById("csvFormContainer").style.display='none';
                    document.getElementById("singleAttendance").style.display="";
                }
                else{}

                
            }
            // change visibility of table
            function displayAttendance(){
                document.getElementById("attendanceTable").style.visibility='visible';
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