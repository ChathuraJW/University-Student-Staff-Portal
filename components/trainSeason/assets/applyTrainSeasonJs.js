//function application(){
    //window.location.href="views/applicationView.php";
//}

//function popupFunction(){
    //alert("You can request twice more!");
//}

let currentYear = new Date().getFullYear();
let yearValues = document.getElementById("acYear");
let beginYear = currentYear - 10;
while(beginYear<=currentYear){
    yearValues.options[yearValues.options.length]=new Option(beginYear.toString(), beginYear.toString());
    beginYear++;
}
yearValues.value=currentYear.toString();