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
        
        <div id="tabFirst" class="row col-2 tabContaint" >
            <div>
                <div class="subTab newAppointments">
                    <div class="row col-1">
                        <h2 id="head" >New Appointments</h2>
                    </div>
<!--                    In this div will list all the new appointments-->
                    <div class="list" >

                        <?php 
                            $records=$controllerData[1];
                            $category1="new";
                        
                            if(count($records)){
                            
                            foreach($records as $record){
                                
                                
                                $url="?appointID=".$record->getAppointmentID()."&category1=".$category1."&studentID=".$record->getStudentID()."&title=".$record->getTitle()."&message=".$record->getMessage()."&duration=".$record->getMeetingDuration()."&time=".$record->getAppointmentTime()."&date=".$record->getAppointmentDate()."&isApproved=".$record->getIsApproved()."&type=".$record->getType()."&validity=".$record->getRequestValidity();
                                if($record->getTitle()==5100){ 
                                    $background= "8px solid rgb(130, 164, 182)";
                                }
                                elseif($record->getTitle()==5200){
                                    $background= "8px solid rgb(255, 254, 183)";
                                }
                                elseif($record->getTitle()==5300){
                                    $background= "8px solid rgb(231, 179, 208)";
                                }
                                else{
                                    $background= "8px solid #e7e8e9";
                                }

                                echo("
                                    <div class='row col-1' onclick='close()'>
                                        <a href='".$url."' id='".$record->getAppointmentID()."' class='appointment respond' style='border-left:$background;' ><div class='appointmentDescription messageHead'>".$record->getTitle()."</div><br><div class='appointmentDescription'>".substr($record->getMessage(), 0, 80).".....</div><div class='appointmentDescription'style='float:right;'> <i class='fa fa-clock-o' aria-hidden='true'></i>
                                        ".$record->getTimestamp()."</div></a><br>
                                    </div>
                                ");
                                
                            }
                            }
                            else{
                                echo("<p>Not find to Records</p>");
                            }
                            
                        ?>
                    </div>
                </div>
<!--            In this div will list all the replied appointments-->
                <div class="subTab previousAppointments">
                    <div class="row col-1">
                        <h2 id="head">Replied History</h2>
                    </div>
                    <div class="list" >
                        <?php 
                            $dataSet=$controllerData[0];
                            $category2="history";
                        
                            if(count($dataSet)){
                            
                                foreach($dataSet as $data){ 
                                    
                                    $url2="?appointID=".$data->getAppointmentID()."&category2=".$category2."&studentID=".$data->getStudentID()."&title=".$data->getTitle()."&message=".$data->getMessage()."&duration=".$data->getMeetingDuration()."&time=".$data->getAppointmentTime()."&date=".$data->getAppointmentDate()."&isApproved=".$data->getIsApproved()."&type=".$data->getType()."&validity=".$data->getRequestValidity();
                                        
                                    echo("
                                        <div class='row col-1'>
                                        
                                            <a href='".$url2."' id='".$data->getIsApproved()."' class='appointment' ><div class='appointmentDescription messageHead'>".$data->getTitle()."</div><br><div class='appointmentDescription'>".substr($data->getMessage(), 0, 80).".....</div><div class='appointmentDescription'style='float:right;'> <i class='fa fa-clock-o' aria-hidden='true'></i>
                                            ".$data->getTimestamp()."</div></a><br>
                                        
                                        </div>
                                    ");
                                }
                            }
                            else{
                                echo("<p>Not find to Records</p>");
                            }
                            
                            
                                echo("
                                    <style>
                                        #A{
                                            border-left: 8px solid var(--successColor);
                                        }
                                        #R{
                                            border-left:8px solid var(--dangerColor);
                                        }
                                    </style>
                                ");
                        
                        ?>
                    </div>
                </div>
            </div>
            <div style="min-height:650px;">
<!--                In here display the new appointment with the details and get a reply as a input-->
                <?php if(isset($_GET['category1'])):?>
                    <div>
                        <div id="messageFirst" class="appointmentMessage"  >
                            <div id="messageContent1"class="content">
                                <div class="row col-1">
                                    <h4 class="topicNew"><?php echo $_GET['title']?></h4>
                                </div>
                                <div class="descriptionDetails">
                                    <div class="ttl">
                                        <div class="row col-2">
                                            <div>
                                                <p id="i" class="vale" style="font-weight:bold;">From </p>
                                            </div>
                                            <div>
                                                <p class="vale">  <?php echo $_GET['studentID']?></p>
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
                                                <p id="i" class="vale" style="font-weight:bold;">Duration </p>
                                            </div>
                                            <div>
                                                <p class="vale">  <?php echo $_GET['duration']?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ttl">
                                        <div class="row col-2">
                                            <div>
                                                <p id="i" class="vale" style="font-weight:bold;">Date </p>
                                            </div>
                                            <div>
                                                <p class="vale"> <?php echo $_GET['date']?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ttl">
                                        <div class="row col-2">
                                            <div>
                                                <p id="i" class="vale" style="font-weight:bold;">Time </p>
                                            </div>
                                            <div>
                                                <p class="vale"> <?php echo $_GET['time']?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <form action="" method="post">
                                    <div class="ttl">
                                        <div class="row col-1">
                                            
                                                <textarea style="background-color:var(--entryBackgroundColor);"class="reply" type="textarea" id="" name="reply" placeholder="Reply"></textarea>
                                            
                                        </div>
                                    </div>
                                    <div style="display:table;width:100%;">
                                        <div class="row col-2">
                                            <div>
                                                <input hidden type="text"   name="appointmentID" value="<?php echo $_GET['appointID']?>">
                                                <input id="btn1" class="button" type="submit" name="approve" value="Approve">
                                            </div>
                                            <div>
                                                <input id="btn2" class="button" type="submit"  name="reject" value="Reject">
                                            </div>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                <?php elseif(isset($_GET['category2'])):?>
                    <?php
                        if($_GET['isApproved']=='A'){
                            $isApproved='Approved';
                        } 
                        else{
                            $isApproved='Rejected';
                        }   
                    ?>
<!--                this div will display a replied appointments in detail-->
                    <div id="message2" class="appointmentMessage" >
                        <div id="messageContent2" class="content" style="background-color:var(--entryBackgroundColor);">
                            <span class="close"onclick="remove('message2')">&times;</span>
                            <div class="row col-1">
                                <h4 class="topicHistory"><?php echo $_GET['title']?></h4>
                            </div>
                            <div class="descriptionDetails">
                                <div class="ttl">
                                    <div class="row col-2">
                                        <div>
                                            <p id="i" class="vale" style="font-weight:bold;">From </p>
                                        </div>
                                        <div>
                                            <p class="vale">  <?php echo $_GET['studentID']?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="ttl">
                                    <div class="row col-2">
                                        <div>
                                            <p id="i" class="vale" style="font-weight:bold;">Message </p>
                                        </div>
                                        <div>
                                            <p class="vale"><?php echo $_GET['message']?></p>
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
                                            <p id="i" class="vale" style="font-weight:bold;">Date </p>
                                        </div>
                                        <div>
                                            <p class="vale"> <?php echo $_GET['date']?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="ttl">
                                    <div class="row col-2">
                                        <div>
                                            <p id="i" class="vale" style="font-weight:bold;">Time </p>
                                        </div>
                                        <div>
                                            <p class="vale"> <?php echo $_GET['time']?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row col-1">
                                    <p style="font-weight:bold;"><?php echo $isApproved?></p>
                                </div>
                            </div>
                        </div>
                    </div>



                <?php else:?>
                    <div id="default"class="default">
                        <p id="firstMessage" class="firstMessage">
                            Message display
                        </p>
                    </div>
                <?php endif;?>

            </div>
        </div>
        
        
    </div>
    <!-- <p id="demo" onclick="myFunction()">Click me to change my text color.</p> -->
    <script src="../../assets/js/jquery.js"></script>
    <script src="../../assets/js/toast.js"></script>
    <script src="../../assets/js/changeTheme.js"></script>
    <script>
        function close(){
            document.getElementById("default").style.display = "none";
        }
        function remove(message){
            document.getElementById(message).style.display = "none";
            window.location.href=document.location.href.toString().split('respondAppointment')[0]+'respondAppointment';

        }
        
    </script>
    <!-- include footer section -->
    <?php BasicLoader::loadFooter('../../') ?>
</body>

</html>