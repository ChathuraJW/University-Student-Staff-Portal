<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="../../assets/css/gridSystem.css">
    <link rel="stylesheet"  href="assets/viewNotification.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>

<body>
    <!-- include header section -->
    <?php require('../../assets/php/basicLoader.php')?>
    <?php BasicLoader::loadHeader('../../')?>
    
    <div class="featureBody">
        <div class="sample row col-5">
            <div class="radioToolbar">
                <div class="radioStyle">
                    <input value="6" type="radio" id="radio6" name="notificationName" onclick="displayNotification(this)">
                    <label for="radio6"><i class="fa fa-desktop" aria-hidden="true"></i> System (35)</label><hr>
                </div>
                <div class="radioStyle">
                    <input  value="2" type="radio" id="radio2" name="notificationName" onclick="displayNotification(this)">
                    <label for="radio2"><i class="fa fa-users" aria-hidden="true"></i> Social & Events(35)</label><hr>
                </div>
                <div class="radioStyle">
                    <input value="3" type="radio" id="radio3" name="notificationName" onclick="displayNotification(this)">
                    <label class="notificationLabel" for="radio3"><i class="fa fa-bullhorn" aria-hidden="true"></i> Director Notices(35)</label><hr>
                </div>
                <div class="radioStyle">
                    <input value="4" type="radio" id="radio4" name="notificationName" onclick="displayNotification(this)">
                    <label for="radio4"><i class="fa fa-calendar" aria-hidden="true"></i> Fundraising Events (35)</label><hr>
                </div>
                <div class="radioStyle">
                    <input value="5" type="radio" id="radio5" name="notificationName" onclick="displayNotification(this)">
                    <label for="radio5"><i class="fa fa-book" aria-hidden="true"></i> Administrative & Exam(35)</label><hr>
                </div>
                <div class="radioStyle">
                    <input value="1" type="radio" id="radio1" name="notificationName" onclick="displayNotification(this)">
                    <label for="radio1"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Assignment, Scholarship & Lecture re-scheduling(35)</label><hr>
                </div>
                <!-- <input type="radio> -->
            </div>
            <div class="inner">
            <div class=" row col-1" >
                <p class="heading">Notifications</p>
            
                <form class="example" action="action_page.php">
                    <input type="text" placeholder="Search.." name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
                <div class="inner row col-1" id="defaultNotification">
                    <?php
                    for($count=1;$count<=15;$count++){
                        echo("
                            <div class='notification'>
                                <labe class='topic'><i class='fa fa-bullhorn' aria-hidden='true'></i><b> IEEE Meeting Cancellation</b></labe>
                                <label class='content'>The january 12, 2021 meeting has been cancelled.The next meeting scheduled for january 21<sup>st</sup> at 8.30 a.m.</label>
                            </div>
                        ");
                    }
                    ?>
                </div>
                <div  class="inner row col-1" style="display:none"; id="sortedNotification">
                    <?php
                        for($count=1;$count<=8;$count++){
                            echo("
                                <div class='notification' id='notificationColor'>
                                    <labe class='topic'><i class='fa fa-bullhorn' aria-hidden='true'></i><b> IEEEE Meeting Cancellation</b></labe>
                                    <label class='content'>The january 12, 2021 meeting has been cancelled.The next meeting scheduled for january 21<sup>st</sup> at 8.30 a.m.</label>
                                </div>
                                ");
                            }
                    ?>
                </div>
                
            </div>
                        </div>

        </div>
    </div>
    <!-- include footer section -->
    <?php BasicLoader::loadFooter('../../')?>
    <script src="assets/viewNotification.js"></script>
</body>
</html>