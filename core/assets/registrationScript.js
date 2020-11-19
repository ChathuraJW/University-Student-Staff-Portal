//add tooltip into elements
jQuery.get('assets/toolTips.xml', function (fileContent) {
    document.getElementById('tooltipNewPassword').innerHTML = $(fileContent).find("newPassword").text();
    document.getElementById('tooltipRepeatPassword').innerHTML = $(fileContent).find("repeatPassword").text();
    document.getElementById('tooltipFirstName').innerHTML = $(fileContent).find("systemCompletedField").text();
    document.getElementById('tooltipLastName').innerHTML = $(fileContent).find("systemCompletedField").text();
    document.getElementById('tooltipFullName').innerHTML = $(fileContent).find("systemCompletedField").text();
    document.getElementById('tooltipGender').innerHTML = $(fileContent).find("generalFiled").text();
    document.getElementById('tooltipSalutation').innerHTML = $(fileContent).find("generalFiled").text();
    document.getElementById('tooltipNIC').innerHTML = $(fileContent).find("systemCompletedField").text();
    document.getElementById('tooltipDOB').innerHTML = $(fileContent).find("systemCompletedField").text();
    document.getElementById('tooltipTelephone').innerHTML = $(fileContent).find("telephone").text();
    document.getElementById('tooltipAddress').innerHTML = $(fileContent).find("address").text();
    document.getElementById('tooltipPersonalEmail').innerHTML = $(fileContent).find("personalEmail").text();
    document.getElementById('tooltipUniversityMail').innerHTML = $(fileContent).find("systemCompletedField").text();
});

function visible(element) {
    document.getElementById(element).style.visibility = "visible";
    setTimeout(function () {
        document.getElementById(element).style.visibility = "hidden";
    }, 4000);
}

var loadFile = function (event) {
    var output = document.getElementById('output');
    output.style.height = "250px";
    output.src = '';
    document.getElementById('imageLoadContainer').style.width = 'max-content';
    document.getElementById('imageLoadContainer').style.padding = '10px';
    output.style.position = "initial";

    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function () {
        URL.revokeObjectURL(output.src) // free memory
    }
};

function validatePassword() {
    var x = document.forms["form"]["password"].value;
    var y = document.forms["form"]["repeatPassword"].value;
    if (x == "" || y == "") {
        if (x == "") {
            displayError("password", "tooltipNewPassword");

        } else {
            document.getElementById("tooltipNewPassword").style.visibility = "hidden";
        }
        if (y == "") {

            displayError("repeatPassword", "tooltipRepeatPassword");

        } else {
            document.getElementById("tooltipRepeatPassword").style.visibility = "hidden";
        }
    } else {
        document.getElementById("tooltipNewPassword").style.visibility = "hidden";
        document.getElementById("tooltipRepeatPassword").style.visibility = "hidden";
        var lowerCaseLetters = /[a-z]/g;
        var upperCaseLetters = /[A-Z]/g;
        var specialCharachters = /[@#$%)^&*(}>?,./;''~\|:""`{<]/;
        var numbers = /[0-9]/g;

        if (x.match(upperCaseLetters)) {
            document.getElementById("tooltipNewPassword").style.visibility = "hidden";
            if (x.match(specialCharachters)) {
                if (x.match(lowerCaseLetters)) {
                    document.getElementById("tooltipNewPassword").style.visibility = "hidden";
                    if (x.match(numbers)) {
                        document.getElementById("tooltipNewPassword").style.visibility = "hidden";
                        if (x.length >= 8) {
                            document.getElementById("tooltipNewPassword").style.visibility = "hidden";
                            if (x == y) {
                                document.getElementById("tooltipRepeatPassword").style.visibility = "hidden";
                                // change navigation color
                                document.getElementById('pageChangePassword').style.backgroundColor = 'rgba(0, 0, 0, 0.4)';
                                document.getElementById('pageBasicInfo').style.backgroundColor = 'black';
                                //Navigate to basic information section
                                toBasicInformationSection();
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

function BasicDetails() {
    var firstName = document.forms["form"]["firstName"].value;
    var lastName = document.forms["form"]["lastName"].value;
    var fullName = document.forms["form"]["fullName"].value;
    var gender = document.forms["form"]["gender"].value;
    var salutation = document.forms["form"]["salutation"].value;
    var nic = document.forms["form"]["nic"].value;
    var dob = document.forms["form"]["dob"].value;
    var numbers = /^[0-9]+$/;
    var checker = /^[A-Za-z'.']+$/;
    var nicCheck = /^[0-9vV]+$/;
    var ticket = 0;
    if (firstName == "") {
        displayError("firstName", "tooltipFirstName");
    } else {
        document.getElementById("tooltipFirstName").style.visibility = "hidden";
        if (firstName.match(checker)) {
            document.getElementById("tooltipFirstName").style.visibility = "hidden";
            ticket++;
        } else {
            displayError("firstName", "tooltipFirstName");
        }
    }

    if (lastName == "") {
        displayError("lastName", "tooltipLastName");
    } else {
        document.getElementById("tooltipLastName").style.visibility = "hidden";
        if (/[^A-Za-z]/.test(lastName)) {
            displayError("lastName", "tooltipLastName");
        } else {
            document.getElementById("tooltipLastName").style.visibility = "hidden";
            ticket++;
        }
    }

    if (fullName == "") {
        displayError("fullName", "tooltipFullName");
    } else {
        document.getElementById("tooltipFullName").style.visibility = "hidden";
        if (/[^A-Za-z' ']/.test(fullName)) {
            displayError("fullName", "tooltipFullName");
        } else {
            document.getElementById("tooltipFullName").style.visibility = "hidden";
            ticket++;
        }
    }
    if (gender == "") {
        displayError("gender", "tooltipGender");
    } else {
        document.getElementById("tooltipGender").style.visibility = "hidden";
        if (gender == "M" || gender == "F") {
            document.getElementById("tooltipGender").style.visibility = "hidden";
            ticket++;
        } else {
            displayError("gender", "tooltipGender");
        }
    }
    if (salutation == "") {
        displayError("salutation", "tooltipSalutation");
    } else {
        document.getElementById("tooltipSalutation").style.visibility = "hidden";
        if (salutation == "Mr" || salutation == "Mrs" || salutation == "Dr" || salutation == "Ms" || salutation == "Rev") {
            document.getElementById("tooltipSalutation").style.visibility = "hidden";
            ticket++;
        } else {
            displayError("salutation", "tooltipSalutation");
        }
    }
    if (nic == "") {
        displayError("nic", "tooltipNIC");
    } else {
        document.getElementById("tooltipNIC").style.visibility = "hidden";
        if (nic.length == 10 || nic.length == 12) {
            if (nic.length == 10) {
                if (nic.match(nicCheck)) {
                    document.getElementById("tooltipNIC").style.visibility = "hidden";
                    ticket++;
                } else {
                    displayError("nic", "tooltipNIC");
                }
            }
            if (nic.length == 12) {
                if (nic.match(numbers)) {
                    document.getElementById("tooltipNIC").style.visibility = "hidden";
                    ticket++;
                } else {
                    displayError("nic", "tooltipNIC");
                }
            }
        } else if (nic.length > 0) {
            displayError("nic", "tooltipNIC");
        }
    }
    if (dob == "") {
        displayError("dob", "tooltipDOB");
    } else {
        document.getElementById("tooltipDOB").style.visibility = "hidden";
        ticket++;
    }

    if (ticket == 7) {
        // change navigation color
        document.getElementById('pageBasicInfo').style.backgroundColor = 'rgba(0, 0, 0, 0.4)';
        document.getElementById('pageContactDetails').style.backgroundColor = 'black';
        // navigate to contact detail section
        toContactDetailsSection();
    }

}

function contactDetails() {
    const telephone = document.forms["form"]["telephone"].value;
    const address = document.forms["form"]["address"].value;
    const personalEmail = document.forms["form"]["personalEmail"].value;
    const universityMail = document.forms["form"]["universityMail"].value;
    let testValue = 0;

    // telephone number validation
    if (telephone == "") {
        displayError("telephone", "tooltipTelephone");
    } else {
        document.getElementById("tooltipTelephone").style.visibility = "hidden";
        if (telephone.length == 10) {
            if (/[^0-9]/.test(telephone)) {
                displayError("telephone", "tooltipTelephone");
            } else {
                document.getElementById("tooltipTelephone").style.visibility = "hidden";
                testValue++;
            }
        } else {
            displayError("telephone", "tooltipTelephone");
        }
    }

    // address validation
    if (address == "") {
        displayError("address", "tooltipAddress");
    } else {
        document.getElementById("tooltipAddress").style.visibility = "hidden";
        testValue++;
    }

    // personalEmail validation
    if (personalEmail == "") {
        displayError("personalEmail", "tooltipPersonalEmail");
    } else {
        const emailMatch = /[@]/;
        document.getElementById("tooltipPersonalEmail").style.visibility = "hidden";
        if (personalEmail.match(emailMatch)) {
            document.getElementById("tooltipPersonalEmail").style.visibility = "hidden";
            testValue++;
        } else {
            displayError("personalEmail", "tooltipPersonalEmail");
        }
    }

    // university email validation
    if (universityMail != "") {
        const emailMatch = /[@]/;
        document.getElementById("tooltipUniversityMail").style.visibility = "hidden";
        if (universityMail.match(emailMatch)) {
            document.getElementById("tooltipUniversityMail").style.visibility = "hidden";
            testValue++;
        } else {
            displayError("universityEmail", "tooltipUniversityMail");
        }

    }
    console.log(testValue);
    if (testValue == 4) {
        // change navigation color
        document.getElementById('pageContactDetails').style.backgroundColor = 'rgba(0, 0, 0, 0.4)';
        document.getElementById('pageProfilePicture').style.backgroundColor = 'black';
        // navigate to profile pic section
        toProfilePicSection();
    }
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

function toBasicInformationSection() {
    document.getElementById("pwd").style.display = "none";
    document.getElementById("bsc").style.display = "";
}

function toContactDetailsSection() {
    document.getElementById("bsc").style.display = "none";
    document.getElementById("cnt").style.display = "";
}

function toProfilePicSection() {
    document.getElementById("cnt").style.display = "none";
    document.getElementById("img").style.display = "";
}

function backToChangePassword() {
    document.getElementById("bsc").style.display = "none";
    document.getElementById("pwd").style.display = "";
    // change navigation color
    document.getElementById('pageBasicInfo').style.backgroundColor = 'rgba(0, 0, 0, 0.4)';
    document.getElementById('pageChangePassword').style.backgroundColor = 'black';
}

function backToBasicInformation() {
    document.getElementById("cnt").style.display = "none";
    document.getElementById("bsc").style.display = "";
    // change navigation color
    document.getElementById('pageContactDetails').style.backgroundColor = 'rgba(0, 0, 0, 0.4)';
    document.getElementById('pageBasicInfo').style.backgroundColor = 'black';
}

function backToContactInformation() {
    document.getElementById("img").style.display = "none";
    document.getElementById("cnt").style.display = "";
    // change navigation color
    document.getElementById('pageProfilePicture').style.backgroundColor = 'rgba(0, 0, 0, 0.4)';
    document.getElementById('pageContactDetails').style.backgroundColor = 'black';
}
