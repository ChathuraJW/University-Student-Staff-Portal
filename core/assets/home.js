// apply color for different tile
function applyTileColor() {
    let colors = ['#e06363', '#5ac65a', '#6161ca', '#c170cf'
        , '#3a3e3a', '#c12084', '#cfa62b', '#47baac'];
    let totElement = document.getElementsByClassName('tile').length;
    let colorIndex = Array();
    for (let i = 0; i < totElement; i++) {
        let randomValue = Math.floor(Math.random() * colors.length);
        if (colorIndex[i - 1] === randomValue) {
            i = i - 1;
            continue;
        }
        colorIndex[i] = randomValue;
        document.getElementsByClassName('tile')[i].style.backgroundColor = colors[randomValue];
    }
}

applyTileColor();

// cookie value getting function
function getCookieValue(searchKey) {
    let returnValue = null;
    document.cookie.split("; ").forEach(value => {
        let key = value.split("=")[0];
        let cookieValue = value.split("=")[1];
        if (searchKey === key) {
            returnValue = cookieValue;
        }
    });
    return returnValue;
}

//user role based feature hiding
let userRole = getCookieValue('role');
if (userRole === 'ST') {
    $('#displayGPA').show();
    $('#publishNotice').hide();
    $('#seasonRequestProcessing').hide();
    $('#addAttendance').hide();
    $('#addExamResult').hide();
    $('#getExamResult').hide();
    $('#addIQACReport').hide();
    $('#uploadPastPaper').hide();
    $('#uploadResult').hide();
    $('#viewIQACReport').hide();
    $('#respondForMeetingRequest').hide();
    $('#updateAvailability').hide();
    $('#reviewHallBookingRequest').hide();
    $('#assignmentManagement').hide();
    $('#viewWorkload').hide();
    $('#allocatedWorkload').hide();
    $('#usspSystemConfig').hide();
} else if (userRole === 'AS') {
    $('#displayGPA').hide();
    $('#studentResult').hide();
    $('#studentAttendance').hide();
    $('#appointmentForMeeting').hide();
    $('#contactUnion').hide();
    $('#seasonRequestProcessing').hide();
    $('#addAttendance').hide();
    $('#addExamResult').hide();
    $('#getExamResult').hide();
    $('#addIQACReport').hide();
    $('#uploadPastPaper').hide();
    $('#uploadResult').hide();
    $('#viewWorkload').hide();
    $('#allocatedWorkload').hide();
    $('#usspSystemConfig').hide();
} else if (userRole === 'SP') {
    $('#displayGPA').hide();
    $('#studentResult').hide();
    $('#studentAttendance').hide();
    $('#appointmentForMeeting').hide();
    $('#contactUnion').hide();
    $('#seasonRequestProcessing').hide();
    $('#addAttendance').hide();
    $('#addExamResult').hide();
    $('#getExamResult').hide();
    $('#addIQACReport').hide();
    $('#uploadPastPaper').hide();
    $('#uploadResult').hide();
    $('#viewIQACReport').hide();
    $('#respondForMeetingRequest').hide();
    $('#updateAvailability').hide();
    $('#reviewHallBookingRequest').hide();
    $('#usspSystemConfig').hide();
} else if (userRole === 'AD') {
    $('#displayGPA').hide();
    $('#accessToVLE').hide();
    $('#studentResult').hide();
    $('#studentAttendance').hide();
    $('#appointmentForMeeting').hide();
    $('#personalFile').hide();
    $('#contactUnion').hide();
    $('#pastPaper').hide();
    $('#viewIQACReport').hide();
    $('#respondForMeetingRequest').hide();
    $('#updateAvailability').hide();
    $('#reviewHallBookingRequest').hide();
    $('#assignmentManagement').hide();
    $('#viewWorkload').hide();
    $('#allocatedWorkload').hide();
    $('#usspSystemConfig').hide();
} else if (userRole === 'AA') {
    $('#displayGPA').hide();
    $('#studentResult').hide();
    $('#studentAttendance').hide();
    $('#viewWorkload').hide();
    $('#updateAvailability').hide();
}

// add navigation links
jQuery.get('assets/navigationLinks.xml', function (fileContent) {
    const idList= $(fileContent).find("feature").find("id").toArray();
    const pathList= $(fileContent).find("feature").find("path").toArray();
    const isAliveList= $(fileContent).find("feature").find("isAlive").toArray();
    for (let i = 0; i < idList.length; i++) {
        if(isAliveList[i]['innerHTML'])
            document.getElementById(idList[i]['innerHTML']).href="../../"+pathList[i]['innerHTML'];
        else
            document.getElementById(idList[i]['innerHTML']).style.display='none';
    }

})
// date and time
let clock = () =>{
    const months= [
        "Jan",
        "Feb",
        "Mar",
        "Apr",
        "May",
        "Jun",
        "Jul",
        "Aug",
        "Sep",
        "Oct",
        "Nov",
        "Dec"
    ];
    const  days =[
        "Sunday",
        "Monday",
        "Tuesday",
        "Wednesday",
        "Thursday",
        "Friday",
        "Saturday"

    ];

    let date = new Date();
    let hours = date.getHours();
    let minutes = date.getMinutes();
    let year = date.getFullYear();
    let month = months[date.getMonth()];
    let day = days[date.getDay()];
    let currentDate = date.getDate();

    let period = "Am";
    //convert the ......time into .......
    if(hours === 0){
        hours = 12;
    }else if(hours >= 12){
        hours = hours-12;
        period = "PM";
    }
    
    let date1;
    if(currentDate === 1){
         date1 = `${currentDate}st`;
    }else if(currentDate === 2){
        date1 = `${currentDate}nd`;
    }else if(currentDate === 3){
         date1 = `${currentDate}rd`;
    }else{
        date1 = `${currentDate}th`;
    }

    //ex -> replace 9 as 09
    hours = hours < 10 ? "0"+hours:hours;
    minutes = minutes <10 ? "0"+minutes:minutes;

    let time = `${hours}:${minutes}:${period}`;
    let monthYear = `${month} ${year}`;

    document.getElementById("time").innerHTML = time;
    document.getElementById("month").innerHTML = monthYear;
    document.getElementById("day").innerHTML = day;
    document.getElementById("date").innerHTML = date1;
    setTimeout(clock,1000);

};
clock();

