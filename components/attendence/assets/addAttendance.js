// Checked Upload CSV file radio button when load the page.
var radioBtn = document.getElementById("radioCSV");
radioBtn.checked = true;

//Change the visibility between upload csv files and edit attendance.
function displayForm(radioInput) {
    if (radioInput.value == "1") {
        document.getElementById("csvFormContainer").style.visibility = 'visible';
        document.getElementById("csvFormContainer").style.display = "";
        document.getElementById("singleAttendanceContainer").style.visibility = 'hidden';
        document.getElementById("singleAttendanceContainer").style.display = 'none';
        document.getElementById("inquiryContainer").style.visibility = 'hidden';
        document.getElementById("inquiryContainer").style.display = 'none';
        document.getElementById("attendanceTable").style.visibility = 'hidden';
        document.getElementById("attendanceTable").style.display = 'none';
        document.getElementById("editAttendanceForm").style.visibility = 'hidden';
        document.getElementById("editAttendanceForm").style.display = "none";

    } else if (radioInput.value == "2") {
        document.getElementById("csvFormContainer").style.visibility = 'hidden';
        document.getElementById("singleAttendanceContainer").style.visibility = 'visible';
        document.getElementById("csvFormContainer").style.display = 'none';
        document.getElementById("singleAttendanceContainer").style.display = "";
        document.getElementById("attendanceTable").style.display = 'none';
        document.getElementById("editAttendanceForm").style.visibility = 'hidden';
        document.getElementById("editAttendanceForm").style.display = "none";
        // document.getElementById("inquiryContainer").style.visibility='hidden';
        // document.getElementById("inquiryContainer").style.display='none';

    } else if (radioInput.value == "3") {
        document.getElementById("inquiryContainer").style.visibility = 'visible';
        document.getElementById("inquiryContainer").style.display = '';
        document.getElementById("csvFormContainer").style.visibility = 'hidden';
        document.getElementById("csvFormContainer").style.display = "none";
        document.getElementById("singleAttendanceContainer").style.visibility = 'hidden';
        document.getElementById("singleAttendanceContainer").style.display = 'none';
        document.getElementById("attendanceTable").style.visibility = 'hidden';
        document.getElementById("attendanceTable").style.display = 'none';
        document.getElementById("editAttendanceForm").style.visibility = 'hidden';
        document.getElementById("editAttendanceForm").style.display = "none";
    }
}

let subjectCode;

//when submit edit attendance search form make visible searched attendance data.
function displayAttendance() {
    document.getElementById("attendanceTable").style.visibility = 'visible';
    document.getElementById("attendanceTable").style.display = '';

    let index = document.getElementById("index").value;
    let attempt = document.getElementById("attempt").value;
    subjectCode = document.getElementById("subject").value;
    // subjectName = document.getElementById("subject").innerText;

    const getAttendanceForEditURL = "http://localhost/USSP/components/attendence/assets/getAttendanceDataAPI.php?activity=getAttendanceForEdit&studentIndex=" + index + "&attempt=" + attempt + "&subjectCode=" + subjectCode;
    console.log(getAttendanceForEditURL);
    $.getJSON(getAttendanceForEditURL, function (attendance) {
            console.log(attendance);
            let attendanceCount = attendance;
            console.log(attendanceCount);
            for (let i in attendance) {
                console.log(i);
                let week = "week " + attendance[i]['week'];
                let data = attendance[i]['date'];
                let description = attendance[i]['description'];
                let color = ([i]['attendance'] === '1' ? 'var(--successColor)' : 'var(--dangerColor)');

                document.getElementById("week" + i).innerHTML = week;
                document.getElementById("date" + i).innerHTML = data;
                document.getElementById("attendanceType" + i).innerHTML = description;
                document.getElementById(i).style.borderLeft = color+' 5px solid;';
            }
        }
    );
}

//when clicking one of attendance, load edit attendance form
function editAttendanceForm(week) {
    document.getElementById("editAttendanceForm").style.visibility = 'visible';
    document.getElementById("editAttendanceForm").style.display = "";
    // let weekDetail = "Week: "+week.value;
    document.getElementById("editWeek").value = week.value;
    document.getElementById("editSubjectCode").value = subjectCode;
}

//Update attendance
function updateAttendance() {
    let attendance;
    let week = document.getElementById("editWeek").value;
    let subjectCode = document.getElementById("editSubjectCode").value;
    let description = document.getElementById("editDescription").value;
    let index = document.getElementById("index").value;
    let attempt = document.getElementById("attempt").value;
    if (document.getElementById("radioAttended").checked) {
        attendance = document.getElementById("radioAttended").value;
    } else if (document.getElementById("radioNotAttended").checked) {
        attendance = document.getElementById("radioNotAttended").value;
    }

    //validation
    if(!document.getElementById("radioAttended").checked){
        if(!document.getElementById("radioNotAttended").checked){
            alert("Please select an option for attendance!");
            return false;
        }
    }

    if(document.getElementById("editDescription").value==''){
        alert("Description field is empty!");
        return false;
    }

    const updateAttendanceURL = "http://localhost/USSP/components/attendence/assets/getAttendanceDataAPI.php?activity=updateAttendance&studentIndex=" + index + "&attendance=" + attendance + "&subjectCode=" + subjectCode + "&description=" + description + "&week=" + week + "&attempt=" + attempt;
    // console.log(updateAttendanceURL);
    $.getJSON(updateAttendanceURL, function (attendance) {
            console.log(attendance);
        }
    );
}

function markASRead(inquiryID) {
    let userName = document.cookie.split('=')[1];

    if (document.getElementById(inquiryID).value) {
        let markAsRead = document.getElementById('L' + inquiryID);
        markAsRead.style.color = 'var(--baseColor)';

        const markAsReadURL = "http://localhost/USSP/components/attendence/assets/getAttendanceDataAPI.php?activity=markAsRead&userName=" + userName + "&mark=1&inquiryID=" + inquiryID;
        console.log(markAsReadURL);
        $.getJSON(markAsReadURL, function (mark) {
            console.log(mark);

        });
    }

}


//CSV file operation
let attendanceCSVFile = document.getElementById("attendanceFile");
let attendanceCSVFileLabel = document.getElementById("attendanceFileLabel");

attendanceCSVFile.addEventListener("change", function () {
    if (attendanceCSVFile.value !== '') {
        console.log("File Size is(KB): " + attendanceCSVFile.files[0].size / 1000);
        let uploadFormat = attendanceCSVFile.value.toString().split('.')[1].toLowerCase();
        if (uploadFormat === "csv") {
            attendanceCSVFileLabel.style.backgroundColor = "var(--successColor)";
        } else {
            attendanceCSVFileLabel.style.backgroundColor = "var(--dangerColor)";
            alert("Invalid file format. Please upload csv formatted file.");
        }
    }
});

//validation edit form
function Validate() {
    //validate index field
    let indexLength = document.getElementById('index').value.length
    let academicYear = document.getElementById("academicYearForEdit");
    let semester = document.getElementById("semesterEdit");
    let subject = document.getElementById("subject");
    let attempt = document.getElementById("attempt");

    if (indexLength === 0) {// when index is empty
        alert("Please enter valid index!");
        return false;
    } else if (indexLength !== 8) {//when index length larger than actual size
        alert("Incorrect index!");
        return false;
    } else if (academicYear.value === "") {//empty academic year
        alert("Please select an option for academic Year!");
        return false;
    } else if (semester.value === "") {// empty semester
        alert("Please select an option for semester!");
        return false;
    } else if (subject.value === "") {//empty subject
        alert("Please select an option for subject!");
        return false;
    } else if (attempt.value === "") {// empty attempt
        alert("Please select an option for attempt!");
        return false;
    } else {
        displayAttendance();//display search results
    }
    return true;
}

