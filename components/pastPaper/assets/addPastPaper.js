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

// daga and drop js functions
document.querySelectorAll(".dropZoneInput").forEach(inputElement =>{
   const dropZoneElement = inputElement.closest(".dropZone");

   // created click to upload part
   dropZoneElement.addEventListener("click",e=>{
       inputElement.click();
   });
   inputElement.addEventListener("change",e=>{
       if(inputElement.files.length) {
           updateThumbnail(dropZoneElement, inputElement.files[0]);
       }

       });

   // change the border when drag an element
   dropZoneElement.addEventListener("dragover",e=>{
       e.preventDefault();
       dropZoneElement.classList.add("dropZoneOver");
   });

   //remove the changes of border
   ["dragleave","dragend"].forEach(type=>{
       dropZoneElement.addEventListener(type,e=>{
           dropZoneElement.classList.remove("dropZoneOver");
       });
   });

   dropZoneElement.addEventListener("drop",e=>{
       e.preventDefault();
       // console.log(e.dataTransfer.files);
       //  get only one file amoung draged files
       if(e.dataTransfer.files.length){
           inputElement.files = e.dataTransfer.files;
           updateThumbnail(dropZoneElement,e.dataTransfer.files[0]);
       }
       dropZoneElement.classList.remove("dropZoneOver");
       });
});




function updateThumbnail(dropZoneElement,file){
    // console.log(file);
    let thumbnailElement = dropZoneElement.querySelector(".dropZoneThumb");
    if(dropZoneElement.querySelector(".dropZonePrompt")){
        // dropZoneElement.querySelector(".dropZone").remove();
        document.getElementById('fileInputLabel').remove();
    }
    // first time-there is no thumbnail element
    if(!thumbnailElement){
        thumbnailElement = document.createElement("div");
        thumbnailElement.classList.add("dropZoneThumb");
        thumbnailElement.backgroundImage = "url('assets/pdf.jpg')";
        dropZoneElement.appendChild(thumbnailElement);
    }

    thumbnailElement.dataset.label = file.name;


}

//pdf or zip file operation
let pastPaper = document.getElementById("fileInput");

pastPaper.addEventListener("change",function (){
    if(pastPaper.value !== ''){
        console.log("File Size is(KB): "+pastPaper.files[0].size/1000);
        let uploadFormat = pastPaper.value.toString().split('.')[1].toLowerCase();
        if (uploadFormat === "pdf" || uploadFormat==="zip") {
        } else {
            alert("Invalid file format. Please upload pdf or zip formatted file.");
        }

    }
});




















