//submit the form with radio buttons
function submitForm(){
    document.getElementById("radioButton").submit();
}

function markASRead(notificationID){
    let userName = document.cookie.split('=')[1];
    console.log(userName);
    console.log(notificationID);

    if(document.getElementById(notificationID).value){
        document.getElementById('marked'+notificationID).style.backgroundColor ='var(--baseColor)';


        const markAsReadURL = "http://localhost/USSP/components/notification/assets/viewNotificationAPI.php?activity=markAsRead&userName=" + userName + "&mark=1&notificationID="+ notificationID ;
        console.log(markAsReadURL);
        $.getJSON(markAsReadURL,function (mark){
            console.log(mark);

        });
    }

}

// $('notification').hover(
//     // function(){ $(this).addClass('hover') },
//     function(){ $(this).removeClass('content') }
// )

function showFullContent(notificationId){
    console.log('hi');
    document.getElementById('div'+notificationId).className = "notificationContent";

}

