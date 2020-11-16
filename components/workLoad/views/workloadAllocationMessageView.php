<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="assets/workloadAllocationStyles.css">
    <link rel="stylesheet" href="../../assets/css/gridSystem.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
    
    <!-- include header section -->
    <?php require('../../assets/php/basicLoader.php')?>
    <?php BasicLoader::loadHeader('../../') ?>
    
    <!-- feature body section -->
    <div class="featureBody" >
        <div class="row col-2" id="main"  >
            <div>
                
                <h3 class="head">Workload Requests</h3>
                <?php 
                    for($x=1;$x<6;$x++){
                        echo "
                        <div class='workloadRequestMessage' onclick='openMessage()' >
                            <div>Dr Noyel</div>
                            <div>Dear Sir I want to few Instructors for conduct my assignment.... </div>
                            <div style='margin-left:85%;'>2020/02/17</div>
                            
                        </div><br>" ;
                    }
                ?>

            </div >
                

            <div class="messageViewer">
                <div >
                    <p class="messageView" id="messageView">Message Display</p>
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
                        <h4 style="text-align:center;"> From</h4>
                        <h4 style="text-align:center;"> To</h4>
                        <div></div>
                        <div class="row col-2">
                            
                            <div>
                                <label for="startDate">Date</label>
                                <input class="searchInput" id="startDate" type="date" name="fromDate" require>
                            </div>

                            <div>
                                <label for="startTime">Time from</label>
                                <input type="time" class="searchInput" id="startTime"  name="startTime" require>
                            </div>
                        </div>

                        <div class="row col-2">
                            <div>
                                <label for="endDate">Date</label>
                                <input class="searchInput" id="endDate" type="date" name="endDate" require>
                            </div>

                            <div>
                                <label for="endTime">Time to</label>
                                <input type="time" class="searchInput" id="endTime"  name="endTime" require>
                            </div>
                        </div>

                        <div style="text-align:center;margin-top:25px;" >
                            <span class="searchbutton" id="search" type="button" onclick="displaySearch()" name="submit" >Search <i class="fa fa-search" aria-hidden="true"></i>
</span>
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
                <!-- style="display:none;" -->
            </div>
            <div class="allocateForm" id="allocateForm" style="display:none;">
                <h2 style="margin-top:30px;margin-bottom:20px;"class="head">Create Allocation</h2>
                <form action="" id="allocationForm" >
                    <div class="displayingMessage allocationInput">
                        <div class="lable"><label for="title">Title</label> </div>
                        <div class="value"><input class="input" type="text" id="title"></div>
                    </div>
                    <div class="displayingMessage allocationInput">
                        <div class="lable"><label for="lecturer">Lecturer</label> </div>
                        <div class="value"><input class="input" type="text" id="lecturer"></div>
                    </div>
                    <div class="displayingMessage allocationInput">
                        <div class="lable"><label for="subject">Subject</label> </div>
                        <div class="value"><input class="input" type="text" id="subject"></div>
                    </div>
                    <div class="displayingMessage allocationInput">
                        <div class="lable"><label for="date">Date</label> </div>
                        <div class="value"><input class="input" type="date" id="date"></div>
                    </div>
                    <div class="displayingMessage allocationInput">
                        <div class="lable"><label for="time">Time</label> </div>
                        <div class="value"><input class="input"type="time" id="time"></div>
                    </div>
                    <div class="displayingMessage allocationInput" >
                        <div class="lable" style="vertical-align:top;" ><label  for="discription">Discription</label></div>
                        <div class="value"><textarea class="input" type="" id="discription"></textarea></div>
                    </div>
                    <div class="row col-2">
                        <div style="text-align:center;"><input onclick="allocationCancel()"class="button cancel"type="reset" value="Cancel"></div>
                        <div style="text-align:center;"><input onclick="allocationAprove()"class="button allocate"type="button" value="Allocate"></div>
                    </div>
                </form>
            </div>
        </div>
        <div id="finalMsg" class="finalMsg" style="display:none;">
            <div class="successMsg">
            <i class="fa fa-check-circle-o correct" style="font-size: 70px;" aria-hidden="true"></i>
                <h3>Allocation Successful</h3>
            </div>
        </div>
    </div>

    <!-- include footer section -->
    <?php BasicLoader::loadFooter('../../') ?>
    <script src="assets/workloadAllocation.js"></script>

</body>
</html>