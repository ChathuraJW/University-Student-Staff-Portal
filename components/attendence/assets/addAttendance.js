
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
    console.log("hi");
    document.getElementById("attendanceTable").style.visibility='visible';
    document.getElementById("attendanceTable").style.display='';

    let index = document.getElementById("index").value;
    let attempt = document.getElementById("attempt").value;
    subjectCode = document.getElementById("subject").value;
    // subjectName = document.getElementById("subject").innerText;
    console.log(subjectCode);
    const getAttendanceForEditURL = "http://localhost/USSP/assets/API/getAttendanceDataAPI.php?activity=getAttendanceForEdit&studentIndex="+index+"&attempt="+attempt+"&subjectCode="+subjectCode;
    $.getJSON(getAttendanceForEditURL, function (attendance) {
        // console.log(attendance);
        for(var i in attendance) {
            let week = "week "+attendance[i]['week'];
            let data = attendance[i]['date'];
            let description = attendance[i]['description'];
            let color = (attendance[i]['attendance']==1 ? 'green':'red');
            console.log(week);

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
    if(attendanceCSVFile.value !== ''){
        console.log("File Size is(KB): "+attendanceCSVFile.files[0].size/1000);
        let uploadFormat = attendanceCSVFile.value.toString().split('.')[1].toLowerCase();
        if (uploadFormat === "csv") {
            attendanceCSVFileLabel.style.backgroundColor = "green";
        } else {
            attendanceCSVFileLabel.style.backgroundColor = "red";
            alert("Invalid file format. Please upload csv formatted file.");
        }
    }
});
//filter data based on radio values
// function selectedYearCSV(){
//     let year = document.getElementById('academicYearCSV').value;
//     let subjectListElement=document.getElementById('subjectCSV');
//     let subjectList=subjectListElement.innerText.split("\n");
//     let i=0;
//     while(i<subjectList.length){
//         let temp=Math.ceil(subjectList[i].split('.')[0]/2);
//
//         if(temp!='' && temp!=year){
//             subjectListElement.remove(i);
//             subjectList=subjectListElement.innerText.split("\n");
//             i=-1;
//         }
//         i=i+1;
//     }
// }
//
// function selectSemesterCSV(){
//     let semester = document.getElementById('semesterCSV').value;
//     let subjectListElement=document.getElementById('subjectCSV');
//     let subjectList=subjectListElement.innerText.split("\n");
//     let i=0;
//     while(i<subjectList.length){
//         let temp=Math.ceil(subjectList[i].split('.')[0]);
//         if(temp!='' && temp%2!=semester%2){
//             subjectListElement.remove(i);
//             subjectList=subjectListElement.innerText.split("\n");
//             i=-1;
//         }
//         i=i+1;
//     }
// }
// function selectedYearEdit(){
//     let year = document.getElementById('academicYearForEdit').value;
//     let subjectListElement=document.getElementById('subject');
//     let subjectList=subjectListElement.innerText.split("\n");
//     let i=0;
//     while(i<subjectList.length){
//         let temp=Math.ceil(subjectList[i].split('.')[0]/2);
//         if(temp!='' && temp!=year){
//             subjectListElement.remove(i);
//             subjectList=subjectListElement.innerText.split("\n");
//             i=-1;
//         }
//         i=i+1;
//     }
// }
// function selectSemesterEdit(){
//     let semester = document.getElementById('semesterEdit').value;
//     let subjectListElement=document.getElementById('subject');
//     let subjectList=subjectListElement.innerText.split("\n");
//     let i=0;
//     while(i<subjectList.length){
//         let temp=Math.ceil(subjectList[i].split('.')[0]);
//         if(temp!='' && temp%2!=semester%2){
//             subjectListElement.remove(i);
//             subjectList=subjectListElement.innerText.split("\n");
//             i=-1;
//         }
//         i=i+1;
//     }
// }


