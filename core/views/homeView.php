<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../assets/css/gridSystem.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="assets/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css"/>

</head>
<body>

<!-- header section -->


<!--login detail section-->
<div class="loginInfo">
    <h4>Login as <?php echo $_COOKIE["fullName"]; ?> &nbsp;<span><a href="../assets/php/logout.php"
                                                                    style="color: white;"><i class="fas fa-sign-out-alt"
                                                                                             style="color: white;"></i></a></span>
    </h4>
</div>

<div class="container ">
    <div class="notificationStackContainer">
        <div class="row col-1">
            <div class="notificationStack">
                <div class="stackHeader">
                    <span class="stackLabel">Academic Notification</span>
                    <span class="notificationCount">57</span>
                </div>
                <div class="notificationEntry ">
                    <div class="notificationIcon"><i class="fas fa-school"></i></div>
                    <div class="notificationContent">SCS2203 In class assignment 1 will be on 22th november...</div>
                </div>
                <div class="notificationEntry ">
                    <div class="notificationIcon"><i class="fas fa-school"></i></div>
                    <div class="notificationContent">2nd semester exam will commence on 6th September...</div>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="linkSection">
            <div class="row col-4">
                <div class="timetable">
                    <div class="stackHeader">
                        <span class="stackLabel" style="padding-bottom: 7px;">Academic Schedule</span>
                    </div>
                    <dic class="timeSlots row col-2">
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
                    </dic>
                </div>
                <div></div>
                <a href="https://ugvle.ucsc.cmb.ac.lk/" target="_blank" class="tile" id="accessToVLE">
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
    <div >
        <div class="userInformation">
            <div class="row col-1">
                <div class="profileSection">
                    <a href="" class="userSetting"><i class="fas fa-cog fa-2x"></i></a>
                    <div class="profilePic">
                        <!--                    update profile picture based on the picture availability and the gender-->
                        <?php
                        $filePath = '';
                        if ($controllerData[0][0]['profilePicURL'] === "") {
                            if ($controllerData[0][0]['gender'] === 'M')
                                $filePath = "userMale.jpg";
                            else
                                $filePath = "userFemale.jpg";
                        } else {
                            $filePath = $controllerData[0][0]['profilePicURL'];
                        }
                        echo("
                        <img src='assets/profile picture/{$filePath}' alt='profilePic' style='height: auto;width: 100%;margin: auto'>
                        ");
                        ?>

                    </div>
                    <div class="userInfo">
                        <?php
                        echo("
                            <span class='name'><span style='font-size: 20px'>(" . $controllerData[0][0]['salutation'] . ")&nbsp;</span>" . $controllerData[0][0]['firstName'] . "<br>" . $controllerData[0][0]['lastName'] . "</span><br>
                            <span class='emailPersonal'>" . $controllerData[0][0]['personalEmail'] . "</span><br>
                            <span class='emailUniversity'>" . $controllerData[0][0]['universityEmail'] . "</span><br>
                            <span class='gpa green' id='displayGPA'>" . $controllerData[0][0]['currentGPA'] . "</span>
                        ");
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="calenderContainer">
            <div class="calender">
                <div class="month">
                    <i class="fas fa-angle-left
                prev"></i>
                    <div class="date">
                        <h4>May</h4>
                        <p>Fri May 29, 2020</p>
                    </div>
                    <i class="fas fa-angle-right
                prev"></i>
                </div>
                <div class="weeksDays">
                        <div>Sun</div>
                        <div>Mon</div>
                        <div>Tue</div>
                        <div>Wed</div>
                        <div>Thu</div>
                        <div>Fri</div>
                        <div>Sat</div>
                </div>
                <div class="days">
                        <div class="prevDate">26</div>
                        <div class="prevDate">27</div>
                        <div class="prevDate">28</div>
                        <div class="prevDate">29</div>
                        <div class="prevDate">30</div>
                        <div>1</div>
                        <div>2</div>
                        <div>3</div>
                        <div>4</div>
                        <div>5</div>
                        <div>6</div>
                        <div>7</div>
                        <div>8</div>
                        <div>9</div>
                        <div>10</div>
                        <div>11</div>
                        <div>12</div>
                        <div>13</div>
                        <div>14</div>
                        <div>15</div>
                        <div>16</div>
                        <div>17</div>
                        <div>18</div>
                        <div>19</div>
                        <div>20</div>
                        <div>21</div>
                        <div>22</div>
                        <div>23</div>
                        <div>24</div>
                        <div>25</div>
                        <div>26</div>
                        <div>27</div>
                        <div>28</div>
                        <div>29</div>
                        <div>30</div>
                        <div>31</div>
                        <div class="nextDate">1</div>
                        <div class="nextDate">2</div>
                        <div class="nextDate">3</div>
                        <div class="nextDate">4</div>
                        <div class="nextDate">5</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--load footer-->
<?php require_once('../assets/php/basicLoader.php') ?>
<?php BasicLoader::loadFooter("../"); ?>

<script src="../assets/js/jquery.js"></script>
<script src="assets/home.js"></script>
</body>
</html>