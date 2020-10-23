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
        
        <div id="tab1" class="row col-2 tabcontaint" >
            <div class="subTab">
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
                                
                            echo("
                                <div class='row col-1'>
                                    <a href='".$url."' id='".$record['appointmentID']."' class='appointment' ><p class='appointmentDescription'>".$record['title']."</p></a><br>
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
            
            <div class="subTab">
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
                                    
                                        <a href='".$url2."' id='".$data['isApproved']."' class='appointment' ><p class='appointmentDescription'>".$data['title']."</p></a><br>
                                    
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
            </div>
            
        </div>
        
        <?php if(isset($_GET['category1'])):?>
                <div id="message1" class="appointmentMessage"  >
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
            <?php endif;?>

        <?php if(isset($_GET['category2'])):?>
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
        <?php endif;?>


    </div>
    <!-- <p id="demo" onclick="myFunction()">Click me to change my text color.</p> -->

    <script>
        
        function remove(message){
            document.getElementById(message).style.display = "none";
            window.location.href=document.location.href.toString().split('respondAppointment')[0]+'respondAppointment';

        }
        
    </script>
    <!-- include footer section -->
    <?php require('../../assets/php/commonFooter.php')?>
</body>

</html>