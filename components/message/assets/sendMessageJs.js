/*function addStaffRecipient(){
    let academicStaffList=document.getElementById('academicStaffList');
    let academicSupportiveList=document.getElementById('academicSupportiveList');
    let administrativeList=document.getElementById('administrativeList');
    academicStaffList.value=academicStaffList.value+" "+academicSupportiveList.value+" "+administrativeList.value;
    academicStaffList.remove(academicStaffList.selectedIndex);
}*/

function addStaffRecipient(id){
    let staffList=document.getElementById(id);
    let recipientList=document.getElementById('contacts');
    recipientList.value=recipientList.value+" "+staffList.value;
    staffList.remove(staffList.selectedIndex);
}
