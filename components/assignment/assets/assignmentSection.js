// add staff to assignment plane conduct operation
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

// TODO (Nice to have) add some time out when user lock the entry for automatic unlock filed for avoid ded locks
// lock or unlock entries
function enableDisableInput(markID) {
  let inputField=document.getElementById('studentResult'+markID);
  let saveButton=document.getElementById('saveButton'+markID);
  let checkBox=document.getElementById('chkBox'+markID);
  if(inputField.disabled){
    // going to lock entry for add mark
    const serviceURL="http://localhost/USSP/components/assignment/assets/saveAssignmentResultAPI.php?operation=lockEntry&markID="+markID;
    $.getJSON(serviceURL,function (operationState){
      if(operationState){
        // disable input filed and display again save button with disable manner
        inputField.disabled=false;
        saveButton.style.display='block';
        saveButton.disabled=false;
      }else{
        // operation failed message and unchecked checkbox
        checkBox.checked=false;
        createToast('Warning (error code: #AOM07)',"Failed to lock the entry.",'W');
      }
    });
  } else{
    // release the lock for entry already put
    const serviceURL="http://localhost/USSP/components/assignment/assets/saveAssignmentResultAPI.php?operation=unlockEntry&markID="+markID;
    $.getJSON(serviceURL,function (operationState){
      if(operationState){
        // disable input filed and hide save button
        inputField.disabled=true;
        saveButton.style.display='none';
      }else{
        // display waring and uncheck the checkbox
        checkBox.checked=false;
        createToast('Warning (error code: #AOM08)',"Failed to unlock the entry.",'W');
      }
    });
  }
}

// save data function for save button
function saveStudentMark(markID){
  let inputField=document.getElementById('studentResult'+markID);
  let studentMark=inputField.value;
  let saveDataButton=document.getElementById('saveButton'+markID);
  let checkBox=document.getElementById('chkBox'+markID);
  // check mark validity
  if(studentMark>0 && studentMark<101){
    // temporally hide the save button
    saveDataButton.style.display='none';
    const serviceURL="http://localhost/USSP/components/assignment/assets/saveAssignmentResultAPI.php?operation=addMark&markID="+markID+"&newMark="+studentMark;
    $.getJSON(serviceURL,function (operationState){
      if(operationState){
        // again show the button with success color and uncheck checkbox and disable save button and input filed
        saveDataButton.style.display='block';
        saveDataButton.style.color='var(--successColor)';
        checkBox.checked=false;
        inputField.disabled=true;
        saveDataButton.disabled=true;
      }else{
        // operation failed, display button with danger color and show waring, user can input mark and try again
        saveDataButton.style.display='block';
        saveDataButton.style.color='var(--dangerColor)';
        createToast('Warning (error code: #AOM09)',"Failed to save data.",'W');
      }
    });
  }else{
    // display error message to inform about invalid input
    createToast('Warning (error code: #AOM06)',"Mark input is out of range. ( 0 < Mark <= 100 )",'W');
  }
}
