var lblExaminationYear = document.getElementById("labelExaminationYear");
var lblBatch=document.getElementById("labelBatch");
var txtExaminationYear = document.getElementById("examinationYear");
var txtBatch=document.getElementById("batch");

lblExaminationYear.addEventListener("click",function () {
        lblExaminationYear.classList.add("small");
})

lblBatch.addEventListener("click",function () {
        lblBatch.classList.add("small");
})

txtExaminationYear.addEventListener("blur",function () {
    if(txtExaminationYear.value=='')
        lblExaminationYear.classList.remove("small");
})

txtBatch.addEventListener("blur",function () {
    if(txtBatch.value=='')
        lblBatch.classList.remove("small");
})