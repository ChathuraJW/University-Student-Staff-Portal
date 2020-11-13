
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
    <?php require('../../assets/php/basicLoader.php')?>
    <?php BasicLoader::loadHeader('../../') ?>
    
    <!-- feature body section -->
    <div class="featureBody" >
        <div class="navigationBar">
            <button id="link1"  class="navigationLink" style="background-color: rgb(58, 189, 212);" onclick="openTab('tab1');hover('link1');">New Appointment</button>
            <button id="link2" class="navigationLink" onclick="openTab('tab2');hover('link2');">Lecturer Availability</button>
        </div>

        <div id="tab1"  class="row col-2 tabContain"  >
    
            <!-- fist lecturer and date -->
            <div class="myAppointments" >
                                
                <div class="row col-1">
                    <h3 id="head">My Appointments </h3>
                </div>
                <?php $records=$controllerData[2];?>
                <?php if(count($records)):?>
                    
                    <?php foreach($records as $record){?> 
                        
                        <div class="row col-1">
                            <?php
                                if($record['isApproved']=='A'){
                                    $isApprove="Approved";
                                }
                                elseif($record['isApproved']=='R'){
                                    $isApprove="Rejected";
                                }
                                else{
                                    $isApprove="Did not view yet";
                                }
                            $url="?appointID=".$record['appointmentID']."&staffID=".$record['staffID']."&title=".$record['title']."&message=".$record['message']."&duration=".$record['meetingDuration']."&time=".$record['timestamp']."&isapprove=".$isApprove;
                            ?>

                            <a href='<?php echo $url;?>'  id="<?php echo $record['isApproved'];?>"class="appointment" ><p  class="appointmentDescription"><?php echo $record['title'];?><br><br><?php echo $record['timestamp'];?></p></a><br>
                            
                            <?php 
                                    echo("
                                        <style>
                                            #A{
                                                background-color: rgb(189, 247, 189);
                                            }
                                            #A:hover{
                                                background-color: #8af18a;
                                                
                                            }
                                            #R{
                                                background-color: rgb(238, 170, 183);
                                            }
                                            #R:hover{
                                                background-color: #f18a8a;
                                            }
                                        </style>
                                    ");
                            ?>
                            
                        </div>
                    <?php }?>
                <?php else: ?>
                    <p>Not find to Records</p>
                <?php endif;?>
            
            </div>
            
            <div  class="row col-1 requestForm" >
                <div class="row col-1">
                    <h2 id="head">New Appointment</h2>
                </div>
                <form action="" class="form2" method="post" enctype="multipart/form-data">
                    <!-- <div class="row col-1">
                        <input class="dataRaws" list="lecture2" name="lect" placeholder="Lecturer">    
                    </div> -->
                    <select class="dataRaws" name="lecturer" id="lecture2">
                        <?php 

                            // print_r($controllerData[0]);
                            
                            

                            $lecturers=$controllerData[0];
                            foreach($lecturers as $lecturer){
                                
                                echo("<option value='".$lecturer['userName']."'>".$lecturer['salutation']." ".$lecturer['firstName']." ".$lecturer['lastName']."</option>");
                            }
                            // ".$lecturer[''].$lecturer['']."
                        ?>
                    </select> <br>
                    <div class="row col-1">
                        <input class="dataRaws" list="durations" name="durat" placeholder="Time duration">
                    </div>
                    <datalist id="durations">
                        <option data-value="15 minutes">15 minutes</option>
                        <option data-value="30 minutes">30 minutes</option>
                        <option data-value="1 hour">1 hour</option>
                        <option data-value="More than 1 hour">More than 1 hour</option>
                        
                    </datalist> <br>
                    <div class="row col-1">
                        <input  class="dataRaws" type="text"  name="title" placeholder="Title"><br>
                    </div>

                    <div class="row col-1">
                        <input class="dataRaws" list="types" name="type" placeholder="Type">
                    </div>
                    <datalist id="types">
                        <option data-value="1">Academic Related</option>
                        <option data-value="2">Personal</option>
                        <option data-value="3">Social Related</option>
                        <option data-value="4">Other</option>
                        
                    </datalist> <br>
                    <div class="row col-2">
                        <div><input style="width:100%;"class="dataRaws" type="date" name="date" ></div>
                        <div><input style="width:100%;"class="dataRaws" type="time" name="time" ></div>
                    </div>
                    
                    <div class="row col-1">
                        <textarea class="description" type="text" id="description" name="msg" placeholder="Description"></textarea><br>
                    </div>

                    <div class="row col-1">
                        <input id="submitButton" class="button" type="submit" name="submit" value="Submit">
                    </div>
                    <div class="row col-1">
                        <input id="resetButton" class="button" type="reset" value="Reset">
                    </div>

                </form>
            </div>
        
        </div>
        <div id="tab2" class="tabContainSecond" style="display:none;" >
            <div   class="availability" >
                
                    <div class="row col-1">
                        <h2 id="head" >Available Lecturers</h2>
                    </div>
                    <?php $profiles=$controllerData[1]?>
                    <div class="row col-2 ">
                        <?php foreach($profiles as $profile){?>
                            
                                <div class="profile">
                                    <div class="profileFields col-2">
                                        <div class="profileField" >
                                            <div class="row col-1 " >
                                                <h3><?php echo $profile['salutation'].".".$profile['fullName']?></h3>
                                            </div>
                                            <div class="row col-1 img" style="margin-left:20px;">
                                                <img src="../../assets/image/profilePicture.PNG" style="background-color: rgb(247, 226, 245,1);" alt="">
                                            </div>
                                        </div >
                                        
                                        <div class="profileField details" style="width:130%;">
                                            
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
                                                <div >
                                                    <p><?php echo $profile['availableFrom']?></p>
                                                </div>
                                            </div>
                                            <div class="row col-2 profData">
                                                <div>
                                                    <h4>Available To </h4>
                                                </div>
                                                <div >
                                                    <p><?php echo $profile['availableTo']?></p>
                                                </div>
                                            </div>
                                            <div class="row col-2 profData">
                                                <div>
                                                    <h4>Last Updated DateTime </h4>
                                                </div>
                                                <div > 
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

                    <div id="messageContent2" class="content">
                        <span class="close" onclick="remove()" >&times;</span>
                        <div class="row col-1">
                            <h4 class="topic "> <?php echo $_GET['title']?></h4>
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
   
    </div>
    <script>
        
        function remove(){
            document.getElementById("message2").style.display="none";
            // window.location.href=document.location.href.toString().split('requestAppointment')[0]+'requestAppointment';
            
        }
        function openTab(tabs){
            document.getElementById("tab1").style.display="none";
            document.getElementById("tab2").style.display="none";
            
            document.getElementById(tabs).style.display="";
        }

        function hover(link){
            document.getElementById("link1").style.backgroundColor  = "rgb(148, 195, 238)";
            document.getElementById("link2").style.backgroundColor  = "rgb(148, 195, 238)";
            document.getElementById(link).style.backgroundColor  = "rgb(58, 189, 212)";
        }

    </script>
    

    <!-- include footer section -->
    <?php BasicLoader::loadFooter('../../') ?>
</body>
</html>