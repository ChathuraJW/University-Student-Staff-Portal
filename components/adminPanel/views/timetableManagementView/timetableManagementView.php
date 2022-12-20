<style>

    #timetableDisplay {
        text-align: center;
        padding: 10px;
        width: fit-content;
    }

    timetableDisplay > tr > th {
        width: 30px;
    }
</style>
<div class="timetableOperation">
    <span class="sectionTitle">Timetable Operations</span>
    <div id="groupListPage">
        <div class="group" onclick="getEntries('1CS1')">1st Year Computer Science group 1</div>
        <div class="group" onclick="getEntries('1CS2')">1st Year Computer Science Group 2</div>
        <div class="group" onclick="getEntries('1IS')">1st Year Information Systems</div>
        <div class="group" onclick="getEntries('2CS1')">2nd Year Computer Science group 1</div>
        <div class="group" onclick="getEntries('2CS2')">2nd Year Computer Science Group 2</div>
        <div class="group" onclick="getEntries('2IS')">2nd Year Information Systems</div>
        <div class="group" onclick="getEntries('3CSG')">3rd Year CS General</div>
        <div class="group" onclick="getEntries('3CSS')">3rd Year Software Engineering Special</div>
        <div class="group" onclick="getEntries('3CSS')">3rd Year Computer Science Special</div>
        <div class="group" onclick="getEntries('3ISG')">3rd Year Information Systems General</div>
        <div class="group" onclick="getEntries('3IS')">3rd Year Information Systems Special</div>
        <div class="group" onclick="getEntries('4CSS')">4th Year Software Engineering Special</div>
        <div class="group" onclick="getEntries('4CSS')">4th Year Computer Science Special</div>
        <div class="group" onclick="getEntries('4IS')">4th Year Information Systems Special</div>
        <!-- <div class="group">Group3</div>
        <div class="group">Group4</div> -->
    </div>
    <div id="timetablePage" style="display:none;">
        <i class="fa fa-arrow-circle-left fa-2x" onclick="backFunction()"></i>

        <div class="buttonGroup" style="margin-bottom: 30px;margin-top: 20px">
            <div class="button" onclick="addEntry()">Add New Entry</div>
            <div class="button" onclick="timetableDisplay()">View Timetable</div>
        </div>

        <div id="groupEntrySet">

        </div>
    </div>
    <div class="heading" style="display:none;font-size:20px;" id="headingEditEntry">Edit Entry</div>
    <div class="heading" style="display:none;font-size:20px;" id="headingDeleteEntry">Delete Entry</div>
    <div class="heading" style="display:none;font-size:20px;" id="headingAddEntry">Add Entry</div>
    <form id="timetableEntryForm" style="display:none;" action="" method="post">
        <div class="dataForm">
            <div class="inputDiv">
                <label class="labelField" for="hallID">Hall ID</label>
                <select style="width:53%;" class="inputField" name="hallID" id="hallID" type="text">
					<?php
						$records = $controllerData;
						foreach ($records as $record) {
							echo("
                            <option value='" . $record['hallID'] . "'>" . $record['hallID'] . "</option>
                        ");
						}
					?>
                </select>
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
                <!-- <input class="inputField" name="description" id="description" type="text"> -->
                <textarea class="inputField" id="description" name="description" id="" cols="30" rows="10"></textarea>

            </div>
        </div>
        <div class="buttonDual">
            <input type="button" value="Cancel" onclick="cancelFunctionEntry()" class="button text">
            <input id="submitButtonInputEntry" type="submit" onclick="confirm('Are you confirm this action?')" value="Submit" name="submit"
                   class="button text">
        </div>
    </form>
    <form id="EntryDeleteView" method="post" style="display:none;">
        <div class="deleteDiv">
            <label class="labelDelete" for="deleteHallID">Hall ID</label>
            <div class="valueDelete" id="deleteHallID"></div>
        </div>
        <div class="deleteDiv">
            <label class="labelDelete" for="deleteSubjectCode">Subject Code</label>
            <div class="valueDelete" id="deleteSubjectCode"></div>
        </div>
        <div class="deleteDiv">
            <label class="labelDelete" for="deleteDay">Day</label>
            <div class="valueDelete" id="deleteDay"></div>
        </div>
        <div class="deleteDiv">
            <label class="labelDelete" for="deleteFromTime">From Time</label>
            <div class="valueDelete" id="deleteFromTime"></div>
        </div>
        <div class="deleteDiv">
            <label class="labelDelete" for="deleteToTime">To Time</label>
            <div class="valueDelete" id="deleteToTime"></div>
        </div>
        <div class="deleteDiv">
            <label class="labelDelete" for="deleteDescription">Description</label>
            <div class="valueDelete" id="deleteDescription"></div>
        </div>

        <input type="hidden" name="deleteEntryInput" id="deleteEntryInput">
        <input type="hidden" name="deleteEventID" id="deleteEventID">
        <div class="buttonDual">
            <input type="button" value="Cancel" onclick="cancelFunctionEntry()" class="button text">
            <input type="submit" value="Delete" name="deleteEntry" onclick="confirm('Are you confirm this action?')" class="button text"></input>
        </div>

    </form>

    <div id="timetableDisplay" style="display:none;">
        <i class="fa fa-arrow-circle-left fa-2x" style="float: left;margin-left:30px;" onclick="cancelFunctionEntry();emptyTable();"></i>
        <h2 class="head">Timetable</h2>
        <!-- the structure of the timetable is create in here  -->
        <table id="timetable">
            <!-- Display the dates of the table -->
            <tr>
                <th></th>
                <th class="day" id="monday">Monday</th>
                <th class="day" id="tuesday">Tuesday</th>
                <th class="day" id="wednesday">Wednesday</th>
                <th class="day" id="thursday">Thursday</th>
                <th class="day" id="friday">Friday</th>
                <!-- <th></th> -->
            </tr>

			<?php
				for ($i = 1; $i < 18; $i++) {

					if ($i == 1) {
						$value = "08.00-08.30";
					} elseif ($i == 2) {
						$value = "08.30-09.00";
					} elseif ($i == 3) {
						$value = "09.00-09.30";
					} elseif ($i == 4) {
						$value = "09.30-10.00";
					} elseif ($i == 5) {
						$value = "10.00-10.30";
					} elseif ($i == 6) {
						$value = "10.30-11.00";
					} elseif ($i == 7) {
						$value = "11.00-11.30";
					} elseif ($i == 8) {
						$value = "11.30-12.00";
					} elseif ($i == 9) {
						$value = "12.00-1.00";
					} elseif ($i == 10) {
						$value = "13.00-13.30";
					} elseif ($i == 11) {
						$value = "13.30-14.00";
					} elseif ($i == 12) {
						$value = "14.00-14.30";
					} elseif ($i == 13) {
						$value = " 14.30-15.00";
					} elseif ($i == 14) {
						$value = "15.00-15.30";
					} elseif ($i == 15) {
						$value = "15.30-16.00";
					} elseif ($i == 16) {
						$value = "16.00-16.30";
					} else {
						$value = "16.30-17.00";
					}


					echo "
                            <tr class='line" . $i . "' id='line" . $i . "'>
                                <th >" . $value . "</th>
                                <th id='Monday" . $i . "' ></th>
                                <th id='Tuesday" . $i . "'></th>
                                <th id='Wednesday" . $i . "'></th>
                                <th id='Thursday" . $i . "'></th>
                                <th id='Friday" . $i . "'></th>
                            </tr>
                        ";

				}
			?>
        </table>
    </div>


</div>
<script src="../../assets/js/jquery.js"></script>
<script src="../../assets/js/toast.js"></script>
<script src="./assets/timetable.js"></script>
<script src="../../assets/js/changeTheme.js"></script>
<script></script>