<div class="bodyBackground text">
    <div class="heading">Facility Management(Lecture Hall/Lab)</div>
    <div id="hallPage" >
        <div class="addElement" onclick="addHall()"><i class="fa fa-plus"  aria-hidden="true"></i> ADD New Hall</div>
        <?php
            $records=$controllerData;
            foreach($records as $record){
                echo "
                <div class='elementTab'>
                    <div class='elementName'>".$record->getHallID()."</div>
                    <div class='elementEdit' onclick='editFunctionHall(`".$record->getHallID()."`)'>EDIT</div>
                    <div class='elementDelete' onclick='deleteFunctionHall(`".$record->getHallID()."`)'>DELETE</div>
                </div>

                ";
            }
            
        ?>
    </div>
    <div class="heading" style="display:none;font-size:20px;" id="headingEditHall">EDIT Hall</div>
    <div class="heading" style="display:none;font-size:20px;" id="headingDeleteHall">DELETE Hall</div>
    <div class="heading" style="display:none;font-size:20px;" id="headingAddHall">ADD Hall</div>
    <form class="deleteForm"id="hallDetailForm" style="display:none;" action="" method="post">
        <div class="dataForm"  >
            <div class="inputDiv">
                <label class="labelField" for="hallID">Hall ID</label>
                <input class="inputField" name="hallID" id="hallID" type="text">
            </div>
            <input class="inputField" name="hallIDHidden" id="hallIDHidden" type="hidden">
            <div class="inputDiv">
                <label class="labelField" for="capacity">Capacity</label>
                <input class="inputField" name="capacity" id="capacity" type="text">
            </div>
            <div class="inputDiv">
                <label class="labelField" for="hallType">Hall Type</label>
                <input class="inputField" name="hallType" id="hallType" type="text">
            </div>
            
        </div>
        <div class="buttonDual">
            <input type="button" value="Cancel" onclick="cancelFunctionHall()" class="buttonSet text">
            <input id="submitButtonInputHall" type="submit" value="Submit" name="submit" class="buttonSet text">
        </div>
    </form>
    <form id="hallDeleteView" method="post" style="display:none;">
        <div class="deleteDiv">
            <label class="labelDelete" for="deleteHallID">Hall ID</label>
            <div class="valueDelete" id="deleteHallID">kk</div>
        </div>
        <div class="deleteDiv">
            <label class="labelDelete" for="deleteCapacity">Capacity</label>
            <div class="valueDelete" id="deleteCapacity">kk</div>
        </div>
        <div class="deleteDiv">
            <label class="labelDelete" for="deleteHallType">Hall Type</label>
            <div class="valueDelete" id="deleteHallType">kk</div>
        </div>
        
        <input type="hidden" name="deleteHallIDInput" id="deleteHallIDInput">
        <div class="buttonDual">
            <input type="button" value="Cancel" onclick="cancelFunctionHall()" class="buttonSet text">
            <input type="submit" value="Delete" name="deleteHall" class="buttonSet text"></input>
        </div>
    
    </form>
</div>
<script src="../../assets/js/jquery.js"></script>
<script src="../../assets/js/toast.js"></script>
<script src="../../assets/js/changeTheme.js"></script>
<script>
function editFunctionHall(code){
    document.getElementById("hallPage").style.display="none";
    document.getElementById("headingEditHall").style.display="";
    document.getElementById("hallDetailForm").style.display="";
    document.getElementById("submitButtonInputHall").name="editHall";
    
    var url="http://localhost/USSP/components/adminPanel/assets/facilityManagementAPI.php?code="+code+"";
    console.log(url);
    $.getJSON(url,function(dataList){
        console.log(dataList);
        document.getElementById("hallID").value=dataList[0]['hallID'];
        document.getElementById("hallIDHidden").value=dataList[0]['hallID'];
        document.getElementById("capacity").value=dataList[0]['capacity'];
        document.getElementById("hallType").value=dataList[0]['hallType'];
    });
    document.getElementById("hallID").disabled= true;

}
function addHall(){
    document.getElementById("hallID").disabled= false;
    document.getElementById("hallDetailForm").style.display="";
    document.getElementById("headingAddHall").style.display="";
    document.getElementById("hallPage").style.display="none";
    document.getElementById("submitButtonInputHall").name="addHall";

}
function cancelFunctionHall(){
    document.getElementById("headingEditHall").style.display="none";
    document.getElementById("headingDeleteHall").style.display="none";
    document.getElementById("hallDeleteView").style.display="none";
    document.getElementById("hallDetailForm").style.display="none";
    document.getElementById("headingAddHall").style.display="none";
    document.getElementById("hallPage").style.display="";
    document.getElementById("hallDetailForm").reset();
}
function deleteFunctionHall(code){
    document.getElementById("hallPage").style.display="none";
    document.getElementById("headingDeleteHall").style.display="";
    document.getElementById("hallDeleteView").style.display="";


    var url="http://localhost/USSP/components/adminPanel/assets/facilityManagementAPI.php?code="+code+"";
    console.log(url);
    $.getJSON(url,function(dataList){
        console.log(dataList);
        document.getElementById("deleteHallID").innerHTML=dataList[0]['hallID'];
        document.getElementById("deleteCapacity").innerHTML=dataList[0]['capacity'];
        document.getElementById("deleteHallType").innerHTML=dataList[0]['hallType'];
        document.getElementById("deleteHallIDInput").value=dataList[0]['hallID'];

    });

}

</script>