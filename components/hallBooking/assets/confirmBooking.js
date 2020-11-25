function rearrangeContent(buttonID) {
    // reset all to initial color
    document.getElementById('orderByDate').style.backgroundColor = 'rgb(20, 68, 215)';
    document.getElementById('orderByRole').style.backgroundColor = 'rgb(20, 68, 215)';
    document.getElementById('orderByHall').style.backgroundColor = 'rgb(20, 68, 215)';
    document.getElementById('orderByRequestedType').style.backgroundColor = 'rgb(20, 68, 215)';
    // change color of clicked button
    let clickedButton = document.getElementById(buttonID);
    clickedButton.style.backgroundColor = 'rgb(16, 149, 80)';

}