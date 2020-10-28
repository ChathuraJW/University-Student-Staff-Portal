function addStaffRecipient(){
    let staffList=document.getElementById('academicSupportList');
    let recipientList=document.getElementById('conductStaffList');
    recipientList.value=recipientList.value+" "+staffList.value;
    staffList.remove(staffList.selectedIndex);
}