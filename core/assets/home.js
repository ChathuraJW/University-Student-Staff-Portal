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
            document.getElementById(idList[i]['innerHTML']).href="../components/"+pathList[i]['innerHTML'];
        else
            document.getElementById(idList[i]['innerHTML']).style.display='none';
    }

});
