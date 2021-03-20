<!--in page style-->
<style>
    .descriptionTable > table {
        font-size: 16px;
        width: 95%;
        border-collapse: collapse;
    }

    .descriptionTable table, .descriptionTable td, .descriptionTable th {
        border: 1px solid black;
        padding: 10px;
    }
</style>

<div class="listOutPrivilege">
    <span class="sectionTitle">Privilege Management</span>
    <div class="row col-2">
        <div>
            <div class="descriptionTable" style="margin-right: 10px;">
                <span class="inputHeading">Current Privileges</span>
                <table>
                    <tr>
                        <th>Privilege ID</th>
                        <th>Role</th>
                        <th>Assign to</th>
                    </tr>
					<?php
						//						create current privilege list with the controller data variable
						foreach ($controllerData[0] as $row) {
							echo("
                                <tr>
                                    <td>" . $row->getEntryID() . "</td>
                                    <td>" . $row->getRole() . "</td>
                                    <td>" . $row->getDisplayUserName() . " [" . $row->getUserName() . "]</td>
                                </tr>        
                            ");
						}
					?>

                </table>
            </div>
            <br>
            <div class="privilegeEditSection" id="privilegeEditSection">
                <span class="inputHeading">Username of new Privileged User</span>
                <form action="#privilegeEditSection" method="post">
                    <input type="text" name="searchUserName" value="<?php if ($controllerData[1]) echo $controllerData[1]->getUserName(); ?>">
                    &nbsp;
                    <input type="submit" value="Search" name="searchUser" class="button" style="min-width:0;">
					<?php
						//                        display data related to searched user
						if ($controllerData[1]) {
							echo("
                                <br>
                                <div style='font-size: 15px;margin: 15px;'>
                                    <b>User Details</b> <br>
                                    Username: " . $controllerData[1]->getUserName() . " <br>
                                    First Name: " . $controllerData[1]->getFirstName() . " <br> 
                                    Last Name: " . $controllerData[1]->getLastName() . " <br>
                                    User Role: " . $controllerData[1]->getUserTypeAsWord() . " <br>
                                </div>
                            ");
						}
					?>
                    <!--                    privilege selection operation-->
					<?php
						if ($controllerData[1]) {
							echo("
                            <span class='inputHeading'>Select Privilege ID, Going to Update</span>
	                        <select name='privilegeID' id=''>
                        ");
							foreach ($controllerData[0] as $row) {
								echo("
                                <option value='" . $row->getEntryID() . "'>[ #" . $row->getEntryID() . " ] " . $row->getRole() . "</option>
                             ");
							}
							echo("</select>");
							echo("&nbsp;&nbsp;<input type='submit' value='Update' name='updatePrivilege' class='button' style='min-width:0;' onclick='confirm(`Are you sure to preform this action?`)'>");
						}
					?>
                </form>
            </div>
        </div>
        <!--        privilege information table-->
        <div class="descriptionTable">
            <span class="inputHeading">Privilege Codes and Description</span>
            <table>
                <tr>
                    <th>Code</th>
                    <th>Description</th>
                    <th>Responsibilities</th>
                </tr>
                <tr>
                    <td>RED</td>
                    <td>Registrar for Examination Department</td>
                    <td>This user role is responsible to take result send by academic staff for examination board approval. Should be a
                        Administrative base login. System have only one SAR login.
                    </td>
                </tr>
                <tr>
                    <td>HBO</td>
                    <td>Hall Booking Approval Officer</td>
                    <td>This privileged use is responsible to handle hall reservation request send by other system user. System can have maximum
                        three HBO privileged users.
                    </td>
                </tr>
                <tr>
                    <td>ASH</td>
                    <td>Academic Supportive Head</td>
                    <td>This role should assign for one of academic supportive staff member. He/She responsible to distribute and allocate
                        workload requests.
                    </td>
                </tr>
                <tr>
                    <td>EDO</td>
                    <td>Examination Department Officer</td>
                    <td>This user responsible to upload examination board confirmed results to the system. This privilege can take for only one
                        administrative user login.
                    </td>
                </tr>
                <tr>
                    <td>AMO</td>
                    <td>Attendance Marking Officer</td>
                    <td>This user responsible to upload daily student attendance for lectures. To have this privilege user should be
                        administrative login and system only have one AMO role.
                    </td>
                </tr>
                <tr>
                    <td>QAO</td>
                    <td>IQAC Report Uploading Officer</td>
                    <td>This user responsible to submit IQAC reports to academic staff. This user also should be a administrative login and system
                        have only one such user.
                    </td>
                </tr>
                <tr>
                    <td>TSO</td>
                    <td>Train Season Officer</td>
                    <td>This user is responsible to prepare train season according to the user request. To have this role, user should be a
                        administrative login. System can have only one TSO.
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

<!--jquery with toast function-->
<script src="../../assets/js/jquery.js"></script>
<script src="../../assets/js/toast.js"></script>