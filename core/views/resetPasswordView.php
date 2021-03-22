<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="assets/forgetPasswordStyles.css">
    <link rel="stylesheet" href="../assets/css/gridSystem.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>


<!-- include header section -->
<?php require('../assets/php/basicLoader.php') ?>
<header>
    <div class='overlay row col-3'>
        <div class='imgSection'>
            <img src='../assets/image/universityLogo.png' alt='UOC_logo'/>
        </div>
        <div class='textSection'>
            <span class='mainText'>University Student-Staff Portal</span><br>
            <span class='uniName'>University of Colombo School of Computing<br>Sri Lanka</span>
        </div>
        <div class='imgSection'>
            <img src='../assets/image/logoUSSP.png' alt='UCSC_logo'/>
        </div>
    </div>
</header>

<div class='toastArea' id='toastArea'></div>
<!-- feature body section -->
<div class="featureBody bodyBackground text">

    <!-- this form will get the new password -->
    <form class="form" id="resetPasswordForm" method="post" action="">
        <div class="head">Forget Password</div>
        <div>
            <div>
                <label for="password" class="inputLabel">New Password &nbsp;&nbsp;
                    <i class="fa fa-question-circle" onmouseover="visible('tooltipNewPassword');" aria-hidden="true">
                        <span style="visibility:hidden;" class="toolTip" id="tooltipNewPassword"></span>
                    </i>
                </label>
                <input class="inputField" type="password" placeholder="New Password" name="password" id="password">
            </div>
            <br>
            <div>
                <label for="repeatPassword" class="inputLabel">Repeat Password &nbsp;&nbsp;
                    <i class="fa fa-question-circle pswIconR" onmouseover="visible('tooltipRepeatPassword')" aria-hidden="true">
                        <span style="visibility:hidden;" class="toolTip" id="tooltipRepeatPassword"></span>
                    </i>
                </label>
                <input class="inputField" type="password" placeholder="Repeat Password" name="repeatPassword" id="repeatPassword">
            </div>
            <br><br>
            <div class="actionSection">
                <input class="button next" type="button" onclick="validatePassword()" name="submitReset" value="Reset Password">
            </div>
        </div>
    </form>
</div>

<!-- include footer section -->
<?php BasicLoader::loadFooter('../') ?>

<script src='../assets/js/jquery.js'></script>
<script src="../assets/js/toast.js"></script>
<script src="../assets/js/changeTheme.js"></script>
<script src="assets/resetPassword.js"></script>
</body>
</html>