<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="../../assets/css/gridSystem.css">

    <link rel="stylesheet" href="assets/applyTrainSeasonStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css"/>


</head>
<body class="bodyBackground text">
<!-- include header section -->
<?php require_once('../../assets/php/basicLoader.php') ?>
<?php basicLoader::loadHeader('../../'); ?>


<!-- feature body section -->

<div class="featureBody">
    <div class="row col-2">
        <div class="applicationForm">
            <br>
            <h1 style="text-align:center;"><b>Apply Train Season<b></h1><br>
            <div class="container2">
                <!-- <div class="vertical-center"> -->

                <form method="POST" class="application" enctype="multipart/form-data">

                    <label for="userName" class="inputLabel name">Name With Initials:</label><br>
                    <input type="text" id="name" name="name" class="input nameText" style="width:100%;"
                           value="<?php echo $controllerData[1]->getFullName(); ?>" readonly><br><br>
                    <label for="regNo" class="inputLabel regNo">Registration Number:</label><br>
                    <input type="text" id="regNo" name="regNo" class="input regNoText" style="width:100%;"
                           value="<?php echo $controllerData[1]->getRegNo(); ?>" readonly><br><br>
                    <label for="address" class="inputLabel name">Address:</label><br>
                    <input type="text" id="address" name="address" class="input nameText" style="width:100%;"
                           value="<?php echo $controllerData[1]->getAddress(); ?>" readonly><br><br>
                    <div class="row col-2" style="padding-left:0;">
                        <div>
                            <label for="academicYear" class="inputLabel name">Academic Year:</label><br>
                            <select name="acYear" id="acYear" required>
                            </select>
                        </div>
                        <div>
                            <label for="address" class="inputLabel name">Age:</label><br>
                            <input type="text" id="age" name="age" class="input nameText" value="<?php echo $controllerData[1]->getAge(); ?>"
                                   readonly><br><br>
                        </div>
                    </div>


                    <div class="row col-2" style="padding-left:0;">
                        <div>
                            <label for="fromMonth" class="inputLabel name">From Month:</label>

                            <select class="input" name="fromMonth" style="padding: 4px;" placeholder="From Month" id="fromMonth">
                                <option value="January">January</option>
                                <option value="February">February</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="August">August</option>
                                <option value="September">September</option>
                                <option value="October">October</option>
                                <option value="November">November</option>
                                <option value="December">December</option>

                            </select> <br>
                        </div>

                        <div>
                            <label for="fromMonth" class="inputLabel name">To Month:</label>

                            <select class="input" name="toMonth" style="padding: 4px;" placeholder="To month" id="toMonth">
                                <option value="January">January</option>
                                <option value="February">February</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="August">August</option>
                                <option value="September">September</option>
                                <option value="October">October</option>
                                <option value="November">November</option>
                                <option value="December">December</option>
                            </select> <br>
                        </div>
                        <div>
                            <br>
                            <label for="homeStation" class="inputLabel name">Nearest Station from Home:</label><br>
                            <input type="text" id="homeStation" name="homeStation" class="input nameText"><br><br>
                        </div>
                        <div>
                            <br>
                            <label for="universityStation" class="inputLabel name">Nearest Station from University:</label><br>
                            <input type="text" id="universityStation" name="universityStation" class="input nameText"><br><br>
                        </div>

                    </div>

                    <input type="submit" value="Submit" class="button" name="submit">

                    <a class="backPage" href="applyTrainSeason">
                        <input type="button" value="Cancel" class="button" name="cancel">
                    </a>
                </form>

            </div>
            <br>
            <br>
        </div>
        <br><br>
        <div class="history">

            <label style="font-size: 20px"><b>Request History</b></label>
            <hr>
            <br>
			<?php
				//print_r($controllerData[0]);
				foreach ($controllerData[0] as $data) {

					echo("
              <div class='normalEntry'>
                <div style='padding-left: 7px;'>From  " . $data->getNearRailwayStationHome() . "</div>
                <div style='padding-left: 7px;'>To   " . $data->getNearRailwayStationUni() . "</div>
                <div style='float:right'>" . $data->getTimeStamp() . "</div><br>
              </div><br>
              ");
				}
			?>
        </div>
    </div>

</div>


<!-- include footer section -->
<?php basicLoader::loadFooter('../../'); ?>

<script src="../../assets/js/jquery.js"></script>
<script src="../../assets/js/toast.js "></script>
<script src="../../assets/js/changeTheme.js"></script>
<script src="assets/applyTrainSeasonJs.js">
</script>


</body>
</html>

