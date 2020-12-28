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
function deallocateForm(){
    document.getElementById("allocationForm").reset();
    document.getElementById("allocateForm").style.display="none";
    document.getElementById("secondaryMain").style.display="none";
    document.getElementById("main").style.display="";
    
}
function displaySearch(){
    document.getElementById("searchStaff").style.display="";
    var fromDate=document.getElementById("startDate").value;
    // var toDate=document.getElementById("endDate").value;
    var fromTime=document.getElementById("startTime").value;
    var toTime=document.getElementById("endTime").value;

     // var date1=document.getElementById("startDate").value;
    // var date2=document.getElementById("endDate").value;
    // var time1=document.getElementById("startTime").value;
    // var time2=document.getElementById("endTime").value;
    
    // if(date1==""||date2==""||time1==""||time2==""){
    //     // document.getElementById("search").reset();
    //     window.alert("Please select Date and Time!");
    // }

    var url="http://localhost/USSP/components/workload/assets/workLoadMembersAPI.php?fromDate="+fromDate+"&fromTime="+fromTime+"&toTime="+toTime+"";
    console.log(url);
    
    $.getJSON(url,function(dataList){
        
        // document.getElementById("preMessage").style.display="none";
        // document.getElementById("searchStaff").style.display="";
        // document.getElementById("search").reset();

        var selectBox=document.getElementById("searchMembersOptions");
        document.getElementById("searchMembersOptions").multiple=true;

        var len=dataList.length;
        for(i=0;i<len;i++){
            var name= dataList[i]['salutation']+"."+dataList[i]['firstName']+" "+dataList[i]['lastName'];
            var userName=dataList[i]['userName'];
            let newOption=new Option(name,userName);
            newOption.style.width="98%";
            selectBox.add(newOption,undefined);
        }
        
                
        // for(i=0;i<)
        // for(var i in dataList) {
            // let week = "week "+dataList[i]['week'];
            // let salutation = dataList[0][i]['salutation'];
            // let fullName = dataList[0][i]['fullName'];
            // let description = attendance[i]['description'];
            // let color = (attendance[i]['attendance']==1 ? 'green':'red');
            // console.log(week);
            // document.write(salutation,fullName);

            // document.getElementsByClassName("supportMemberSalutation").innerHTML = salutation;
            // document.getElementsByClassName("supportMember").innerHTML = fullName;
            // document.getElementById("attendanceType"+i).innerHTML = description;
            // document.getElementById(i).style.backgroundColor = color;
        // }

        //
    
    });
   
        
        
    // }else{
    //     document.getElementById("preMessage").style.display="none";
    //     document.getElementById("searchStaff").style.display="";
    //     document.getElementById("search").reset();
    // }

}
function openMessage(){
    // document.getElementById("firstMessage").style.display="none";
    document.getElementById("workloadRequest").style.display="";
}
function allocation(){
    document.getElementById("searchStaff").style.display="none";
    document.getElementById("main").style.display="none";
    document.getElementById("secondaryMain").style.display="";
}
function messageClose(){
    document.getElementById("messageView").style.display="";
    document.getElementById("workloadRequest").style.display="none";
}
function allocationApprove(){
    
        document.getElementById("allocateForm").style.display="none";
        document.getElementById("searchStaff").style.display="none";
    document.getElementById("finalMsg").style.display="";
    setTimeout(function(){
        document.getElementById("finalMsg").style.display="none";
    document.getElementById("secondaryMain").style.display="none";
    document.getElementById("allocateForm").style.display="none";
        document.getElementById("searchStaff").style.display="none";
        document.getElementById("workloadRequest").style.display="none";
        document.getElementById("messageView").style.display="";
    document.getElementById("main").style.display="";

    }, 3000);
}