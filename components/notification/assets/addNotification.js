$(document).ready(function(){
    $("#form #checkAll").click(function(){
        $("#form input[type='checkbox']").prop('checked',this.checked);
    });
});