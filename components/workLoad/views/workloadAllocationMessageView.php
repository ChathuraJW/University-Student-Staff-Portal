<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="assets/workloadAllocationStyles.css">
    <link rel="stylesheet" href="../../assets/css/gridSystem.css">
<!--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" />
</head>
<body>
    
    <!-- include header section -->
    <?php require('../../assets/php/basicLoader.php')?>
    <?php BasicLoader::loadHeader('../../') ?>
    
    <!-- feature body section -->
    <div class="featureBody bodyBackground text">
    
        <!-- in this class main div is use for display workload request messages -->
        <div class="row col-2" id="main"  >
            <div>
                <!-- in this div list the all new requests -->
                <h3 class="head">Workload Requests</h3>
                <?php $records=$controllerData;?>
                <?php if(count($records)):?>

                    <?php 
                        
                        foreach($records as $record){
                            $url="?fullName=".$record->getFullName()."&workLoadDescription=".$record->getWorkLoadDescription()."&title=".$record->getTitle()."&location=".$record->getLocation()."&Date=".$record->getDate()."&fromTime=".$record->getFromTime()."&toTime=".$record->getToTime()."&salutation=".$record->getSalutation()."&requestDate=".$record->getRequestDate()."&workloadOwner=".$record->getWorkLoadOwner()."&workloadID=".$record->getWorkloadID();
                            echo "
                            <a style='text-decoration: none;'href='".$url."'  onclick='openMessage()' >
                                <div class='normalEntry'>
                                    <div>".$record->getSalutation().".".$record->getFullName()."</div>
                                    <div>".$record->getTitle()."</div>
                                    <div style='margin-left:85%;'>".$record->getRequestDate()."</div>
                                </div>
                            </a><br>" ;
                        }
                    ?>
                <?php else: ?>
                    <p>Not find to Records</p>
                <?php endif;?>
            </div >
                

            <div class="messageViewer">
                <!-- this div will display the content of the message when click on above message -->
                <div >
                    <p class="messageView" id="messageView">Message Display</p>
                </div>
                
                <?php if(isset($_GET['fullName'])):?>
                    <style>
                        .messageView{
                            display:none;
                        }
                    </style>
                    <div id="workloadRequest">
                        <h3 class="topic"><?php echo $_GET['title']?></h3>
                        <!-- here list all information -->
                        <div class="displayingMessage">
                            <div class="label">Lecturer</div>
                            <div class="value"><?php echo $_GET['fullName']?></div>
                        </div>
                        
                        <div class="displayingMessage">
                            <div class="label">Location</div>
                            <div class="value"><?php echo $_GET['location']?></div>
                        </div>
                        <div class="displayingMessage">
                            <div class="label">Date</div>
                            <div class="value"><?php echo $_GET['Date']?></div>
                        </div>
                        <div class="displayingMessage">
                            <div class="label">From Time</div>
                            <div class="value"><?php echo $_GET['fromTime']?></div>
                        </div>
                        <!-- <div class="displayingMessage">
                            <div class="label">To Date</div>
                            <div class="value"><?php echo $_GET['toDate']?></div>
                        </div> -->
                        <div class="displayingMessage">
                            <div class="label">To Time</div>
                            <div class="value"><?php echo $_GET['toTime']?></div>
                        </div>
                        <div class="displayingMessage" style="margin-bottom:10px;" >
                            <div class="label">Description</div>
                            <div class="value"> <?php echo $_GET['workLoadDescription']?></div>
                        </div>
                        <div style="margin-top:10px;"class="displayingMessage">
                            <div  class="label"><button  class="button" onclick="messageClose()">Cancel</button></div>
                            <div style="text-align:center;" class="value"> <button class="button" onclick="allocation()">Allocate</button></div>
                        </div>
                    </div>
                <?php endif; ?>    
                
            </div>
        </div>

        <div class="row col-2" id="secondaryMain" style="display:none;">
        <!-- if we decide to allocate few supportive members, then this div will display. And also we can the allocating message for the each member -->

            <div class="searchMembers"><!--from this div we can display search free time available supportive members -->
                
                <form id="allocationForm" class="search" id="search" method="post"action="">
                    <h2 style="margin-top:30px;margin-bottom:20px;" class="head">Select Members</h2>
                    <div class="row col-2">
                        
                        
                        <!-- <div></div> -->
                        <div>
                            <!-- <div><h4 style="text-align:center;"> From</h4></div> -->
                            <div class="row col-2">
                                <label class="searchLabel" for="startDate">Date</label>
                                <input class="searchInput" id="startDate" type="date" value="<?php echo $_GET['Date']?>" name="fromDate" require>
                            </div>

                            
                        </div>

                        <div>
                            <!-- <h4 style="text-align:center;"> To</h4>
                            <div class="row col-2">
                                <label class="searchLabel" for="endDate">Date</label>
                                <input class="searchInput" id="endDate" type="date" value="<?php echo $_GET['toDate']?>"  name="toDate" require>
                            </div> -->
                            <div class="row col-2">
                                <label class="searchLabel" for="startTime">From Time</label>
                                <input type="time" class="searchInput" id="startTime" value="<?php echo $_GET['fromTime']?>"   name="startTime" require>
                            </div>
                            <div class="row col-2">
                                <label class="searchLabel" for="endTime">Time Time</label>
                                <input type="time" class="searchInput" id="endTime"  name="toTime" value="<?php echo $_GET['toTime']?>"  require>
                            </div>
                        </div>
                        <div></div>
                        <div style="text-align:center;width:80px;margin-left:25%;" >
                            <button class="button searchButton" id="search" type="button" onclick="displaySearch()" name="submit" >Search <i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </form>
            
                <div> 
                    <p id="preMessage" class="messageView" id="">Search Members</p>
        <form action="" method="post" id="allocationForm" >
                        <div id="searchStaff" style="color:black;display:none;"><!-- here display the all supportive staff free in mentioned time slot -->
                            <!-- <form action="" id="searchForm"method="post"> -->
                                <div style="margin-top:10px;color:black;">If You Want Select More Than One Member Select Members with Pressing CTRL Button</div>
                                <?php
                                    // for($i=1;$i<12;$i++){
                                        // echo 
                                        //     "<div class='member' >
                                        //         <label class='supportMemberSalutation' for='member' id=''></label>.<label class='supportMember' for='member' id=''></label>
                                        //         <input class='memberLabel memberInput'  type='checkbox' id='member' name='member' require><br>
                                        //     </div>";
                                    // }
                                    echo "
                                        <select class='memberSearch' name='members[]' id='searchMembersOptions' multiple ></select>
                                        
                                        ";
                                    
                                ?>
                                <div class="row col-2">
                                    <div style="text-align:center;"><input onclick='deallocateForm()' class="button"type="reset" value="Cancel"></div>
                                    <div style="text-align:center;"><input onclick='allocationForm()' class="button "type="button" value="Allocate"></div>
                                </div>

                            <!-- </form> -->
                        </div>
                </div>
                <!-- style="display:none;" -->
            </div>
            <div class="allocateForm" id="allocateForm" style="display:none;">
                <h2 style="margin-top:30px;margin-bottom:20px;"class="head">Create Allocation</h2>
                <!-- <form action="" id="allocationForm" > in this div containing the allocation message form -->
                    <input type="hidden" name="workloadID" value="<?php echo $_GET['workloadID']?>">
                    <div class="displayingMessage allocationInput">
                        <div class="label"><label for="title">Title</label> </div>
                        <div class="value"><input class="input" type="text" value="<?php echo $_GET['title']?>" id="title"></div>
                    </div>
                    <div class="displayingMessage allocationInput">
                        <div class="label"><label for="lecturer">Lecturer</label> </div>
                        <div class="value"><input class="input" type="text" value="<?php echo $_GET['fullName']?>" id="lecturer"></div>
                    </div>
                    <div class="displayingMessage allocationInput">
                        <div class="label"><label for="location">Location</label> </div>
                        <div class="value"><input class="input" type="text" value="<?php echo $_GET['location']?>" id="location"></div>
                    </div>
                    <div class="displayingMessage allocationInput">
                        <div class="label"><label for="Date">From Date</label> </div>
                        <div class="value"><input class="input" type="date" value="<?php echo $_GET['Date']?>" id="Date"></div>
                    </div>
                    <div class="displayingMessage allocationInput">
                        <div class="label"><label for="fromTime">From Time</label> </div>
                        <div class="value"><input class="input"type="time" value="<?php echo $_GET['fromTime']?>" id="fromTime"></div>
                    </div>
                    <div class="displayingMessage allocationInput">
                        <div class="label"><label for="toTime">To Time</label> </div>
                        <div class="value"><input class="input"type="time" value="<?php echo $_GET['toTime']?>" id="toTime"></div>
                    </div>
                    <div class="displayingMessage allocationInput" >
                        <div class="label" style="vertical-align:top;" ><label  for="description">Description</label></div>
                        <div class="value"><textarea class="input" type="" value="" id="description"><?php echo $_GET['workLoadDescription']?></textarea></div>
                    </div>
                    <div class="row col-2">
                        <div style="text-align:center;"><input onclick="allocationCancel()"class="button "type="reset" value="Cancel"></div>
                        <div style="text-align:center;"><input class="button " type="submit" name="setMembers"value="Allocate"></div>
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
    <script src="../../assets/js/jquery.js">
    <script src="../../assets/js/toast.js"></script>
    <script src="assets/workloadAllocation.js"></script>
    <script src="../../assets/js/changeTheme.js"></script>


</body>
</html>