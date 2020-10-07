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
    <div class="featureBody" >
        
        <div class="navibar">
            <button class="navlink" onclick="opentab('tab1')">New Appointment</button>
            <button class="navlink" onclick="opentab('tab2')">Lecturer Availability</button>
            
        </div>
        <style>

        </style>
        
        <div id="tab1"  class="tabcontaint"  >
    
            <!-- fist lecturer and date -->
            <div class="Myappointments" >
                <div class="apointset">
                    <h3 style="padding-left:60px">My Appointments </h3>
                    <?php for($i=0;$i<10;$i++):?>
                        <button class="appoint" onclick="appoint()"><p id="parr">Appointment <?php echo $i+1?></p></button><br>
                    <?php endfor;?>
                    
                </div>
            </div>
            <div  class="requestform" >
                <h2 class="newhead">New Appointment</h2>
                <form class="form2" method="get" action="submit.php">
                    <!-- <label class="lable" for="lecture2">Lecturer </label> -->
                    <input class="dataraws" list="lecture2" placeholder="Lecturer">
                    <datalist id="lecture2">
                        <option value="LEC1045"></option>
                        <option value="LEC1305"></option>
                        <option value="LEC1023"></option>
                        <option value="LEC1245"></option>
                        <option value="LEC1395"></option>
                        <option value="LEC1294"></option>
                    </datalist> <br>
                    <!-- <label class="lable" for="date2">Date </label> -->
                    <input class="dataraws" type="date" id="date2" placeholder="Date"><br>

                    <!-- <label class="lable" for="time">Time </label> -->
                    <input class="dataraws" type="time" id="time" placeholder="Time"><br>

                    <input class="dataraws" list="durations" placeholder="Time duration">
                    <datalist id="durations">
                        <option value="15 minutes"></option>
                        <option value="30 minutes"></option>
                        <option value="1 hour"></option>
                        <option value="More than 1 hour"></option>
                        
                    </datalist> <br>

                    <!-- <label class="lable" for="description">Description </label> -->
                    <input class="description" type="text" id="description" placeholder="Description"><br>

                    <!-- <div class="buttons">
                        <button class="button" style="float:right" type="submit" value="Submit">Request an Appointment</button>
                        <button class="button" style="float:left" type="reset">Reset</button>
                    </div> -->
                    <input class="button" type="submit" value="Submit">
                    <input class="button" type="reset" value="Reset">

                </form>
            </div>   
        </div>
        <div id="tab2" class="tabcontaint2" style="display:none;" >
            <div   class="availability" >
                <div >
                    <h2 class="newhead" style="text-align:left; margin-left:100px;">Available Lecturers</h2>
                    <?php for($i=0;$i<10;$i++):?>
                        
                        <div class="profile">
                            <div class="img">
                                <img src="../../assets/images/profile.jpg" height="100px" width="100px" alt="">
                            </div>
                            <div class="details">
                                <h3>Lecturer's Name <?php echo $i?></h3>
                                
                                <h4>Email Address:</h4><p>ABC@mail.com</p>
                                <h4>Last Updated DateTime </h4><p>dd:mm:yyyy hh:mm </p>
                                
                            </div>
                        </div>
                        
                    <?php endfor;?>
                </div>
            </div>
        </div>
        <div id="message2" class="appointmentMessage" style="display:none;"  >
            <div id="messageContent2" class="content">
                <span class="close" onclick="close()" >&times;</span>
                <h4 class="topic">Appointment Topic</h4>
                    <div class="ttl">
                        <p id="i" class="vale" style="font-weight:bold;">From </p>
                        <p class="vale">  Student Index</p>
                    </div>
                    <div class="ttl">
                        <p id="i" class="vale" style="font-weight:bold;">Description </p>
                        <p class="vale"> making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney
                            College in Virginia, looked up one of the more obscure Latin words, consectetur, from
                            a Lorem Ipsum passage</p>
                    </div>
                    <div class="ttl">
                        <p id="i" class="vale" style="font-weight:bold;">Time </p>
                        <p class="vale">Suggested Time</p>
                    </div>
                    <div class="ttl">
                        <p id="i" class="vale" style="font-weight:bold;">Duration </p>
                        <p class="vale">  Time period</p>
                    </div>
                    <div class="ttl">
                        <p id="i" class="vale" style="font-weight:bold;">Date </p>
                        <p class="vale"> Suggestion of Date</p>
                    </div>
                
            </div>
        </div>
        

        
        <!-- <script>
            var tablinks document.querySelectorAll(".featureBody .tabs buttons");
            var tablinks document.querySelectorAll(".featureBody .");
        </script> -->
        
    </div>
    <script>
        var val1=document.getElementsByClassName("tabcontaint");
        var val2=document.getElementsByClassName("availability");
        var val2=document.getElementsByClassName("appointmentMessage");
        function close(){
            document.getElementById("message2").style.display="none";
        }
        function opentab(tabs){
            document.getElementById("tab1").style.display="none";
            document.getElementById("tab2").style.display="none";
            
            document.getElementById(tabs).style.display="";
        }
        function appoint(){
            document.getElementById("message2").style.display="";
        }

    </script>
    

    <!-- include footer section -->
    <?php require('../../assets/php/commonFooter.php')?>
</body>
</html>