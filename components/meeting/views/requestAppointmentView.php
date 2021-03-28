
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="assets/appointmentStyles.css">
    <link rel="stylesheet" href="../../assets/css/gridSystem.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
    
    <!-- include header section -->
    <?php require('../../assets/php/basicLoader.php')?>
    <?php BasicLoader::loadHeader('../../') ?>
    
    <!-- feature body section -->
    <div class="featureBody bodyBackground text" >
        <div class="navigationBar">
            <button id="linkFirst"  class="navigationLink" style="background-color: rgb(58, 189, 212);" onclick="openTab('tabFirst');hover('linkFirst');">New Appointment</button>
            <button id="linkSecond" class="navigationLink" onclick="openTab('tabSecond');hover('linkSecond');">Lecturer Availability</button>
        </div>

        <div id="tabFirst"  class="row col-2 tabContain"  >
    
            <!-- fist lecturer and date -->
            <div class="myAppointments" >
                                
                <div class="row col-1">
<!--                    in this section will list all the user maked appointments-->
                    <h3 id="head">My Appointments </h3>
                </div>
                <?php $records=$controllerData[2];?>
                <?php if(count($records)):?>
                    
                    <?php foreach($records as $record){?> 
                        
                        <div class="row col-1">
                            <?php
                                // echo $record->getAppointmentFor()->getGender();
                                if($record->getIsApproved()=='A'){
                                    $isApprove="Approved";
                                }
                                elseif($record->getIsApproved()=='R'){
                                    $isApprove="Rejected";
                                }
                                else{
                                    $isApprove="Did not view yet";
                                }
                            $url="?appointID=".$record->getAppointmentID()."&salutation=".$record->getAppointmentFor()->getSalutation()."&firstName=".$record->getAppointmentFor()->getFirstName()."&lastName=".$record->getAppointmentFor()->getLastName()."&staffID=".$record->getAppointmentFor()->getUserName()."&title=".$record->getTitle()."&message=".$record->getMessage()."&duration=".$record->getMeetingDuration()."&time=".$record->getTimestamp()."&isapprove=".$isApprove;
                            ?>

                            <a href='<?php echo $url;?>'  id="<?php echo $record->getIsApproved();?>"class="appointment" ><div style="margin-bottom:10px;" class="appointmentDescription messageHead"><?php echo $record->getTitle();?></div><div class="appointmentDescription"><?php echo substr($record->getMessage(), 0, 80);?> </div><div class="appointmentDescription" style="float:right;"><i class='fa fa-clock-o' aria-hidden='true'></i>  <?php echo $record->getTimestamp();?></div></a><br>
                            
                            <?php 
                                    echo("
                                        <style>
                                            #A{
                                                background: linear-gradient(to bottom right,rgb(189, 247, 189),white);

                                            }
                                            #A:hover{
                                                background: linear-gradient(to bottom right,#8af18a,white);
                                            }
                                            #R{
                                                background: linear-gradient(to bottom right,rgb(238, 170, 183),white);
                                            }
                                            #R:hover{
                                                background: linear-gradient(to bottom right,#f18a8a,white);
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
<!--                    this is the form which use for make new appointments.-->
                    <h2 id="head">New Appointment</h2>
                </div>
                <form action="" class="getAppointmentForm" method="post" enctype="multipart/form-data">
                    <!-- <div class="row col-1">
                        <input class="dataRaws" list="lecture2" name="lect" placeholder="Lecturer">    
                    </div> -->
                    <select class="dataRaws" name="lecturer" placeholder="Lecturer" id="lecture2">
                        <?php 

                            // print_r($controllerData[0]);
                            
                            

                            $lecturers=$controllerData[0];
                            foreach($lecturers as $lecturer){
                                
                                echo("<option fullName='".$lecturer['salutation']." ".$lecturer['firstName']." ".$lecturer['lastName']."' value='".$lecturer['userName']."'>".$lecturer['salutation']." ".$lecturer['firstName']." ".$lecturer['lastName']."</option>");
                            }
                            // ".$lecturer[''].$lecturer['']."
                        ?>
                    </select> <br>
                    <!-- <div class="row col-1">
                        <input class="dataRaws" list="durations" name="durat" placeholder="Time duration">
                    </div> -->
                    <select class="dataRaws" list="durations" name="durationInput" placeholder="Time duration" id="durations">
                        <option data-value="15 minutes">15 minutes</option>
                        <option data-value="30 minutes">30 minutes</option>
                        <option data-value="1 hour">1 hour</option>
                        <option data-value="More than 1 hour">More than 1 hour</option>
                        
                        </select> <br>
                    <div class="row col-1">
                        <input style="width:100%;" class="dataRaws" type="text"  name="title" placeholder="Title"><br>
                    </div>

                    <!-- <div class="row col-1">
                        <input class="dataRaws" list="types" name="type" placeholder="Type">
                    </div> -->
                    <select class="dataRaws" list="types" name="type" placeholder="Type" id="types">
                        <option data-value="1">Academic Related</option>
                        <option data-value="2">Personal</option>
                        <option data-value="3">Social Related</option>
                        <option data-value="4">Other</option>
                        
                        </select> <br>
                    <div class="row col-2">
                        <div><input id="dateValue" style="width:100%;"class="dataRaws" oninput="allocatedTime();" type="date" name="date" ></div>
                        <div><input style="width:100%;"class="dataRaws" type="time" name="time" ></div>
                    </div>
                    <!-- <div id="allocationTitle">Allocated Times of <p id="lectureName"></p> in <p id="requestDate"></p><br><br></div> -->

                    <div id="allocatedSlots">
                        <!-- this will contain the allocated time slot of the specific lecturer -->
                    </div>
                    <div class="row col-1">
                        <textarea class="description" type="text" id="description" name="msg" placeholder="Description"></textarea><br>
                    </div>

                    <div class="row col-1">
                        <input style="width:100%;" id="submitButton" class="button" type="submit" name="submit" value="Submit">
                    </div>
                    <div class="row col-1">
                        <input style="width:100%;" id="resetButton" class="button" type="reset" value="Reset">
                    </div>

                </form>
            </div>
        
        </div>
        <div id="tabSecond" class="tabContainSecond" style="display:none;" >
            <div   class="availability" >
<!--                this section will display the all the profile details and availability of the aech lecture-->
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
                                                <h3><?php echo $profile->getSalutation().".".$profile->getFullName()?></h3>
                                            </div>
                                            <div class="row col-1 img" style="margin-left:20px;">
                                                <img src="assets/profilePicture.JPG" style="background-color: rgb(247, 226, 245,1);" alt="">
                                            </div>
                                        </div >
                                        
                                        <div class="profileField details" style="width:130%;">
                                            
                                            <div class="row col-2 profData">
                                                <div>
                                                    <h4>Email Address</h4>
                                                </div>
                                                <div>
                                                    <div><?php echo $profile->getUniversityEmail()?></div>
                                                </div>
                                            </div>
                                            <div class="row col-2 profData">
                                                <div>
                                                    <h4>Available From</h4>
                                                </div>
                                                <div >
                                                    <div><?php echo $profile->getAvailableFrom()?></div>
                                                </div>
                                            </div>
                                            <div class="row col-2 profData">
                                                <div>
                                                    <h4>Available To </h4>
                                                </div>
                                                <div >
                                                    <div><?php echo $profile->getAvailableTo()?></div>
                                                </div>
                                            </div>
                                            <div class="row col-2 profData">
                                                <div>
                                                    <h4>Last Updated DateTime </h4>
                                                </div>
                                                <div > 
                                                    <div><?php echo $profile->getLastUpdateDate()?></div>
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
            <div id="messageSecond" class="appointmentContent" >

                    <div id="messageContent2" class="popupMessage">
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
                                        <p class="vale"> <?php echo $_GET['salutation'].".".$_GET['firstName']." ".$_GET['lastName']?> </p>
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
    <script src="../../assets/js/jquery.js"></script>
    <script src="../../assets/js/toast.js"></script>
    <script src="../../assets/js/changeTheme.js"></script>

    <script src="assets/requestAppointment.js"></script>
    

    <!-- include footer section -->
    <?php BasicLoader::loadFooter('../../') ?>
</body>
</html>