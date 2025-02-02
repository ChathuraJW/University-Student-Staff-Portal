<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="assets/viewAttendance.css">
    <link rel="stylesheet" href="../../assets/css/gridSystem.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css"/>
</head>
<body>
<!-- include header section -->
<?php require('../../assets/php/basicLoader.php') ?>
<?php BasicLoader::loadHeader('../../') ?>

<div class="featureBody bodyBackground text">
    <form method="post">
        <div class="sidebar ">
            <a id="inquiryButton"><i class="fa fa-question-circle"></i>Inquiry</a>
            <div id="myModal" class="modal">
                <!-- Modal content -->
                <div class="modalContent bodyBackground text">
                    <span class="close">&times;</span>
                    <p class="popupTopic">Inquiry</p>
                    <div class="row col-2">
                        <div class="row col-1">
                            <div class="inputStyle">
                                <label for="week">Week:</label><br>
                                <select id="week" name="week" required>
                                    <option value=""></option>
									<?php
										for ($week = 1; $week <= 15; $week++) {
											echo("<option value='$week'>Week $week</option>");
										}
									?>
                                </select>
                            </div>
                            <div class="inputStyle">
                                <label for="subject">Subject:</label><br>
                                <select id="subject" name="subject" required>
                                    <option value=""></option>
									<?php
										$subjectCount = 0;
										//create subject dropdown
										foreach ($controllerData[0] as $data) {
											$subjectCount++;
											echo("<option value='" . $data->getCourseCode() . "'>" . $data->getName() . "</option>");
										}
									?>
                                </select>
								<?php

								?>
                            </div>
                        </div>


                        <div class="inputStyle row col 1">
                            <label for="message">Message:</label>
                            <textarea name="message" id="message" required></textarea>

                        </div>
                    </div>
                    <div class="buttonCouple">
                        <input type="submit" value="Send" name="send" class="button">
                        <input type="reset" value="Cancel" class="button">
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div>
        <p class="heading" id="myAttendance">My Attendance</p>
    </div>
	<?php
		$markedSubjects = 0;
		$sumOfPercentage = 0;
		$totalPercentage = 0;
		$maxWeek = 0;
		foreach ($controllerData[1] as $courseDetails) {
			$attendedDays = 0;
			$totalDays = 0;
			$subjectPercentage = 0;
			foreach ($courseDetails[1] as $attendance) {
				if ($attendance['attendance']) {
					$attendedDays++;
				}
				$totalDays++;
				if ($totalDays >= $maxWeek) {
					$maxWeek = $totalDays;
				}

			}
			if ($totalDays != 0) {
				$subjectPercentage = ($attendedDays / $totalDays) * 100;
				$sumOfPercentage = $subjectPercentage + $sumOfPercentage;
				$markedSubjects += 1;
			}


		}
		if ($markedSubjects != 0) {
			$totalPercentage = $sumOfPercentage / $markedSubjects;
			$totalPercentage = round($totalPercentage);
		}
	?>
    <div id="container1" class="row col-4">
        <div class="basicStyle">
            <label>Current Percentage</label>
            <div class='innerDiv'>
				<?php echo("<label class='innerLabel'>$totalPercentage%</label>"); ?>

            </div>
        </div>

        <div class="basicStyle">
            <label>Weeks Up to</label>
            <div class="innerDiv">
				<?php echo("<label class='innerLabel'>$maxWeek</label>"); ?>

            </div>
        </div>
        <div class="basicStyle">
            <label>Remaining Weeks</label>
            <div class="innerDiv">
				<?php
					$remainingWeek = 15 - $maxWeek;
					echo("<label class='innerLabel'>$remainingWeek</label>"); ?>
            </div>
        </div>
        <div class="basicStyle">
            <label>Subjects</label>
            <div class="innerDiv">
				<?php echo("<label class='innerLabel'> $subjectCount </label>"); ?>
            </div>
        </div>
    </div>
    <!-- <div class="row col-1"> -->
    <!-- <div class="attendanceDetail"> -->
    <div class="row col-2">
		<?php
			foreach ($controllerData[1] as $courseDetails) {
				$attendedDays = 0;
				$totalDays = 0;
				$subjectPercentage = 0;
				foreach ($courseDetails[1] as $attendance) {
					if ($attendance['attendance']) {
						$attendedDays++;
					}
					$totalDays++;

				}
				if ($totalDays != 0) {
					$subjectPercentage = ($attendedDays / $totalDays) * 100;
					$subjectPercentage = round($subjectPercentage);
				}

				// print_r($courseDetails[0]);
				echo("
                        <div class='attendanceContainer'>
                            <div class='row col-2'>
                                <div class='courseDetail'>
                                    <div class='attendanceDetailTopicLeft'><label class='attendanceDetailTopicLeft'>" . $courseDetails[0]['courseCode'] . "</label></div>
                                    <div><label id='subjectFont' class='attendanceDetailTopicLeft'>" . $courseDetails[0]['name'] . "</label></div>
                                </div>
                                <div class='courseDetail' id='attendancePercentage'>
                                    <div  class='attendanceStyle'>
                                        <span id='hiddenPercentage1' class='attendanceDetailTopicRight'>$subjectPercentage%</span>
                                    </div>
                                </div>
                            </div>");

				if ($totalDays == 0) {
					echo("
                                    <div class='row col-1'>
                                        <label  class='EmptyAttendanceMessage' >Attendance of this subject is not added yet. </label>
                                    </div>
                                ");
				} else {
					echo("
                            <div class='row col-5'>");
					foreach ($courseDetails[1] as $attendance) {
						$color = ($attendance['attendance']) ? 'var(--successColor)' : 'var(--dangerColor)';
						echo("
                                        <div  class='attendance' style='border-left-color:$color'>
                                            <span class='textStyle'>Week " . $attendance['week'] . "</span><br>
                                            <span class='textStyle'>" . $attendance['date'] . "</span><br>
                                            <span class='textStyle' id='attendanceDescription'>" . $attendance['description'] . "</span><br>
                                        </div>
                                    ");
					}
					echo("</div>");
				}
				echo("</div>
                    ");

			}
		?>
    </div>


    <script src="assets/viewAttendance.js"></script>
    <script src="../../assets/js/jquery.js"></script>
    <script src="../../assets/js/toast.js"></script>
    <script src="../../assets/js/changeTheme.js"></script>
</div>
<!-- </div> -->


<!-- include footer section -->
<?php BasicLoader::loadFooter('../../') ?>
</body>
</html>