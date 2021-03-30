if(localStorage.getItem('greeting')){

}
// Set greeting message according to the time
    localStorage.setItem('greeting','');

    let timeIn = new Date();
    let timeInHours = timeIn.getHours();
    let greetingMessage;

    if (timeInHours < 12) {
        greetingMessage = "Good Morning!"
    } else if (timeInHours >= 12 && timeInHours <= 17) {
        greetingMessage = "Good Afternoon!";
    } else if (timeInHours >= 17 && timeInHours <= 24) {
        greetingMessage = "Good Evening!";
    }
    document.getElementById("greetingMessage").innerHTML = greetingMessage;

// popup message
    const loginPopup = document.querySelector(".popupMessageContainer");

    window.addEventListener("load", function () {
        showPopup();
    });


    function showPopup() {
        loginPopup.classList.add("show"); //display greeting message

        //Load the content after few seconds
        setTimeout(function () {
            document.getElementById("greeting").remove();
            document.getElementById("contentContainer").style.visibility = 'visible';
            document.getElementById("contentContainer").style.display = 'block';
            document.querySelector('body').style.visibility = 'hidden';
            document.querySelector('body').style.backgroundColor = 'white';

        }, 3000);
    }

// cookie value getting function
function getCookieValue(searchKey) {
    let returnValue = null;
    document.cookie.split("; ").forEach(value => {
        let key = value.split("=")[0];
        let cookieValue = value.split("=")[1];
        if (searchKey === key) {
            returnValue = cookieValue;
        }
    });
    return returnValue;
}

// set date and time
let clock = () => {
    const months = [
        "Jan",
        "Feb",
        "Mar",
        "Apr",
        "May",
        "Jun",
        "Jul",
        "Aug",
        "Sep",
        "Oct",
        "Nov",
        "Dec"
    ];
    const days = [
        "Sunday",
        "Monday",
        "Tuesday",
        "Wednesday",
        "Thursday",
        "Friday",
        "Saturday"

    ];

    let date = new Date();
    let hours = date.getHours();
    let minutes = date.getMinutes();
    let year = date.getFullYear();
    let month = months[date.getMonth()];
    let day = days[date.getDay()];
    let currentDate = date.getDate();

    let period = "AM";
    //convert the ......time into .......
    if (hours === 0) {
        hours = 12;
    } else if (hours === 12) {
        period = "PM";
    } else if (hours > 12) {
        hours = hours - 12;
        period = "PM";
    }

    let stringDate;
    if (currentDate === 1) {
        stringDate = `${currentDate}<sup>st</sup>`;
    } else if (currentDate === 2) {
        stringDate = `${currentDate}<sup>nd</sup>`;
    } else if (currentDate === 3) {
        stringDate = `${currentDate}<sup>rd</sup>`;
    } else {
        stringDate = `${currentDate}<sup>th</sup>`;
    }

    //ex -> replace 9 as 09
    hours = hours < 10 ? "0" + hours : hours;
    minutes = minutes < 10 ? "0" + minutes : minutes;

    let time = `${hours}:${minutes}:${period}`;
    let monthYear = `${month} ${year}`;

    document.getElementById("time").innerHTML = time;
    document.getElementById("month").innerHTML = monthYear;
    document.getElementById("day").innerHTML = day;
    document.getElementById("date").innerHTML = stringDate;
    setTimeout(clock, 1000);

};
clock();