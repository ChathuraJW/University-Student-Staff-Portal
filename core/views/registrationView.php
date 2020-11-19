<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../assets/css/gridSystem.css">
    <link rel="stylesheet" href="assets/registrationStyles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

<?php
foreach ($controllerData as $record) {
    if ($record['gender'] == 'M') {
        $gender = 'Male';
    } else {
        $gender = 'Female';
    }
}

?>

<!-- feature body section -->

<div class="featureBody">

    <!--    heading section of the page-->
    <div class="row" id="topic" style="margin:auto;width:60%;">
        <div class="row col-2" style="margin:auto;">
            <img class="logoSection" src="../assets/image/universityLogo.PNG" alt="University Logos">
            <img class="logoSection" src="../assets/image/footerLogoUSSP.png" alt="USSP Logo Logos">
        </div>
        <span class="mainHead">University Student-Staff Portal Registration</span>
    </div>


    <form action="" method="post" name="form" enctype="multipart/form-data">
        <!--        reset password section-->
        <div id="pwd" class="forms password">
            <div class="row col-1">
                <span class="heading">Change Password </span>
            </div>
            <div class="inputs">
                <div class="input">
                    <label for="password"><b>New Password</b></label>
                    <i class="fa fa-question-circle" onmouseover="visible('tooltipNewPassword');" aria-hidden="true">
                        <div style="visibility:hidden;" class="toolTip" id="tooltipNewPassword">
                            Filling is required
                            and LowerCase, UpperCase, Number, special Character must include and length must >
                            or = 8
                        </div>
                    </i>
                    <div class="data">
                        <input style="margin-bottom:55px;" class="inputField" type="password" placeholder="New Password"
                               name="password" id="password">
                    </div>
                </div>
                <div class="input">
                    <label for="repeatPassword"><b>Repeat Password</b></label>
                    <i class="fa fa-question-circle pswIconR" onmouseover="visible('tooltipRepeatPassword')" aria-hidden="true">
                        <div style="visibility:hidden;" class="toolTip" id="tooltipRepeatPassword">
                            Filling is required and Equal to first password
                        </div>
                    </i>
                    <input style="" class="inputField" type="password" placeholder="Repeat Password"
                           name="repeatPassword" id="repeatPassword">
                </div>

                <div class="row col-2 input actionSection">
                    <div></div>
                    <input class="button next" type="button" onclick="validatePassword()" name="next" value="Next">
                </div>
            </div>
        </div>

        <!--            basic info section-->
        <div id="bsc" class="forms basic" style="display:none;">

            <!-- GET DATA FROM USER TABLE-->
            <div class="row col-1">
                <h2 class="heading">Basic Information</h2>
            </div>
            <div class="basicInputs">
                <div class="input">
                    <label for="firstName">
                        <b>First Name</b>
                    </label>
                    <i class="fa fa-question-circle " onmouseover="visible('tooltipFirstName')" aria-hidden="true">
                        <div style="visibility:hidden;" class="toolTip" id="tooltipFirstName">
                            Ex Chathura Janaranjana
                        </div>
                    </i>
                    <input type="text" placeholder="Enter Name" name="firstName"
                           id="firstName" <?php echo "value='" . $record['firstName'] . "'" ?> disabled>
                </div>

                <div class="input">
                    <label for="lastName"><b>Last Name</b></label>
                    <i class="fa fa-question-circle " onmouseover="visible('tooltipLastName')" aria-hidden="true">
                        <div style="visibility:hidden;" class="toolTip" id="tooltipLastName">
                            Ex Wanniarachchi
                        </div>
                    </i>
                    <input type="text" placeholder="Enter Name" name="lastName"
                           id="lastName" <?php echo "value='" . $record['lastName'] . "'" ?> disabled>
                </div>
                <div class="input">
                    <label for="fullName"><b>Full Name</b></label>
                    <i class="fa fa-question-circle " onmouseover="visible('tooltipFullName')" aria-hidden="true">
                        <div style="visibility:hidden;" class="toolTip" id="tooltipFullName"> Ex
                            Wanniarachchilage Chathura Janaranjana Wanniarachchi
                        </div>
                    </i>
                    <input type="text" placeholder="Enter Name" name="fullName"
                           id="fullName" <?php echo "value='" . $record['fullName'] . "'" ?> disabled>
                </div>
            </div>
            <div class="row col-2 input" style="padding: 0;">
                <div>
                    <label for="gender"><b>Gender</b></label>
                    <i class="fa fa-question-circle " onmouseover="visible('tooltipGender')"
                       aria-hidden="true">
                        <div style="visibility:hidden;" class="toolTip" id="tooltipGender"> Ex
                            Wanniarachchi
                        </div>
                    </i>
                    <select name="gender" id="gender" required>
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                    </select>
                </div>
                <div>
                    <label for="salutation"><b>Salutation</b></label>
                    <i class="fa fa-question-circle " onmouseover="visible('tooltipSalutation')"
                       aria-hidden="true">
                        <div style="visibility:hidden;" class="toolTip" id="tooltipSalutation"> Choose from
                            dropdown
                        </div>
                    </i>
                    <select name="salutation"
                            id="salutation" <?php echo "value='" . $record['salutation'] . "'" ?> required>
                        <option value="Rev">Rev</option>
                        <option value="Dr">Dr</option>
                        <option value="Mr">Mr</option>
                        <option value="Mrs">Mrs</option>
                        <option value="Miss">Ms</option>
                    </select>
                </div>
            </div>

            <div class="row col-2 input" style="padding: 0;">
                <div>
                    <label for="nic"><b>National Identity Card Number</b></label>
                    <i class="fa fa-question-circle " onmouseover="visible('tooltipNIC')" aria-hidden="true">
                        <div style="visibility:hidden;" class="toolTip" id="tooltipNIC">
                            Required information
                        </div>
                    </i>
                    <input type="text" placeholder="Enter NIC" name="nic"
                           id="nic" <?php echo "value='" . $record['nic'] . "'" ?> disabled>
                </div>
                <div>
                    <label for="dob"><b>Date of Birth</b></label>
                    <i class="fa fa-question-circle " onmouseover="visible('tooltipDOB')" aria-hidden="true">
                        <div style="visibility:hidden;" class="toolTip" id="tooltipDOB"> Required
                            information
                        </div>
                    </i>
                    <input type="date" name="dob" id="dob" <?php echo "value='" . $record['dob'] . "'" ?> disabled>

                </div>
            </div>
            <div class="row col-2 input actionSection">
                <input class="button" type="button" onclick="backToChangePassword()" name="previous" value="Previous">
                <input class="button next" type="button" onclick="BasicDetails()" name="next" value="Next">
            </div>
        </div>
</div>
<!--                contact information section-->
<div id="cnt" class="forms contact " style="display:none;">
    <div class="row col-1">
        <h2 class="heading">Contact Details</h2>
    </div>
    <div class="inputs basicInputs">
        <div class="input">
            <label for="telephone"><b>Telephone</b></label>
            <i class="fa fa-question-circle " onmouseover="visible('tooltipTelephone')" aria-hidden="true">
                <div style="visibility:hidden;" class="toolTip" id="tooltipTelephone">
                    Required information
                </div>
            </i>
            <input type="text" placeholder="Enter Telephone number" name="telephone" id="telephone" required>
        </div>
        <div class="input">
            <label for="address"><b>Address</b></label>
            <i class="fa fa-question-circle " onmouseover="visible('tooltipAddress')" aria-hidden="true">
                <div style="visibility:hidden;" class="toolTip" id="tooltipAddress">
                    Required information
                </div>
            </i>
            <input type="text" placeholder="Enter Address" name="address" id="address" required>
        </div>
        <div class="row col-2 input">
            <div>
                <label for="personalEmail"><b>Personal Email</b></label>
                <i class="fa fa-question-circle " onmouseover="visible('tooltipPersonalEmail')" aria-hidden="true">
                    <div style="visibility:hidden;" class="toolTip" id="tooltipPersonalEmail"> Required
                        information
                    </div>
                </i>
                <input type="email" placeholder="Enter Personal Email" name="personalEmail"
                       id="personalEmail" required>
            </div>
            <div>
                <label for="universityMail"><b>University Email</b></label>
                <i class="fa fa-question-circle " onmouseover="visible('tooltipUniversityMail')" aria-hidden="true">
                    <div style="visibility:hidden;" class="toolTip" id="tooltipUniversityMail"> Enter Valid Input
                    </div>
                </i>
                <input type="email" placeholder="Enter University Email" name="universityMail"
                       id="universityMail" <?php echo "value='" . $record['universityEmail'] . "'" ?> disabled>
            </div>
        </div>

        <div class="row col-2 input actionSection">
            <div><input class="button" type="button" onclick="backToBasicInformation()" name="previous"
                        value="Previous">
            </div>
            <div><input class="button next" type="button" onclick="contactDetails()" name="next"
                        value="Next"></div>
        </div>
    </div>
</div>

<!--                profile picture section-->
<div id="img" class="forms" style="display:none;">
    <div class="row col-1">
        <h2 class="heading">Profile Image</h2>
    </div>
    <div class="inputs profilePictureUpload">
        <label for="profilePic" id="imageLoadContainer">
            <img class="profile" id="output" src="assets/uploadIcon.png">
        </label>
        <input class="inputField choose" type="file" accept="image/*" onchange="loadFile(event)" name="profilePic" id="profilePic">
    </div>
    <div class="row col-2 input actionSection">
        <input class="button" type="button" onclick="backToContactInformation()" name="previous" value="Previous">
        <input class="button next" type="submit" name="submit" value="Submit">
    </div>
</div>
</form>
</div>
<div class="pages" id="pages">
    <span id="pageChangePassword" class="pageNumber" style="background-color: black;">1</span>
    <span id="pageBasicInfo" class="pageNumber">2</span>
    <span id="pageContactDetails" class="pageNumber">3</span>
    <span id="pageProfilePicture" class="pageNumber">4</span>
</div>

<script src="../assets/js/jquery.js"></script>
<script src="assets/registrationScript.js"></script>
</body>
</html>