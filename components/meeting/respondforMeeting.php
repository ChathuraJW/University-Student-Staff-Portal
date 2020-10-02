<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="requestMeetingStyles.css">
</head>
<body>
    <!-- include header section -->
    <?php require('../../assets/php/commonHeader.php')?>
    
    <!-- feature body section -->
    <div class="featureBody">
        <h2>Appointments</h2>
        <fieldset>
            <a href="history.php"class="button2">History</a>
            <a href="respondforMeeting.php"class="button2">Pending Appointment</a>


        </fieldset>
        <style>
            .appointmentMessage{
                display: none;
            }
        </style>

        <fieldset>
            
                <!-- <button type="submit" value="Submit">Appointment1</button><br>
                <button type="submit" value="Submit">Appointment2</button><br>
                <button type="submit" value="Submit">Appointment3</button><br>
                <button type="submit" value="Submit">Appointment4</button><br> -->
                
                <button class="appointment" onclick="openform()">Appointment1 </button><br>
                <button class="appointment" onclick="openform()">Appointment2 </button><br>
                <button class="appointment" onclick="openform()">Appointment3 </button><br>
                <button class="appointment" onclick="openform()">Appointment4 </button><br>
                <button class="appointment" onclick="openform()">Appointment5 </button><br>

        </fieldset>
        <div class="appointmentMessage" >
            <h4>Appointment Topic</h4><br>
            <p>Student Index</p>
            <p>making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney
                 College in Virginia, looked up one of the more obscure Latin words, consectetur, from
                  a Lorem Ipsum passage, and going through the cites of the word in classical literature, 
                  discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of
                   "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45
                    BC. This book is a treatise on the theory of ethics, very popular during the Renaissance.
                     The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in 
                     section 1.10.32</p><br>
                <button type="submit">Approve</button>
                <button type="submit">Reject</button>
        </div>
    </div>

    <!-- include footer section -->
    <?php require('../../assets/php/commonFooter.php')?>
</body>
<script>
    function openform(){
        document.getElementsByClassName("appointmentMessage").style.display ="block";
    }
</script>
</html>