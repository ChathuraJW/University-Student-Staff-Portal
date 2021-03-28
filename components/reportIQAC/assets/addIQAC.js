let currentYear = new Date().getFullYear();
// fill data to examination year dropdown
let yearValues = document.getElementById("examinationYear");
let beginYear = currentYear - 10;
while (beginYear <= currentYear) {
    yearValues.options[yearValues.options.length] = new Option(beginYear.toString(), beginYear.toString());
    beginYear++;
}
yearValues.value = currentYear.toString();


//pdf file operation
let report = document.getElementById("fileInput");

report.addEventListener("change", function () {
    if (report.value !== '') {
        console.log("File Size is(KB): " + report.files[0].size / 1000);
        let uploadFormat = report.value.toString().split('.')[1].toLowerCase();
        if (uploadFormat === "pdf") {
        } else {
            alert("Please upload pdf file.");
        }

    }
});





















