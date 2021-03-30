<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="assets/sentBoxStyle.css">
    <link rel="stylesheet" href="../../assets/css/gridSystem.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>
<body class="bodyBackground text">
<!-- include header section -->
<?php require_once('../../assets/php/basicLoader.php') ?>
<?php basicLoader::loadHeader('../../'); ?>


<!-- feature body section -->
<div class="featureBody">
    <span class="heading">Sent Box</span>

    <a class="back" href="sendMessage">
        <i class="fa fa-arrow-circle-left fa-2x" style="position: relative;color: var(--fontColor); left: 1%;" id="back"></i>
    </a>
    <div class="row col-2">
        <div class="messageList">
			<?php
				foreach ($controllerData as $data) {
					echo("
              <a class='messageEntry' style='background-color: var(--entryBackgroundColor)' href='?messageID=" . $data->getMessageID() . "'>
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
					$receivedBy=array();
					$isViewed=array();
					foreach ($controllerData as $data) {
						if ($data->getMessageID() == $_GET['messageID']) {
						    $receivedBy=$data->getReceivedBy();
						    $isViewed=$data->getIsViewed();
							$timestamp = $data->getTimestamp();
							$title = $data->getTitle();
							$message = $data->getMessage();
						}
					}
					echo("
                    <span class='SendTimestampDetail'>Send at: " . $timestamp . "</span><br><br>
                    <span class='messageDetail'>" . $message . "</span><br> 
                    Receivers List: 
                  ");
					for($i=0;$i<sizeof($receivedBy);$i++){
					    if($isViewed[$i]){
						    echo("<span class='messageDetail' style='color:var(--successColor)'>" . $receivedBy[$i] . " (Viewed)</span>");
					    }else{
						    echo("<span class='messageDetail'  style='color:var(--dangerColor)'>" . $receivedBy[$i] . " (Not Viewed)</span>");
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