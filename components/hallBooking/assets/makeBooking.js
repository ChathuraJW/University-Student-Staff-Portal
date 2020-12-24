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