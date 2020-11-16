function allocationCancel(){
    document.getElementById("allocateForm").style.display='none';
}
function allocationForm(){
        var checkBox=document.getElementsByClassName("memberInput");
        var i;
        var check=0;
        for(i=0;i<checkBox.length;i++){
            if(checkBox[i].checked == true) {
                check++;
            }
        }
        
        if(check>0) {
                document.getElementById("allocateForm").style.display='';
            }else{
                window.alert("Please select members!");
            }
    
    

}
function deallocationForm(){
    document.getElementById("allocationForm").reset();
    document.getElementById("allocateForm").style.display="none";
    document.getElementById("Bmain").style.display="none";
    document.getElementById("main").style.display="";
    
}
function displaySearch(){
    var date1=document.getElementById("startDate").value;
    var date2=document.getElementById("endDate").value;
    var time1=document.getElementById("startTime").value;
    var time2=document.getElementById("endTime").value;
    
    if(date1==""||date2==""||time1==""||time2==""){
        // document.getElementById("search").reset();
        window.alert("Please select Date and Time!");
        
        
    }else{
        document.getElementById("preMessage").style.display="none";
        document.getElementById("searchStaff").style.display="";
        // document.getElementById("search").reset();
    }

}
function openMessage(){
    document.getElementById("messageView").style.display="none";
    document.getElementById("workloadRequest").style.display="";
}
function allocation(){
    document.getElementById("searchStaff").style.display="none";
    document.getElementById("main").style.display="none";
    document.getElementById("Bmain").style.display="";
}
function messageClose(){
    document.getElementById("messageView").style.display="";
    document.getElementById("workloadRequest").style.display="none";
}
function allocationAprove(){
    
        document.getElementById("allocateForm").style.display="none";
        document.getElementById("searchStaff").style.display="none";
    document.getElementById("finalMsg").style.display="";
    setTimeout(function(){
        document.getElementById("finalMsg").style.display="none";
    document.getElementById("Bmain").style.display="none";
    document.getElementById("allocateForm").style.display="none";
        document.getElementById("searchStaff").style.display="none";
        document.getElementById("workloadRequest").style.display="none";
        document.getElementById("messageView").style.display="";
    document.getElementById("main").style.display="";

    }, 3000);
}