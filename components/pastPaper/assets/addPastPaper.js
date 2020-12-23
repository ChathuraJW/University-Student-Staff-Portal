let dropArea = document.getElementById('dropZone');

// prevent default behaviors and stop few events
['dragEnter' , 'dragover', 'dragleave','drop'].forEach(eventName =>{
    dropArea.addEventListener(eventName, preventDefaults, false)
});
function preventDefaults(e){
    e.preventDefault();
    e.stopPropagation();
}

// Change the color of dragZone border color
['dragenter', 'dragover'].forEach(eventName =>{
    dropArea.addEventListener(eventName, highlight,false)
});

['dragleave', 'drop'].forEach(eventName=>{
    dropArea.addEventListener(eventName,unHighlight, false);
})

function highlight(e){
    dropArea.classList.add('highlight');
}
function unHighlight(e){
    dropArea.classList.remove('highlight');

}