function loadMore(id) {
    let messageEntry = document.getElementById('entry' + id);
    let messageContent = document.getElementById('content' + id);
    let readMoreButton = document.getElementById('readMore' + id);
    if (readMoreButton.innerText == 'Read More...') {
        messageEntry.style.maxHeight = 'none';
        messageContent.style.overflow = 'auto';
        messageContent.style.height = 'auto';
        readMoreButton.innerText = "Read Less...";
    } else {
        messageEntry.style.maxHeight = '100%';
        messageContent.style.overflow = 'hidden';
        messageContent.style.height = '110px';
        readMoreButton.innerText = "Read More...";
    }
}
