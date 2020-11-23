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
    <div class="featureBody" >
        
        <div id="tabFirst" class="row col-2 tabContaint" >
            <div>
                <div class="subTab newAppointments">
                    <div class="row col-1">
                        <h2 id="head" >New Appointments</h2>
                    </div>
                    <div class="list" >

                        <?php 
                            $records=$controllerData[1];
                            $category1="new";
                        
                            if(count($records)){
                            
                            foreach($records as $record){
                                
                                
                                $url="?appointID=".$record['appointmentID']."&category1=".$category1."&studentID=".$record['studentID']."&title=".$record['title']."&message=".$record['message']."&duration=".$record['meetingDuration']."&time=".$record['timestamp']."&isApproved=".$record['isApproved']."&type=".$record['type']."&validity=".$record['requesValidity'];
                                if($record['type']==5100){ 
                                    $background= "linear-gradient(to bottom right, rgb(130, 164, 182),white)";
                                }
                                elseif($record['type']==5200){
                                    $background= "linear-gradient(to bottom right, rgb(255, 254, 183),white)";
                                }
                                elseif($record['type']==5300){
                                    $background= "linear-gradient(to bottom right, rgb(231, 179, 208),white)";
                                }
                                else{
                                    $background= "linear-gradient(to bottom right, #e7e8e9,white)";
                                }

                                echo("
                                    <div class='row col-1' onclick='close()'>
                                        <a href='".$url."' id='".$record['appointmentID']."' class='appointment respond' style='background:$background;' ><div class='appointmentDescription messageHead'>".$record['title']."</div><br><div class='appointmentDescription'>".substr($record['message'], 0, 80).".....</div><div class='appointmentDescription'style='float:right;'> <i class='fa fa-clock-o' aria-hidden='true'></i>
                                        ".$record['timestamp']."</div></a><br>
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
                                    
                                    $url2="?appointID=".$data['appointmentID']."&category2=".$category2."&studentID=".$data['studentID']."&title=".$data['title']."&message=".$data['message']."&duration=".$data['meetingDuration']."&time=".$data['timestamp']."&isApproved=".$data['isApproved']."&type=".$data['type']."&validity=".$data['requesValidity'];
                                        
                                    echo("
                                        <div class='row col-1'>
                                        
                                            <a href='".$url2."' id='".$data['isApproved']."' class='appointment' ><div class='appointmentDescription messageHead'>".$data['title']."</div><br><div class='appointmentDescription'>".substr($data['message'], 0, 80).".....</div><div class='appointmentDescription'style='float:right;'> <i class='fa fa-clock-o' aria-hidden='true'></i>
                                            ".$data['timestamp']."</div></a><br>
                                        
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
                                            background: linear-gradient(to bottom right, rgb(189, 247, 189),white);
                                        }
                                        #A:hover{
                                            background: linear-gradient(to bottom right, #8af18a,white);
                                        }
                                        #R{
                                            background: linear-gradient(to bottom right, rgb(238, 170, 183),white);
                                        }
                                        #R:hover{
                                            background: linear-gradient(to bottom right, #f18a8a,white);
                                        }
                                    </style>
                                ");
                            
                        ?>
                    </div>
                </div>
            </div>
            <div style="min-height:650px;">
                
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
                                                <p class="vale"> <?php echo $_GET['time']?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <form action="" method="post">
                                    <div class="ttl">
                                        <div class="row col-1">
                                            
                                                <input class="reply" type="text" id="" name="reply" placeholder="Reply"><br>
                                            
                                        </div>
                                    </div>
                                    <div style="display:table;width:100%;">
                                        <div class="row col-2">
                                            <div>
                                                <input hidden type="text"   name="appointmentID" value="<?php echo $_GET['appointID']?>">
                                                <input id="btn1" class="btn" type="submit" name="approve" value="Approve">
                                            </div>
                                            <div>
                                                <input id="btn2" class="btn" type="submit"  name="reject" value="Reject">
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
                    <div id="message2" class="appointmentMessage"  >
                        <div id="messageContent2" class="content">
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