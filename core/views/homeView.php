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
<body class="bodyBackground" onresize="infoMessage()">
<div id="contentContainer" class="mainContainer">
	<?php
		//    print_r($controllerData[4]);
		$role = $controllerData[4];
		$day = date("l");// get the current day
		$day = strtoupper(substr($day, 0, 3));
		if ($role == 'AD' or $day == 'SAT' or $day == 'SUN' or (!$controllerData[3])) {
			echo("
            <style>
                .timetable,.removableDiv{
                   display: none;
                    visibility: hidden;
                }
            </style>
        ");

		}
	?>
	<?php require_once('../assets/php/basicLoader.php') ?>
    <!-- header section -->
	<?php BasicLoader::loadHeader("../"); ?>
    <!--login detail section-->
    <div class="container bodyBackground row col-3">
        <div class="notificationStackContainer">
            <div class="row col-1">
                <div class="notificationStack">
                    <div class="stackHeader">
						<?php
							echo("
                            <span class='stackLabel'>Notifications</span>
                            <span class='notificationCount'>" . $controllerData[2]['COUNT(notificationID)'] . "</span> 
                        ");
						?>

                    </div>
					<?php
						foreach ($controllerData[1] as $notification)
							echo("<a href='../components/notification/viewNotification' class='notificationEntry '>
                                <div class='notificationIcon'><i class='fas fa-school'></i></div>
                                <div class='notificationContent'>" . $notification[0]['title'] . "</div>
                                <div class='notificationContent'>" . $notification[0]['firstName'] . " " . $notification[0]['lastName'] . " </div>
                                <div class='notificationContent'>" . $notification[0]['timestamp'] . "</div>
                                
                            </a>")
					?>
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
                        <div class="timeSlots row col-2">
							<?php
								foreach ($controllerData[3] as $event) {
									$from = strtoupper(substr($event['fromTime'], 0, 5));
									$to = strtoupper(substr($event['toTime'], 0, 5));
//                                echo $from;
									echo("
                                    <div class='notificationEntryTimeTable'>
                                    <i class='fas fa-chalkboard-teacher'></i>&nbsp;&nbsp;" . $event['subjectCode'] . "<br>
                                    <i class='fas fa-map-marked-alt'></i>&nbsp;&nbsp;" . $event['hallID'] . " <br>
                                    <i class='far fa-clock'></i>&nbsp;&nbsp;&nbsp;$from - $to <br>
                                    </div>
                                ");
								}
							?>

                        </div>
                    </div>
                    <div class="removableDiv"></div>
					<?php
						//                        load system features
						foreach ($controllerData[5] as $feature) {
							echo("
                                <a href='" . $feature->getFeaturePath() . "' rel='noreferrer' class='tile'>
                                    <div class='tileImage'><i class='" . $feature->getFeatureIcon() . "'></i></div>
                                    <div class='tileDescription'>" . $feature->getFeatureName() . "</div>
                                </a>
                            ");
						}
					?>

                </div>
            </div>
        </div>
        <!--    <div >-->
        <div class="userInformation">
            <div class="row col-1">
                <div class="profileSection">
                    <a href="settingPage" class="userSetting"><i class="fas fa-cog fa-2x" style="color: var(--fontColor)"></i></a>
                    <div class="profilePic">
                        <!--update profile picture based on the picture availability and the gender-->
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
                            <span class='name'><span style='font-size: 20px'>(" . $controllerData[0][0]['salutation'] . ")&nbsp;</span>" . $controllerData[0][0]['lastName'] . "<br>" . $controllerData[0][0]['firstName'] . "</span><br>
                            <span class='emailPersonal'>" . $controllerData[0][0]['personalEmail'] . "</span><br>
                            <span class='emailUniversity'>" . $controllerData[0][0]['universityEmail'] . "</span><br><br>
                            ");
							if ($_COOKIE['role'] == 'ST') {
								echo("
							        <span class='gpa' id='displayGPA' style='background-color: var(--entryBackgroundColor);'>" . $controllerData[0][0]['currentGPA'] . "</span>
							    ");
							}
						?>
                    </div>
                </div>
                <div class="calenderContainer">
                    <div id="day" class="dayContainer">Monday</div>
                    <div class="dateTime">
                        <div id="month" class="month"></div>
                        <div id="date" class="date"></div>
                        <div id="time" class="time"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--load footer-->
	<?php BasicLoader::loadFooter("../"); ?>
</div>
<div id="greeting" class="popupMessageContainer">
    <div class="popupMessage">
        <span id="greetingMessage" class="greetingMessage"> </span>
    </div>
    <div class="popupMessage">
        <span class="userName"> <?php echo $_COOKIE["fullName"]; ?></span>
    </div>
</div>
<script src="../assets/js/jquery.js"></script>
<script src="../assets/js/toast.js"></script>
<script src="assets/home.js"></script>
<script src="../assets/js/changeTheme.js"></script>
</body>
</html>