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
<div class="featureBody bodyBackground text" id="featureBody">
    <div class="heading">Administration Panel</div>
    <div style="display: table;">
        <div class="taskList">
            <div class="task" onclick="subTaskOpen('subsetOne')">User Management</div>
            <div id="subsetOne" style="display:none;" class="subTasksSet">
                <div class="subTask" onclick="createLink('addStudent')">Add Student(Bulk)</div>
                <div class="subTask" onclick="createLink('addStaff')">Add Staff(Individual)</div>
                <div class="subTask" onclick="createLink('editUserProfile')">UserProfile Update</div>
                <div class="subTask" onclick="createLink('studentGroupOperation')">Student Group Operations</div>
            </div>

            <div class="task" onclick="createLink('subjectManagement')">Subject Management(Add/Update/Remove)</div>

            <div class="task" onclick="createLink('facilityManagement')">Facility Management(Lecture Hall/Lab)</div>

            <div class="task" onclick="createLink('userPrivilegeManagement')">User Privilege Management</div>

            <div class="task" onclick="subTaskOpen('subsetFive')">Student Feature Management</div>
            <div id="subsetFive" style="display:none;" class="subTasksSet">
                <div class="subTask" onclick="createLink('hostelStudent')">Hostel Students</div>
                <div class="subTask" onclick="createLink('scholarshipStudent')">Scholarship Getting Students</div>
            </div>

            <div class="task" onclick="createLink('timetableManagement')">Timetable Management</div>
            

            <div class="task" onclick="createLink('basicSystemConfig')">Basic System Configuration</div>

            <div class="task" onclick="subTaskOpen('subsetEight')">Danger Zone</div>
            <div id="subsetEight" style="display:none;" class="subTasksSet">
                <div class="subTask" onclick="createLink('startNewSemester')">Start a New Semester</div>
                <div class="subTask" onclick="createLink('changeAdminUser')">Change Admin User</div>
            </div>

            <div class="task" onclick="subTaskOpen('subsetNine')">Student Enroll For Course</div>
            <div id="subsetNine" style="display:none;" class="subTasksSet">
                <div class="subTask" onclick="createLink('firstAttemptEnrollment')">First Attempt Enrollment</div>
                <div class="subTask" onclick="createLink('repeatAttemptEnrollment')">Repeated Attempt Enrollment</div>
            </div>

            <div class="task" onclick="createLink('backupConfig')">Backup/Restore Management</div>

<!--            TODO Better to be in near feature-->
<!--            <div class="task" onclick="subTaskOpen('subsetEleven')">Feature Management</div>-->
<!--            <div id="subsetEleven" style="display:none;" class="subTasksSet">-->
<!--                <div class="subTask" onclick="createLink('addNewFeature')">Add New Feature</div>-->
<!--                <div class="subTask" onclick="createLink('disableEnableFeature')">Disable/Enable Feature</div>-->
<!--            </div>-->
        </div>
        <div class="taskPage" class="taskPage">
            <!--            selected view load hear-->
			<?php
				//call necessary module function to work
				if ($controllerData) {
					call_user_func($controllerData);
				}
			?>
        </div>
    </div>
</div>

<!-- include footer section -->
<?php BasicLoader::loadFooter('../../') ?>

<script src="../../assets/js/jquery.js"></script>
<script src="../../assets/js/toast.js"></script>
<script src="../../assets/js/changeTheme.js"></script>
<!--in page scripts-->
<script>
    // sub task expansion
    function subTaskOpen(element) {
        if (document.getElementById(element).style.display == "none") {
            document.getElementById(element).style.display = "";
        } else {
            document.getElementById(element).style.display = "none";
        }
    }

    // cookie creation and reload page for open feature
    function createLink(featureName) {
        // create cookie
        document.cookie = "adminSelectedFeature=" +featureName+";SameSite=Lax";
        // refresh page and navigate to featureBody div
        window.location.hash = '#featureBody';
        window.location.reload(true);
    }
</script>
</body>
</html>
