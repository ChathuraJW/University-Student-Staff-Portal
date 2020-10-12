//open result data
let elementID = document.location.href.toString().split("verifyResult.php")[1];
if (elementID !== "") {
    document.getElementById("showFileContent").style.display = "inline-grid";
    let notificationCard = document.getElementById(elementID.split("=")[1]);
    notificationCard.style.backgroundColor = "#730388";
    notificationCard.style.color = "white";
}

// JS function for search data on data table
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


//result filling function
