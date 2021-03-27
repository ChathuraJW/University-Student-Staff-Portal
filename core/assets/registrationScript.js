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

let loadFile = function (event) {
    const output = document.getElementById('output');
    output.style.height = "250px";
    output.src = '';
    document.getElementById('imageLoadContainer').style.width = 'max-content';
    document.getElementById('imageLoadContainer').style.padding = '10px';
    output.style.position = "initial";

    output.src = URL.createObjectURL(event.target.files[0]);
    // switch display in-between icon and image
    document.getElementById('uploadIcon').style.display = 'none';
    document.getElementById('output').style.display = 'block';
    // abject height and width
    document.getElementById('output').style.height = 'auto';
    document.getElementById('output').style.width = '450px';
    output.onload = function () {
        URL.revokeObjectURL(output.src) // free memory
    }
};

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
    const firstName = document.forms["form"]["firstName"].value;
    const lastName = document.forms["form"]["lastName"].value;
    const fullName = document.forms["form"]["fullName"].value;
    const gender = document.forms["form"]["gender"].value;
    const salutation = document.forms["form"]["salutation"].value;
    const nic = document.forms["form"]["nic"].value;
    const dob = document.forms["form"]["dob"].value;
    const numbers = /^[0-9]+$/;
    const checker = /^[A-Za-z'.]+$/;
    const nicCheck = /^[0-9vV]+$/;
    let ticket = 0;
    if (firstName === "") {
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

    if (lastName === "") {
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

    if (fullName === "") {
        displayError("fullName", "tooltipFullName");
    } else {
        document.getElementById("tooltipFullName").style.visibility = "hidden";
        if (/[^A-Za-z' ]/.test(fullName)) {
            displayError("fullName", "tooltipFullName");
        } else {
            document.getElementById("tooltipFullName").style.visibility = "hidden";
            ticket++;
        }
    }
    if (gender === "") {
        displayError("gender", "tooltipGender");
    } else {
        document.getElementById("tooltipGender").style.visibility = "hidden";
        if (gender === "M" || gender === "F") {
            document.getElementById("tooltipGender").style.visibility = "hidden";
            ticket++;
        } else {
            displayError("gender", "tooltipGender");
        }
    }
    if (salutation === "") {
        displayError("salutation", "tooltipSalutation");
    } else {
        document.getElementById("tooltipSalutation").style.visibility = "hidden";
        if (salutation === "Mr" || salutation === "Mrs" || salutation === "Dr" || salutation === "Ms" || salutation === "Rev") {
            document.getElementById("tooltipSalutation").style.visibility = "hidden";
            ticket++;
        } else {
            displayError("salutation", "tooltipSalutation");
        }
    }
    if (nic === "") {
        displayError("nic", "tooltipNIC");
    } else {
        document.getElementById("tooltipNIC").style.visibility = "hidden";
        if (nic.length === 10 || nic.length === 12) {
            if (nic.length === 10) {
                if (nic.match(nicCheck)) {
                    document.getElementById("tooltipNIC").style.visibility = "hidden";
                    ticket++;
                } else {
                    displayError("nic", "tooltipNIC");
                }
            }
            if (nic.length === 12) {
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
    if (dob === "") {
        displayError("dob", "tooltipDOB");
    } else {
        document.getElementById("tooltipDOB").style.visibility = "hidden";
        ticket++;
    }

    if (ticket === 7) {
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
    if (telephone === "") {
        displayError("telephone", "tooltipTelephone");
    } else {
        document.getElementById("tooltipTelephone").style.visibility = "hidden";
        if (telephone.length === 10) {
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
    if (address === "") {
        displayError("address", "tooltipAddress");
    } else {
        document.getElementById("tooltipAddress").style.visibility = "hidden";
        testValue++;
    }

    // personalEmail validation
    if (personalEmail === "") {
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
    if (universityMail !== "") {
        const emailMatch = /[@]/;
        document.getElementById("tooltipUniversityMail").style.visibility = "hidden";
        if (universityMail.match(emailMatch)) {
            document.getElementById("tooltipUniversityMail").style.visibility = "hidden";
            testValue++;
        } else {
            displayError("universityEmail", "tooltipUniversityMail");
        }

    }
    if (testValue === 4) {
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
    document.getElementById("passwordSection").style.display = "none";
    document.getElementById("basicInformationSection").style.display = "";
}

function toContactDetailsSection() {
    document.getElementById("basicInformationSection").style.display = "none";
    document.getElementById("contactInformationSection").style.display = "";
}

function toProfilePicSection() {
    document.getElementById("contactInformationSection").style.display = "none";
    document.getElementById("profilePictureSection").style.display = "";
}

function backToChangePassword() {
    document.getElementById("basicInformationSection").style.display = "none";
    document.getElementById("passwordSection").style.display = "";
    // change navigation color
    document.getElementById('pageBasicInfo').style.backgroundColor = 'rgba(0, 0, 0, 0.4)';
    document.getElementById('pageChangePassword').style.backgroundColor = 'black';
}

function backToBasicInformation() {
    document.getElementById("contactInformationSection").style.display = "none";
    document.getElementById("basicInformationSection").style.display = "";
    // change navigation color
    document.getElementById('pageContactDetails').style.backgroundColor = 'rgba(0, 0, 0, 0.4)';
    document.getElementById('pageBasicInfo').style.backgroundColor = 'black';
}

function backToContactInformation() {
    document.getElementById("profilePictureSection").style.display = "none";
    document.getElementById("contactInformationSection").style.display = "";
    // change navigation color
    document.getElementById('pageProfilePicture').style.backgroundColor = 'rgba(0, 0, 0, 0.4)';
    document.getElementById('pageContactDetails').style.backgroundColor = 'black';
}
