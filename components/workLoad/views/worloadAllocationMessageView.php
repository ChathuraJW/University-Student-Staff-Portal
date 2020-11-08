<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="../../assets/css/workloadAllocationStyles.css">
    <link rel="stylesheet" href="../../assets/css/gridSystem.css">
</head>
<body>
    
    <!-- include header section -->
    <?php require('../../assets/php/basicLoader.php')?>
    <?php BasicLoader::loadHeader('../../') ?>
    
    <!-- feature body section -->
    <div class="featureBody" >
        <div class="row col-2" id="main" >
            <div>
                
                <h3 class="head">Workload Requests</h3>
                <?php 
                    for($x=1;$x<6;$x++){
                        echo "<button class='workloadMessage' onclick='openMessage()' href=''>Message ".$x."</button><br>" ;
                    }
                ?>

            </div >
                

            <div class="messageViewer">
                <div >
                    <p class="messageView" id="messageView">Message Display</p>
                </div>
                
                <div id="workloadRequest"style="display:none;">
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
                    <div class="displayingMessage">
                        <div class="lable">Description</div>
                        <div class="value"> Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in</div>
                    </div>
                    <div style="margin-top:10px;"class="displayingMessage">
                        <div  class="lable"><button  class="button cancel" onclick="messageClose()">Cancel</button></div>
                        <div style="text-align:center;" class="value"> <button class="button allocate" onclick="allocation()">Allocate</button></div>
                    </div>
                </div>
                    
                
            </div>
        </div>

        <div class="row col-2" id="Bmain" style="display:none;">
            <div class="searchMembers">
                <h2 style="margin-top:30px;margin-bottom:20px;" class="head">Select Members</h2>
                <form class="search" action="">
                    <div class="row col-3">
                        <div>
                            <label for="date">Date</label>
                            <input id="date" type="date" name="date" >
                        </div>

                        <div>
                            <label for="time">Time Pieriod</label>
                            <input id="time" type="time" name="time" >
                        </div>

                        <div style="text-align:center;" >
                            <input class="searchbutton" id="search" type="button" onclick="displaySearch()" name="submit" value="Search">
                        </div>
                    </div>
                </form>
            
                <div  >
                    <p id="preMessage" class="messageView" id="">Search Members</p>

                    <div id="searchStaff" style="display:none;">
                        <form action="" id="searchForm"method="post">
                            <?php
                                for($i=1;$i<12;$i++){
                                    echo 
                                        "<div class='member' >
                                            <label  for='member'>Staff Member".$i."</label>
                                            <input class='memberLable memberInput'  type='checkbox' id='member' name='member' require><br>
                                        </div>";
                                        
                                }
                            ?>
                            <div class="row col-2">
                                <div style="text-align:center;"><input onclick='deallocationForm()' class="button cancel"type="reset" value="Cancel"></div>
                                <div style="text-align:center;"><input onclick='allocationForm()' class="button allocate"type="button" value="Allocate"></div>
                            </div>
                        </form>
                    </div>
                </div>
                
            </div>
            <div class="allocateForm" id="allocateForm" style="display:none;">
                <h2 style="margin-top:30px;margin-bottom:20px;"class="head">Create Allocation</h2>
                <form action="" id="allocationForm" >
                    <div class="displayingMessage">
                        <div class="lable"><label for="title">Title</label> </div>
                        <div class="value"><input type="text" id="title"></div>
                    </div>
                    <div class="displayingMessage">
                        <div class="lable"><label for="lecturer">Lecturer</label> </div>
                        <div class="value"><input type="text" id="lecturer"></div>
                    </div>
                    <div class="displayingMessage">
                        <div class="lable"><label for="subject">Subject</label> </div>
                        <div class="value"><input type="text" id="subject"></div>
                    </div>
                    <div class="displayingMessage">
                        <div class="lable"><label for="date">Date</label> </div>
                        <div class="value"><input type="date" id="date"></div>
                    </div>
                    <div class="displayingMessage">
                        <div class="lable"><label for="time">Time</label> </div>
                        <div class="value"><input type="time" id="time"></div>
                    </div>
                    <div class="displayingMessage">
                        <div class="lable"><label for="discription">Discription</label> </div>
                        <div class="value"><textarea type="" id="discription"></textarea></div>
                    </div>
                    <div class="row col-2">
                        <div style="text-align:center;"><input onclick="allocationCancel()"class="button cancel"type="reset" value="Cancel"></div>
                        <div style="text-align:center;"><input onclick="allocationAprove()"class="button allocate"type="submit" value="Allocate"></div>
                    </div>
                </form>
            </div>
        </div>
        <div id="finalMsg" class="finalMsg" style="display:none;">
            <div class="successMsg">
                <h3>Allocation Successful</h3>
            </div>
        </div>
    </div>
    <script>
        function allocationCancel(){
            document.getElementById("allocateForm").style.display='none';
        }
        function allocationForm(){
                var checkBox=document.getElementsByClassName("memberInput");
                var i;
                var check=0;
                for(i=0;i<checkBox.length;i++){
                    if(checkBox[i].checked == true) {
                        check++;
                    }
                }
                if(check>0) {
                        document.getElementById("allocateForm").style.display='';
                    }else{
                        window.alert("Please select members!");
                    }
            
            

        }
        function deallocationForm(){
            document.getElementById("allocationForm").reset();
            document.getElementById("allocateForm").style.display="none";
            document.getElementById("Bmain").style.display="none";
            document.getElementById("main").style.display="";
            
        }
        function displaySearch(){
            document.getElementById("preMessage").style.display="none";
            document.getElementById("searchStaff").style.display="";
            document.getElementById("searchForm").reset();
            
        }
        function openMessage(){
            document.getElementById("messageView").style.display="none";
            document.getElementById("workloadRequest").style.display="";
        }
        function allocation(){
            document.getElementById("searchStaff").style.display="none";
            document.getElementById("main").style.display="none";
            document.getElementById("Bmain").style.display="";
        }
        function messageClose(){
            document.getElementById("messageView").style.display="";
            document.getElementById("workloadRequest").style.display="none";
        }
        function allocationAprove(){
            
                document.getElementById("allocateForm").style.display="none";
                document.getElementById("searchStaff").style.display="none";
            document.getElementById("main").style.display="";
            document.getElementById("finalMsg").style.display="";
            setTimeout(function(){
                document.getElementById("finalMsg").style.display="none";
            }, 3000);
        }
        

    </script>
    

    <!-- include footer section -->
    <?php BasicLoader::loadFooter('../../') ?>
</body>
</html>