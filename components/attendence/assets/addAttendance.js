
var radioBtn = document.getElementById("radio1");
radioBtn.checked = true;

function displayForm(c){
    if(c.value=="1")
    {
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
        
    }
    else if(c.value=="2")
    {
        document.getElementById("csvFormContainer").style.visibility='hidden';
        document.getElementById("singleAttendanceContainer").style.visibility='visible';
        document.getElementById("csvFormContainer").style.display='none';
        document.getElementById("singleAttendanceContainer").style.display="";
        document.getElementById("attendanceTable").style.display='none';
        document.getElementById("editAttendanceForm").style.visibility='hidden';
        document.getElementById("editAttendanceForm").style.display="none";
        document.getElementById("inquiryContainer").style.visibility='hidden';
        document.getElementById("inquiryContainer").style.display='none';

    }
    else if(c.value=="3")
    {
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
// change visibility of table
function displayAttendance(){
    document.getElementById("attendanceTable").style.visibility='visible';
    document.getElementById("attendanceTable").style.display="";
}
// var radioBtn = document.getElementById("radio1");
//     radioBtn.checked = true;

// function editAttendanceForm1(){
//     document.getElementById("editAttendanceForm").style.visibility='visible';
//     document.getElementById("editAttendanceForm").style.display="block";

// }

// document.getElementById("shu").addEventListener("click",function(

// ));