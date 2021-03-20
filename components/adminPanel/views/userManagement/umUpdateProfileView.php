<!--update profile section-->
<div class="updateProfileSection">
    <span class="sectionTitle">Update User Profile</span>
    <div class="row">
        <form method="get" action="#editDataSection">
            <span class="inputHeading">Search profile by username</span>
            <input type="search" name="searchUser" style="margin-right: 15px;"><input type="submit" value="Search" name="searchUserProfile"
                                                                                      class="button">
        </form>
    </div>
    <!--    check weather data are loaded if,so then load form -->
	<?php
		//        check weather user press search profile to edit and data also available for the particular search
		if (isset($controllerData) && $controllerData && isset($_GET['searchUserProfile'])) {
//		    create, data update view iff data is available
			echo("
                <form method='post' id='editDataSection'>
                    <div class='row col-3'>
                        <div>
                            <span class='inputHeading'>First Name</span>
                            <input type='text' name='firstName' value='" . $controllerData->getFirstName() . "' required>
                        </div>
                        <div>
                            <span class='inputHeading'>Last Name</span>
                            <input type='text' name='lastName' value='" . $controllerData->getLastName() . "' required>
                        </div>
                        <div>
                            <span class='inputHeading'>Full Name</span>
                            <input type='text' name='fullName' value='" . $controllerData->getFullName() . "' required>
                        </div>
                        <div>
                            <span class='inputHeading'>University Email</span>
                            <input type='text' name='uniMail' value='" . $controllerData->getUniversityEmail() . "' required>
                        </div>
                        <div>
                            <span class='inputHeading'>Date of Birth</span>
                            <input type='date' name='dob' value='" . $controllerData->getDateOfBirth() . "' required>
                        </div>
                        <div>
                            <span class='inputHeading'>NIC Number</span>
                            <input type='text' name='nic' value='" . $controllerData->getNic() . "' required>
                        </div>
                        <div>
                            <span class='inputHeading'>User Category</span>
                            <select name='userRole' required>
                                <option value='ST' " . ($controllerData->isStudent() ? 'selected' : '') . ">Student</option>
                                <option value='AS' " . ($controllerData->isAcademicStaff() ? 'selected' : '') . ">Academic Staff</option>
                                <option value='SP' " . ($controllerData->isSupportiveStaff() ? 'selected' : '') . ">Academic Support Staff</option>
                                <option value='AD' " . ($controllerData->isAdministrativeStaff() ? 'selected' : '') . ">Administrative Staff</option>
                            </select>
                        </div>
                        <div>
                            <p style='padding-top: 15px;'>Rest of the parameters, such as personal email, salutation, contact information can be updated using
                                user profile setting.</p>
                        </div>
                    </div>
                    <div class='buttonCouple'>
                        <input type='submit' value='Save Data' name='updateUserData' class='button' onclick='confirm(`Are you sure to save changes?`)'>
                        <input type='reset' value='Cancel' name='cancel' class='button'>
                    </div>
                </form>
            ");
		}
	?>
</div>
<!--jquery with toast function-->
<script src="../../assets/js/jquery.js"></script>
<script src="../../assets/js/toast.js"></script>