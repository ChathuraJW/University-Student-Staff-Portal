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

//filter data based on radio values
function selectedYear(year){
    let subjectListElement=document.getElementById('subject');
    let subjectList=subjectListElement.innerText.split("\n");
    let i=0;
    while(i<subjectList.length){
        let temp=Math.ceil(subjectList[i].split('.')[0]/2);
        if(temp!='' && temp!=year){
            subjectListElement.remove(i);
            subjectList=subjectListElement.innerText.split("\n");
            i=-1;
        }
        i=i+1;
    }
}

function selectSemester(semester){
    let subjectListElement=document.getElementById('subject');
    let subjectList=subjectListElement.innerText.split("\n");
    let i=0;
    while(i<subjectList.length){
        let temp=Math.ceil(subjectList[i].split('.')[0]);
        if(temp!='' && temp%2!=semester%2){
            subjectListElement.remove(i);
            subjectList=subjectListElement.innerText.split("\n");
            i=-1;
        }
        i=i+1;
    }
}

//disable batch option for repeat attempts
let repeatOptionRep = document.getElementById("attemptRep");
repeatOptionRep.addEventListener("change", function () {
    batchValues.disabled = true;
})
let repeatOptionOne = document.getElementById("attemptOne");
repeatOptionOne.addEventListener("change", function () {
    batchValues.disabled = false;
})

//uploaded file operation
let fileUploaded = document.getElementById("resultFile");
let fileLabel = document.getElementById("resultFileLabel");
fileUploaded.addEventListener("change", function () {
    if (fileUploaded.value != '') {
        console.log("File Size is(KB): " + fileUploaded.files[0].size / 1000);
        let uploadFormat = fileUploaded.value.toString().split('.')[1].toLowerCase();
        if (uploadFormat == "csv") {
            fileLabel.style.backgroundColor = "green";
        } else {
            fileLabel.style.backgroundColor = "red";
            alert("Invalid file format. Please upload csv formatted file.")
        }
    }
})