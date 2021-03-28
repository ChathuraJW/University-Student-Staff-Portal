let currentYear = new Date().getFullYear();
// fill data to examination year dropdown
let yearValues = document.getElementById("examinationYear");
let beginYear = currentYear - 10;
while (beginYear <= currentYear) {
    yearValues.options[yearValues.options.length] = new Option(beginYear.toString(), beginYear.toString());
    beginYear++;
}
yearValues.value = currentYear.toString();

// fill data to batch dropdown
let batchValues = document.getElementById("batch");
let data;
beginYear = currentYear - 17;
while (beginYear <= currentYear) {
    data = (beginYear - 1).toString() + "/" + beginYear.toString();
    batchValues.options[batchValues.options.length] = new Option(data, data);
    beginYear++;
}

//filter data based on radio values
function selectedYear(year) {
    let subjectListElement = document.getElementById('subject');
    let subjectList = subjectListElement.innerText.split("\n");
    let i = 0;
    while (i < subjectList.length) {
        let temp = Math.ceil(subjectList[i].split('.')[0] / 2);
        if (temp != '' && temp != year) {
            subjectListElement.remove(i);
            subjectList = subjectListElement.innerText.split("\n");
            i = -1;
        }
        i = i + 1;
    }
}

function selectSemester(semester) {
    let subjectListElement = document.getElementById('subject');
    let subjectList = subjectListElement.innerText.split("\n");
    let i = 0;
    while (i < subjectList.length) {
        let temp = Math.ceil(subjectList[i].split('.')[0]);
        if (temp != '' && temp % 2 != semester % 2) {
            subjectListElement.remove(i);
            subjectList = subjectListElement.innerText.split("\n");
            i = -1;
        }
        i = i + 1;
    }
}

//disable batch option for repeat attempts
let repeatOptionRep = document.getElementById("attemptRep");
repeatOptionRep.addEventListener("change", function () {
    batchValues.disabled = true;
})
let repeatOptionOne = document.getElementById("attemptOne");
repeatOptionOne.addEventListener("change", function () {
    batchValues.disabled = false;
})

//uploaded file operation
let fileUploaded = document.getElementById("resultFile");
let fileLabel = document.getElementById("resultFileLabel");
fileUploaded.addEventListener("change", function () {
    if (fileUploaded.value != '') {
        let uploadFormat = fileUploaded.value.toString().split('.')[1].toLowerCase();
        // check file format and maximum upload size 1MB
        if (uploadFormat == "csv" && ((fileUploaded.files[0].size / 1000) < 1024)) {
            fileLabel.style.backgroundColor = "green";
            //change view
            document.getElementById("mainSection").classList.add("col-2");
            document.getElementById("dropDownSection").style.gridTemplateColumns = "repeat(2,6fr)";
            let showResultSection = document.getElementById("displayResultSection");
            showResultSection.style.display = "block";
            showResultSection.style.paddingTop = "30px";
            showResultSection.style.textAlign = "center";
            //load file
            let fileToLoad = document.getElementById("resultFile").files[0];
            let fileReader = new FileReader();
            let table = document.getElementById("dataList");
            // check weather table has data already if so clean them
            if (table.rows.length > 1) {
                document.querySelectorAll("table tbody tr td").forEach(function (element) {
                    element.remove()
                })
                fileUploaded.value = "";
            }
            fileReader.onload = function (fileLoadedEvent) {
                let textFromFileLoaded = fileLoadedEvent.target.result;
                let position = 0;
                textFromFileLoaded.split("\n").forEach(function (value) {
                    // ignore header
                    if (position === 0) {
                        position++;
                        return;
                    }
                    // create table row and fill cell values
                    if (value.split(",")[0] !== '' & value.split(",")[1] !== '' & value.split(",")[2] !== '') {
                        let row = table.insertRow(position);
                        row.insertCell(0).innerHTML = value.split(",")[0];
                        row.insertCell(1).innerHTML = value.split(",")[1];
                        row.insertCell(2).innerHTML = value.split(",")[2];
                    }
                    position++;
                });
            };
            fileReader.readAsText(fileToLoad, "UTF-8");
        } else {
            fileLabel.style.backgroundColor = "red";
            alert("Invalid file format or file limit exceeded.");
            fileUploaded.value = "";
        }
    }
})

function searchOnTable() {
    let searchKey = document.getElementById("searchKey");
    let dataTable = document.getElementById("dataList");
    let entryCount = document.getElementById("entryCount");
    let tableRow = dataTable.getElementsByTagName("tr");
    let tableData, txtValue;
    let visibleCount = tableRow.length - 1;
    for (let i = 0; i < tableRow.length; i++) {
        tableData = tableRow[i].getElementsByTagName("td")[1];
        if (tableData) {
            txtValue = tableData.textContent || tableData.innerText;
            if (txtValue.indexOf(searchKey.value) > -1) {
                tableRow[i].style.display = "table-row";
                visibleCount++;
            } else {
                tableRow[i].style.display = "none";
                visibleCount--;
            }
        }
    }
    // display row count
    let spanValue = (visibleCount / 2).toString() + " / " + (tableRow.length - 1).toString();
    if ((visibleCount / 2) === (tableRow.length - 1))
        entryCount.textContent = " ";
    else
        entryCount.textContent = spanValue;
    // change background color of the search box when search result empty
    if (visibleCount === 0) {
        searchKey.style.backgroundColor = "rgba(232, 13, 13, 0.27)";
    } else {
        searchKey.style.backgroundColor = "";
    }
}