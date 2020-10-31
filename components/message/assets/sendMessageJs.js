$('#academicStaffList').on('change',function(){
     
    var fieldName = $(this).val();
    var text = $('contacts').val();
    $('#contacts').val(text.concat(fieldName));
});
