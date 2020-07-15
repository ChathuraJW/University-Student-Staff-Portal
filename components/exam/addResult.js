let currentYear = new Date().getFullYear();
// fill data to examination year dropdown
let yearValues = document.getElementById("examinationYear");
let beginYear = currentYear - 10;
while (beginYear <= currentYear) {
    yearValues.options[yearValues.options.length] = new Option(beginYear.toString(), beginYear.toString());
    beginYear++;
}
yearValues.value = currentYear.toString();

// fill data to batch dropdown
let batchValues = document.getElementById("batch");
let data;
beginYear = currentYear - 17;
while (beginYear < currentYear) {
    data = (beginYear - 1).toString() + "/" + beginYear.toString();
    batchValues.options[batchValues.options.length] = new Option(data, data);
    beginYear++;
}

//fill data to subject dropdown
let subjectValues = document.getElementById("subject");
let subjectName = ["Data Structures & Algorithms 1", "Programming Using C"];
let subjectCode = ["SCS1201", "SCS1202"];
let length = subjectCode.length - 1;
while (length >= 0) {
    subjectValues.options[subjectValues.options.length] = new Option(subjectName[length], subjectCode[length]);
    length--;
}

//uploaded file operation
let fileUploaded = document.getElementById("resultFile");
let fileLabel = document.getElementById("resultFileLabel");
fileUploaded.addEventListener("change", function () {
    if (fileUploaded.value != '') {
        let uploadFormat = fileUploaded.value.toString().split('.')[1].toLowerCase();
        if (uploadFormat == "csv") {
            fileLabel.style.backgroundColor = "green";
        } else {
            fileLabel.style.backgroundColor = "red";
            alert("Invalid file format. Please upload csv formatted file.")
        }
    }
})

//disable batch option for repeat attempts
let repeatOptionRep = document.getElementById("attemptRep");
repeatOptionRep.addEventListener("change", function () {
    batchValues.disabled = true;
})
let repeatOptionOne = document.getElementById("attemptOne");
repeatOptionOne.addEventListener("change", function () {
    batchValues.disabled = false;
})