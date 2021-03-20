function remove(){
    document.getElementById("messageSecond").style.display="none";
    // window.location.href=document.location.href.toString().split('requestAppointment')[0]+'requestAppointment';
    
}
function openTab(tabs){
    document.getElementById("tabFirst").style.display="none";
    document.getElementById("tabSecond").style.display="none";
    
    document.getElementById(tabs).style.display="";
}

function hover(link){
    document.getElementById("linkFirst").style.backgroundColor  = "rgb(148, 195, 238)";
    document.getElementById("linkSecond").style.backgroundColor  = "rgb(148, 195, 238)";
    document.getElementById(link).style.backgroundColor  = "rgb(58, 189, 212)";
}
function allocatedTime(){
    
    
    document.getElementById("allocatedSlots").innerHTML="";

    var username=document.getElementById("lecture2").value;
    var date=document.getElementById("dateValue").value;
    // document.getElementById("lectureName").innerHTML=document.getElementById("lecture2").fullName;
    // document.getElementById("requestDate").innerHTML=document.getElementById("dateValue").value;
    
    var url="http://localhost/USSP/components/meeting/assets/allocatedTimeAPI.php?username="+username+"&date="+date+"";
    console.log(url);
    $.getJSON(url,function(dataList){
            console.log(dataList);

            element ='<div style="font-weight: bold;"id="allocationTitle">Allocated Times of '+dataList[1][0]['salutation']+' '+dataList[1][0]['fullName']+' in '+dataList[2]+'<br><br></div>';
            $('#allocatedSlots').append(element);
            for (var i=0;i<dataList.length;i++){
            var element='';

            element +='<div class="elementTab">';
            element +='<div class="elementName">'+dataList[0][i]['day']+'  From-'+dataList[0][i]['fromTime']+'   To-'+dataList[0][i]['toTime']+'</div>';
            element +='</div>';
            $('#allocatedSlots').append(element);
            }

            
    });
    // document.getElementById("hallID").disabled= true;
    console.clear();


}