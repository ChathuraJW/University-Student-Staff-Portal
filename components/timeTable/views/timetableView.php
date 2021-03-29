<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="assets/timetableStyles.css">
    <link rel="stylesheet" href="../../assets/css/gridSystem.css">
</head>
<body>

<!-- include header section -->
<?php require('../../assets/php/basicLoader.php') ?>
<?php BasicLoader::loadHeader('../../') ?>

<!-- feature body section -->
<div class="featureBody bodyBackground text">
	<?php
		$studentID = $_COOKIE['userName'];
	?>
    <div id="username" style="display:none;" value="<?php echo $studentID ?>"></div>
    <div id="main">
        <h2 class="head">Time Table</h2>
        <!-- the structure of the timetable is create in here  -->
        <table id="timetable">
            <!-- Display the dates of the table -->
            <tr>
                <th></th>
                <th class="day" id="monday">Monday</th>
                <th class="day" id="tuesday">Tuesday</th>
                <th class="day" id="wednesday">Wednesday</th>
                <th class="day" id="thursday">Thursday</th>
                <th class="day" id="friday">Friday</th>
                <!-- <th></th> -->
            </tr>

			<?php
				for ($i = 1; $i < 18; $i++) {

					if ($i == 1) {
						$value = "08.00-08.30";
					} elseif ($i == 2) {
						$value = "08.30-09.00";
					} elseif ($i == 3) {
						$value = "09.00-09.30";
					} elseif ($i == 4) {
						$value = "09.30-10.00";
					} elseif ($i == 5) {
						$value = "10.00-10.30";
					} elseif ($i == 6) {
						$value = "10.30-11.00";
					} elseif ($i == 7) {
						$value = "11.00-11.30";
					} elseif ($i == 8) {
						$value = "11.30-12.00";
					} elseif ($i == 9) {
						$value = "12.00-1.00";
					} elseif ($i == 10) {
						$value = "13.00-13.30";
					} elseif ($i == 11) {
						$value = "13.30-14.00";
					} elseif ($i == 12) {
						$value = "14.00-14.30";
					} elseif ($i == 13) {
						$value = " 14.30-15.00";
					} elseif ($i == 14) {
						$value = "15.00-15.30";
					} elseif ($i == 15) {
						$value = "15.30-16.00";
					} elseif ($i == 16) {
						$value = "16.00-16.30";
					} else {
						$value = "16.30-17.00";
					}


					echo "
                                <tr class='line" . $i . "' id='line" . $i . "'>
                                    <th >" . $value . "</th>
                                    <th id='Monday" . $i . "' ></th>
                                    <th id='Tuesday" . $i . "'></th>
                                    <th id='Wednesday" . $i . "'></th>
                                    <th id='Thursday" . $i . "'></th>
                                    <th id='Friday" . $i . "'></th>
                                </tr>
                            ";

				}
			?>
        </table>
    </div>

</div>
<script>

</script>


<!-- include footer section -->
<?php BasicLoader::loadFooter('../../') ?>
<script src="../../assets/js/jquery.js"></script>
<script src="../../assets/js/toast.js"></script>
<script src="assets/timetable.js"></script>
<script src="../../assets/js/changeTheme.js"></script>
</body>
</html>