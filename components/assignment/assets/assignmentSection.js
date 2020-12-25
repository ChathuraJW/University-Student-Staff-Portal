function addStaffRecipient() {
  let staffList = document.getElementById('academicSupportList');
  let recipientList = document.getElementById('conductStaffList');
  if (recipientList.value == '') {
    recipientList.value = staffList.value;
  } else {
    recipientList.value = recipientList.value + "\n" + staffList.value;
  }
  staffList.remove(staffList.selectedIndex);
}
function checkResultInput(id) {
  let inputText = document.getElementById(id);
  let saveDataButton=document.getElementById('saveAssignmentResult');
  let inputValue = inputText.value;
  if (inputValue >= 0 && inputValue <= 100) {
    inputText.style.background = '#c2ecc2';
    saveDataButton.disabled=false;
  } else {
    inputText.style.background = '#eeb5b5';
    saveDataButton.disabled=true;
  }
}
function enableDisableInput(id) {
  let inputField=document.getElementById(id);
  if(inputField.disabled)
  inputField.disabled=false;
  else{
    inputField.value="";
    inputField.disabled=true;
  }
}
