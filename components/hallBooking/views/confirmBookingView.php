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
<div class="featureBody">
    <span class="heading">Review Hall Reservation Request</span>
    <div class="row col-2">
        <div class="bookingRequest">
            <span class="columnHeader">Booking Requests</span>
            <div class="orderingSection">
                <span>Order By</span>
                <div class="OptionWrapper row col-4">
                    <button type="radio" id="orderByDate" onclick="rearrangeContent('orderByDate');">Request Date
                    </button>
                    <button type="radio" id="orderByRole" onclick="rearrangeContent('orderByRole');">Requester Role
                    </button>
                    <button type="radio" id="orderByHall" onclick="rearrangeContent('orderByHall');">Requested Hall
                    </button>
                    <button type="radio" id="orderByRequestedType" onclick="rearrangeContent('orderByRequestedType');">
                        Requested Type
                    </button>
                </div>
            </div>
            <?php
            $arrContent = array('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus corporis nihil optio, facere molestiae repellendus laborum, earum harum reprehenderit provident nesciunt id aut.', 'Lorem ipsum dolor sit.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed cumque dolorem ratione, ipsam quibusdam suscipit sunt consectetur soluta id a placeat magni, explicabo libero aliquid eaque nemo voluptatem provident, ut atque architecto excepturi aut facere quam officiis nobis. Ipsa provident sit totam quod, cum amet fuga fugiat a exercitationem iusto! Eveniet quas quis, molestias, explicabo voluptatem in.');
            for ($i = 0; $i < 10; $i++) {
                echo("
                    <div class='bookingEntry red' style='display:grid;'>
                      <div class='row col-2' style='padding:0;'>
                        <span class='bookingEntryContent'>Lecture Hall/Lab: <b>S104</b></span>
                        <span class='bookingEntryContent'>For: <b>Lecture</b></span>
                      </div>
                      <div class='row col-2' style='padding:0;'>
                        <span class='bookingEntryContent'>From: <b>01/03/2020 13:00:00</b></span>
                        <span class='bookingEntryContent'>To: <b>01/03/2020 14:00:00</b></span>
                      </div>
                      <span class='bookingEntryContent' style='padding:10px;text-align: justify;'>Description:<br><b> " . $arrContent[$i % 3] . " </b></span>
                      <span class='bookingEntryContent'>Appointment made at: <b>01/03/2020 14:00:00</b></span>
                      <span class='bookingEntryContent'>Appointment made by: <b>Saman Wikramanayake-SWK (Staff)</b></span>
                    </div>
                ");
            }
            ?>
        </div>
        <div class="respondingSection">
            <span class="columnHeader">Review Request (#11344)</span>
            <span class="respondingSectionHead">Basic Information</span>
            <span class="respondingSectionContent"><b>Requested By:</b> A.B.C Perera-2018CS124 (Student)</span>
            <span class="respondingSectionContent"><b>Booking For:</b> Student Meeting</span>
            <span class="respondingSectionContent"><b>Booking Description:</b> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur dolore, enim iusto nam nemo quia sit vel voluptatum. Accusantium blanditiis error iure nostrum pariatur repudiandae saepe. Assumenda dolores eaque illo magnam nesciunt pariatur praesentium quas quisquam, soluta. Sequi, voluptatibus.</span>
            <span class="respondingSectionHead">Renovation Details</span>
            <span class="respondingSectionContent"><b>Requested Date:</b> 13/11/2020 12:23:34</span>
            <span class="respondingSectionContent"><b>Hall/ Lab:</b> E401</span>
            <span class="respondingSectionContent"><b>Time Period:</b></span>
            <div class="row col-2"
                 style="padding-top: 0;padding-bottom: 0;margin-bottom: 0;margin-top: 0;font-size: 16px;">
                <span class="respondingSectionContent"><b>From:</b> 23/11/2020 08:00</span>
                <span class="respondingSectionContent"><b>To:</b> 23/11/2020 10:00</span>
            </div>
            <span class="respondingSectionContent"><b>Reservation Request for Same Slot:</b></span>
            <table class="sameSlotDetails">
                <tr>
                    <th>Request ID</th>
                    <th>Reservation From</th>
                    <th>Reservation For</th>
                    <th>Requested Date</th>
                </tr>
                <?php
                for ($i = 0; $i < 5; $i++) {
                    echo("
                        <tr>
                            <td><a href='#' style='text-decoration: none;' title='Click hear for go to review hall reservation request RID$i.'>RID$i</a></td>
                            <td>Saman Perera</td>
                            <td>Tutorial</td>
                            <td>12/11/2020 15:44:32</td>
                        </tr>
                    ");
                }
                ?>
            </table>
            <span class="respondingSectionHead">Confirm reservation</span>
            <div class="row col-2 confirmSection">
                <button type="radio" class="green" style="margin-left: auto;margin-right:0;" value="confirm"
                        id="requestConfirm"><i class="fas fa-check"></i>&emsp; Confirm
                </button>
                <button type="radio" class="red" value="reject" id="requestReject"><i class="fas fa-times"></i>&emsp;
                    Reject
                </button>
            </div>
        </div>
    </div>
</div>
<?php basicLoader::loadFooter('../../'); ?>
<script src="../../assets/js/jquery.js"></script>
<script src="assets/confirmBooking.js"></script>
</body>
</html>
