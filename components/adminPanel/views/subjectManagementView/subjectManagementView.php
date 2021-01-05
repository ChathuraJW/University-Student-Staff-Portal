<div class="">
    <div class="heading">Subject Management</div>
    <div id="coursePage" >
        <div class="addElement" onclick="addCourse()"><i class="fa fa-plus"  aria-hidden="true"></i> ADD New Course</div>
        <?php
            $records=$controllerData;
            foreach($records as $record){
                echo "
                <div class='elementTab'>
                    <div class='elementName'>".$record->getCourseCode()."   ".$record->getName()."</div>
                    <div class='elementEdit' onclick='editFunction(`".$record->getCourseCode()."`)'>EDIT</div>
                    <div class='elementDelete' onclick='deleteFunction(`".$record->getCourseCode()."`)'>DELETE</div>
                </div>

                ";
            }
            
        ?>
    </div>
    <div class="heading" style="display:none;font-size:20px;" id="headingEdit">EDIT Course</div>
    <div class="heading" style="display:none;font-size:20px;" id="headingDelete">DELETE Course</div>
    <div class="heading" style="display:none;font-size:20px;" id="headingAdd">ADD Course</div>
    <form id="courseDetailForm" style="display:none;" action="" method="post">
        <div class="dataForm"  >
            <div class="inputDiv">
                <label class="labelField" for="courseCode">Course Code</label>
                <input class="inputField" name="courseCode" id="courseCode" type="text">
            </div>
            <input class="inputField" name="courseCodeHidden" id="courseCodeHidden" type="hidden">
            <div class="inputDiv">
                <label class="labelField" for="courseName">Course Name</label>
                <input class="inputField" name="courseName" id="courseName" type="text">
            </div>
            <div class="inputDiv">
                <label class="labelField" for="semester">Semester</label>
                <input class="inputField" name="semester" id="semester" type="text">
            </div>
            <div class="inputDiv">
                <label class="labelField" for="creditValue">Credit Value</label>
                <input class="inputField" name="creditValue" id="creditValue" type="text">
            </div>
            <div class="inputDiv">
                <label class="labelField" style="vertical-align:top;" for="description">Description</label>
                <textarea class="inputField" id="description" name="description" id="" cols="30" rows="10"></textarea>
            </div>

            
        </div>
        <div class="buttonDual">
            <input type="button" value="Cancel" onclick="cancelFunction()" class="buttonSet">
            <input id="submitButtonInput" type="submit" value="Submit" name="submit" class="buttonSet">
        </div>
    </form>
    <form id="courseDeleteView" method="post" style="display:none;">
        <div class="inputDiv">
            <label class="labelField" for="deleteCourseCode">Course Code</label>
            <div class="inputField" id="deleteCourseCode">kk</div>
        </div>
        <div class="inputDiv">
            <label class="labelField" for="deleteCourseName">Course Name</label>
            <div class="inputField" id="deleteCourseName">kk</div>
        </div>
        <div class="inputDiv">
            <label class="labelField" for="deleteSemester">Semester</label>
            <div class="inputField" id="deleteSemester">kk</div>
        </div>
        <div class="inputDiv">
            <label class="labelField" for="deleteCreditValue">Credit Value</label>
            <div class="inputField" id="deleteCreditValue">kk</div>
        </div>
        <div class="inputDiv">
            <label class="labelField" for="deleteDescription">Description</label>
            <div class="inputField" id="deleteDescription">kk</div>
        </div>
        <input type="hidden" name="deleteCourseCodeInput" id="deleteCourseCodeInput">
        <div class="buttonDual">
            <input type="button" value="Cancel" onclick="cancelFunction()" class="buttonSet">
            <input type="submit" value="Delete" name="delete" class="buttonSet"></input>
        </div>
    
    </form>
</div>
<script src="../../assets/js/jquery.js"></script>
<script src="../../assets/js/toast.js"></script>
<script>
function editFunction(code){
    document.getElementById("coursePage").style.display="none";
    document.getElementById("headingEdit").style.display="";
    document.getElementById("courseDetailForm").style.display="";
    document.getElementById("submitButtonInput").name="edit";
    
    var url="http://localhost/USSP/components/adminPanel/assets/studentManagementAPI.php?code="+code+"";
    console.log(url);
    $.getJSON(url,function(dataList){
        console.log(dataList);
        document.getElementById("courseCode").value=dataList[0]['courseCode'];
        document.getElementById("courseCodeHidden").value=dataList[0]['courseCode'];
        document.getElementById("courseName").value=dataList[0]['name'];
        document.getElementById("semester").value=dataList[0]['semester'];
        document.getElementById("creditValue").value=dataList[0]['creditValue'];
        document.getElementById("description").value=dataList[0]['description'];
    });
    document.getElementById("courseCode").disabled= true;

}
function addCourse(){
    document.getElementById("courseCode").disabled= false;
    document.getElementById("courseDetailForm").style.display="";
    document.getElementById("headingAdd").style.display="";
    document.getElementById("coursePage").style.display="none";
    document.getElementById("submitButtonInput").name="add";

}
function cancelFunction(){
    document.getElementById("headingEdit").style.display="none";
    document.getElementById("headingDelete").style.display="none";
    document.getElementById("courseDeleteView").style.display="none";
    document.getElementById("courseDetailForm").style.display="none";
    document.getElementById("headingAdd").style.display="none";
    document.getElementById("coursePage").style.display="";
    document.getElementById("courseDetailForm").reset();
}
function deleteFunction(code){
    document.getElementById("coursePage").style.display="none";
    document.getElementById("headingDelete").style.display="";
    document.getElementById("courseDeleteView").style.display="";


    var url="http://localhost/USSP/components/adminPanel/assets/studentManagementAPI.php?code="+code+"";
    console.log(url);
    $.getJSON(url,function(dataList){
        console.log(dataList);
        document.getElementById("deleteCourseCode").innerHTML=dataList[0]['courseCode'];
        document.getElementById("deleteCourseName").innerHTML=dataList[0]['name'];
        document.getElementById("deleteSemester").innerHTML=dataList[0]['semester'];
        document.getElementById("deleteCreditValue").innerHTML=dataList[0]['creditValue'];
        document.getElementById("deleteDescription").innerHTML=dataList[0]['description'];
        document.getElementById("deleteCourseCodeInput").value=dataList[0]['courseCode'];
    });

}

</script>