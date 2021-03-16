
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="assets/forgetPasswordStyles.css">
    <link rel="stylesheet" href="../../assets/css/gridSystem.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
    <!-- <?php require('../../assets/js/jquery.js')?> -->
    
    <!-- include header section -->
    <?php require('../../assets/php/basicLoader.php')?>
    <?php BasicLoader::loadHeader('../../') ?>
    
    <!-- feature body section -->
    <style>
        .form{
            margin: auto;
            border-width: 10px;
            border: black;
            width:50%;
            margin-top:10%;
            margin-left:25%;
            margin-right:25%;
            background-color: rgb(255, 243, 176);
            padding:5%;
        }
    </style>
    <div class="featureBody bodyBackground text" >


        <form class="form"id="form" action="">

        <div class="inputs">
                <div class="input">
                    <label for="password"><b>New Password</b></label>
                    <i class="fa fa-question-circle" onmouseover="visible('tooltipNewPassword');" aria-hidden="true">
                        <span style="visibility:hidden;" class="toolTip" id="tooltipNewPassword"></span>
                    </i>
                    <div class="data">
                        <input style="margin-bottom:55px;" class="inputField" type="password" placeholder="New Password" name="password" id="password">
                    </div>
                </div>
                <div class="input">
                    <label for="repeatPassword"><b>Repeat Password</b></label>
                    <i class="fa fa-question-circle pswIconR" onmouseover="visible('tooltipRepeatPassword')" aria-hidden="true">
                        <span style="visibility:hidden;" class="toolTip" id="tooltipRepeatPassword"></span>
                    </i>
                    <div class="data">
                    <input style="" class="inputField" type="password" placeholder="Repeat Password" name="repeatPassword" id="repeatPassword">
                    </div>
                </div>
                <div class="row col-2 input actionSection">
                    <div></div>
                    <input class="button next" type="button" onclick="validatePassword()" name="submitReset" value="RESET">
                </div>
            </div>

        </form>


        
   
    </div>
    <script src='../../assets/js/jquery.js'></script>
    <script>
        jQuery.get('assets/toolTips.xml', function (fileContent) {
            document.getElementById('tooltipNewPassword').innerHTML = $(fileContent).find("newPassword").text();
            document.getElementById('tooltipRepeatPassword').innerHTML = $(fileContent).find("repeatPassword").text();
            document.getElementById('tooltipFirstName').innerHTML = $(fileContent).find("systemCompletedField").text();
            document.getElementById('tooltipLastName').innerHTML = $(fileContent).find("systemCompletedField").text();
            document.getElementById('tooltipFullName').innerHTML = $(fileContent).find("systemCompletedField").text();
            document.getElementById('tooltipGender').innerHTML = $(fileContent).find("generalFiled").text();
            document.getElementById('tooltipSalutation').innerHTML = $(fileContent).find("generalFiled").text();
            document.getElementById('tooltipNIC').innerHTML = $(fileContent).find("systemCompletedField").text();
        });

        function visible(element) {
            document.getElementById(element).style.visibility = "visible";
            setTimeout(function () {
                document.getElementById(element).style.visibility = "hidden";
            }, 4000);
        }

        function displayError(field, message) {
            document.getElementById(field).style.animation = "shake 0.3s";
            document.getElementById(field).style.backgroundColor = "rgb(252, 186, 175)";
            document.getElementById(message).style.visibility = "visible";
            setTimeout(function () {
                document.getElementById(field).style.backgroundColor = "";
                document.getElementById(message).style.visibility = "hidden";

                document.getElementById(field).style.animation = "";
            }, 3000);
        }

        function validatePassword() {
            const passwordValue = document.forms["form"]["password"].value;
            const repeatPasswordValue = document.forms["form"]["repeatPassword"].value;
            if (passwordValue === "" || repeatPasswordValue === "") {
                if (passwordValue === "") {
                    displayError("password", "tooltipNewPassword");

                } else {
                    document.getElementById("tooltipNewPassword").style.visibility = "hidden";
                }
                if (repeatPasswordValue === "") {

                    displayError("repeatPassword", "tooltipRepeatPassword");

                } else {
                    document.getElementById("tooltipRepeatPassword").style.visibility = "hidden";
                }
            } else {
                document.getElementById("tooltipNewPassword").style.visibility = "hidden";
                document.getElementById("tooltipRepeatPassword").style.visibility = "hidden";
                const lowerCaseLetters = /[a-z]/g;
                const upperCaseLetters = /[A-Z]/g;
                const specialCharacters = /[@#$%)^&*(}>?,./;'~|:"`{<]/;
                const numbers = /[0-9]/g;

                if (passwordValue.match(upperCaseLetters)) {
                    document.getElementById("tooltipNewPassword").style.visibility = "hidden";
                    if (passwordValue.match(specialCharacters)) {
                        if (passwordValue.match(lowerCaseLetters)) {
                            document.getElementById("tooltipNewPassword").style.visibility = "hidden";
                            if (passwordValue.match(numbers)) {
                                document.getElementById("tooltipNewPassword").style.visibility = "hidden";
                                if (passwordValue.length >= 8) {
                                    document.getElementById("tooltipNewPassword").style.visibility = "hidden";
                                    if (passwordValue === repeatPasswordValue) {
                                        document.getElementById("tooltipRepeatPassword").style.visibility = "hidden";
                                        // change navigation color
                                        // document.getElementById('pageChangePassword').style.backgroundColor = 'rgba(0, 0, 0, 0.4)';
                                        // document.getElementById('pageBasicInfo').style.backgroundColor = 'black';
                                        //Navigate to basic information section
                                        document.getElementById('form').submit();
                                    } else {
                                        displayError("repeatPassword", "tooltipRepeatPassword");
                                    }
                                } else {
                                    displayError("password", "tooltipNewPassword");
                                }
                            } else {
                                displayError("password", "tooltipNewPassword");
                            }
                        } else {
                            displayError("password", "tooltipNewPassword");
                        }
                    } else {
                        displayError("password", "tooltipNewPassword");
                    }
                } else {
                    displayError("password", "tooltipNewPassword");
                }

            }

        }


    </script>
    

    <!-- include footer section -->
    <?php BasicLoader::loadFooter('../../') ?>
</body>
</html>