
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="assets/adminPanelStyles.css">
    <link rel="stylesheet" href="../../assets/css/gridSystem.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
    
    <!-- include header section -->
    <?php require('../../assets/php/basicLoader.php')?>
    <?php BasicLoader::loadHeader('../../') ?>
    
    <!-- feature body section -->
    <div class="featureBody">
        <div class="mainBar">
            <div class="topic">ADMIN Panel</div>
        </div>
        <div class="mainPage">
            <div class="taskList">
                <div class="task one" onclick="subtaskOpen('subsetOne')">User Management</div>
                    <div id="subsetOne" style="display:none;"class="subTasksSet">
                        <div class="subTask">Add Student as a Bulk</div>
                        <div class="subTask">Add Staff(Individual)</div>
                        <div class="subTask"  onclick="subtaskOpen('superSubsetOne')" >UserProfile Update</div>
                            <div class="superSubTaskSet"id="superSubsetOne" style="display:none;">
                                <div class="superSubTask">Academic Staff</div>
                                <div class="superSubTask">Student</div>
                                <div class="superSubTask">Administrative Staff</div>
                            </div>
                        <div class="subTask"   onclick="subtaskOpen('superSubsetTwo')" >Delete profile</div>
                            <div class="superSubTaskSet"id="superSubsetTwo" style="display:none;">
                                <div class="superSubTask">Delete as Bulk(Students)</div>
                            </div>
                        <div class="subTask">Batch miss Management</div>
                        
                    </div>
                <div class="task two" >Subject Management</div>
                <!-- onclick="subtaskOpen('subsetTwo')" -->
                    <!-- <div id="subsetTwo" style="display:none;"class="subTasksSet">
                        <div class="subTask">Add a New Subject</div>
                        <div class="subTask">Update Subject Details</div>
                        <div class="subTask">Delete Subject</div>
                        
                    </div> -->
                <div class="task three" >Facility Management(Lecture Hall/Lab)</div>
                <!-- onclick="subtaskOpen('subsetThree')" -->
                    <!-- <div id="subsetThree" style="display:none;"class="subTasksSet">
                        <div class="subTask">Add a New Hall</div>
                        <div class="subTask">Update Hall Details</div>
                        <div class="subTask">Delete Hall Details</div>
                        
                    </div> -->
                <div class="task four" onclick="subtaskOpen('subsetFour')">User Privilege Management</div>
                    <div id="subsetFour" style="display:none;"class="subTasksSet">
                        <div class="subTask">Add User Privilege</div>
                        <div class="subTask">Update Privilege</div>
                        <div class="subTask">Delete Privilege</div>
                        
                    </div>
                <div class="task five" onclick="subtaskOpen('subsetFive')">Student Feature Management</div>
                    <div id="subsetFive" style="display:none;"class="subTasksSet">
                        <div class="subTask" onclick="subtaskOpen('superSubsetThree')" >Add/Remove Hostel Student</div>
                            <div class="superSubTaskSet"id="superSubsetThree" style="display:none;">
                                <div class="superSubTask">As Individual</div>
                                <div class="superSubTask">As a Bulk</div>
                            </div>
                        <div class="subTask" onclick="subtaskOpen('superSubsetFour')">Add/Remove Scholarship Getting Students</div>
                            <div class="superSubTaskSet"id="superSubsetFour" style="display:none;">
                                <div class="superSubTask">Add As Individual</div>
                                <div class="superSubTask">Add As a Bulk</div>
                                <div class="superSubTask">Delete as Individual</div>
                            </div>
                    </div>
                <div class="task six" onclick="subtaskOpen('subsetSix')">Timetable Management</div>
                    <div id="subsetSix" style="display:none;"class="subTasksSet">
                        <div class="subTask">Add/Edit/Delete Event</div>
                        <div class="subTask">View Timetable</div>
                        <div class="subTask">Exam Timetable Management</div>
                        
                    </div>
                <div class="task seven" onclick="subtaskOpen('subsetSeven')">Basic System Configuration</div>
                    <div id="subsetSeven" style="display:none;"class="subTasksSet">
                        <div class="subTask">Appointment Validity Period</div>
                        <div class="subTask">Hall booking Request Validity Period</div>
                        <div class="subTask">Default System Theme</div>
                        <div class="subTask">Server the Zone</div>
                        <div class="subTask">Update Class and GPA Details</div>
                        <div class="subTask">Update Union Email</div>
                        
                    </div>
                <div class="task " onclick="subtaskOpen('subsetEight')">Danger Zoon</div>
                    <div id="subsetEight" style="display:none;"class="subTasksSet">
                        <div class="subTask">Start a New Semester</div>
                        <div class="subTask">Change ADMIN User</div>
                        
                    </div>
                    <div class="task six" onclick="subtaskOpen('subsetNine')">Student Enroll For Course</div>
                    <div id="subsetNine" style="display:none;"class="subTasksSet">
                        <div class="subTask"  onclick="subtaskOpen('superSubsetFive')">Enroll Student for course</div>
                            <div class="superSubTaskSet"id="superSubsetFive" style="display:none;">
                                <div class="superSubTask">As Individual</div>
                                <div class="superSubTask">As a Bulk</div>
                            </div>
                        <div class="subTask" onclick="subtaskOpen('superSubsetSix')">Delete  Enrollment</div>
                            <div class="superSubTaskSet"id="superSubsetSix" style="display:none;">
                                <div class="superSubTask">As Individual</div>
                                <div class="superSubTask">As a Bulk</div>
                            </div>
                        
                    </div>
                <div class="task " onclick="subtaskOpen('subsetTen')">Backup/Restore Management</div>
                    <div id="subsetTen" style="display:none;"class="subTasksSet">
                        <div class="subTask">Automatic Backup Configuration </div>
                        <div class="subTask">Create new Backup</div>
                        <div class="subTask">Restore Backup</div>
                        
                    </div>
                <div class="task " onclick="subtaskOpen('subsetEleven')">Feature Management</div>
                    <div id="subsetEleven" style="display:none;"class="subTasksSet">
                        <div class="subTask">Add New Feature</div>
                        <div class="subTask">Disable/Enable Feature</div>
                        
                    </div>


            </div>
            <div class="taskPage">  
                
                <?php timetableManagementController::timetableManagementOpen();?>
                
            </div>
        </div>
    </div>
    <script src="../../assets/js/jquery.js"></script>
<script src="../../assets/js/toast.js"></script>
    <script>
        
        function subtaskOpen(element){
            if(document.getElementById(element).style.display=="none"){
                document.getElementById(element).style.display="";
            }
            else{
                document.getElementById(element).style.display="none";

            }
            // document.getElementById("messageSecond").style.display="none";
            // window.location.href=document.location.href.toString().split('requestAppointment')[0]+'requestAppointment';
            
        }

    </script>
    

    <!-- include footer section -->
    <?php BasicLoader::loadFooter('../../') ?>
</body>
</html>