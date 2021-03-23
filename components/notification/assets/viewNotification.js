//submit the form with radio buttons
function submitForm(){
    document.getElementById("radioButton").submit();
}

function markASRead(notificationID){
    let marked;
    let userName = document.cookie.split('=')[1];
    console.log(userName);
    console.log(notificationID);

    if(document.getElementById(notificationID).checked){
        marked = 1;
        console.log(marked);
    }
     const markAsReadURL = "http://localhost/USSP/components/notification/assets/viewNotificationAPI.php?activity=markAsRead&userName=" + userName + "&mark=" + marked;
    console.log(markAsReadURL);
    $.getJSON(markAsReadURL,function (marked){
        console.log(marked);
    });
}

$('notification').hover(
    // function(){ $(this).addClass('hover') },
    function(){ $(this).removeClass('content') }
)

