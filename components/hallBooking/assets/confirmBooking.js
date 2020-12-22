function rearrangeContent(buttonID) {
    // reset all to initial color
    document.getElementById('orderByDate').style.backgroundColor = 'var(--baseColor)';
    document.getElementById('orderByRole').style.backgroundColor = 'var(--baseColor)';
    document.getElementById('orderByHall').style.backgroundColor = 'var(--baseColor)';
    document.getElementById('orderByRequestedType').style.backgroundColor = 'var(--baseColor)';

    // change color of clicked button
    let clickedButton = document.getElementById(buttonID);
    clickedButton.style.backgroundColor = 'var(--fontColor)';

}