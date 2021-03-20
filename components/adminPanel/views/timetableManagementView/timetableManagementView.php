<div class="">
    <div class="heading">Timetable Management</div>
    <div id="groupListPage">
        <div class="group" onclick="getEntries('1CS1')">1CS1</div>
        <div class="group" onclick="getEntries('1CS2')">1CS2</div>
        <!-- <div class="group">Group3</div>
        <div class="group">Group4</div> -->
    </div>
    <div id="timetablePage" style="display:none;">
        <div class="addElement" onclick="addEntry()"><i class="fa fa-plus"  aria-hidden="true"></i> ADD New Entry</div>
        <div class="addElement" onclick="timetableDisplay()">View Timetable</div>
        
        <div id="groupEntrySet">
            
        </div>
        <input class="addElement"  type="button" value="Back" onclick="backFunction()" >
    </div>
    <div class="heading" style="display:none;font-size:20px;" id="headingEditEntry">EDIT Entry</div>
    <div class="heading" style="display:none;font-size:20px;" id="headingDeleteEntry">DELETE Entry</div>
    <div class="heading" style="display:none;font-size:20px;" id="headingAddEntry">ADD Entry</div>
    <form id="timetableEntryForm" style="display:none;" action="" method="post">
        <div class="dataForm"  >
            <div class="inputDiv">
                <label class="labelField" for="hallID">Hall ID</label>
                <input class="inputField" name="hallID" id="hallID" type="text">
            </div>
            <input class="inputField" name="groupNameHidden" id="groupNameHidden" type="hidden">
            <input class="inputField" name="eventHidden" id="eventHidden" type="hidden">
            <div class="inputDiv">
                <label class="labelField" for="subjectCode">Subject Code</label>
                <input class="inputField" name="subjectCode" id="subjectCode" type="text">
            </div>
            <div class="inputDiv">
                <label class="labelField" for="day">Day</label>
                <input class="inputField" name="day" id="day" type="text">
            </div>
            <div class="inputDiv">
                <label class="labelField" for="fromTime">From Time</label>
                <input class="inputField" name="fromTime" id="fromTime" type="time">
            </div>
            <div class="inputDiv">
                <label class="labelField" for="toTime">To Time</label>
                <input class="inputField" name="toTime" id="toTime" type="time">
            </div>
            <div class="inputDiv">
                <label class="labelField" for="description">Description</label>
                <input class="inputField" name="description" id="description" type="text">
            </div>
        </div>
        <div class="buttonDual">
            <input type="button" value="Cancel" onclick="cancelFunctionEntry()" class="buttonSet">
            <input id="submitButtonInputEntry" type="submit" onclick="confirm('Are you confirm this action?')" value="Submit" name="submit" class="buttonSet">
        </div>
    </form>
    <form id="EntryDeleteView" method="post" style="display:none;">
            <div class="inputDiv">
                <label class="labelField" for="deleteHallID">Hall ID</label>
                <div class="inputField"  id="deleteHallID" ></div>
            </div>
            <div class="inputDiv">
                <label class="labelField" for="deleteSubjectCode">Subject Code</label>
                <div class="inputField"  id="deleteSubjectCode" ></div>
            </div>
            <div class="inputDiv">
                <label class="labelField" for="deleteDay">Day</label>
                <div class="inputField"  id="deleteDay" ></div>
            </div>
            <div class="inputDiv">
                <label class="labelField" for="deleteFromTime">From Time</label>
                <div class="inputField" id="deleteFromTime" ></div>
            </div>
            <div class="inputDiv">
                <label class="labelField" for="deleteToTime">To Time</label>
                <div class="inputField" id="deleteToTime" ></div>
            </div>
            <div class="inputDiv">
                <label class="labelField" for="deleteDescription">Description</label>
                <div class="inputField" id="deleteDescription" ></div>
            </div>
        
        <input type="hidden" name="deleteEntryInput" id="deleteEntryInput">
        <input type="hidden" name="deleteEventID" id="deleteEventID">
        <div class="buttonDual">
            <input type="button" value="Cancel" onclick="cancelFunctionEntry()" class="buttonSet">
            <input type="submit" value="Delete" name="deleteEntry" onclick="confirm('Are you confirm this action?')" class="buttonSet"></input>
        </div>
    
    </form>

    <div  id="timetableDisplay" style="display:none;" >
        <h2 class="head">Time Table</h2>
        <!-- the structure of the timetable is create in here  -->
        <table id="timetable">
        <!-- Display the dates of the table -->
            <tr>
                <th></th>
                <th class="day" id="monday" >Monday</th>
                <th class="day" id="tuesday" >Tuesday</th>
                <th class="day" id="wednesday" >Wednesday</th>
                <th class="day" id="thursday" >Thursday</th>
                <th class="day" id="friday" >Friday</th>
                <!-- <th></th> -->
            </tr>
            
            <?php
                for($i=1;$i<18;$i++){

                    if($i==1){$value="08.00-08.30";}
                    elseif($i==2){ $value="08.30-09.00";}
                    elseif($i==3){ $value="09.00-09.30";}
                    elseif($i==4){$value="09.30-10.00";}
                    elseif($i==5){$value="10.00-10.30";}
                    elseif($i==6){$value="10.30-11.00";}
                    elseif($i==7){$value="11.00-11.30";}
                    elseif($i==8){$value="11.30-12.00";}
                    elseif($i==9){$value="12.00-1.00";}
                    elseif($i==10){$value="13.00-13.30";}
                    elseif($i==11){$value="13.30-14.00";}
                    elseif($i==12){$value="14.00-14.30";}
                    elseif($i==13){$value=" 14.30-15.00";}
                    elseif($i==14){$value="15.00-15.30";}
                    elseif($i==15){$value="15.30-16.00";}
                    elseif($i==16){$value="16.00-16.30";}
                    else{$value="16.30-17.00";}

                    
                    
                        echo "
                            <tr class='line".$i."' id='line".$i."'>
                                <th >".$value."</th>
                                <th id='Monday".$i."' ></th>
                                <th id='Tuesday".$i."'></th>
                                <th id='Wednesday".$i."'></th>
                                <th id='Thursday".$i."'></th>
                                <th id='Friday".$i."'></th>
                            </tr>
                        ";
                    
                }
            ?>
        </table>
        <div class="addElement" style="float:left;margin-left:15%;margin-top:10px;" onclick="cancelFunctionEntry();emptyTable();">Back</div>

    </div>


</div>
<script src="../../assets/js/jquery.js"></script>
<script src="../../assets/js/toast.js"></script>
<script src="./assets/timetable.js"></script>
<script src="../../assets/js/changeTheme.js"></script>
<script></script>