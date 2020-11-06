document.querySelectorAll("*.dropZoneInput").forEach(inputElement=>{
    const dropZoneElement = inputElement.closest(".dropZone");

    dropZoneElement.addEventListener("dragover", e=>{
        dropZoneElement.classList.add("dropZoneOver");
    });

    ["dragleave","dragend"].forEach(type=>{
        dropZoneElement.addEventListener(type, e=>{
            dropZoneElement.classList.remove("dropZoneOver");
        });
    });

    dropZoneElement.addEventListener()
});