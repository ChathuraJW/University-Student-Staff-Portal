<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="assets/sendMessageStyle.css">
    <link rel="stylesheet" href="../../assets/css/gridSystem.css">
</head>
<body>
<!-- include header section -->
<?php require_once('../../assets/php/basicLoader.php') ?>
<?php basicLoader::loadHeader('../../'); ?>

<!-- feature body section -->
<div class="featureBody bodyBackgrond text">
    <div class="container">
        <div class="row col-1">

            <h1><b> Send Messages </b></h1>
            <br>
            <a class=inbox href="receiveMessage">

                <button class="button" style="position: relative; left: 42%;" id="receiveMessages">Inbox</button>
            </a>

            <a class=sentBox href="sentBox">

                <button class="button" style="position: relative; left: 42%;" id="sentMessages">Sent Box</button>
            </a>

        </div>
        <div class="row col-2">
            <div class="contacts">
                <label for="option"><b> Select the contacts</b> </label>
                <br>
                <br>


                <!--<div class="row col-3">-->


                <?php
                //if (isset($_COOKIE['role']) & $_COOKIE['role'] !== 'ST') {
                    echo("
                <div>
                <select id='academicStaffList' name='academicStaffList' onchange='addStaffRecipient('academicStaffList');'>
                <option value=''>Academic Staff</option>
                ");
                    foreach ($controllerData[0] as $data) {
                        echo("<option value='$data[userName]'>" . $data['fullName'] . " - " . $data['userName'] . "</option>");
                    }
                    echo("
                </select>
                <br>
                <br>
            </div>

            <div>
                <select id='academicSupportiveList' name='academicSupportiveList' onchange='addStaffRecipient('academicSupportiveList');' >
                <option value=''>Academic Supportive Staff</option>
                ");

                    foreach ($controllerData[2] as $data) {
                        echo("<option value='$data[userName]'>" . $data['fullName'] . " - " . $data['userName'] . "</option>");
                    }

                    echo("
                </select>

                <br>
                <br>
            </div>

            <div>
                <select id='administrativeList' name='administrativeList' onchange='addStaffRecipient('administrativeList');'>
                <option value=''>Administrative Staff</option>
                ");

                    foreach ($controllerData[1] as $data) {
                        echo("<option value='$data[userName]'>" . $data['fullName'] . " - " . $data['userName'] . "</option>");
                    }
                    echo("
                </select>

                <br>
                <br>

            </div>
            ");
                //}
                ?>

                <div>

                    <select id="studentList" name="studentList" onchange="addStaffRecipient('studentList');">
                        <option value="">Student</option>
                        <?php

                        foreach ($controllerData[3] as $data) {
                            echo("<option value='$data[userName]'>" . $data['fullName'] . " -  " . $data['userName'] . " </option>");
                        }
                        ?>

                    </select>

                    <br>
                    <br>

                </div>

                <br>
                <br>
                <form action=" " method="POST">

                    <label style="text-align: left;">Contacts </label>
                    <br>
                    <textarea cols="70" rows="3" name="contacts " class="textarea" id="contacts"></textarea>
                    <br><br>
            </div>

            <div class="message">
                <br>
                <br>
                <label> Title </label>
                <br>
                <textarea name="title" cols="50" class="textarea"></textarea>


                <br>
                <br>


                <label> Message </label>
                <br>
                <textarea name="message" rows="5" cols="50" class="textarea"></textarea>


                <br>
                <br>
                <div class="buttonCouple"> 
                    <button class="button" name="submit" type="submit">Send</button>
                    <button class="button" name="cancel">Cancel</button>
                </div>

                </form>

                <br>
                <br>
            </div>
            <!--
          <div class="sentBox">
            <h2><b>Sent Box </b></h2> 
            <?php
            foreach ($controllerData[3] as $data) {


                echo("
              <a class='messageEntry' style='background-color: rgb(87, 6, 69)' href='?messageID=" . $data['messageID'] . ">
                <span class='sender'>Sender: " . $data['sendBy'] . "</span><br>
                <span class='messageContent'>" . $data['message'] . "</span><br>
                <span class='messageSendTimestamp'>" . $data['timestamp'] . "</span>
              </a>
            ");

            }

            ?>
          
          </div>
          -->
            <!--<div class="displayMessage">
          <?php
            if (isset($_GET['messageID'])) {
                foreach ($controllerData[3] as $data) {
                    if ($data['messageID'] == $_GET['messageID']) {


                    }
                    echo("
                    <span class='senderDetail'>Sender: " . $data['sendBy'] . "</span><br>
                    <span class='SendTimestampDetail'>Send at: " . $data['timestamp'] . "</span><br>
                    <span class='titleDetail'>" . $data['title'] . "</span><br>
                    <span class='messageDetail'>" . $data['message'] . "</span><br>
                     
                    
                  ");
                }

            }
            ?>
        </div>-->
        </div>


        <br>
        <br>
        <!--<form action = " " method="POST">

          <label style="text-align: left;">Contacts </label>
          <br>
          <textarea cols="100" name="contacts" style="font-size:15px;  background-color: rgb(198, 241, 198); box-shadow:8px 8px 16px 0px rgba(0,0,0,0.2);" id="contacts" readonly></textarea>

            <br>
            <br>
            <label> Title </label>
            <br>
            <textarea name = "title" cols="70" style="font-size:16px; background-color: rgb(198, 241, 198); box-shadow:8px 8px 16px 0px rgba(0,0,0,0.2);"></textarea>



          <br>
          <br>


            <label> Message </label>
            <br>
            <textarea name = "message" rows="5" cols="70" style="font-size:16px; background-color:rgb(198, 241, 198); box-shadow:8px 8px 16px 0px rgba(0,0,0,0.2);"></textarea>


          <br>


            <button class="button submit" name="submit" type="submit" style= "background-color: #4CAF50">Send
            </button>

            <button class="button cancel" colour="green" style="background-color: #FF0000">Cancel
            </button>


        </form>

        <br>
        <br>-->
    </div>


</div>


<!-- include footer section -->
<?php basicLoader::loadFooter('../../'); ?>

<script src="assets/sendMessageJs.js">
</script>
</body>
</html>