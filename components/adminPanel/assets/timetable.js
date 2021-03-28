let group;

function getEntries(groupName) {
    document.getElementById("groupNameHidden").value = groupName;
    document.getElementById("deleteEntryInput").value = groupName;
    document.getElementById("timetablePage").style.display = "";
    document.getElementById("groupListPage").style.display = "none";
    // document.cookie="groupName="+groupName+"";
    // document.cookie = 'groupName='+groupName+'; path=/'
    group = groupName;
    var url = "http://localhost/USSP/components/adminPanel/assets/timetableManagementAPI.php?groupName=" + groupName + "";
    console.log(url);
    $.getJSON(url, function (dataList) {
        console.log(dataList);

        for (var i = 0; i < dataList.length; i++) {
            var element = '';
            element += '<div class="elementTab">';
            element += '<div class="elementName">' + dataList[i]['day'] + '<P>     </p>Subject-' + dataList[i]['subjectCode'] + '<P>     </p>Group-' + dataList[i]['relatedGroup'] + '<P>     </p>From-' + dataList[i]['fromTime'] + '<P>  </p>To-' + dataList[i]['toTime'] + '</div>';
            element += '<div class="elementEdit" onclick="editFunctionEntry(`' + dataList[i]['eventID'] + '`)">EDIT</div>';
            element += '<div class="elementDelete" onclick="deleteFunctionEntry(`' + dataList[i]['eventID'] + '`)">DELETE</div>';
            element += '</div>';
            $('#groupEntrySet').append(element);
        }


    });
    // document.getElementById("hallID").disabled= true;
    console.clear();
}

function editFunctionEntry(code) {//This function will get data of specific timetable entry
    document.getElementById("timetablePage").style.display = "none";
    document.getElementById("headingEditEntry").style.display = "";
    document.getElementById("timetableEntryForm").style.display = "";
    document.getElementById("submitButtonInputEntry").name = "editEntry";

    var url = "http://localhost/USSP/components/adminPanel/assets/timetableManagementAPI.php?code=" + code + ""; //In here call the timetableAPI for retrieve data 
    console.log(url);
    $.getJSON(url, function (dataList) {
        console.log(dataList);
        document.getElementById("eventHidden").value = dataList[0]['eventID'];
        document.getElementById("hallID").value = dataList[0]['hallID'];
        document.getElementById("subjectCode").value = dataList[0]['subjectCode'];
        document.getElementById("day").value = dataList[0]['day'];
        document.getElementById("fromTime").value = dataList[0]['fromTime'];
        document.getElementById("toTime").value = dataList[0]['toTime'];
        document.getElementById("description").value = dataList[0]['description'];
    });
    console.clear();
}

function addEntry() {// ADD entry will display a form by this button
    // document.getElementById("hallID").disabled= false;
    document.getElementById("timetableEntryForm").style.display = "";
    document.getElementById("headingAddEntry").style.display = "";
    document.getElementById("timetablePage").style.display = "none";
    document.getElementById("submitButtonInputEntry").name = "addEntry";
    console.clear();

}

function cancelFunctionEntry() {
    document.getElementById("headingEditEntry").style.display = "none";
    document.getElementById("headingDeleteEntry").style.display = "none";
    document.getElementById("timetablePage").style.display = "";
    document.getElementById("EntryDeleteView").style.display = "none";
    document.getElementById("timetableEntryForm").style.display = "none";
    document.getElementById("headingAddEntry").style.display = "none";
    document.getElementById("groupListPage").style.display = "none";
    document.getElementById("timetableDisplay").style.display = "none";

    document.getElementById("timetableEntryForm").reset();
    console.clear();
}

function backFunction() {
    document.getElementById("headingEditEntry").style.display = "none";
    document.getElementById("headingDeleteEntry").style.display = "none";
    document.getElementById("timetablePage").style.display = "none";
    document.getElementById("timetableEntryForm").style.display = "none";
    document.getElementById("headingAddEntry").style.display = "none";
    document.getElementById("groupListPage").style.display = "";
    document.getElementById("groupEntrySet").innerHTML = "";
    document.getElementById("timetableDisplay").style.display = "none";

    document.getElementById("timetableEntryForm").reset();
    console.clear();
}

function deleteFunctionEntry(code) { //This also retrieve data for delete form.
    document.getElementById("timetablePage").style.display = "none";
    document.getElementById("headingEditEntry").style.display = "";
    document.getElementById("EntryDeleteView").style.display = "";
    document.getElementById("timetableEntryForm").style.display = "none";
    document.getElementById("submitButtonInputEntry").name = "deleteEntry";

    var url = "http://localhost/USSP/components/adminPanel/assets/timetableManagementAPI.php?code=" + code + "";
    console.log(url);
    $.getJSON(url, function (dataList) {
        console.log(dataList);
        document.getElementById("deleteEventID").value = dataList[0]['eventID'];
        document.getElementById("deleteHallID").innerHTML = dataList[0]['hallID'];
        document.getElementById("deleteSubjectCode").innerHTML = dataList[0]['subjectCode'];
        document.getElementById("deleteDay").innerHTML = dataList[0]['day'];
        document.getElementById("deleteFromTime").innerHTML = dataList[0]['fromTime'];
        document.getElementById("deleteToTime").innerHTML = dataList[0]['toTime'];
        document.getElementById("deleteDescription").innerHTML = dataList[0]['description'];
    });
    console.clear();

}

function emptyTable() { // This function will clear the data in table view. Because if next table open past data also can display in the table
    var table = document.getElementById("timetable");
    for (var r = 1, n = table.rows.length; r < n; r++) {
        for (var c = 1, m = table.rows[r].cells.length; c < m; c++) {
            table.rows[r].cells[c].innerHTML = "";
            table.rows[r].cells[c].style.backgroundColor = "";
        }
    }
    console.clear();
}

function timetableDisplay() {
    document.getElementById("headingEditEntry").style.display = "none";
    document.getElementById("headingDeleteEntry").style.display = "none";
    document.getElementById("headingAddEntry").style.display = "none";
    document.getElementById("timetableEntryForm").style.display = "none";
    document.getElementById("EntryDeleteView").style.display = "none";
    document.getElementById("timetablePage").style.display = "none";
    document.getElementById("timetableDisplay").style.display = "";
    var indexValue = 0;
    // var username=document.getElementById("username").value;
    // console.log(username);
    // const username = document.cookie.split('userName')[1].split(';')[0].split('=')[1];
    // console.log(username);
    var url = "http://localhost/USSP/components/adminPanel/assets/timetableDisplayAPI.php?&groupName=" + group + "";
    console.log(url);
    $.getJSON(url, function (dataList) {
        var entryLength = dataList.length;
        console.log(entryLength);
        var subjects = [];
        var halls = [];
        var fromTimes = [];
        var toTimes = [];
        var days = [];
        for (i = 0; i < entryLength; i++) { // In this loop divide into few sectors 
            // console.log(i);
            var subject = dataList[i]['subjectCode'];
            var hall = dataList[i]['hallID'];
            var fromTime = dataList[i]['fromTime'];
            var toTime = dataList[i]['toTime'];
            var day = dataList[i]['day'];
            fromTimes[i] = fromTime;
            toTimes[i] = toTime;
            subjects[i] = subject;
            days[i] = day;
            halls[i] = hall;
            // console.log(subject);
        }

        function findRow(timestamp) { //This function return rox number for time stamp
            if (timestamp == '08:00:00') {
                var row = 1;
            } else if (timestamp == '08:30:00') {
                var row = 2;
            } else if (timestamp == '09:00:00') {
                var row = 3;
            } else if (timestamp == '09:30:00') {
                var row = 4;
            } else if (timestamp == '10:00:00') {
                var row = 5;
            } else if (timestamp == '10:30:00') {
                var row = 6;
            } else if (timestamp == '11:00:00') {
                var row = 7;
            } else if (timestamp == '11:30:00') {
                var row = 8;
            } else if (timestamp == '12:00:00') {
                var row = 9;
            } else if (timestamp == '13:00:00') {
                var row = 10;
            } else if (timestamp == '13:30:00') {
                var row = 11;
            } else if (timestamp == '14:00:00') {
                var row = 12;
            } else if (timestamp == '14:30:00') {
                var row = 13;
            } else if (timestamp == '15:00:00') {
                var row = 14;
            } else if (timestamp == '15:30:00') {
                var row = 15;
            } else if (timestamp == '16:00:00') {
                var row = 16;
            } else if (timestamp == '16:30:00') {
                var row = 17;
            } else if (timestamp == '17:00:00') {
                var row = 18;
            }
            return row;
        }

        for (i = 0; i < entryLength; i++) {

            // console.log(i);

            var val = fromTimes[i]
            // var row1=findRow(val);
            var row1 = findRow(val); // This row1 contain the upper bound of time period.
            var row2 = findRow(toTimes[i]) - 1;  //This row2 contain the lower bound of time period
            var day = days[i];
            if (day == 'MON') {
                var columnNumber = 1;
            }
            if (day == 'TUE') {
                var columnNumber = 2;
            }
            if (day == 'WED') {
                var columnNumber = 3;
            }
            if (day == 'THU') {
                var columnNumber = 4;
            }
            if (day == 'FRI') {
                var columnNumber = 5;
            }

            var width = row2 - row1 + 1;

            var start = document.getElementById("timetable").rows[row1];
            // start.cells[columnNumber].style.backgroundColor = "rgb(253, 144, 144)";
            start.cells[columnNumber].style.textAlign = "center";
            for (k = row1; k <= row2; k++) {
                var allocatedCell = document.getElementById("timetable").rows[k];
                allocatedCell.cells[columnNumber].style.backgroundColor = "var(--entryBackgroundColor)";
                allocatedCell.cells[columnNumber].title = subjects[i] + " " + halls[i];

                // allocatedCell.cells[columnNumber].style.backgroundColor = "rgb(229, 170, 252)";

            }
            // start.cells[columnNumber].rowSpan  = width;
            console.log(i);
            console.log(subjects[i]);
            start.cells[columnNumber].innerHTML = "<div>" + subjects[i] + "</div><div>" + halls[i] + "</div>";


        }
    });
    var col9 = document.getElementById("timetable").rows[9];

    col9.cells[1].innerHTML = "B";
    col9.cells[2].innerHTML = "R";
    col9.cells[3].innerHTML = "E";
    col9.cells[4].innerHTML = "A";
    col9.cells[5].innerHTML = "K";
    console.clear();
}
