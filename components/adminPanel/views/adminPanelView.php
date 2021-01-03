<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="../../assets/css/gridSystem.css">
    <link rel="stylesheet" href="assets/adminPanelStyles.css">
    <link rel="stylesheet" href="assets/userManagement.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>

<!-- include header section -->
<?php require('../../assets/php/basicLoader.php') ?>
<?php BasicLoader::loadHeader('../../') ?>

<!-- feature body section -->
<div class="featureBody bodyBackground text">
    <div class="heading">ADMIN Panel</div>
    <div class="mainPage">
        <div class="taskList">
            <div class="task one" onclick="subtaskOpen('subsetOne')">User Management</div>
            <div id="subsetOne" style="display:none;" class="subTasksSet">
                <div class="subTask" onclick="createLink('addStudent')">Add Student(Bulk)</div>
                <div class="subTask" onclick="createLink('addStaff')">Add Staff(Individual)</div>
                <div class="subTask" onclick="createLink('editUserProfile')">UserProfile Update</div>
                <div class="subTask" onclick="createLink('studentGroupOperation')">Student Group Operations</div>
            </div>
            <div class="task two" onclick="createLink('subjectManagement')">Subject Management(Add/Update/Remove)</div>
            <div class="task three" onclick="createLink('facilityManagement')">Facility Management(Lecture Hall/Lab)</div>
            <div class="task four" onclick="subtaskOpen('subsetFour')">User Privilege Management</div>
            <div id="subsetFour" style="display:none;" class="subTasksSet">
                <div class="subTask">Add User Privilege</div>
                <div class="subTask">Update Privilege</div>
                <div class="subTask">Delete Privilege</div>

            </div>
            <div class="task five" onclick="subtaskOpen('subsetFive')">Student Feature Management</div>
            <div id="subsetFive" style="display:none;" class="subTasksSet">
                <div class="subTask" onclick="subtaskOpen('superSubsetThree')">Add/Remove Hostel Student</div>
                <div class="superSubTaskSet" id="superSubsetThree" style="display:none;">
                    <div class="superSubTask">As Individual</div>
                    <div class="superSubTask">As a Bulk</div>
                </div>
                <div class="subTask" onclick="subtaskOpen('superSubsetFour')">Add/Remove Scholarship Getting Students</div>
                <div class="superSubTaskSet" id="superSubsetFour" style="display:none;">
                    <div class="superSubTask">Add As Individual</div>
                    <div class="superSubTask">Add As a Bulk</div>
                    <div class="superSubTask">Delete as Individual</div>
                </div>
            </div>
            <div class="task six" onclick="subtaskOpen('subsetSix')">Timetable Management</div>
            <div id="subsetSix" style="display:none;" class="subTasksSet">
                <div class="subTask">Add/Edit/Delete Event</div>
                <div class="subTask">View Timetable</div>
                <div class="subTask">Exam Timetable Management</div>

            </div>
            <div class="task seven" onclick="subtaskOpen('subsetSeven')">Basic System Configuration</div>
            <div id="subsetSeven" style="display:none;" class="subTasksSet">
                <div class="subTask">Appointment Validity Period</div>
                <div class="subTask">Hall booking Request Validity Period</div>
                <div class="subTask">Default System Theme</div>
                <div class="subTask">Server the Zone</div>
                <div class="subTask">Update Class and GPA Details</div>
                <div class="subTask">Update Union Email</div>

            </div>
            <div class="task " onclick="subtaskOpen('subsetEight')">Danger Zoon</div>
            <div id="subsetEight" style="display:none;" class="subTasksSet">
                <div class="subTask">Start a New Semester</div>
                <div class="subTask">Change ADMIN User</div>

            </div>
            <div class="task six" onclick="subtaskOpen('subsetNine')">Student Enroll For Course</div>
            <div id="subsetNine" style="display:none;" class="subTasksSet">
                <div class="subTask" onclick="subtaskOpen('superSubsetFive')">Enroll Student for course</div>
                <div class="superSubTaskSet" id="superSubsetFive" style="display:none;">
                    <div class="superSubTask">As Individual</div>
                    <div class="superSubTask">As a Bulk</div>
                </div>
                <div class="subTask" onclick="subtaskOpen('superSubsetSix')">Delete Enrollment</div>
                <div class="superSubTaskSet" id="superSubsetSix" style="display:none;">
                    <div class="superSubTask">As Individual</div>
                    <div class="superSubTask">As a Bulk</div>
                </div>

            </div>
            <div class="task " onclick="subtaskOpen('subsetTen')">Backup/Restore Management</div>
            <div id="subsetTen" style="display:none;" class="subTasksSet">
                <div class="subTask">Automatic Backup Configuration</div>
                <div class="subTask">Create new Backup</div>
                <div class="subTask">Restore Backup</div>

            </div>
            <div class="task " onclick="subtaskOpen('subsetEleven')">Feature Management</div>
            <div id="subsetEleven" style="display:none;" class="subTasksSet">
                <div class="subTask">Add New Feature</div>
                <div class="subTask">Disable/Enable Feature</div>

            </div>


        </div>
        <div class="taskPage" class="taskPage">
            <?php
                UserManagementController::updateProfile();
            ?>
        </div>
    </div>
</div>
<script>

    function subtaskOpen(element) {
        if (document.getElementById(element).style.display == "none") {
            document.getElementById(element).style.display = "";
        } else {
            document.getElementById(element).style.display = "none";

        }
        // document.getElementById("messageSecond").style.display="none";
        // window.location.href=document.location.href.toString().split('requestAppointment')[0]+'requestAppointment';

    }

    function openTab(tabs) {
        document.getElementById("tabFirst").style.display = "none";
        document.getElementById("tabSecond").style.display = "none";

        document.getElementById(tabs).style.display = "";
    }

    function hover(link) {
        document.getElementById("linkFirst").style.backgroundColor = "rgb(148, 195, 238)";
        document.getElementById("linkSecond").style.backgroundColor = "rgb(148, 195, 238)";
        document.getElementById(link).style.backgroundColor = "rgb(58, 189, 212)";
    }

    function createLink(featureName){
        window.location="?" + featureName;
    }
</script>


<!-- include footer section -->
<?php BasicLoader::loadFooter('../../') ?>

<script src="../../assets/js/jquery.js"></script>
<script src="../../assets/js/toast.js"></script>
</body>
</html>