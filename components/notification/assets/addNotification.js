
$('#checkAll').change(function () {
    if ($(this).prop('checked')) {
        $("input[type='checkbox']").prop('checked', true);
    } else {
        $("input[type='checkbox']").prop('checked', false);
    }
});
$('#checkAll').trigger('change');

var checkFirstYear = $("input[type='checkbox'][value='1210']");
var check1CSGroup1 = $("input[type='checkbox'][value='1211']");
var check1CSGroup2 = $("input[type='checkbox'][value='1212']");
var check1IS = $("input[type='checkbox'][value='1213']");

var checkSecondYear = $("input[type='checkbox'][value='1220']");
var check2CSGroup1 = $("input[type='checkbox'][value='1221']");
var check2CSGroup2 = $("input[type='checkbox'][value='1222']");
var check2IS = $("input[type='checkbox'][value='1223']");

var checkThirdYear = $("input[type='checkbox'][value='1230']");
var check3CS = $("input[type='checkbox'][value='1231']");
var check3IS = $("input[type='checkbox'][value='1232']");

var checkFourthYear = $("input[type='checkbox'][value='1240']");
var check4CS = $("input[type='checkbox'][value='1241']");
var check4IS = $("input[type='checkbox'][value='1242']");
var check4SE = $("input[type='checkbox'][value='1243']");

var checkStudent = $("input[type='checkbox'][value='1200']");

checkStudent.on('click',function(){
    checkFirstYear.prop('checked',this.checked);
    checkSecondYear.prop('checked',this.checked);
    checkFourthYear.prop('checked',this.checked);
    checkThirdYear.prop('checked',this.checked);

    check1CSGroup1.prop('checked',this.checked);
    check1CSGroup2.prop('checked',this.checked);
    check1IS.prop('checked',this.checked);

    check2CSGroup1.prop('checked',this.checked);
    check2CSGroup2.prop('checked',this.checked);
    check2IS.prop('checked',this.checked);

    check3CS.prop('checked',this.checked);
    check3IS.prop('checked',this.checked);

    check4CS.prop('checked',this.checked);
    check4IS.prop('checked',this.checked);
    check4SE.prop('checked',this.checked);
});

checkFirstYear.on('click', function(){
    check1CSGroup1.prop('checked',this.checked);
    check1CSGroup2.prop('checked',this.checked);
    check1IS.prop('checked',this.checked);

});
checkSecondYear.on('click', function(){
    check2CSGroup1.prop('checked',this.checked);
    check2CSGroup2.prop('checked',this.checked);
    check2IS.prop('checked',this.checked);

});
checkThirdYear.on('click', function(){
    check3CS.prop('checked',this.checked);
    check3IS.prop('checked',this.checked);

});
checkFourthYear.on('click', function(){
    check4CS.prop('checked',this.checked);
    check4IS.prop('checked',this.checked);
    check4SE.prop('checked',this.checked);

});

let selectAll = document.getElementsByClassName('checkAll')
let selectStudent = document.getElementsByClassName('checkStudent');
let selectFirstYear = document.getElementsByClassName('checkFirstYear');
let selectSecondYear = document.getElementsByClassName('checkSecondYear');
let selectThirdYear = document.getElementsByClassName('checkThirdYear');
let selectFourthYear =  document.getElementById('checkFourthYear');




function changeState(){
    let count =0;
    // check all operations
    for (let i=0; i<selectAll.length; i++){
        if(!selectAll[i].checked){
            //uncheck all option when uncheck uncheck below checkboxes.
            document.getElementById('checkAll').checked = false;
            break;
        }
        else{
            // check all option when below all checkboxes are selected
            count = count+1;
            if(count === selectAll.length) {
                document.getElementById('checkAll').checked = true;
            }
        }
    }

    // Student Selection
    count=0;
    for (let i=0; i<selectStudent.length; i++){
        if(!selectStudent[i].checked){
            document.getElementById('checkStudent').checked = false;
            break;
        }else{
            count = count+1;
            if(count === selectStudent.length) {
                document.getElementById('checkStudent').checked = true;
            }
        }
    }

    // First year selection
    count=0;
    for (let i=0; i<selectFirstYear.length; i++){
        if(!selectFirstYear[i].checked){
            document.getElementById('checkFirstYear').checked = false;
            break;
        }else{
            count = count+1;
            if(count === selectFirstYear.length) {
                document.getElementById('checkFirstYear').checked = true;
            }
        }
    }

    // Second year selection
    count=0;
    for (let i=0; i<selectSecondYear.length; i++){
        if(!selectSecondYear[i].checked){
            document.getElementById('checkSecondYear ').checked = false;
            break;
        }else{
            count = count+1;
            if(count === selectSecondYear.length) {
                document.getElementById('checkSecondYear ').checked = true;
            }
        }
    }

    // third year selection
    count=0;
    for (let i=0; i<selectThirdYear.length; i++){
        if(!selectThirdYear[i].checked){
            document.getElementById('checkThirdYear').checked = false;
            break;
        }else{
            count = count+1;
            if(count === selectThirdYear.length) {
                document.getElementById('checkThirdYear').checked = true;
            }
        }
    }


    //fourth year selection
    count=0;
    for (let i=0; i<selectFourthYear.length; i++){
        if(!selectFourthYear[i].checked){
            document.getElementById('checkFourthYear').checked = false;
            break;
        }else{
            count = count+1;
            if(count === selectFourthYear.length) {
                document.getElementById('checkFourthYear').checked = true;
            }
        }
    }


}





