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

//when submit edit attendance search form make visible searched attendance data.
function displayAttendance(){

    document.getElementById("attendanceTable").style.visibility='visible';
    document.getElementById("attendanceTable").style.display='';

    let index = document.getElementById("index").value;
    let attempt = document.getElementById("attempt").value;
    let subjectCode = document.getElementById("subject").value;

    const getAttendanceForEditURL = "http://localhost/USSP/assets/API/getAttendanceDataAPI.php?activity=getAttendanceForEdit&studentIndex="+index+"&attempt="+attempt+"&subjectCode="+subjectCode;
    $.getJSON(getAttendanceForEditURL, function (attendance) {
        // console.log(attendance);
        for(var i in attendance) {
            console.log(attendance[i]['date']);
            document.getElementById("date"+i).value = "attendance[i]['date']";
        }
    }
    );
}

//when clicking one of attendance, load edit attendacnce form
function editAttendanceForm(){
    document.getElementById("editAttendanceForm").style.visibility='visible';
    document.getElementById("editAttendanceForm").style.display="";
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