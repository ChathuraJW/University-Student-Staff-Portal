<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="../../assets/css/gridSystem.css">
    <link rel="stylesheet" href="assets/hallBookingSection.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>
<body>
<?php require_once('../../assets/php/basicLoader.php') ?>
<?php basicLoader::loadHeader('../../'); ?>
<div class="featureBody bodyBackground text">
    <span class="heading">Hall Reservation Section</span>
    <div class="mainBlock row col-2" id="mainBlock">
<!--        past request listing section-->
        <div class="pastBookingSection">
            <span class="columnHeader">Booking Request History</span>
            <?php
//            create optionButton display status based on entryCount
            if (sizeof($controllerData[1]) <= 5) {
                $displayOptionButton = 'none';
            } else {
                $displayOptionButton = 'block';
            }

//            this variable use to keep track on entry number
            $entryNumber=1;
            foreach ($controllerData[1] as $row){
//                base on entry number if it <5 then display entry or else hide them
                if ($entryNumber < 5) {
                    $displayOptionEntry = 'block';
                } else {
                    $displayOptionEntry = 'none';
                }
//                get entry type for coloring based on entry status
                $colorClass=$row->getColorClassForReservationState();
//                entry creation
                echo("
                    <div class='bookingEntry $colorClass' style='display:$displayOptionEntry;'>
                        <div class='row col-2' style='padding:0;'>
                          <span class='bookingEntryContent'>Lecture Hall/Lab: <b>".$row->getHallID()."</b></span>
                          <span class='bookingEntryContent'>For: <b>".$row->getReservationType()."</b></span>
                        </div>
                        <div class='row col-2' style='padding:0;'>
                          <span class='bookingEntryContent'>From: <b>".$row->getFrom()."</b></span>
                          <span class='bookingEntryContent'>To: <b>".$row->getTo()."</b></span>
                        </div>
                        <span class='bookingEntryContent' style='padding:10px;text-align: justify;'>Description:<br><b>" . $row->getDescription() . "</b></span>
                        <span class='bookingEntryContent'>Appointment made at: <b>".$row->getRequestMadeAt()."</b></span>
                        <span class='bookingEntryContent'>Approval State: <b>".$row->getReservationState()."</b></span>
                        <span class='bookingEntryContent' style='font-size:15px;float:right;'><b>Approved By: ".$row->getApprovedBy()." ( ".$row->getApprovalTimestamp()." )</b></span>
                    </div>
                ");
                $entryNumber++;
            }
            echo("
                <button type='button' id='loadMoreLessButton' style='display: $displayOptionButton;' onclick='loadMoreHistory();'>Load More...</button>
            ");
            ?>
        </div>

<!--        new booking making section-->
        <div class="makeBookingSection">
            <span class="columnHeader">Make a New Booking Request</span>
            <input type="button" name="displayAllocationMap" onclick="loadAllocationMap();"
                   class="button orange" value="Goto Current Allocation Map"
                   style="width:95%;margin: auto auto 30px;">
            <form action="" method="post" id="creteRequestForm">
                <div class="row col-2">
                    <div>
                        <span class="inputHeading">Selected Hall/Lab</span>
                        <select name="selectedHallOrLab">
                            <optgroup label="Lecture Hall">
                                <?php
                                    foreach ($controllerData[0] as $row){
                                        if($row->isLecturerHall()){
                                            $hallID=$row->getHallID();
                                            $capacity=$row->getCapacity();
                                            echo("
                                                <option value='$hallID'>$hallID (Capacity- $capacity)</option>
                                            ");
                                        }else{
                                            break;
                                        }
                                    }
                                ?>
                            </optgroup>
                            <optgroup label="Laboratories">
                                <?php
                                foreach ($controllerData[0] as $row){
                                    if(!$row->isLecturerHall()){
                                        $hallID=$row->getHallID();
                                        $capacity=$row->getCapacity();
                                        echo("
                                                <option value='$hallID'>$hallID (Capacity- $capacity)</option>
                                        ");
                                    }
                                }
                                ?>
                            </optgroup>
                        </select>
                    </div>
                    <div>
                        <span class="inputHeading">Purpose</span>
                        <select name="bookingType">
                            <option value="3100">Lecture</option>
                            <option value="3200">Tutorial</option>
                            <option value="3300">Staff Meeting</option>
                            <option value="3400">Club Meeting</option>
                            <option value="3500">Student Meeting</option>
                        </select>
                    </div>
                </div>
                <div class="row col-2">
                    <div>
                        <span class="inputHeading">From</span>
                        Date: <input type="date" name="fromData"><br>
                        Time: <input type="time" name="fromTime" min="08:00" max="19:00" value="13:00:00">
                    </div>
                    <div>
                        <span class="inputHeading">To</span>
                        Date: <input type="date" name="toData"><br>
                        Time: <input type="time" name="toTime" min="08:00" max="19:00" value="15:00:00">
                    </div>
                </div>
                <span class="inputHeading">description</span>
                <textarea name="description" rows="10" style="width:90%;resize: none;" required></textarea>
                <div class="buttonCouple">
                    <input type="submit" name="createRequest" value="Create Request" class="button"
                           onclick="confirmMessage('Are you sure to place this reservation request?');">
                    <input type="reset" name="" value="Cancel" class="button">
                </div>
            </form>
        </div>
    </div>

<!--    current allocation listing section (popup)-->
    <div class="popupSection row" id="popupSection">
        <button class="closeButton" onclick="closeReservationMap();"><i class="fas fa-times fa-2x"></i></button>
        <span class="columnHeader">Current Reservation Map</span>
        <div class="dataTableArea" style="padding: 0 30px 30px;box-shadow:none">
            <div class="controlSection" style="margin:auto;padding: 0 20px 20px;">
                <span class="inputHeading">Select the date to search:</span>
                <input type="date" id="selectedDate" onchange="fillCurrentAllocationMap();">

            </div>
            <table border="1" id="allocationMap" class="allocationMap">
                <tr style="background-color: rgba(0, 0, 0, 0.04);">
                    <th rowspan="2">Lecture Halls & Computer Labs</th>
                    <th colspan="22" style="text-align: center;">Time Slots ( Between 08:00 and 19:00 )</th>
                </tr>
                <tr>

                    <?php
                    //creation of table header
                    $currentHour = 8;
                    $nextHour = 8;
                    $currentMinute = '00';
                    $nextMinute = '30';
                    for ($i = 0; $i < 22; $i++) {
                        if ($i % 2 == 1) {
                            $nextHour++;
                            $nextMinute = '00';
                        } else {
                            $nextMinute = '30';
                        }
//                        padding creation for time
                        $paddingCurrent = $currentHour < 10 ? '0' : '';
                        $paddingNext = $nextHour < 10 ? '0' : '';

                        echo("<th  class='timeHead'>$paddingCurrent$currentHour:$currentMinute - $paddingNext$nextHour:$nextMinute</th>");
                        $currentHour = $nextHour;
                        $currentMinute = $nextMinute;
                    }
                    ?>
                </tr>
                <?php
//                    load hall list and rest of the table
	                foreach ($controllerData[0] as $row){
		                $hallID = $row->getHallID();
//		                left corner column create base on db data
		                echo("<tr><td>$hallID</td>");
//		                add rest cells
		                for ($j = 0; $j < 22; $j++) {
			                echo("<td></td>");
		                }
		                echo("</tr>");
	                }
                ?>
            </table>
        </div>
    </div>

</div>
<?php basicLoader::loadFooter('../../'); ?>
<script src="../../assets/js/jquery.js"></script>
<script src="../../assets/js/toast.js"></script>
<script src="../../assets/js/changeTheme.js"></script>
<script src="assets/makeBooking.js"></script>
</body>
</html>
