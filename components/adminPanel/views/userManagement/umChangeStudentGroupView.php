<div class="changeStudentGroupIndividual">
    <span class="sectionTitle">Change Student Group</span>
    <div class="row">
        <form method="get" action="#groupEditSection">
            <span class="inputHeading">Search student profile by username</span>
            <input type="search" name="searchStudent" style="margin-right: 15px;"><input type="submit" value="Search" name="searchStudentProfile"
                                                                                         class="button">
        </form>
        <div class="row col-2" id="groupEditSection">
			<?php
				//				check weather user press search button for find student profile and data also available for the given key
				if (isset($controllerData) && $controllerData && isset($_GET['searchStudentProfile'])) {
//	                create view for show data and necessary modifications
					echo("
                        <div>
                            <span class='inputHeading'>Student Details</span>
                            <table>
                                <tr>
                                    <td>Registration Number</td>
                                    <td>" . $controllerData->getUserName() . "</td>
                                </tr>
                                <tr>
                                    <td>Index Number</td>
                                    <td>" . $controllerData->getIndexNo() . "</td>
                                </tr>
                                <tr>
                                    <td>Current Student Group</td>
                                    <td>" . $controllerData->getGroup() . "</td>
                                </tr>
                                <tr>
                                    <td>First Name</td>
                                    <td>" . $controllerData->getFirstName() . "</td>
                                </tr>
                                <tr>
                                    <td>Last Name</td>
                                    <td>" . $controllerData->getLastName() . "</td>
                                </tr>
                                <tr>
                                    <td>Full Name</td>
                                    <td>" . $controllerData->getFullName() . "</td>
                                </tr>
                            </table>
                           <span class='inputHeading'>Select the New Group Going to Assign</span>
                          <form action='' method='post'>
                           <select name='studentGroup' id='studentGroup' required>
                                <optgroup label='1st Year Student'>
                                    <option value='1CS1'>1CS1</option>
                                    <option value='1CS2'>1CS2</option>
                                    <option value='1IS'>1IS</option>
                                </optgroup>
                                <optgroup label='2nd Year Student'>
                                    <option value='2CS1'>2CS1</option>
                                    <option value='2CS2'>2CS2</option>
                                    <option value='2IS'>2IS</option>
                                </optgroup>
                                <optgroup label='3rd Year Student'>
                                    <option value='3CSG'>3CSG</option>
                                    <option value='3CSS'>3CSS</option>
                                    <option value='3CSC'>3CSC</option>
                                    <option value='3ISG'>3ISG</option>
                                    <option value='3IS'>3IS</option>
                                </optgroup>
                                <optgroup label='4th Year Student'>
                                    <option value='4CSS'>4CSS</option>
                                    <option value='4CSG'>4CSG</option>
                                    <option value='4IS'>4IS</option>
                                </optgroup>
                           </select>
                            <div style='padding-top: 20px;'>
                                <input type='submit' value='Change Group' name='updateStudentGroup' class='button' onclick='confirm(`Are you sure to save changes?`)'>
                                <input type='reset' value='Cancel' name='cancel' class='button'>
                            </div>
                        </form>
                        </div>
                    ");
				}
			?>
            <div>
                <!--                group detail list load hear-->
                <span class='inputHeading'>Group Details</span>
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
                            <td>2<sup>nd</sup> Year Computer Science Group 1</td>
                        </tr>
                        <tr>
                            <td>2CS2</td>
                            <td>2<sup>nd</sup> Year Computer Science Group 2</td>
                        </tr>
                        <tr>
                            <td>2IS</td>
                            <td>2<sup>nd</sup> Year Information Systems</td>
                        </tr>

                        <!--                3 rd year-->
                        <tr>
                            <td>3CSG</td>
                            <td>3<sup>rd</sup> Year Computer Science General</td>
                        </tr>
                        <tr>
                            <td>3CSS</td>
                            <td>3<sup>rd</sup> Year Software Engineering Special</td>
                        </tr>
                        <tr>
                            <td>3CSC</td>
                            <td>3<sup>rd</sup> Year Computer Science Special</td>
                        </tr>
                        <tr>
                            <td>3ISG</td>
                            <td>3<sup>rd</sup> Year Information Systems General</td>
                        </tr>
                        <tr>
                            <td>3IS</td>
                            <td>3<sup>rd</sup> Year Information Systems Special</td>
                        </tr>

                        <!--                4 th year-->
                        <tr>
                            <td>4CSS</td>
                            <td>4<sup>th</sup> Year Software Engineering Special</td>
                        </tr>
                        <tr>
                            <td>4CSC</td>
                            <td>4<sup>th</sup> Year Computer Science Special</td>
                        </tr>
                        <tr>
                            <td>4IS</td>
                            <td>4<sup>th</sup> Year Information Systems Special</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!--jquery with toast function-->
<script src="../../assets/js/jquery.js"></script>
<script src="../../assets/js/toast.js"></script>