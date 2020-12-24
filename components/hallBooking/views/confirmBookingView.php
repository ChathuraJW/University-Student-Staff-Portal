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
    <span class="heading">Review Hall Reservation Request</span>
    <div class="row col-2">
        <div class="bookingRequest">
            <span class="columnHeader">Booking Requests</span>
<!--            TODO if needed will apply-->
<!--            <div class="orderingSection">-->
<!--                <span>Order By</span>-->
<!--                <div class="OptionWrapper row col-4">-->
<!--                    <button type="radio" id="orderByDate" onclick="rearrangeContent('orderByDate');">Request Date-->
<!--                    </button>-->
<!--                    <button type="radio" id="orderByRole" onclick="rearrangeContent('orderByRole');">Requester Role-->
<!--                    </button>-->
<!--                    <button type="radio" id="orderByHall" onclick="rearrangeContent('orderByHall');">Requested Hall-->
<!--                    </button>-->
<!--                    <button type="radio" id="orderByRequestedType" onclick="rearrangeContent('orderByRequestedType');">-->
<!--                        Requested Type-->
<!--                    </button>-->
<!--                </div>-->
<!--            </div>-->
            <!--            load request to review-->
			<?php
				//                iterate throughout each request send form model and create entries
				foreach ($controllerData[0] as $row) {
					echo("
                         <a class='bookingEntry normalEntry' id='resReq" . $row->getReservationID() . "' style='display:block;' href='?operation=review&requestID=" . $row->getReservationID() . "#respondingSection'>
                            <span class='bookingEntryContent'>Request ID: <b>" . $row->getReservationID() . "</b></span>
                            <div class='row col-2' style='padding:0;'>
                                <span class='bookingEntryContent'>Lecture Hall/Lab: <b>" . $row->getHallID() . "</b></span>
                                <span class='bookingEntryContent'>For: <b>" . $row->getReservationType() . "</b></span>
                            </div>
                            <div class='row col-2' style='padding:0;'>
                                <span class='bookingEntryContent'>From: <b>" . $row->getFrom() . "</b></span>
                                <span class='bookingEntryContent'>To: <b>" . $row->getTo() . "</b></span>
                            </div>
                            <span class='bookingEntryContent' style='padding:10px;text-align: justify;'>Description:<br><b>" . $row->getDescription() . "</b></span>
                            <span class='bookingEntryContent' style='float: right;'><b>Appointment made at: " . $row->getRequestMadeAt() . "</b></span>
                         </a>
                    ");
				}
			?>
        </div>
        <!--        load selected request to review-->
		<?php
			//            check whether user clicked a request to review
			//TODO try to implement this section using more easy to read way such as block php statements
			if (isset($controllerData[1][0])) {
				$openReservationData = $controllerData[1][0];
				//                create request view
				echo("
                        <div class='respondingSection' id='respondingSection'>
                            <span class='columnHeader'>Review Request (#" . $openReservationData->getReservationID() . ")</span>
                            <span class='respondingSectionHead'>Basic Information</span>
                            <span class='respondingSectionContent'><b>Requested By:</b> " . $openReservationData->getReservedFullName() . " (" . $openReservationData->getReservedBy() . ")</span>
                            <span class='respondingSectionContent'><b>Booking For:</b> " . $openReservationData->getReservationType() . "</span>
                            <span class='respondingSectionContent'><b>Booking Description:</b> " . $openReservationData->getDescription() . "</span>
                            <span class='respondingSectionHead'>Reservation Details</span>
                            <span class='respondingSectionContent'><b>Requested Date:</b> " . $openReservationData->getRequestMadeAt() . "</span>
                            <span class='respondingSectionContent'><b>Hall/ Lab:</b> " . $openReservationData->getHallID() . "</span>
                            <span class='respondingSectionContent'><b>Time Period:</b></span>
                            <div class='row col-2' style='padding-top: 0;padding-bottom: 0;margin-bottom: 0;margin-top: 0;font-size: 16px;'>
                                <span class='respondingSectionContent'><b>From:</b> " . $openReservationData->getFrom() . "</span>
                                <span class='respondingSectionContent'><b>To:</b> " . $openReservationData->getTo() . "</span>
                            </div>
                            <span class='respondingSectionContent'><b>Reservation Request for Same Slot:</b></span>
                            <table class='sameSlotDetails'>
                                <tr>
                                    <th>Request ID</th>
                                    <th>Reservation From</th>
                                    <th>Reservation For</th>
                                    <th>Requested Date</th>
                                </tr>
                    ");
				//                similar slot request loading
				foreach ($controllerData[1][1] as $row) {
					$requestID = $row->getReservationID();
					echo("
                                <tr>
                                    <td>
                                        <a href='#resReq$requestID' style='text-decoration: none;color:var(--baseColor)' 
                                        title='Click hear for go to review hall reservation request (Req.ID $requestID).'>Req.ID $requestID
                                        </a>
                                    </td>
                                    <td>" . $row->getReservedFullName() . "</td>
                                    <td>" . $row->getReservationType() . "</td>
                                    <td>" . $row->getRequestMadeAt() . "</td>
                                </tr>
                            ");
				}
				//                display message if there have no request for same slot
				echo("</table>");
				if (sizeof($controllerData[1][1]) == 0)
					echo("
                         <span style='font-size: 18px;text-align: center;padding-top: 10px;'>No more request for same slot.
                         </span>
                     ");
				echo("
                <span class='respondingSectionHead'>Confirm reservation</span>
                <form action='' method='post'>
                <div class='row col-2'>
                <div>
                    <span class='respondingSectionHead' style='font-size: 17px;'>Selected request:</span>
                    <select name='selectedRequestID' id='selectedRequestID' style='margin: 10px;' required>
                    <option value='" . $_GET['requestID'] . "'>Request #" . $_GET['requestID'] . "</option>
            ");
				foreach ($controllerData[1][1] as $row) {
					$requestID = $row->getReservationID();
					echo("<option value='$requestID'>Request #$requestID</option>");
				}
				echo("
                </select>
                </div>
                <div style='padding: 10px;'>
                <input type='checkbox' name='confirmBooking' id='confirmBooking' style='display: inline;' required> 
                <span style='font-size: 17px;text-align: justify;display: grid;'>
                    I reviewed all requests for the same slot carefully, and decided to reserve the timeslot for the selected request.
                </span>
                </div>
                </div>



    ");
				echo("
                        <div class='buttonCouple'>
                            <button type='button' class='button' name='requestConfirm' value='Confirm' onclick='confirmSelectedBooking();' id='requestConfirm'>Confirm</button>
                            <button type='button' class='button' name='respondLater' value='Respond Later' id='respondLater' onclick='respondOperation(" . $_GET['requestID'] . ")'>Respond Later</button>
                        </div>
                     </div>
                     </form>
                ");
			}
		?>
    </div>
</div>
<?php basicLoader::loadFooter('../../'); ?>
<script src="../../assets/js/jquery.js"></script>
<script src="../../assets/js/toast.js"></script>
<script src="assets/confirmBooking.js"></script>

</body>
</html>
