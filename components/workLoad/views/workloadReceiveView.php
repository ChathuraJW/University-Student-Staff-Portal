<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="assets/workloadAllocationStyles.css">
    <link rel="stylesheet" href="../../assets/css/gridSystem.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" />
<!--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
</head>
<body>
    
    <!-- include header section -->
    <?php require('../../assets/php/basicLoader.php')?>
    <?php BasicLoader::loadHeader('../../') ?>
    
    <!-- feature body section -->
    <div class="featureBody row col-1" >
        <div style="float:left;"><button class="link" id="linkOne" check="0" onclick="scheduleCheck()">History</button><br></div>
        <div class="row col-2" id="main">

            <div>
                <!-- this div will display all the workload allocation messages for specific supportive staff member-->
                <h3 class="head">Workload Attachments</h3>
                <?php 
                    for($x=1;$x<6;$x++){
                        echo "  
                            <div class='workloadMessage' onclick='openMessage()' >
                                <div>Dr Noyel</div>
                                <div>Dear Sir There have a allocated task for you according to ...</div>
                                
                                <div style='margin-left:85%;'>2020/02/17 </div>
                            </div><br>" ;
                    }
                ?>

            </div >
                

            <div class="replyMessageViewer"><!-- View the message content of each message  -->
                <div >
                    <p class="messageView" id="messageView"  >Message Display</p>
                </div>
                
                <div id="workloadRequest"style="display:none;">
                <button class="close" style="float:right;padding-right:10px;" onclick="closeFirst()" ><i class="fa fa-times-circle" aria-hidden="true"></i></button>
                

                    <h3 class="topic">Assignment conducting for DSA</h3>
                    
                    <div class="displayingMessage">
                        <div class="label">Lecturer</div>
                        <div class="value">Dr Manju</div>
                    </div>
                    
                    <div class="displayingMessage">
                        <div class="label">Location</div>
                        <div class="value">Hall no1</div>
                    </div>
                    <div class="displayingMessage">
                        <div class="label">Date</div>
                        <div class="value">2020/02/17</div>
                    </div>
                    <div class="displayingMessage">
                        <div class="label">Time</div>
                        <div class="value">3.00 PM</div>
                    </div>
                    <div class="displayingMessage" style="margin-bottom:10px;" >
                        <div class="label">Description</div>
                        <div class="value"> Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in</div>
                    </div>
                    
                    
                </div>
                    
                
            </div>
        </div>

        
        <div class="row col-2 schedule" id="schedule" style="display:none;" ><!--display the history of the supportive staff -->
            <div>
                <h2 class='head' style="margin-bottom:20px;">My Workload</h2>
                
                <!-- style='float:right;' -->
                <?php
                // view all past workload messages of the supportive staff member
                    for($i=0;$i<5;$i++){
                        echo"
                        <div class='row col-1 workloadHistory' onclick='openMsg()'>
                            <div style='float:right;' >
                                <!--<div class='data'>Date</div>-->
                                <div >2020/2/17</div>
                            </div>
                            <div>
                                <div class='dataSet'>
                                    <div class='data left'>Lecturer</div>
                                    <div class='data right'>Dr Manju</div>
                                </div>
                                <div class='dataSet'>
                                    <div class='data left'>Title</div>
                                    <div class='data right'>Assignment conducting</div>
                                </div>
                                <div class='dataSet'>
                                    <div class='data left'>Description</div>
                                    <div class='data right'>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an<span id='dots'>...</span></div>
                                </div>
                            </div>
                        </div>
                        ";
                    }
                ?>
                <div>
                    <button class="fileDownload" onclick="getFile()"><i class="fa fa-file" aria-hidden="true"></i></button>  Download
                </div>
            </div>

            <div class="displayContent">
                <!-- display content of past workload messages  -->
                <div id="beforeMessage">
                    <p class="messageView"  >Message Display</p>
                </div>
                
                <div class="scheduleDescription" id="scheduleDescription" style="display:none;">
                    <div class="scheduleMessage">
                    <button class="close" style="float:right;padding-right:10px;" onclick="closeSecond()" ><i class="fa fa-times-circle" aria-hidden="true"></i></button>
                        <h3 class="topic">Assignment conducting for DSA</h3>
                        <div style="padding-top:40px;">
                            <div class="displayingMessage">
                                <div class="label">Lecturer</div>
                                <div class="value">Dr Manju</div>
                            </div>
                            
                            <div class="displayingMessage">
                                <div class="label">Location</div>
                                <div class="value">Hall no1</div>
                            </div>
                            <div class="displayingMessage">
                                <div class="label">Date</div>
                                <div class="value">2020/02/17</div>
                            </div>
                            <div class="displayingMessage">
                                <div class="label">Time</div>
                                <div class="value">3.00 PM</div>
                            </div>
                            <div class="displayingMessage" style="margin-bottom:10px;" >
                                <div class="label">Description</div>
                                <div class="value"> Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five</div>
                            </div>
                            <div class="displayingMessage">
                                <div class="label">Reply</div>
                                <div class="value">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        
    </div>
    <script>
      
    </script>
    

    <!-- include footer section -->
    <?php BasicLoader::loadFooter('../../') ?>
    <script src="assets/workloadReceive.js"></script>


</body>
</html>