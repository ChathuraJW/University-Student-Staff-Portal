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