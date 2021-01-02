<!--add student bulk section-->
<div class="addStudentAsBulk" id="addStudentAsBulk" style="display: none">
    <span class="sectionTitle">Add Students</span>
    <div class="row col-2">
        <div class="addStudentDescription">
            <h2>Instructions</h2>
            <p>Note that you have to upload a CSV file, for insert student data to the system, as well as make sure
                that, either you want to add only one student, you should fallow the same step. <br>
                First of all you can <a href="assets/studentBulkSample.csv">download</a> the sample CSV file and add student data to it.
                When you create your file make sure to stick on below constraints. <br>
                All text data should be in the Upper Camel case.
            <dl>
                <dt>First name filed</dt>
                <dd>this filed should be the sure name of student. <br>Eg: Sooriyasinghe</dd>
                <dt>Last name filed</dt>
                <dd>this filed should be the rest of the name in the form of letter. <br>Eg: S.V.P</dd>
                <dt>Full name filed</dt>
                <dd>this filed should be the full name in words. <br>Eg Sooriyasinghage Vimal Prasad Sooriyasinghe</dd>
                <dt>NIC filed</dt>
                <dd>format of the value should be either xxxxxxxxxxxx or xxxxxxxxxV. Make sure, if letter is there put it is capital letter. At
                    the save time do not put any space in between any tow characters. <br>Eg: 199345682488, 9829461034V
                </dd>
                <dt>Telephone number filed</dt>
                <dd>you allowed to add only one telephone number for this field, as well as it should be formatted according to the given example.
                    Eg: 0xx xxxxxxx<br></dd>
                <dt>Registration number filed</dt>
                <dd>this is the username for the the student's login. Format of this should be like the examples. <br>Eg: 2018cs042, 2018is023</dd>
                <dt>Date of birth filed</dt>
                <dd>format of this filed as, dd/mm/yyyy. <br>Eg: 20/06/2000</dd>
                <dt>Address Filed</dt>
                <dd>When you enter, student address, make sure not to use ',' to separate two line. Than will reason to occur errors. Look at given
                    example to identify the correct format.<br>Eg: No.24/2 MainRd Colombo
                </dd>
            </dl>
            </p>
        </div>
        <div style="padding-left: 20px;">
            <h2>Student Group information</h2>
            <div class="studentGroupTable">
                <table>
                    <tr>
                        <th>Group code</th>
                        <th>Description</th>
                    </tr>
                    <!--                1 st year-->
                    <tr>
                        <td>1CS1</td>
                        <td>1<sup>st</sup> Year Computer Science Group 1</td>
                    </tr>
                    <tr>
                        <td>1CS2</td>
                        <td>1<sup>st</sup> Year Computer Science Group 2</td>
                    </tr>
                    <tr>
                        <td>1IS</td>
                        <td>1<sup>st</sup> Year Information Systems</td>
                    </tr>

                    <!--                2 nd year-->
                    <tr>
                        <td>2CS1</td>
                        <td>2<sup>st</sup> Year Computer Science Group 1</td>
                    </tr>
                    <tr>
                        <td>2CS2</td>
                        <td>2<sup>st</sup> Year Computer Science Group 2</td>
                    </tr>
                    <tr>
                        <td>2IS</td>
                        <td>2<sup>st</sup> Year Information Systems</td>
                    </tr>

                    <!--                3 rd year-->
                    <tr>
                        <td>3CS1</td>
                        <td>3<sup>st</sup> Year Computer Science Group 1</td>
                    </tr>
                    <tr>
                        <td>3CS2</td>
                        <td>3<sup>st</sup> Year Computer Science Group 2</td>
                    </tr>
                    <tr>
                        <td>3IS</td>
                        <td>3<sup>st</sup> Year Information Systems</td>
                    </tr>

                    <!--                4 th year-->
                    <tr>
                        <td>4CS1</td>
                        <td>4<sup>st</sup> Year Computer Science Group 1</td>
                    </tr>
                    <tr>
                        <td>4CS2</td>
                        <td>4<sup>st</sup> Year Computer Science Group 2</td>
                    </tr>
                    <tr>
                        <td>4IS</td>
                        <td>4<sup>st</sup> Year Information Systems</td>
                    </tr>
                </table>
            </div>
            <br>
            <hr>
            <div class="addStudentSection">
                <form action="" method="post" enctype="multipart/form-data">
                    <span class="inputHeading">Student Group</span>
                    <select name="studentGroup" id="studentGroup" required>
                        <optgroup label="1st Year Student">
                            <option value="1CS1">1CS1</option>
                            <option value="1CS2">1CS2</option>
                            <option value="1IS">1IS</option>
                        </optgroup>
                        <optgroup label="2nd Year Student">
                            <option value="2CS1">2CS1</option>
                            <option value="2CS2">2CS2</option>
                            <option value="2IS">2IS</option>
                        </optgroup>
                        <optgroup label="3rd Year Student">
                            <option value="3CS1">3CS1</option>
                            <option value="3CS2">3CS2</option>
                            <option value="3IS">3IS</option>
                        </optgroup>
                        <optgroup label="4th Year Student">
                            <option value="4CS1">4CS1</option>
                            <option value="4CS2">4CS2</option>
                            <option value="4IS">4IS</option>
                        </optgroup>
                    </select>
                    <br>
                    <span class="inputHeading">CSV Formatted Student List</span>
                    <input type="file" name="studentListFile" id="studentListFile" required>

                    <div style="padding-top:30px;">
                        <input type="submit" class="button" name="addStudentData" value="Submit Data" onclick="confirm('Are you sure to proceed ' +
                         'towards? Once you ' +
                         'press ' +
                         'ok, you can not recover your action. So please check again the selected group and csv file is formatted according to the ' +
                          'sample given.')">
                        <input type="reset" class="button" name="cancel" id="cancel">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--add staff section-->
<div class="addStaffAsIndividual" style="display: none">
    <span class="sectionTitle">Add Staff</span>
    <form action="" method="post">
        <div class="row col-3">
            <div>
                <span class="inputHeading">Staff Code</span>
                <input type="text" name="userName" required placeholder="Eg: vps">
            </div>
            <div>
                <span class="inputHeading">First Name</span>
                <input type="text" name="firstName" required placeholder="Eg: Sooriyasinghe">
            </div>
            <div>
                <span class="inputHeading">Last Name</span>
                <input type="text" name="lastName" required placeholder="Eg: S.V.P">
            </div>
            <div style="width: 300%">
                <span class="inputHeading">Full Name</span>
                <input type="text" name="fullName" style="width: 96.5%" required placeholder="Eg Sooriyasinghage Vimal Prasad Sooriyasinghe">
            </div>
            <div></div>
            <div></div>
            <div>
                <span class="inputHeading">NIC Number</span>
                <input type="text" name="nic" required placeholder="Eg: 199345682488, 9829461034V">
            </div>
            <div>
                <span class="inputHeading">Date of Birth</span>
                <input type="date" name="dob" required>
            </div>
            <div>
                <span class="inputHeading">Personal Email</span>
                <input type="email" name="personalEmail" required placeholder="Eg: vimalPrsad@gmail.com">
            </div>
            <div>
                <span class="inputHeading">University Email</span>
                <input type="email" name="universityEmail" required placeholder="Eg: vps@ucsc.cmb.ac.lk">
            </div>
            <div>
                <span class="inputHeading">User Role</span>
                <select name="userRole" required>
                    <option value="AS">Academic Staff</option>
                    <option value="SP">Academic Support Staff</option>
                    <option value="AD">Administrative Staff</option>
                </select>
            </div>
        </div>
        <div class="buttonCouple">
            <input type="submit" name="registerStaffMember" value="Register" class="button" onclick="confirm('Are you sure to procedure towards?')">
            <input type="reset" name="cancel" value="Cancel" class="button">
        </div>
    </form>
</div>

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
		if (isset($controllerData) && $controllerData) {
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
                                <option value='ST' " . ($controllerData->isStudent() ? 'selected':''). ">Student</option>
                                <option value='AS' " . ($controllerData->isAcademicStaff() ? 'selected':''). ">Academic Staff</option>
                                <option value='SP' " . ($controllerData->isSupportiveStaff() ? 'selected':''). ">Academic Support Staff</option>
                                <option value='AD' " . ($controllerData->isAdministrativeStaff() ? 'selected':''). ">Administrative Staff</option>
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