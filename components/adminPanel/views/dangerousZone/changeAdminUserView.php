<style>
    .confirmButton {
        display: block;
        margin: 20px auto auto;
        padding: 10px;
        background-color: var(--dangerColor);
    }
</style>
<div class="changeAdminUser">
    <span class="sectionTitle">New Admin User Assignment</span>
    <span style="text-align: justify;display: block;">
		This action need to done, when admin is going to assign his or her privileges to another user at the system. The user, who is going
		to appoint as new system administrator, must be one of academic supportive staff user. So, make sure to assign such privileged user as
		new system administrator.
	    <br>
	    As well as ones operation successful you will automatically redirected to login section by closing the current session.
	</span>
    <form action="" method="post">
        <div class="row col-2">
            <div>
                <span class="inputHeading">Admin Username</span>
                <input type="text" name="adminUserName" required> <br>
                <span class="inputHeading">Admin Password</span>
                <input type="password" name="adminPassword" required>
            </div>
            <div>
                <span class="inputHeading">Appointed User</span>
                <input type="text" name="appointedUser" id="appointedUser" required>
                <input type="button" value="Search" onclick="checkUser();" class="button" style="min-width: 0;">
                <br><br>
                <span id="selectedUserData"></span>

                <br>
                <button type="submit" name="transferAdminPrivilege" value="confirm" class="button confirmButton" onclick="confirm('Ary you sure to ' +
             'preform this action?')">Confirm and Transfer Privilege
                </button>
            </div>
        </div>
    </form>
</div>

<!--jquery with toast function-->
<script src="../../assets/js/jquery.js"></script>
<script src="../../assets/js/toast.js"></script>
<script>
    function checkUser() {
        let username = document.getElementById('appointedUser').value;
        const gpaSemesterURL = "http://localhost/USSP/components/adminPanel/assets/getSelectedUserDataAPI.php?operation=getSelectedUserData&userName=" + username;

        $.getJSON(gpaSemesterURL, function (userData) {
            if (userData['role'] === 'AD') {
                // create user detail for show
                let displayMessage = '<b>User Details</b><br>';
                displayMessage += 'Username: ' + userData['userName'] + '<br>';
                displayMessage += 'Full Name: ' + userData['fullName'] + '<br>';
                displayMessage += 'University Email: ' + userData['universityEmail'] + '<br>';

                // display info message and set created text to span
                createToast('Info', 'Selected[' + userData['userName'] + '] user is capable to be the administrator.', 'I');
                document.getElementById('selectedUserData').innerHTML = displayMessage;
            } else {
                //remove input value and display error by saying invalid user type
                document.getElementById('appointedUser').value = '';
                createToast('Warning (error code: #ADMIN-DZ-03)', 'Selected user can not appoint as the administrator.', 'W');
            }
        });
    }

</script>