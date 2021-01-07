let currentYear = new Date().getFullYear();
// fill data to examination year dropdown
let yearValues = document.getElementById("examinationYear");
let beginYear = 2002;
while (beginYear <= currentYear) {
    yearValues.options[yearValues.options.length] = new Option(beginYear.toString(), beginYear.toString());
    beginYear++;
}
yearValues.value = currentYear.toString();

// set default value to examnination year
selectElement('leaveCode', '0')

function selectElement(id, valueToSelect) {
    let element = document.getElementById('examinationYear');
    element.value = valueToSelect;
}
