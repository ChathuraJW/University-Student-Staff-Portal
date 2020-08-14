<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
</head>
<body>
    <!-- include header section -->
    <?php require('../../assets/php/commonHeader.php')?>
    
    <!-- feature body section -->
    <div class="featureBody">
        <script type="text/javascript">
            function displayForm(c){
                if(c.value=="1")
                {
                    document.getElementById("csv_form_container").style.visibility='visible';
                    document.getElementById("single_attendance").style.visibility='hidden';
                }
                else if(c.value=="2")
                {
                    document.getElementById("csv_form_container").style.visibility='hidden';
                    document.getElementById("single_attendance").style.visibility='visible';
                }
                else{}
            }
        </script>
        <label>Select:<label>
        <form>
            <input value="1" type="radio" name="form_selector" onClick="displayForm(this)"></input>Upload CSV File<br>
            <br>
            <input value="2" type="radio" name="form_selector" onClick="displayForm(this)"></input>Update Single Attendance
        </form>
        <div style="visibility:hidden; position:relative " id="csv_form_container">
            <form id="csv_form">
                <label>--Upload CSV Files--</label>
                <p>Date</p>
                <input type="date" name="l_date" required/>
                <i class="fas fa-calendar-alt"></i>
                <p>Course Details</p>
                <select required>
                    <option value="">--Academic Year--</option>
                    <option value="1">First Year</option>
                    <option value="2">Second Year</option>
                    <option value="3">Third Year</option>
                    <option value="4">Fourth Year</option>
                    <input type="text" name="subject_code" placeholder="Subject Code"/><br>
                    <input type="file" id="myFile" name="filename">
                    <input type="submit">
            </form>
        </div>

        <div style="visibility:hidden; position:relative; top:-11opx; margin-top:-110px" id="single_attendance">
            <form id="single_attendance">
            </form>
        </div>
    </div>
    <!-- include footer section -->
    <?php require('../../assets/php/commonFooter.php')?>
</body>
</html>