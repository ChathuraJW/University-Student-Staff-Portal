document.querySelectorAll("*.dropZoneInput").forEach(inputElement=>{
    const dropZoneElement = inputElement.closest(".dropZone");

    dropZoneElement.addEventListener("click",e=>{
        inputElement.click();
    });

    dropZoneElement.addEventListener("change",e=>{
        updateThumbnail(dropZoneElement,inputElement.files[0])
    });

    dropZoneElement.addEventListener("dragover", e=>{
        e.preventDefault();
        dropZoneElement.classList.add("dropZoneOver");
    });

    ["dragleave","dragend"].forEach(type=>{
        dropZoneElement.addEventListener(type, e=>{
            dropZoneElement.classList.remove("dropZoneOver");
        });
    });

    dropZoneElement.addEventListener("drop",e=>{
        e.preventDefault();
        // console.log(e.dataTransfer.files);
        if(e.dataTransfer.files.length){
            inputElement.files = e.dataTransfer.files;
            // console.log(inputElement.files);
            updateThumbnail(dropZoneElement,e.dataTransfer.files[0]); 
        }
        dropZoneElement.classList.remove("dropZoneOver");

    });
});

function updateThumbnail(dropZoneElement,file){
    // console.log(dropZoneElement);
    // console.log(file);
let thumbnailElement = dropZoneElement.querySelector(".dropZoneThumb");

if(dropZoneElement.querySelector(".dropZonePrompt")){
    dropZoneElement.querySelector(".dropZonePrompt").remove();
}

    //creating thumbnail element for the first time
    if(!thumbnailElement){
        thumbnailElement = document.createElement("div");
        thumbnailElement.classList.add("dropZoneThumb");
        dropZoneElement = appendChild(thumbnailElement);//error
    }

    thumbnailElement.dataset.label = file.name;
}