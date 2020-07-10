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
        <h2>Appointments</h2>
        <fieldset>
            <a href="history.php"class="button">History</a>
            <a href="respondforMeeting.php"class="button">Pending Appointment</a>


        </fieldset>

        <fieldset>
            
                <!-- <button type="submit" value="Submit">Appointment1</button><br>
                <button type="submit" value="Submit">Appointment2</button><br>
                <button type="submit" value="Submit">Appointment3</button><br>
                <button type="submit" value="Submit">Appointment4</button><br> -->
                
                <a href="">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">Appointment1</span><br>
                <span class="closebtn" onclick="this.parentElement.style.display='none';">Appointment2</span><br>
                <span class="closebtn" onclick="this.parentElement.style.display='none';">Appointment3</span><br>
                <span class="closebtn" onclick="this.parentElement.style.display='none';">Appointment4</span><br>
                <span class="closebtn" onclick="this.parentElement.style.display='none';">Appointment5</span><br>
                </a>
            

        </fieldset>
    </div>

    <!-- include footer section -->
    <?php require('../../assets/php/commonFooter.php')?>
</body>
</html>