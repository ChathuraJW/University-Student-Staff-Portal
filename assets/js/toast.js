function createToast(title, message, type) {
    // check type and suggest color and icon
    let icon;
    let color;
    if (type === 'S') {
        icon = "fa-check-circle";
        color = "var(--notificationSuccess)";
    } else if (type === 'W') {
        icon = "fa-exclamation-circle";
        color = "var(--notificationDanger)";
    } else {
        icon = "fa-info-circle";
        color = "var(--notificationInfo)";
    }
    // create content
    const content = "<div class='alert' style='background-color:" + color + ";'>" +
        "        <i class='fas fa-times closeButton'></i>" +
        "        <div>" +
        "            <div class='icon'>" +
        "                <i class='fas " + icon + " fa-2x'></i>" +
        "            </div>" +
        "            <div class='msgContent'>" +
        "                <strong>" + title + "</strong><br>" + message +
        "            </div>" +
        "        </div>" +
        "    </div>";
    $(".toastArea").append(content);
    window.location.href = '#toastArea';
    // 10 second timeout for close automatically
    setTimeout(function () {
        document.getElementsByClassName('alert')[0].remove();
    }, 10000);
    // close  button
    let close = document.getElementsByClassName("closeButton");
    for (let i = 0; i < close.length; i++) {
        close[i].onclick = function () {
            let div = this.parentElement;
            div.style.opacity = "0";
            setTimeout(function () {
                document.getElementsByClassName('alert')[0].remove();
            }, 600);
        }
    }
}