<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="../../assets/css/appointmentStyles.css">
    <link rel="stylesheet" href="../../assets/css/gridSystem.css">
</head>
<body>
    
    <!-- include header section -->
    <?php require('../../assets/php/commonHeader.php')?>
    
    <!-- feature body section -->
    <div class="featureBody" >
        <div class="navibar">
        <button id="link1"  class="navlink" style="background-color: rgb(58, 189, 212);" onclick="opentab('tab1');hoverr('link1');">New Appointment</button>
        <button id="link2" class="navlink" onclick="opentab('tab2');hoverr('link2');">Lecturer Availability</button>

            <!-- <div class="row col-2">
                <div>
                </div>
                
                <div>
                </div>
            </div> -->

        </div>
        
        
        
        <style>

        </style>
        <div id="tab1"  class="row col-2 tabcontaint"  >
    
            <!-- fist lecturer and date -->
            <div class="Myappointments" >
                                
                <div class="row col-1">
                    <h3 id="head">My Appointments </h3>
                </div>
                <?php $records=$controllerData[2];?>
                <?php if(count($records)):?>
                    
                    <?php foreach($records as $record){?> 
                        
                        <div class="row col-1">
                            <?php
                                if($record['isApproved']=='A'){
                                    $isapprove="Approved";
                                }
                                elseif($record['isApproved']=='R'){
                                    $isapprove="Rejected";
                                }
                                else{
                                    $isapprove="Did not view yet";
                                }
                            $url="?appointID=".$record['appointmentID']."&staffID=".$record['staffID']."&title=".$record['title']."&message=".$record['message']."&duration=".$record['meetingDuration']."&time=".$record['timestamp']."&isapprove=".$isapprove;
                            ?>

                            <a href='<?php echo $url;?>'  id="<?php echo $record['isApproved'];?>"class="appointment" ><p  class="appointmentDescription"><?php echo $record['title'];?></p></a><br>
                            
                            <?php 
                                    echo("
                                        <style>
                                            #A{
                                                background-color: rgb(189, 247, 189);
                                            }
                                            #A:hover{
                                                background-color: #8af18a;
                                                
                                            }
                                            #B{
                                                background-color: rgb(238, 170, 183);
                                            }
                                            #B:hover{
                                                background-color: #f18a8a;
                                            }
                                        </style>
                                    ");
                            ?>
                            <!-- <form action="" method="post">
                                <input hidden type="text"  name="studentID" value="<?php echo $record->studentID;?>">
                                <input  type="submit" name="chose" class="appoint" onclick="appoint()" value="<?php echo $record->title;?>"> <br>
                                <input type="submit" id="report" name="chose" value="<?php echo $record->firstName;?>'s profile">
                            </form>    
                            <button class="appoint" onclick="appoint()"><p id="parr"><?php echo $record->title;?></p></button><br> -->
                            
                        </div>
                    <?php }?>
                <?php else: ?>
                    <p>Not find to Records</p>
                <?php endif;?>
            
            </div>
            
            <div  class="row col-1 requestform" >
                <div class="row col-1">
                    <h2 id="head">New Appointment</h2>
                </div>
                <form action="" class="form2" method="post" enctype="multipart/form-data">
                    <div class="row col-1">
                        <input class="dataraws" list="lecture2" name="lect" placeholder="Lecturer">    
                    </div>
                    <datalist id="lecture2">
                        <?php 
                            $lecturers=$controllerData[0];
                            foreach($lecturers as $lecturer){
                                echo("<option value=".$lecturer['staffID']."></option>");
                            }
                        ?>
                        <!-- <option value="LEC1305"></option>
                        <option value="LEC1023"></option>
                        <option value="LEC1245"></option>
                        <option value="LEC1395"></option>
                        <option value="LEC1294"></option> -->
                    </datalist> <br>
                    <!-- <label class="lable" for="date2">Date </label> -->
                    <!-- <div class="row col-1">
                        <input class="dataraws" type="date" id="date2" name="date" placeholder="Date"><br>    
                    </div> -->

                    <!-- <label class="lable" for="time">Time </label> -->
                    <!-- <div class="row col-1">
                        <input class="dataraws" type="time" id="time" name="time" placeholder="Time"><br>                        
                    </div> -->

                    <div class="row col-1">
                        <input class="dataraws" list="durations" name="durat" placeholder="Time duration">
                    </div>
                    <datalist id="durations">
                        <option data-value="15 minutes">15 minutes</option>
                        <option data-value="30 minutes">30 minutes</option>
                        <option data-value="1 hour">1 hour</option>
                        <option data-value="More than 1 hour">More than 1 hour</option>
                        
                    </datalist> <br>
                    <div class="row col-1">
                        <input  class="dataraws" type="text"  name="title" placeholder="Title"><br>
                    </div>

                    <div class="row col-1">
                        <input class="dataraws" list="types" name="type" placeholder="Type">
                    </div>
                    <datalist id="types">
                        <option data-value="1">type 1</option>
                        <option data-value="2">type 2</option>
                        <option data-value="3">type 3</option>
                        <option data-value="4">type 4</option>
                        
                    </datalist> <br>
                    <!-- <label class="lable" for="description">Description </label> -->
                    <div class="row col-1">
                        <input class="description" type="text" id="description" name="msg" placeholder="Description"><br>
                    </div>

                    <!-- <div class="buttons">
                        <button class="button" style="float:right" type="submit" value="Submit">Request an Appointment</button>
                        <button class="button" style="float:left" type="reset">Reset</button>
                    </div> -->
                    <div class="row col-1">
                    <input class="button" type="submit" name="submit" value="Submit">
                    </div>
                    <div class="row col-1">
                    <input class="button" type="reset" value="Reset">
                    </div>

                </form>
            </div>
        
        </div>
        <div id="tab2" class="tabcontaint2" style="display:none;" >
            <div   class="availability" >
                
                    <div class="row col-1">
                        <h2 id="head" >Available Lecturers</h2>
                    </div>
                    <?php $profiles=$controllerData[1]?>
                    <div class="row col-2">
                        <?php foreach($profiles as $profile){?>
                            
                                <div class="profile">
                                    <div class="row col-2">
                                        <div>
                                            <div class="row col-1 " >
                                                <h3><?php echo $profile['fullName']?></h3>
                                            </div>
                                            <div class="row col-1 img" style="margin-left:20px;">
                                                <img src="../../assets/images/profile.jpg" height="100px" width="100px" alt="">
                                            </div>
                                        </div>
                                        
                                            <div class="details">
                                                
                                                <div class="row col-2 profData">
                                                    <div>
                                                        <h4>Email Address:</h4>
                                                    </div>
                                                    <div>
                                                        <p><?php echo $profile['universityEmail']?></p>
                                                    </div>
                                                </div>
                                                <div class="row col-2 profData">
                                                    <div>
                                                        <h4>Available From</h4>
                                                    </div>
                                                    <div>
                                                        <p><?php echo $profile['availableFrom']?></p>
                                                    </div>
                                                </div>
                                                <div class="row col-2 profData">
                                                    <div>
                                                        <h4>Available To </h4>
                                                    </div>
                                                    <div>
                                                        <p><?php echo $profile['availableTo']?></p>
                                                    </div>
                                                </div>
                                                <div class="row col-2 profData">
                                                    <div>
                                                        <h4>Last Updated DateTime </h4>
                                                    </div>
                                                    <div>
                                                        <p><?php echo $profile['lastUpdateDate']?></p>
                                                    </div>
                                                </div>

                                            </div>
                                        
                                    </div>
                                    
                                </div>
                            
                            
                            
                        <?php }?>
                    </div>
                
            </div>
        </div>
        <?php if(isset($_GET['appointID'])):?>
        <div id="message2" class="appointmentMessage" >
        
            

<!-- // $url="?appointID=".$record->appointmentID."&staffID=".$record->staff."&title=".$record->title."&message".$record->message."&duration".$record->meetingDuration."&time=".$record->timestamp."&isapprove=".$isapprove; -->
            
                
                    <div id="messageContent2" class="content">
                        <span class="close" onclick="remove()" >&times;</span>
                        <div class="row col-1">
                            <h4 class="topic"> <?php echo $_GET['title']?></h4>
                        </div>
                        <div class="descriptionDetails">
                            <div class="ttl">
                                <div class="row col-2">
                                    <div>
                                        <p id="i" class="vale" style="font-weight:bold;">Send To </p>
                                    </div>
                                    <div>
                                        <p class="vale"> <?php echo $_GET['staffID']?> </p>
                                    </div>
                                </div>
                            </div>
                            <div class="ttl">
                                <div class="row col-2">
                                    <div>
                                        <p id="i" class="vale" style="font-weight:bold;">Message </p>
                                    </div>
                                    <div>
                                        <p class="vale"> <?php echo $_GET['message']?></p>
                                        <!-- // making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney
                                        // College in Virginia, looked up one of the more obscure Latin words, consectetur, from
                                        // a Lorem Ipsum passage -->
                                    </div>
                                </div>
                                
                            </div>
                            <div class="ttl">
                                <div class="row col-2">
                                    <div>
                                        <p id="i" class="vale" style="font-weight:bold;"> Date and Time</p>
                                    </div>
                                    <div>
                                        <p class="vale"> <?php echo $_GET['time']?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="ttl">
                                <div class="row col-2">
                                    <div>
                                        <p id="i" class="vale" style="font-weight:bold;">Duration </p>
                                    </div>
                                    <div>
                                        <p class="vale"> <?php echo $_GET['duration']?></p>                               
                                    </div>
                                </div>
                            </div>
                            <div class="ttl">
                                <div class="row col-2">
                                    <div>
                                        <p id="i" class="vale" style="font-weight:bold;">Is Approved </p>
                                    </div>
                                    <div>
                                        <p class="vale"> <?php echo $_GET['isapprove']?></p>   
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
            
            
        </div>
        <?php endif; ?>

        
        <!-- <script>
            var tablinks document.querySelectorAll(".featureBody .tabs buttons");
            var tablinks document.querySelectorAll(".featureBody .");
        </script> -->
        
    </div>
    <script>
        
        function remove(){
            document.getElementById("message2").style.display="none";
            window.location.href=document.location.href.toString().split('requestAppointment')[0]+'requestAppointment';
            
        }
        function opentab(tabs){
            document.getElementById("tab1").style.display="none";
            document.getElementById("tab2").style.display="none";
            
            document.getElementById(tabs).style.display="";
        }

        function hoverr(link){
            document.getElementById("link1").style.backgroundColor  = "rgb(148, 195, 238)";
            document.getElementById("link2").style.backgroundColor  = "rgb(148, 195, 238)";
            document.getElementById(link).style.backgroundColor  = "rgb(58, 189, 212)";
        }

    </script>
    

    <!-- include footer section -->
    <?php require('../../assets/php/commonFooter.php')?>
</body>
</html>