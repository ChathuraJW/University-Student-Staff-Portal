// $(document).ready(function(){
//     $("#form #checkAll").click(function(){
//         $("#form input[type='checkbox']").prop('checked',this.checked);
//     });
// });
$('#checkAll').change(function () {
    if ($(this).prop('checked')) {
        $('input').prop('checked', true);
    } else {
        $('input').prop('checked', false);
    }
});
$('#checkAll').trigger('change');

// var checkStudent = $("input[type='checkbox'][value='checkStudent']");
//
//
// checkStudent.on('change', function(){
//     chk2.prop('checked',this.checked);
// });