function addStaffRecipient(id) {
    let contactList = document.getElementById(id);
    let recipientList = document.getElementById('contacts');
    recipientList.value = recipientList.value + " " + contactList.value;
    contactList.remove(contactList.selectedIndex);


}

 

