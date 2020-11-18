function visible(element) {
    document.getElementById(element).style.visibility = "visible";
    setTimeout(function () {
        document.getElementById(element).style.visibility = "hidden";
    }, 4000);
}

var loadFile = function (event) {
    var output = document.getElementById('output');
    output.style.height="250px";
    output.src='';
    document.getElementById('imageLoadContainer').style.width='max-content';
    document.getElementById('imageLoadContainer').style.padding='10px';
    output.style.position="initial";

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
            displayError("password", "pswError1");

        } else {
            document.getElementById("pswError1").style.visibility = "hidden";
        }
        if (y == "") {

            displayError("repeatPassword", "pswError2");

        } else {
            document.getElementById("pswError2").style.visibility = "hidden";
        }
    } else {
        document.getElementById("pswError1").style.visibility = "hidden";
        document.getElementById("pswError2").style.visibility = "hidden";
        var lowerCaseLetters = /[a-z]/g;
        var upperCaseLetters = /[A-Z]/g;
        var specialCharachters = /[@#$%)^&*(}>?,./;''~\|:""`{<]/;
        var numbers = /[0-9]/g;

        if (x.match(upperCaseLetters)) {
            document.getElementById("pswError1").style.visibility = "hidden";
            if (x.match(specialCharachters)) {
                if (x.match(lowerCaseLetters)) {
                    document.getElementById("pswError1").style.visibility = "hidden";
                    if (x.match(numbers)) {
                        document.getElementById("pswError1").style.visibility = "hidden";
                        if (x.length >= 8) {
                            document.getElementById("pswError1").style.visibility = "hidden";
                            if (x == y) {
                                document.getElementById("pswError2").style.visibility = "hidden";
                                // change navigation color
                                document.getElementById('pageChangePassword').style.backgroundColor = 'rgba(0, 0, 0, 0.4)';
                                document.getElementById('pageBasicInfo').style.backgroundColor = 'black';
                                //Navigate to basic information section
                                toBasicInformationSection();
                            } else {
                                displayError("repeatPassword", "pswError2");
                            }
                        } else {
                            displayError("password", "pswError1");
                        }
                    } else {
                        displayError("password", "pswError1");
                    }
                } else {
                    displayError("password", "pswError1");
                }
            } else {
                displayError("password", "pswError1");
            }
        } else {
            displayError("password", "pswError1");
        }

    }

}

function BasicDetails() {
    var fName = document.forms["form"]["fName"].value;
    var lName = document.forms["form"]["lName"].value;
    var fullName = document.forms["form"]["fullName"].value;
    var gender = document.forms["form"]["gender"].value;
    var occupation = document.forms["form"]["occupation"].value;
    var nic = document.forms["form"]["nic"].value;
    var dob = document.forms["form"]["dob"].value;
    var numbers = /^[0-9]+$/;
    var checker = /^[A-Za-z'.']+$/;
    var nicCheck = /^[0-9vV]+$/;
    var ticket = 0;
    if (fName == "") {
        displayError("fName", "fNameMsg");
    } else {
        document.getElementById("fNameMsg").style.visibility = "hidden";
        if (fName.match(checker)) {
            document.getElementById("fNameMsg").style.visibility = "hidden";
            ticket++;
        } else {
            displayError("fName", "fNameMsg");
        }
    }

    if (lName == "") {
        displayError("lName", "lNameMsg");
    } else {
        document.getElementById("lNameMsg").style.visibility = "hidden";
        if (/[^A-Za-z]/.test(lName)) {
            displayError("lName", "lNameMsg");
        } else {
            document.getElementById("lNameMsg").style.visibility = "hidden";
            ticket++;
        }
    }

    if (fullName == "") {
        displayError("fullName", "fullNameMsg");
    } else {
        document.getElementById("fullNameMsg").style.visibility = "hidden";
        if (/[^A-Za-z' ']/.test(fullName)) {
            displayError("fullName", "fullNameMsg");
        } else {
            document.getElementById("fullNameMsg").style.visibility = "hidden";
            ticket++;
        }
    }
    if (gender == "") {
        displayError("gender", "genderMsg");
    } else {
        document.getElementById("genderMsg").style.visibility = "hidden";
        if (gender == "M" || gender == "F") {
            document.getElementById("genderMsg").style.visibility = "hidden";
            ticket++;
        } else {
            displayError("gender", "genderMsg");
        }
    }
    if (occupation == "") {
        displayError("occupation", "salutationMsg");
    } else {
        document.getElementById("salutationMsg").style.visibility = "hidden";
        if (occupation == "Mr" || occupation == "Mrs" || occupation == "Dr" || occupation == "Ms" || occupation == "Rev") {
            document.getElementById("salutationMsg").style.visibility = "hidden";
            ticket++;
        } else {
            displayError("occupation", "salutationMsg");
        }
    }
    if (nic == "") {
        displayError("nic", "nicMsg");
    } else {
        document.getElementById("nicMsg").style.visibility = "hidden";
        if (nic.length == 10 || nic.length == 12) {
            if (nic.length == 10) {
                if (nic.match(nicCheck)) {
                    document.getElementById("nicMsg").style.visibility = "hidden";
                    ticket++;
                } else {
                    displayError("nic", "nicMsg");
                }
            }
            if (nic.length == 12) {
                if (nic.match(numbers)) {
                    document.getElementById("nicMsg").style.visibility = "hidden";
                    ticket++;
                } else {
                    displayError("nic", "nicMsg");
                }
            }
        } else if (nic.length > 0) {
            displayError("nic", "nicMsg");
        }
    }
    if (dob == "") {
        displayError("dob", "dobMsg");
    } else {
        document.getElementById("dobMsg").style.visibility = "hidden";
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
    const telephone = document.forms["form"]["tele"].value;
    const address = document.forms["form"]["address"].value;
    const personalEmail = document.forms["form"]["personalEmail"].value;
    const universityMail = document.forms["form"]["universityMail"].value;
    let testValue = 0;

    // telephone number validation
    if (telephone == "") {
        displayError("tele", "teleMsg");
    } else {
        document.getElementById("teleMsg").style.visibility = "hidden";
        if (telephone.length == 10) {
            if (/[^0-9]/.test(telephone)) {
                displayError("tele", "teleMsg");
            } else {
                document.getElementById("teleMsg").style.visibility = "hidden";
                testValue++;
            }
        } else {
            displayError("tele", "teleMsg");
        }
    }

    // address validation
    if (address == "") {
        displayError("address", "addressMsg");
    } else {
        document.getElementById("addressMsg").style.visibility = "hidden";
        testValue++;
    }

    // personalEmail validation
    if (personalEmail == "") {
        displayError("personalEmail", "emailMsg");
    } else {
        const emailMatch = /[@]/;
        document.getElementById("emailMsg").style.visibility = "hidden";
        if (personalEmail.match(emailMatch)) {
            document.getElementById("emailMsg").style.visibility = "hidden";
            testValue++;
        } else {
            displayError("personalEmail", "emailMsg");
        }
    }

    // university email validation
    if (universityMail != "") {
        const emailMatch = /[@]/;
        document.getElementById("uniMailMsg").style.visibility = "hidden";
        if (universityMail.match(emailMatch)) {
            document.getElementById("uniMailMsg").style.visibility = "hidden";
            testValue++;
        } else {
            displayError("universityEmail", "uniMailMsg");
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