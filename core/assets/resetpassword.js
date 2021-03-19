jQuery.get('assets/toolTips.xml', function (fileContent) {
    document.getElementById('tooltipNewPassword').innerHTML = $(fileContent).find("newPassword").text();
    document.getElementById('tooltipRepeatPassword').innerHTML = $(fileContent).find("repeatPassword").text();
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
    const passwordValue = document.forms["resetPasswordForm"]["password"].value;
    const repeatPasswordValue = document.forms["resetPasswordForm"]["repeatPassword"].value;
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
                                document.getElementById('resetPasswordForm').submit();
                                alert("hello");
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
