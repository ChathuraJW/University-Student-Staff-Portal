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
        <style>
            .requestform{
                
                width: 65%;
                border-style: outset;
                border-width: 10px;
                border: black;
                padding-right:40px;
                display:table-cell;
                
                
                /* margin: 10px 40px 50px 40px; */
            }
            .Myappointments{
                vertical-align: top;
                position:top;
                margin-bottom: 50px;
                width: 40%;
                display:table-cell; 
            }
            .appoint{
                margin-right:15px;
                padding-right:300px;
                width:150px;
                top:-25px;
            }
            .tabcontaint{
                margin:auto;
                display:table;
            }
            #parr{
                text:align:left;
                
            }
        </style>
        <div id="tab" class="tabcontaint">
        
            <!-- fist lecturer and date -->
            <div class="Myappointments">
                <div class="apointset">
                    <h3 style="padding-left:40px">My Appointments </h3>
                    <?php for($i=0;$i<10;$i++):?>
                        <button class="appoint" ><p id="parr">Appointment <?php echo $i+1?></p></button><br>
                    <?php endfor;?>
                    
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