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


var radioBtn = document.getElementById("radioCSV");
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




function editAttendanceForm1(){
    document.getElementById("editAttendanceForm").style.visibility='visible';
    document.getElementById("editAttendanceForm").style.display="flex";

}

// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("editAttendanceBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

