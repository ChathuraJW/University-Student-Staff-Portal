<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="../../assets/css/workloadAllocationStyles.css">
    <link rel="stylesheet" href="../../assets/css/gridSystem.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    
    <!-- include header section -->
    <?php require('../../assets/php/basicLoader.php')?>
    <?php BasicLoader::loadHeader('../../') ?>
    
    <!-- feature body section -->
    <div class="featureBody" >
        <div class="row col-2" id="main">

            <div>
                
                <h3 class="head">Workload Attachments</h3>
                <?php 
                    for($x=1;$x<6;$x++){
                        echo "<button class='workloadMessage' onclick='openMessage()' href=''>Message ".$x."</button><br>" ;
                    }
                ?>

            </div >
                

            <div class="replyMessageViewer">
                <div >
                    <p class="messageView" id="messageView"  >Message Display</p>
                </div>
                
                <form id="workloadRequest"style="display:none;">
                    <button class="link" onclick="scheduleCheck()">Check Schedule</button><br>
                    <h3 class="topic">Title</h3>
                    
                    <div class="displayingMessage">
                        <div class="lable">Lecturer</div>
                        <div class="value">Dr Manju</div>
                    </div>
                    
                    <div class="displayingMessage">
                        <div class="lable">Location</div>
                        <div class="value">Hall no1</div>
                    </div>
                    <div class="displayingMessage">
                        <div class="lable">Date</div>
                        <div class="value">2020/02/17</div>
                    </div>
                    <div class="displayingMessage">
                        <div class="lable">Time</div>
                        <div class="value">3.00 PM</div>
                    </div>
                    <div class="displayingMessage" style="margin-bottom:10px;" >
                        <div class="lable">Description</div>
                        <div class="value"> Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in</div>
                    </div>
                    <div class="displayingMessage">
                        <div class="lable"  style="vertical-align:top;">Reply</div>
                        <div class="value"><textarea class="input" type="" id="discription"></textarea></textarea></div>
                    </div>
                    <div style="margin-top:10px;"class="displayingMessage">
                        <div  class="lable"><button  class="button reject" onclick="messageClose()">Reject</button></div>
                        <div style="text-align:center;" class="value"> <button class="button accept" onclick="allocation()">Accept</button></div>
                    </div>
                </form>
                    
                
            </div>
        </div>

        <div id="finalMsg" class="finalMsg" style="display:none;" >
            <div class="successMsg">
    
            <i class="fa fa-check-circle-o correct" style="font-size: 70px;" aria-hidden="true"></i>
                <h3>Allocation Successful</h3>
            </div>
        </div>
        <div class="schedule" id="schedule" style="display:none;" >
            <h2 class='head' style="margin-bottom:20px;">My Workload</h2>
                    
            <?php
                for($i=0;$i<5;$i++){
                    echo"
                    <div class='workloadHistory' onclick='openMsg()'>
                        
                        <div class='dataSet' style='float:right;'>
                            <div class='data'>Date</div>
                            <div class='data'>2020/2/17</div>
                        </div>
                        <div class='dataSet'>
                            <div class='data'>Lecturer</div>
                            <div class='data'>Dr Manju</div>
                        </div>
                        <div class='dataSet'>
                            <div class='data'>Subject</div>
                            <div class='data'>Subject </div>
                        </div>
                    </div>
                    ";
                }
            ?>
            <div class="scheduleDescription" style="display:none;">
                <div class="scheduleMessage">
                    <div style="padding-top:40px;">
                        <i class="fa fa-times" style="float:right;" onclick="close()" aria-hidden="true"></i>
                        <div class="displayingMessage">
                            <div class="lable">Lecturer</div>
                            <div class="value">Dr Manju</div>
                        </div>
                        
                        <div class="displayingMessage">
                            <div class="lable">Location</div>
                            <div class="value">Hall no1</div>
                        </div>
                        <div class="displayingMessage">
                            <div class="lable">Date</div>
                            <div class="value">2020/02/17</div>
                        </div>
                        <div class="displayingMessage">
                            <div class="lable">Time</div>
                            <div class="value">3.00 PM</div>
                        </div>
                        <div class="displayingMessage" style="margin-bottom:10px;" >
                            <div class="lable">Description</div>
                            <div class="value"> Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five</div>
                        </div>
                        <div class="displayingMessage">
                            <div class="lable">Reply</div>
                            <div class="value">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <script>
        function openMsg(){
            document.getElementById("scheduleDescription").style.display="";

        }
        function close(){
            document.getElementById("scheduleDescription").style.display="none";
        }
        function scheduleCheck(){
            document.getElementById("main").style.display="none";
            // document.getElementById("messageView").style.display="none";
            document.getElementById("schedule").style.display="";
        }
        function openMessage(){
            document.getElementById("messageView").style.display="none";
            document.getElementById("workloadRequest").style.display="";
        }
        
        function messageClose(){
            document.getElementById("messageView").style.display="";
            document.getElementById("workloadRequest").style.display="none";
        }
        function allocation(){
            // document.getElementById("workloadRequest").reset();
            document.getElementById("finalMsg").style.display="";
            setTimeout(function(){
                document.getElementById("workloadRequest").style.display="none";
                document.getElementById("messageView").style.display="";
                document.getElementById("finalMsg").style.display="none";

                }, 2000);
        }
    
    </script>
    

    <!-- include footer section -->
    <?php BasicLoader::loadFooter('../../') ?>
</body>
</html>