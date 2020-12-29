document.querySelectorAll(".dropZoneInput").forEach(inputElement =>{
   const dropZoneElement = inputElement.closest(".dropZone");

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


// @param {HTMLElement} dropZoneElement
// @param {File} file

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
        dropZoneElement.appendChild(thumbnailElement);
    }

    thumbnailElement.dataset.label = file.name;


}



















// let dropArea = document.getElementById('dropZone');
//
// // prevent default behaviors and stop few events
// ['dragEnter' , 'dragover', 'dragleave','drop'].forEach(eventName =>{
//     dropArea.addEventListener(eventName, preventDefaults, false)
// });
// function preventDefaults(e){
//     e.preventDefault();
//     e.stopPropagation();
// }
//
// // Change the color of dragZone border color
// ['dragenter', 'dragover'].forEach(eventName =>{
//     dropArea.addEventListener(eventName, highlight,false)
// });
//
// ['dragleave', 'drop'].forEach(eventName=>{
//     dropArea.addEventListener(eventName,unHighlight, false);
// })
//
// function highlight(e){
//     dropArea.classList.add('highlight');
// }
// function unHighlight(e){
//     dropArea.classList.remove('highlight');
//
// }
//
// dropArea.addEventListener('drop', handleDrop, false);
//
// function handleDrop(e){
//     let dt = e.dataTransfer;
//     let files = dt.files;
//
//     handleFiles(files);
// }
//
// function handleFiles(files){
//     ([...files]).forEach(uploadFile);
// }