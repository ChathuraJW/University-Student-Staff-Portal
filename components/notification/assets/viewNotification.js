function displayNotification(c){
    if(c.value=="1"){
        document.getElementById("sortedNotification").style.visibility='visible';
        document.getElementById("sortedNotification").style.display="";
        document.getElementById("defaultNotification").style.visibility='hidden';
        document.getElementById("defaultNotification").style.display="none";
        // document.getElementById("notificationColor").style.backgroundColor = "#00FF00";
        // document.getElementById("notificationColor").classList.add('notificationNext');


    }
    else if(c.value=="2"){
        document.getElementById("sortedNotification").style.visibility='visible';
        document.getElementById("sortedNotification").style.display="";
        document.getElementById("defaultNotification").style.visibility='hidden';
        document.getElementById("defaultNotification").style.display="none";
        // document.getElementById("notificationColor").style.backgroundColor = "#ADD8E6";

    }
    else if(c.value=="3"){
        document.getElementById("sortedNotification").style.visibility='visible';
        document.getElementById("sortedNotification").style.display="";
        document.getElementById("defaultNotification").style.visibility='hidden';
        document.getElementById("defaultNotification").style.display="none";
        // document.getElementById("notificationColor").style.backgroundColor = "#43C6DB";

    }
    else if(c.value=="4"){
        document.getElementById("sortedNotification").style.visibility='visible';
        document.getElementById("sortedNotification").style.display="";
        document.getElementById("defaultNotification").style.visibility='hidden';
        document.getElementById("defaultNotification").style.display="none";
        // document.getElementById("notificationColor").style.backgroundColor = "#A74AC7";

    }
    else if(c.value=="5"){
        document.getElementById("sortedNotification").style.visibility='visible';
        document.getElementById("sortedNotification").style.display="";
        document.getElementById("defaultNotification").style.visibility='hidden';
        document.getElementById("defaultNotification").style.display="none";
        // document.getElementById("notificationColor").style.backgroundColor = "#4CC552";

    }
    else if(c.value=="6"){
        document.getElementById("sortedNotification").style.visibility='visible';
        document.getElementById("sortedNotification").style.display="";
        document.getElementById("defaultNotification").style.visibility='hidden';
        document.getElementById("defaultNotification").style.display="none";
        // document.getElementById("notificationColor").style.backgroundColor = "#B6B6B4";

    }
}

function submitForm(){
    document.getElementById("radioButton").submit();
    // document.getElementById("sortedNotification").style.visibility='visible';
    // document.getElementById("sortedNotification").style.display="";
    // document.getElementById("defaultNotification").style.visibility='hidden';
    // document.getElementById("defaultNotification").style.display="none";
}