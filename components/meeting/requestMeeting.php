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
        
        <div class="navibar">
            <button onclick="opentab('tabcontaint')">New Appointment</button>
            <button onclick="opentab('availability')">Lecturer Availability</button>
            
        </div>
        <div id="tab" class="tabcontaint">
           
            <!-- fist lecturer and date -->
            <div id="a" class="Myappointments">
                <div class="apointset">
                    <h3 style="padding-left:40px">My Appointments </h3>
                    <button class="appoint" >Appointment 1</button><br>
                    <button class="appoint" >Appointment 2</button><br>
                    <button class="appoint" >Appointment 3</button><br>
                    <button class="appoint" >Appointment 4</button><br>
                    <button class="appoint" >Appointment 5</button><br>
                    <button class="appoint" >Appointment 6</button><br>
                </div>
            

                
            
            </div>

            <div id="a" class="requestform">
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
        <div id="tab" class="availability" style="display:none">
            <h1>mmmmmmmmmmmmmm</h1>
        </div>
        
        <!-- <script>
            var tablinks document.querySelectorAll(".featureBody .tabs buttons");
            var tablinks document.querySelectorAll(".featureBody .");
        </script> -->
        
    </div>
    <script>
        function opentab(tabs){
            var i;
            var x=document.getElementById("tab");
            for(i=0;i<x.length;i++){
                x[i].style.display="none";
            }
            document.getElementByClass(tabs).style.display="block";
        }
    </script>
    

    <!-- include footer section -->
    <?php require('../../assets/php/commonFooter.php')?>
</body>
</html>