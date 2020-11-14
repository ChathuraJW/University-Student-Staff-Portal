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
    <div class="featureBody row col-1" >
        <div style="float:left;"><button class="link" onclick="scheduleCheck()">History</button><br></div>
        <div class="row col-2" id="main">

            <div>
                
                <h3 class="head">Workload Attachments</h3>
                <?php 
                    for($x=1;$x<6;$x++){
                        echo "  
                            <div class='workloadMessage' onclick='openMessage()' >
                                <p>Dear Sir There have a allocated task for you according to ...</p>
                                
                                2020/02/17 
                            </div><br>" ;
                    }
                ?>

            </div >
                

            <div class="replyMessageViewer">
                <div >
                    <p class="messageView" id="messageView"  >Message Display</p>
                </div>
                
                <div id="workloadRequest"style="display:none;">
                    <h3 class="topic">Assignment conducting for DSA</h3>
                    
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
                    
                    
                </div>
                    
                
            </div>
        </div>

        
        <div class="schedule" id="schedule" style="display:none;" >
            <h2 class='head' style="margin-bottom:20px;">My Workload</h2>
            
            <!-- style='float:right;' -->
            <?php
                for($i=0;$i<5;$i++){
                    echo"
                    <div class='row col-1 workloadHistory'>
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
                                <div class='data left'>Discription</div>
                                <div class='data right'>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an<span id='dots'>...</span><span id='more' style='display: none;'> unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in</span><span attribute='0' id='link' onclick='read('dots','more','link');'>Read more</span></div>
                            </div>
                        </div>
                    </div>
                    ";
                }
            ?>
            <!-- <div>
                <button onclick="getFile()">Save File</button>
            </div> -->
            
            <div class="scheduleDescription" id="scheduleDescription" style="display:none;">
                <div class="scheduleMessage">
                <span class="close" style="float:right;padding-right:10px;" onclick="close()" >&times;</span>

                    <div style="padding-top:40px;">
                        <!-- <i class="fa fa-times" style="float:right;padding-right:10px;" onMouseClick="close()" aria-hidden="true"></i> -->
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
        // function getFile() {
        //     let sTable = document.getElementsByClassName('workloadHistory').innerHTML;
        //     var i;
        //     let style = "<style>";
        //     style = style + "table {width: 100%;font: 16px Times New Roman;}";
        //     style = style + "table, th, td {border: solid 1px #DDD; border-collapse: collapse;";
        //     style = style + "padding: 2px 3px;text-align: center;}";
        //     style = style + "</style>";

        //     let printWindow = window.open('', '', 'height=700,width=700');
        //     printWindow.document.write('<html><head><title>Workload History</title>');
        //     printWindow.document.write(style);
        //     printWindow.document.write('</head><body>');
        //     for(i=0;i<5;i++){
        //         printWindow.document.write(sTable[i]);
        //     }
        //     printWindow.document.write('</body></html>');
        //     printWindow.document.close();
        //     printWindow.print();
        // }

        function read(dots, more, link) {
            // var dots = document.getElementById("dots");
            // var more = document.getElementById("more");
            // var link = document.getElementById("link");

            if (document.getElementById(link).getAttribute('attribute') == 1) {
                document.getElementById(link).setAttribute('attribute',0);
                document.getElementById(dots).style.display = "inline";
                document.getElementById(link).innerHTML = "Read more"; 
                document.getElementById(more).style.display = "none";
            } else {
                document.getElementById(link).setAttribute('attribute',1);
                document.getElementById(dots).style.display = "none";
                document.getElementById(link).innerHTML = "Read less"; 
                document.getElementById(more).style.display = "inline";
            }
            }
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