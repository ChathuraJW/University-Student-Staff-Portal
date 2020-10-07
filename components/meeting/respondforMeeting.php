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
            <button class="navlink" onclick="opentab('tabcontaint')">All Appointment</button>
            <button class="navlink" onclick="opentab('availability')">History</button>
            
        </div>
        <!-- <fieldset class="nav">
            <a class="button2">All Appointment</a>
            <a class="button2">History</a>
        </fieldset> -->
        
        <style>

            

            
        </style>
        <div style="display:none;">
            <h2 id="head">Appointments</h2>
            <div class="list" >
            
                <div>
                    
                    <?php for($i=0;$i<10;$i++):?>
                    <button class="appointment" onclick="open();"><p id="apptp">Appointment <?php echo $i+1?></p></button><br>
                    <?php endfor;?>
                    
                </div>
            
            </div>
            <div id="message1" class="appointmentMessage"  >
                <div id="messageContent1"class="content">
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
                        <p id="i" class="vale" style="font-weight:bold;">Duration </p>
                        <p class="vale">  Time period</p>
                    </div>
                    <div class="ttl">
                        <p id="i" class="vale" style="font-weight:bold;">Date </p>
                        <p class="vale"> Suggestion of Date</p>
                    </div>
                    <div style="display:table;width:100%;">
                        <button id="btn1" class="btn" type="submit">Approve</button>
                        <button id="btn2" class="btn"  type="submit">Reject</button>
                    </div>
                </div>
            </div>
        </div>
        

        <div class="history" >
            <h2 id="head">Appointment History</h2>
            <div>
                <?php for($i=0;$i<10;$i++):?>
                <button class="appointment" onclick=""><p id="apptp">Appointment <span class="close">&times;</span> <?php echo $i+1?></p></button><br>
                <?php endfor;?>
                
            </div>

            <div id="message2" class="appointmentMessage"  >
                <div id="messageContent2" class="content">
                    <span class="close">&times;</span>
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
                        <p id="i" class="vale" style="font-weight:bold;">Duration </p>
                        <p class="vale">  Time period</p>
                    </div>
                    <div class="ttl">
                        <p id="i" class="vale" style="font-weight:bold;">Date </p>
                        <p class="vale"> Suggestion of Date</p>
                    </div>
                    <p style="font-weight:bold;">Approved or Rejected</p>
                </div>
            </div>

        </div>

    </div>
    <!-- <p id="demo" onclick="myFunction()">Click me to change my text color.</p> -->

    <script>
        var list= document.getElementsByClassName("list");
        var apt = document.getElementsByClassName("appointment");
        var msg = document.getElementsByClassName("appointmentMessage");
        function open(){
            document.getElementById("appointmentMessage").style.display  = "block";
            
            
        }
        function myFunction() {
        document.getElementById("demo").style.color = "red";
        }
    </script>
    <!-- include footer section -->
    <?php require('../../assets/php/commonFooter.php')?>
</body>

</html>