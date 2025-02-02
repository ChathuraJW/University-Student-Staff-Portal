<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="assets/receiveMessageStyle.css">
    <link rel="stylesheet" href="../../assets/css/gridSystem.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>
<body class="featureBody bodyBackground text">
<!-- include header section -->
<?php require_once('../../assets/php/basicLoader.php') ?>
<?php basicLoader::loadHeader('../../'); ?>


<!-- feature body section -->
<div class="featureBody">
    <span class="heading">Message Inbox</span>
    <a class=backToPage href="sendMessage">
        <i class="fa fa-arrow-circle-left fa-2x" style="position: relative;color: var(--fontColor); left: 1%;" id="back"></i>
    </a>
    <div class="row col-2">
        <div class="messageList">

			<?php

				foreach ($controllerData as $data) {
					if ($data->getIsViewed()) {
						$backgroundColor = 'rgb(100 121 143)';
						$messageState = 'none';

					} else {
						$backgroundColor = 'rgb(80 61 84)';
						$messageState = 'flex';
					}


					echo("
              <a class='messageEntry' style='background-color: $backgroundColor;' href='?messageID=" . $data->getMessageID() . "&messageState=$messageState'>
                <span class='sender'>Sender: " . $data->getSendBy() . "</span><br>
                <span class='messageContent'>" . $data->getMessage() . "</span><br>
                <span class='messageSendTimestamp'>" . $data->getTimestamp() . "</span>
              </a>
            ");

				}

			?>
        </div>
        <div class="displayMessage">
			<?php
				if (isset($_GET['messageID'])) {
					foreach ($controllerData as $data) {
						if ($data->getMessageID() == $_GET['messageID']) {

							echo("
                    <span class='senderDetail'>Sender: " . $data->getSendBy() . "</span><br>
                    <span class='SendTimestampDetail'>Send at: " . $data->getTimestamp() . "</span><br>
                    <span class='titleDetail'>" . $data->getTitle() . "</span><br>
                    <span class='messageDetail'>" . $data->getMessage() . "</span><br>
                    <a href='?activity=markAsRead&messageIDForReadConfirm=" . $_GET['messageID'] . "' style='color:var(--fontColor);float: right;display: " . $_GET['messageState'] . ";'>Mark as read</a>
                    
                  ");
							break;
						}
					}

				}
			?>
        </div>
    </div>

</div>

<!-- include footer section -->
<?php basicLoader::loadFooter('../../'); ?>

</body>
</html>
<script src="../../assets/js/jquery.js"></script>
<script src="../../assets/js/toast.js"></script>
<script src="../../assets/js/changeTheme.js"></script>