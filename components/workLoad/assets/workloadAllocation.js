var imported = document.createElement('script');
imported.src = '../../assets/js/toast.js';
document.head.appendChild(imported);

function allocationCancel() {
    document.getElementById("allocateForm").style.display = 'none';
}

function allocationForm() {
    var memberValues = document.getElementById("searchMembersOptions").value;
    if (memberValues) {
        document.getElementById("allocateForm").style.display = '';
    } else {
        document.getElementById("allocateForm").style.display = 'none';
        window.alert("Please select members!");
    }
}

function deallocateForm() {
    document.getElementById("allocationForm").reset();
    document.getElementById("allocateForm").style.display = "none";
    document.getElementById("secondaryMain").style.display = "none";
    document.getElementById("main").style.display = "";

}

function displaySearch() {
    var fromDate = document.getElementById("startDate").value;
    // var toDate=document.getElementById("endDate").value;
    var fromTime = document.getElementById("startTime").value;
    var toTime = document.getElementById("endTime").value;

    $('#searchMembersOptions') //this will remove previously found members.
        .find('option')
        .remove()
    ;

    if (fromDate != "" && toTime != "" && fromTime != "") {
        if (fromTime < toTime) {
            document.getElementById("searchStaff").style.display = "";
            var url = "http://localhost/USSP/components/workload/assets/workLoadMembersAPI.php?fromDate=" + fromDate + "&fromTime=" + fromTime + "&toTime=" + toTime + "";
            console.log(url);

            $.getJSON(url, function (dataList) {

                var selectBox = document.getElementById("searchMembersOptions");
                document.getElementById("searchMembersOptions").multiple = true;

                var len = dataList.length;
                for (i = 0; i < len; i++) {
                    var name = dataList[i]['salutation'] + "." + dataList[i]['firstName'] + " " + dataList[i]['lastName'];
                    var userName = dataList[i]['userName'];
                    let newOption = new Option(name, userName);
                    newOption.style.width = "98%";
                    selectBox.add(newOption, undefined);
                }

            });
        } else {
            createToast('Warning (error code: #WLA02)', 'Members finding failed. Wrong time period.', 'W');
        }
    } else {
        createToast('Warning (error code: #WLA02)', 'Members finding failed. Cannot null fields.', 'W');
    }

}

function openMessage() {
    // document.getElementById("firstMessage").style.display="none";
    document.getElementById("workloadRequest").style.display = "";
}

function allocation() {
    document.getElementById("searchStaff").style.display = "none";
    document.getElementById("main").style.display = "none";
    document.getElementById("secondaryMain").style.display = "";
}

function messageClose() {
    document.getElementById("messageView").style.display = "";
    document.getElementById("workloadRequest").style.display = "none";
}

function allocationApprove() {

    document.getElementById("allocateForm").style.display = "none";
    document.getElementById("searchStaff").style.display = "none";
    document.getElementById("finalMsg").style.display = "";
    setTimeout(function () {
        document.getElementById("finalMsg").style.display = "none";
        document.getElementById("secondaryMain").style.display = "none";
        document.getElementById("allocateForm").style.display = "none";
        document.getElementById("searchStaff").style.display = "none";
        document.getElementById("workloadRequest").style.display = "none";
        document.getElementById("messageView").style.display = "";
        document.getElementById("main").style.display = "";

    }, 3000);
}