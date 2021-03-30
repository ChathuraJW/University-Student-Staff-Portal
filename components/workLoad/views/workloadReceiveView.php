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
    <div class="featureBody row col-1  bodyBackground text" >
        <div style="float:left;"><button class="button link" id="linkOne" check="0" onclick="scheduleCheck()">History</button><br></div>
        <div class="row col-2" id="main">

        <?php $records=$controllerData[0];?>
        
            <div>
                <!-- this div will display all the workload allocation messages for specific supportive staff member-->
                <h3 class="head">Workload Attachments</h3>
                <?php if(count($records)):?>
                <?php 
                    foreach($records as $record){
                        // $url="?fullName=".$record->getFullName()."&workLoadDescription=".$record->getWorkLoadDescription()."&title=".$record->getTitle()."&location=".$record->getLocation()."&Date=".$record->getDate()."&fromTime=".$record->getFromTime()."&toTime=".$record->getToTime()."&salutation=".$record->getSalutation()."&fullName=".$record->getFullName()."&requestDate=".$record->getRequestDate();
                        $title=$record->getTitle();
                        $name=$record->getFullName();
                        $location=$record->getLocation();
                        $date=$record->getDate();
                        $fromTime=$record->getFromTime();
                        $toTime=$record->getToTime();
                        $description=$record->getWorkLoadDescription();
                        $workloadID=$record->getWorkloadID();
                        echo " 
                            <div class=' normalEntry' onclick='openMessage(`$title`,`$name`,`$location`,`$date`,`$fromTime`,`$toTime`,`$description`,`$workloadID`)' >
                                <div>".$record->getFullName()."</div>
                                <div>".$record->getTitle()."</div>
                                
                                <div style='margin-left:80%;'>".$record->getRequestDate()."</div>
                            </div><br>
                        " ;
                    }
                ?>
                <?php else: ?>
                    <p style="margin-left:30%;margin-top:50%;">Records not found</p>
                <?php endif;?>

            </div >
        
     

            <div class="replyMessageViewer"><!-- View the message content of each message  -->
                <div >
                    <p class="messageView" id="messageView"  >Message Display</p>
                </div>
                
                    <div id="workloadRequest" style="display:none;">
                        <button class="close" style="float:right;padding-right:10px;" onclick="closeFirst()" ><i class="fa fa-times-circle" aria-hidden="true"></i></button>
                    

                        <h3 class="topic" id="oldTitle"></h3>
                        
                        <div class="displayingMessage">
                            <div class="label">Lecturer</div>
                            <div class="value" id="oldLecture"></div>
                        </div>
                        
                        <div class="displayingMessage">
                            <div class="label">Location</div>
                            <div class="value" id="oldLocation"></div>
                        </div>
                        <div class="displayingMessage">
                            <div class="label">Date</div>
                            <div class="value" id="oldDate"></div>
                        </div>
                        <div class="displayingMessage">
                            <div class="label">From Time</div>
                            <div class="value" id="oldFromTime"></div>
                        </div>
                        <div class="displayingMessage">
                            <div class="label">To Time</div>
                            <div class="value" id="oldToTime"></div>
                        </div>
                        <div class="displayingMessage" style="margin-bottom:10px;" >
                            <div class="label">Description</div>
                            <div class="value" id="oldDescription"></div>
                        </div>
                        <form action="" method="post">
                            <input type="hidden" name="workloadID"id="inputWorkloadID">
                            <div class="displayingMessage">
                                <div class="label"></div>
                                <div class="value">
                                    
                                        <textarea style="background-color:none"name="reply" id="" cols="50" rows="10" placeholder="Reply"></textarea><br>
                                    
                                </div>
                            </div>
                            <div class="buttonCouple">
                                <input class="button"type="submit" name="reject" value="Reject">
                                <input class="button"type="submit" name="accept" value="Accept">
                            </div>
                        </form>
                        
                    </div>
                
                
            </div>
        </div>

        
        <div class="row col-2 schedule" id="schedule" style="display:none;" ><!--display the history of the supportive staff -->
            <div><button style="cursor:pointer;"class="button" onclick="openForm();">Add my workload</button></div>
            <div></div>
            <div>
                <h2 class='head' style="margin-bottom:20px;">My Workload &nbsp;&nbsp;&nbsp;&nbsp;<i title="Download" class="fa fa-arrow-circle-down" aria-hidden="true"></i></h2>
                
                <br>
                
                <!-- style='float:right;' -->
                <?php $newMessages=$controllerData[1];?>

                <?php if(count($newMessages)):?>

                    <?php
                    
                    // view all past workload messages of the supportive staff member
                        foreach($newMessages as $newMessage){
                            $title=$newMessage->getTitle();
                            $name=$newMessage->getFullName();
                            $location=$newMessage->getLocation();
                            $date=$newMessage->getDate();
                            $time=$newMessage->getFromTime();
                            $description=$newMessage->getWorkLoadDescription();
                            // $reply=$newMessage->getReply();
                            echo"
                            <div class='row col-1 normalEntry' onclick='openMsg(`$title`,`$name`,`$location`,`$date`,`$time`,`$description`)'>
                                <div style='float:right;' >
                                    <!--<div class='data'>Date</div>-->
                                    <div >".$newMessage->getRequestDate()."</div>
                                </div>
                                <div>
                                    <div class='dataSet'>
                                        <div class='data left'>Lecturer :</div>
                                        <div class='data right'>".$newMessage->getSalutation()." ".$newMessage->getFullName()."</div>
                                    </div>
                                    <div class='dataSet'>
                                        <div class='data left'>Title :</div>
                                        <div class='data right'>".$newMessage->getTitle()."</div>
                                    </div>
                                    <div class='dataSet'>
                                        <div class='data left'>Description :</div>
                                        <div class='data right'>".$newMessage->getWorkLoadDescription()."</div>
                                    </div>
                                </div>
                            </div>
                            ";
                        }
                    ?>
                    
                <?php else: ?>
                    <div style="margin-left:30%;margin-top:50%;"><p>Records not found.</p></div>
                <?php endif;?>
            </div>

            <div class="displayContent">
                <!-- display content of past workload messages  -->
                <div id="beforeMessage">
                    <p class="messageView"  >Message Display</p>
                </div>
                
                <div class="scheduleDescription" id="scheduleDescription" style="display:none;">
                    <div class="scheduleMessage">
                    <button class="close" style="float:right;padding-right:10px;" onclick="closeSecond()" ><i class="fa fa-times-circle" aria-hidden="true"></i></button>
                        <h3 class="topic" id="newTitle">Assignment conducting for DSA</h3>
                        <div style="padding-top:40px;">
                            <div class="displayingMessage">
                                <div class="label">Lecturer</div>
                                <div class="value" id="newLecture">Dr Manju</div>
                            </div>
                            
                            <div class="displayingMessage">
                                <div class="label">Location</div>
                                <div class="value" id="newLocation">Hall no1</div>
                            </div>
                            <div class="displayingMessage">
                                <div class="label">Date</div>
                                <div class="value" id="newDate" >2020/02/17</div>
                            </div>
                            <div class="displayingMessage">
                                <div class="label">Time</div>
                                <div class="value" id="newTime">3.00 PM</div>
                            </div>
                            <div class="displayingMessage" style="margin-bottom:10px;" >
                                <div class="label">Description</div>
                                <div class="value" id="newDescription"> Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five</div>
                            </div>
                            <div class="displayingMessage">
                                <div class="label">Reply</div>
                                <div class="value" id="newReply">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="scheduleDescription" id="myWorkloadForm" style="display:none;">
                    <form action="" method="post">
                        <div class="scheduleMessage">
                        <button class="close" style="float:right;padding-right:10px;" onclick="closeThird()" ><i class="fa fa-times-circle" aria-hidden="true"></i></button>
                            <!-- <h3 class="topic" id="newTitle">Assignment conducting for DSA</h3> -->
                            <h3 class="topic" id="newTitle">Submit your Workload</h3>
                            <div style="padding-top:40px;">
                                <div class="displayingMessage">
                                    <div class="label">Title</div>
                                    <div class="value" id="newLecture"><input type="text" value="My title" name="title"></div>
                                </div>
                                
                                <div class="displayingMessage">
                                    <div class="label">Location</div>
                                    <div class="value" id="newLocation"><input type="text" name="location" value="my location"default="My location"></div>
                                </div>
                                <div class="displayingMessage">
                                    <div class="label">Date</div>
                                    <div class="value" id="newDate" ><input type="date" name="date" value="27-2-2021"></div>
                                </div>
                                <div class="displayingMessage">
                                    <div class="label">From Time</div>
                                    <div class="value" id="newTime"><input type="time" name="fromTime" value="1:00:00"></div>
                                </div>
                                <div class="displayingMessage">
                                    <div class="label">To Time</div>
                                    <div class="value" id="newTime"><input type="time" name="toTime" value="2:00:00"></div>
                                </div>
                                <div class="displayingMessage" style="margin-bottom:10px;" >
                                    <div class="label" style="vertical-align: top;">Description</div>
                                    <div class="value" id="newDescription"><textarea name="description" id="" cols="30" rows="10" value="aaaaaaaaaaa"></textarea></div>
                                </div>
                                <div class="buttonCouple ">   
                                    <input style="" class="button" type="reset" name="cancel" value="cancel">
                                    <input style="" class="button" type="submit" name="submit" value="submit">
                                </div>
                            </div>
                        </div>
                        
                    </form>
                </div>




            </div>
        </div>
        
    </div>
    <script>
      
    </script>
    

    <!-- include footer section -->
    <?php BasicLoader::loadFooter('../../') ?>
    <script src="../../assets/js/jquery.js">
    <script src="../../assets/js/toast.js"></script>
    <script src="assets/workloadReceive.js"></script>
    <script src="../../assets/js/changeTheme.js"></script>


</body>
</html>