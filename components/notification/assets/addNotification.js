
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

checkStudent.on('change',function(){
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

checkFirstYear.on('change', function(){
    check1CSGroup1.prop('checked',this.checked);
    check1CSGroup2.prop('checked',this.checked);
    check1IS.prop('checked',this.checked);

});
checkSecondYear.on('change', function(){
    check2CSGroup1.prop('checked',this.checked);
    check2CSGroup2.prop('checked',this.checked);
    check2IS.prop('checked',this.checked);

});
checkThirdYear.on('change', function(){
    check3CS.prop('checked',this.checked);
    check3IS.prop('checked',this.checked);

});
checkFourthYear.on('change', function(){
    check4CS.prop('checked',this.checked);
    check4IS.prop('checked',this.checked);
    check4SE.prop('checked',this.checked);

});



