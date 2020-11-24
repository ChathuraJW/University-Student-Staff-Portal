

//For upload csv dropdown
let currentYear = new Date().getFullYear();
// fill data to examination year dropdown
let yearValues = document.getElementById("academicYearForUpload");
let beginYear = currentYear - 10;
while (beginYear <= currentYear) {
    yearValues.options[yearValues.options.length] = new Option(beginYear.toString(), beginYear.toString());
    beginYear++;
}
yearValues.value = currentYear.toString();

yearValues.value = currentYear.toString();

// Checked Upload CSV file radio button when load the page.
var radioBtn = document.getElementById("radioCSV");
radioBtn.checked = true;

//Change the visibility between upload csv files and edit attendance.
function displayForm(radioInput){
    if(radioInput.value=="1"){
        document.getElementById("csvFormContainer").style.visibility='visible';
        document.getElementById("csvFormContainer").style.display="";
        document.getElementById("singleAttendanceContainer").style.visibility='hidden';
        document.getElementById("singleAttendanceContainer").style.display='none';
        document.getElementById("inquiryContainer").style.visibility='hidden';
        document.getElementById("inquiryContainer").style.display='none';
        document.getElementById("attendanceTable").style.visibility='hidden';
        document.getElementById("attendanceTable").style.display='none';
        document.getElementById("editAttendanceForm").style.visibility='hidden';
        document.getElementById("editAttendanceForm").style.display="none";

    }else if(radioInput.value=="2"){
        document.getElementById("csvFormContainer").style.visibility='hidden';
        document.getElementById("singleAttendanceContainer").style.visibility='visible';
        document.getElementById("csvFormContainer").style.display='none';
        document.getElementById("singleAttendanceContainer").style.display="";
        document.getElementById("attendanceTable").style.display='none';
        document.getElementById("editAttendanceForm").style.visibility='hidden';
        document.getElementById("editAttendanceForm").style.display="none";
        // document.getElementById("inquiryContainer").style.visibility='hidden';
        // document.getElementById("inquiryContainer").style.display='none';

    }else if(radioInput.value=="3"){
        document.getElementById("inquiryContainer").style.visibility='visible';
        document.getElementById("inquiryContainer").style.display='';
        document.getElementById("csvFormContainer").style.visibility='hidden';
        document.getElementById("csvFormContainer").style.display="none";
        document.getElementById("singleAttendanceContainer").style.visibility='hidden';
        document.getElementById("singleAttendanceContainer").style.display='none';
        document.getElementById("attendanceTable").style.visibility='hidden';
        document.getElementById("attendanceTable").style.display='none';
        document.getElementById("editAttendanceForm").style.visibility='hidden';
        document.getElementById("editAttendanceForm").style.display="none";
    }
}
let subjectCode;
//when submit edit attendance search form make visible searched attendance data.
function displayAttendance(){

    document.getElementById("attendanceTable").style.visibility='visible';
    document.getElementById("attendanceTable").style.display='';

    let index = document.getElementById("index").value;
    let attempt = document.getElementById("attempt").value;
    subjectCode = document.getElementById("subject").value;
    subjectName = document.getElementById("subject").innerText;

    const getAttendanceForEditURL = "http://localhost/USSP/assets/API/getAttendanceDataAPI.php?activity=getAttendanceForEdit&studentIndex="+index+"&attempt="+attempt+"&subjectCode="+subjectCode;
    $.getJSON(getAttendanceForEditURL, function (attendance) {
        // console.log(attendance);
        for(var i in attendance) {
            let week = "week "+attendance[i]['week'];
            let data = attendance[i]['date'];
            let description = attendance[i]['description'];
            let color = (attendance[i]['attendance']==1 ? 'green':'red');

            document.getElementById("week"+i).innerHTML = week;
            document.getElementById("date"+i).innerHTML = data;
            document.getElementById("attendanceType"+i).innerHTML = description;
            document.getElementById(i).style.backgroundColor = color;
        }
    }
    );
}
//when clicking one of attendance, load edit attendacnce form
function editAttendanceForm(week){
    document.getElementById("editAttendanceForm").style.visibility='visible';
    document.getElementById("editAttendanceForm").style.display="";
    // let weekDetail = "Week: "+week.value;
    document.getElementById("editWeek").value = week.value;
    document.getElementById("editSunjectCode").value = subjectCode;
}
//Update attendance
function updateAttendance() {
    let attendance;
    let week = document.getElementById("editWeek").value;
    let subjectCode = document.getElementById("editSunjectCode").value;
    let description = document.getElementById("editDescription").value;
    let index = document.getElementById("index").value;
    let attempt = document.getElementById("attempt").value;
    if (document.getElementById("radioAttended").checked) {
        attendance = document.getElementById("radioAttended").value;
    } else if (document.getElementById("radioNotAttended").checked) {
        attendance = document.getElementById("radioNotAttended").value;
    }

    const updateAttendanceURL = "http://localhost/USSP/assets/API/getAttendanceDataAPI.php?activity=updateAttendance&studentIndex=" + index + "&attendance=" + attendance + "&subjectCode=" + subjectCode + "&description=" + description + "&week=" + week + "&attempt=" + attempt;
    $.getJSON(updateAttendanceURL, function (attendance) {
            console.log(attendance);

        }
    );
}
//CSV file operation
let attendanceCSVFile = document.getElementById("attendanceFile");
let attendanceCSVFileLabel = document.getElementById("attendanceFileLabel");

attendanceCSVFile.addEventListener("change",function (){
    if(attendanceCSVFile.value != ''){
        console.log("File Size is(KB): "+attendanceCSVFile.files[0].size/1000);
        let uploadFormat = attendanceCSVFile.value.toString().split('.')[1].toLowerCase();
        if (uploadFormat == "csv") {
            attendanceCSVFileLabel.style.backgroundColor = "green";
        } else {
            attendanceCSVFileLabel.style.backgroundColor = "red";
            alert("Invalid file format. Please upload csv formatted file.");
        }

    }
});