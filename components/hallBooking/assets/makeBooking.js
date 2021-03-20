let mainBlock = document.getElementById('mainBlock');
let popupSection = document.getElementById('popupSection');

function loadAllocationMap() {
    mainBlock.style.display = 'none';
    popupSection.style.display = 'block';
}

function closeReservationMap() {
    popupSection.style.display = 'none';
    mainBlock.style.display = 'grid';
}

function loadMoreHistory() {
    let loadMoreLess = document.getElementById('loadMoreLessButton');
    let pastBookingList = document.getElementsByClassName('bookingEntry');
    if (loadMoreLess.innerText === 'Load Less...') {
        //again back to 5 entry
        loadMoreLess.innerText = 'Load More...';
        for (let i = 0; i < pastBookingList.length; i++) {
            if (i < 5)
                pastBookingList[i].style.display = 'block';
            else
                pastBookingList[i].style.display = 'none';
        }
    } else {
        //load entry after five
        loadMoreLess.innerText = 'Load Less...';
        for (let i = 0; i < pastBookingList.length; i++) {
            pastBookingList[i].style.display = 'block';
        }
    }
}

function fillCurrentAllocationMap() {
    const allocationTable = document.getElementById('allocationMap');
    // clean table before new data load
    for (let i = 2; i < allocationTable.rows.length; i++) {
        for (let j = 1; j <= 22; j++) {
            allocationTable.rows[i].cells[j].innerHTML = '';
            allocationTable.rows[i].cells[j].style.backgroundColor = 'var(--backgroundColor)';
            allocationTable.rows[i].cells[j].style.border = "1px solid var(--fontColor)";
        }
    }

    // read selected date from input time field
    let selectedDate = document.getElementById('selectedDate').value;

    // create API calling link
    //TODO API Point
    let requestURL = "http://localhost/USSP/components/hallBooking/assets/hallBookingAPI.php?operation=loadCurrentAllocation&dateSelected=" + selectedDate;
    // call API for data
    $.getJSON(requestURL, function (timetableEntryList) {
        // iterate through the result
        for (let i = 0; i < timetableEntryList.length; i++) {
            let row = allocationTable.rows[timetableEntryList[i]['rowNumber']];
            let baseCell = timetableEntryList[i]['beginCell'];

            // define variable to identify the first slot
            let isFirstCell = true;
            for (let j = baseCell; j < timetableEntryList[i]['endCell']; j++) {
                // add styles to the maker on the table
                row.cells[j].style.backgroundColor = timetableEntryList[i]['degreeStreamColor'];
                row.cells[j].style.textAlign = "center";
                row.cells[j].style.color = 'white';
                row.cells[j].style.border = "2px solid rgba(237, 226, 226, 0.33)";
                row.cells[j].style.borderLeft = 'none';

                // check weather current clot is first slot to add id and message
                if (isFirstCell) {
                    row.cells[j].innerHTML = (i + 1).toString();
                    row.cells[j].title = timetableEntryList[i]['displayMessage'];
                    isFirstCell = false;
                } else {
                    row.cells[j].innerHTML = '-';
                }
            }
        }
    });
}
