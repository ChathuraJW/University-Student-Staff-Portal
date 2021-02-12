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

function respondOperation(requestID) {
    if (confirm('Are you user to temporally close the session?')) {
        // call confirmBookingAPI for operation
        const requestURL = "http://localhost/USSP/components/hallBooking/assets/hallBookingAPI.php?operation=respond&requestID=" + requestID;
        $.getJSON(requestURL, function (operationState) {
            if (operationState === 1) {
                createToast('Info', 'Operation successful. You can review it again.', 'I');
                // wait 4.5s and redirect to main page
                setTimeout(function () {
                    history.go(-2);
                    location.reload(true);
                }, 3000);
            } else {
                createToast('Warning (error code: #HBM05)', 'Unable to close request temporally.', 'W');
            }
        });
    }
}

function confirmSelectedBooking() {
    if (confirm('Are you user to confirm for the selected request?')) {
        const selectedRequestID = document.getElementById('selectedRequestID').value;
        const isChecked = document.getElementById('confirmBooking').checked;
        // check whether declaration checked
        if (isChecked) {
            // call confirmBookingAPI for operation
            const requestURL = "http://localhost/USSP/components/hallBooking/assets/hallBookingAPI.php?operation=confirm&requestID=" + selectedRequestID;
            $.getJSON(requestURL, function (operationState) {
                if (operationState === 1) {
                    createToast('Info', 'successfully confirm the reservation request.', 'I');
                    // wait 3s and redirect to main page
                    setTimeout(function () {
                        history.go(-2);
                        location.reload(true);
                    }, 3000);
                } else {
                    createToast('Warning (error code: #HBM06)', 'Failed to complete request confirmation.', 'W');
                }
            });
        } else {
            // show error by saying that check to declaration
            createToast('Warning (error code: #HBM07)', 'Make sure to agree to the declaration.', 'W');
        }
    }
}