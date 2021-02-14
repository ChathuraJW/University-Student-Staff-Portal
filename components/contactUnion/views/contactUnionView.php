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
    <link rel="stylesheet" href="assets/contactUnionSection.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

</head>
<body>
<?php require_once('../../assets/php/basicLoader.php') ?>
<?php basicLoader::loadHeader('../../'); ?>
<div class="featureBody text bodyBackground">
    <span class="heading">Contact Student Union</span>
    <div class="row col-2">
        <div class="historySection">
            <span class="columnHeader">Message History</span>
			<?php
				if (!$controllerData)
					echo("
                        <span class='emptyMessage'>No Message History.</span>
                    ");
				else
					for ($i = 0; $i < sizeof($controllerData); $i++) {
						//text size based resize button enable and content height adjustment
						if (strlen($controllerData[$i]->getMessage()) < 250) {
							$heightValue = 'auto';
							$displayStatus = 'none';
						} else {
							$heightValue = '110px';
							$displayStatus = 'block';
						}
						//anonymous check
						if ($controllerData[$i]->isAnonymous()) {
							$anonymousIconDisplay = 'inline-block';
						} else {
							$anonymousIconDisplay = 'none';
						}

						echo("
                        <div class='messageEntry normalEntry' id='entry$i'>
                            <span class='messageEntryContent'><b>" . $controllerData[$i]->getTitle() . "</b></span>
                            <span class='messageEntryContent' style='overflow:hidden;height:$heightValue;text-overflow: ellipsis;text-align: justify;' id='content$i'>" . $controllerData[$i]->getMessage() . "</span>
                            <span class='messageEntryContent' style='font-size:15px;'><button class='readMore' id='readMore$i' style='display:$displayStatus;' onclick='loadMore($i)'>Read More...</button></span>
                            <span class='messageEntryContent' style='float:right;'><b><i style='display:$anonymousIconDisplay ;' class='fa fa-user-secret''></i>&nbsp;&nbsp;&nbsp;<i class='fas fa-calendar-day'>&nbsp;" . $controllerData[$i]->getData() . "</i>&nbsp;&nbsp;<i class='fas fa-clock'>&nbsp;" . $controllerData[$i]->getTime() . "</i></b></span>
                        </div>
                    ");
					}
			?>
        </div>
        <div class="newMessageSection">
            <span class="columnHeader">Send New Message</span>
            <form class="" method="post" id="createMessageForUnion">
                <span class="inputHeading">Title:</span>
                <input type="text" name="messageTitle" required><br><br>
                <span class="inputHeading">Message:</span>
                <textarea name="messageContent" id="messageContent" rows="20" style=" resize: none;" required>
                </textarea><br><br>
                <span class="inputHeading">Anonymous Messages:</span><br>
                <div class="row col-3">
                    <div>If you want to send that message anonymously turn on the switch.</div>
                    <div style="margin: auto;">
                        <label class="switch">
                            <input type="checkbox" name="anonymousCheck" id="anonymousCheck" onclick="isAnonymous();">
                            <span class="slider"></span>
                        </label>
                    </div>
                    <div style="margin-left: 20px;">
                        <i class="fa fa-file-signature fa-2x" style="color: var(--successColor);" id="confident"></i>
                        <i class="fa fa-user-secret fa-2x" id="anonymous" style="display: none;color: var(--dangerColor);"></i>
                    </div>
                </div>
                <div class="buttonCouple">
                    <input type="submit" name="sendMessage" value="Send The Message" class="button"
                           onclick="confirmMessage('Are You Sure to Send This Message ?');">
                    <input type="reset" name="" value="Cancel" class="button">
                </div>
            </form>
        </div>
    </div>
</div>
<?php basicLoader::loadFooter('../../'); ?>
<script src="../../assets/js/jquery.js"></script>
<script src="../../assets/js/toast.js"></script>
<script src="../../assets/js/changeTheme.js"></script>
<script src="assets/contactUnion.js"></script>
</body>
</html>