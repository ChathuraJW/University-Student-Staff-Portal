function addStaffRecipient(){
    let staffList=document.getElementById('academicSupportList');
    let recipientList=document.getElementById('conductStaffList');
    if(recipientList.value==''){
        recipientList.value=staffList.value;
    }else{
        recipientList.value=recipientList.value+"\n"+staffList.value;
    }
    staffList.remove(staffList.selectedIndex);
}