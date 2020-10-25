<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="assets/home.css">
    <link rel="stylesheet" href="../assets/css/gridSystem.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css"/>
</head>
<body>
<!-- header section -->
<?php require_once('../assets/php/basicLoader.php')?>
<?php BasicLoader::loadHeader("../");?>
<div class="content">
    <div class="topSection">
        <div class="row col-5">
            <div class="notificationStack">
                <div class="stackHeader">
                    <span class="stackLabel">Academic Schedule</span>
                </div>
                <div class="notificationEntryTimeTable">
                    <i class="fas fa-chalkboard-teacher"></i>&nbsp;&nbsp;SCS2201 Lecture<br>
                    <i class="fas fa-map-marked-alt"></i>&nbsp;&nbsp;S203 <br>
                    <i class="far fa-clock"></i>&nbsp; 08:00 - 10:00 <br>
                </div>
                <div class="notificationEntryTimeTable">
                    <i class="fas fa-chalkboard-teacher"></i>&nbsp;&nbsp;SCS2204 Practical<br>
                    <i class="fas fa-map-marked-alt"></i>&nbsp;&nbsp;LabA LabB LabC<br>
                    <i class="far fa-clock"></i>&nbsp; 10:00 - 12:00 <br>
                </div>
                <div class="notificationEntryTimeTable">
                    <i class="fas fa-chalkboard-teacher"></i>&nbsp;&nbsp;S2205 Tutorial<br>
                    <i class="fas fa-map-marked-alt"></i>&nbsp;&nbsp;E401 <br>
                    <i class="far fa-clock"></i>&nbsp; 13:00 - 15:00 <br>
                </div>
                <div class="notificationEntryTimeTable">
                    <i class="fas fa-chalkboard-teacher"></i>&nbsp;&nbsp;SCS2206 Lecture<br>
                    <i class="fas fa-map-marked-alt"></i>&nbsp;&nbsp;S204 <br>
                    <i class="far fa-clock"></i>&nbsp; 15:00 - 17:00 <br>
                </div>
            </div>
            <div class="notificationStack">
                <div class="stackHeader">
                    <span class="stackLabel">Academic Notification</span>
                    <span class="notificationCount">57</span>
                </div>
                <div class="notificationEntry blue">
                    <div class="notificationIcon"><i class="fas fa-school"></i></div>
                    <div class="notificationContent">SCS2203 In class assignment 1 will be on 22th november.</div>
                </div>
                <div class="notificationEntry green">
                    <div class="notificationIcon"><i class="fas fa-school"></i></div>
                    <div class="notificationContent">2nd semester exam will commence on 6th September.</div>
                </div>
            </div>
            <div class="profileSection">
                <a href="" class="userSetting"><i class="fas fa-cog fa-2x"></i></a>
                <div class="profilePic">
<!--                    update profile picture based on the picture availability and the gender-->
                    <?php
                        $filePath='';
                        if($controllerData[0][0]['profilePicURL']===""){
                            if($controllerData[0][0]['gender']==='M')
                                $filePath="userMale.jpg";
                            else
                                $filePath="userFemale.jpg";
                        }else{
                            $filePath=$controllerData[0][0]['profilePicURL'];
                        }
                        echo ("
                        <img src='assets/profile picture/{$filePath}' alt='profilePic' style='height: auto;width: 100%;margin: auto'>
                        ");
                    ?>

                </div>
                <div class="userInfo">
                    <?php
                        echo("
                            <span class='name'><span style='font-size: 20px'>(".$controllerData[0][0]['salutation'].")&nbsp;</span>".$controllerData[0][0]['firstName']."<br>".$controllerData[0][0]['lastName']."</span><br>
                            <span class='emailPersonal'>".$controllerData[0][0]['personalEmail']."</span><br>
                            <span class='emailUniversity'>".$controllerData[0][0]['universityEmail']."</span><br>
                            <span class='gpa green' id='displayGPA'>".$controllerData[0][0]['currentGPA']."</span>
                        ");
                    ?>
                </div>
            </div>
            <div class="notificationStack">
                <div class="stackHeader">
                    <span class="stackLabel">General Notification</span>
                    <span class="notificationCount">67</span>
                </div>
                <div class="notificationEntry blue">
                    <div class="notificationIcon"><i class="fas fa-scroll"></i></div>
                    <div class="notificationContent">Calling application for Mahapola scholarship</div>
                </div>
                <div class="notificationEntry red">
                    <div class="notificationIcon red"><i class="fas fa-scroll"></i></div>
                    <div class="notificationContent">Academic activities for 2nd semester will commence on 19th October
                        2020.
                    </div>
                </div>
                <div class="notificationEntry gray">
                    <div class="notificationIcon"><i class="fas fa-scroll"></i></div>
                    <div class="notificationContent">Welfare society of staff will plan to have a fund racing
                        activity.
                    </div>
                </div>
            </div>
            <div class="notificationStack">
                <div class="stackHeader">
                    <span class="stackLabel">System Notification</span>
                    <span class="notificationCount">46</span>
                </div>
                <div class="notificationEntry orange">
                    <div class="notificationIcon"><i class="fas fa-laptop-house"></i></i></div>
                    <div class="notificationContent">System will shutdown for next 5 hours for maintenance</div>
                </div>
            </div>
        </div>
    </div>
    <div class="linkSection">
        <div class="row col-6">
            <a href="#" class="tile" id="accessToVLE">
                <div class="tileImage"><i class="fas fa-laptop-code fa-3x"></i></div>
                <div class="tileDescription">Access to VLE</div>
            </a>
            <a href="#" class="tile" id="studentResult">
                <div class="tileImage"><i class="fas fa-poll fa-3x"></i></div>
                <div class="tileDescription">Student Result</div>
            </a>
            <a href="#" class="tile" id="studentAttendance">
                <div class="tileImage"><i class="fas fa-file-signature fa-3x"></i></div>
                <div class="tileDescription">Student Attendance</div>
            </a>
            <a href="#" class="tile" id="appointmentForMeeting">
                <div class="tileImage"><i class="fas fa-calendar-check fa-3x"></i></div>
                <div class="tileDescription">Appointment for Meeting</div>
            </a>
            <a href="#" class="tile" id="hallBooking">
                <div class="tileImage"><i class="fas fa-university fa-3x"></i></div>
                <div class="tileDescription">Hall Booking</div>
            </a>
            <a href="#" class="tile" id="personalFile">
                <div class="tileImage"><i class="fas fa-folder-open fa-3x"></i></div>
                <div class="tileDescription">Personal Files</div>
            </a>
            <a href="#" class="tile" id="contactUnion">
                <div class="tileImage"><i class="fas fa-headset fa-3x"></i></div>
                <div class="tileDescription">Contact Union</div>
            </a>
            <a href="#" class="tile" id="trainSeason">
                <div class="tileImage"><i class="fas fa-train fa-3x"></i></div>
                <div class="tileDescription">Train Season</div>
            </a>
            <a href="#" class="tile" id="pastPaper">
                <div class="tileImage"><i class="fas fa-file-pdf fa-3x"></i></div>
                <div class="tileDescription">Past Paper</div>
            </a>
            <a href="#" class="tile" id="message">
                <div class="tileImage"><i class="fas fa-comment-dots fa-3x"></i></div>
                <div class="tileDescription">Message</div>
            </a>
            <a href="#" class="tile" id="publishNotice">
                <div class="tileImage"><i class="fas fa-bullhorn fa-3x"></i></div>
                <div class="tileDescription">Publish Notice</div>
            </a>
            <a href="#" class="tile" id="seasonRequestProcessing">
                <div class="tileImage"><i class="fas fa-pen fa-3x"></i></div>
                <div class="tileDescription">Season Request Processing</div>
            </a>
            <a href="#" class="tile" id="addAttendance">
                <div class="tileImage"><i class="fas fa-file-contract fa-3x"></i></div>
                <div class="tileDescription">Add Attendance</div>
            </a>
            <a href="#" class="tile" id="addExamResult">
                <div class="tileImage"><i class="fas fa-laptop-code  fa-3x"></i></div>
                <div class="tileDescription">Add Exam Result</div>
            </a>
            <a href="#" class="tile" id="getExamResult">
                <div class="tileImage"><i class="fas fa-handshake fa-3x"></i></div>
                <div class="tileDescription">Get Exam Result</div>
            </a>
            <a href="#" class="tile" id="addIQACReport">
                <div class="tileImage"><i class="fas fa-plus-square fa-3x"></i></div>
                <div class="tileDescription">Add IQAC Report</div>
            </a>
            <a href="#" class="tile" id="uploadPastPaper">
                <div class="tileImage"><i class="fas fa-file-upload fa-3x"></i></div>
                <div class="tileDescription">Upload Past Papers</div>
            </a>
            <a href="#" class="tile" id="uploadResult">
                <div class="tileImage"><i class="fas fa-file-csv fa-3x"></i></div>
                <div class="tileDescription">Upload Result</div>
            </a>
            <a href="#" class="tile" id="viewIQACReport">
                <div class="tileImage"><i class="fas fa-file-alt fa-3x"></i></div>
                <div class="tileDescription">View IQAC Report</div>
            </a>
            <a href="#" class="tile" id="respondForMeetingRequest">
                <div class="tileImage"><i class="fas fa-reply fa-3x"></i></div>
                <div class="tileDescription">Respond for Meeting Request</div>
            </a>
            <a href="#" class="tile" id="updateAvailability">
                <div class="tileImage"><i class="fas fa-check-double fa-3x"></i></div>
                <div class="tileDescription">Update Availability</div>
            </a>
            <a href="#" class="tile" id="reviewHallBookingRequest">
                <div class="tileImage"><i class="fas fa-eye fa-3x"></i></div>
                <div class="tileDescription">Review Hall Booking Request</div>
            </a>
            <a href="#" class="tile" id="assignmentManagement">
                <div class="tileImage"><i class="fas fa-tasks fa-3x"></i></div>
                <div class="tileDescription">Assignment Management</div>
            </a>
            <a href="#" class="tile" id="viewWorkload">
                <div class="tileImage"><i class="fas fa-briefcase fa-3x"></i></div>
                <div class="tileDescription">View Workload</div>
            </a>
            <a href="#" class="tile" id="allocatedWorkload">
                <div class="tileImage"><i class="fas fa-hand-point-right fa-3x"></i></div>
                <div class="tileDescription">Allocate Workload</div>
            </a>
            <a href="#" class="tile" id="usspSystemConfig">
                <div class="tileImage"><i class="fas fa-user-cog fa-3x"></i></div>
                <div class="tileDescription">USSP System Config</div>
            </a>
        </div>
    </div>
</div>
<?php BasicLoader::loadFooter("../");?>
<script src="../assets/js/jquery.js"></script>
<script src="assets/home.js"></script>
</body>
</html>