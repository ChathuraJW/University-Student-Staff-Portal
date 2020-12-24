let currentYear = new Date().getFullYear();
// fill data to examination year dropdown
let yearValues = document.getElementById("academicYear");
let beginYear = currentYear - 10;
while (beginYear <= currentYear) {
    yearValues.options[yearValues.options.length] = new Option(beginYear.toString(), beginYear.toString());
    beginYear++;
}
yearValues.value = currentYear.toString();

function selectValue(){
    var val = document.getElementById("lecturer").value;
    return val;
}

 

