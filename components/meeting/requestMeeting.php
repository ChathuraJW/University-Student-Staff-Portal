<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="../../assets/css/requestMeetingStyles.css">
</head>
<body>
    
    <!-- include header section -->
    <?php require('../../assets/php/commonHeader.php')?>
    
    <!-- feature body section -->
    <div class="featureBody">
        <div class="tabs">
            <button class="tablink" onclick="document.getElementByClassName('newappointment').style.display='none'">New Appointment</button>
            <button class="tablink" onclick="document.getElementByClassName('myappointments').style.display='none'">My Appointment</button>
        </div>
        
        <div class="tabcontaint">
            <h2 class="h1">Chek Availability</h2>
            <form class="form1">
            <h4 class="h2">Lecturer Availability</h4>
                <label for="lecture1">Lecturer </label>
                <input list="lecture1">
                <datalist id="lecture1">
                    <option value="LEC1045"></option>
                    <option value="LEC1305"></option>
                    <option value="LEC1023"></option>
                    <option value="LEC1245"></option>
                    <option value="LEC1395"></option>
                    <option value="LEC1294"></option>
                </datalist> <br>
                
                <button class="buttoncheck"  type="submit" value="Submit">check</button><br>

                <!-- Display the availability of the lecturer -->
                
                    <p>Lecturer is   </p>
                    

            </form>
            <!-- fist lecturer and date -->
            

            <div class="requestform">
                <h2 class="newhead">New Appointment</h2>
                <form class="form2" method="get" action="submit.php">

                            
                    <label class="lable" for="lecture2">Lecturer </label>
                    <input class="dataraws" list="lecture2">
                    <datalist id="lecture2">
                        <option value="LEC1045"></option>
                        <option value="LEC1305"></option>
                        <option value="LEC1023"></option>
                        <option value="LEC1245"></option>
                        <option value="LEC1395"></option>
                        <option value="LEC1294"></option>
                    </datalist> <br>
                    <label class="lable" for="date2">Date </label>
                    <input class="dataraws" type="date" id="date2"><br>

                    <label class="lable" for="time">Time </label>
                    <input class="dataraws" type="time" id="time"><br>

                    <label class="lable" for="description">Description </label>
                    <input class="discription1" type="text" id="description"><br>

                    <button class="button" type="submit" value="Submit">Request an Appointment</button>


                    <button class="button" type="reset">Reset</button><br>
                   

                </form>
            </div>
            
        </div>
        <div class="tabcontaint">
            <button class="appoint" >Appointment 1</button><br>
            <button class="appoint" >Appointment 2</button><br>
            <button class="appoint" >Appointment 3</button><br>
            
        </div>
        <!-- <script>
            var tablinks document.querySelectorAll(".featureBody .tabs buttons");
            var tablinks document.querySelectorAll(".featureBody .");
        </script> -->
        
    </div>
    

    <!-- include footer section -->
    <?php require('../../assets/php/commonFooter.php')?>
</body>
</html>