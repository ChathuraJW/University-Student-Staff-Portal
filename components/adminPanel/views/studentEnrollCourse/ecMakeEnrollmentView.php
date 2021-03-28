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
<div class="makeEnrollment">
    <span class="sectionTitle">Student Course Enrollment</span>
    <span style="text-align: justify;display: block;">
		Before you are going to do student course enrollments, if it is a new semester, first you need to start it with USSP. Then after
		you can go with student course enrollments.
	</span>

    <div class="row col-2">
        <form action="" method="post">
            <div class="operationArea">
                <span class="inputHeading">Student Group</span>
                <!--				group dropdown-->
                <select name="studentGroup" id="studentGroup">
                    <optgroup label="1st Years">
                        <option value="1CS1">1CS1</option>
                        <option value="1CS2">1CS2</option>
                        <option value="1IS">1IS</option>
                    </optgroup>
                    <optgroup label="2nd Years">
                        <option value="2CS1">2CS1</option>
                        <option value="2CS2">2CS2</option>
                        <option value="2IS">2IS</option>
                    </optgroup>
                    <optgroup label="3rd Years">
                        <option value="3CSG">3CSG</option>
                        <option value="3CSC">3CSC</option>
                        <option value="3CSS">3CSS</option>
                        <option value="3ISG">3ISG</option>
                        <option value="3ISI">3ISI</option>
                    </optgroup>
                    <optgroup label="4th Years">
                        <option value="4CSC">4CSC</option>
                        <option value="4CSS">4CSS</option>
                        <option value="4ISI">4ISI</option>
                    </optgroup>
                </select>
                <!--				subject dropdown-->
                <span class="inputHeading">Course Module</span>
                <select name="selectedSubject" id="selectedSubject">
					<?php
						if ($controllerData) {
							foreach ($controllerData as $row) {
								echo("<option value='" . $row->getCourseCode() . "'>" . $row->getName() . " [" . $row->getStudentForYear() . " Year]</option>");
							}
						}
					?>
                </select>

                <!--				attempt-->
                <span class="inputHeading">Attempt</span>
                <span>In group enrollment, only can enroll student, to there first attempts.</span>

                <br><br><br>
                <input type="submit" value="Proceed to Enrollment" name="gotoEnroll" class="button" onclick="confirm('Are you sure to preform this ' +
                 'action?')">
            </div>
        </form>
        <!--		description table generation-->
        <div class="descriptionTable">
            <span class="inputHeading">Student Group Description</span>
            <table>
                <tr>
                    <th>Student Group</th>
                    <th>Description</th>
                </tr>
                <!--				1st and 2nd year description-->
				<?php
					for ($i = 1; $i <= 2; $i++) {
						echo("
							<tr>
								<td>$i CS1</td>
								<td>$i Year Computer Science Group 1</td>
							</tr>
							<tr>
								<td>$i CS2</td>
								<td>$i Year Computer Science Group 2</td>
							</tr>
							<tr>
								<td>$i IS</td>
								<td>$i Year Information System</td>
							</tr>
						");
					}
				?>
                <!--				3rd year description-->
                <tr>
                    <td>3 CSG</td>
                    <td>3 year Computer Science General</td>
                </tr>
                <tr>
                    <td>3 CSC</td>
                    <td>3 year Computer Science Special</td>
                </tr>
                <tr>
                    <td>3 CSS</td>
                    <td>3 year Software Engineering Special</td>
                </tr>
                <tr>
                    <td>3 ISG</td>
                    <td>3 year Information System General</td>
                </tr>
                <tr>
                    <td>3 ISI</td>
                    <td>3 year Information System Special</td>
                </tr>
                <!--				4th year description-->
                <tr>
                    <td>4 CSC</td>
                    <td>4 year Computer Science Special</td>
                </tr>
                <tr>
                    <td>4 CSS</td>
                    <td>4 year Software Engineering Special</td>
                </tr>
                <tr>
                    <td>4 ISI</td>
                    <td>4 year Information System Special</td>
                </tr>
            </table>
        </div>
    </div>
</div>

<!--jquery with toast function-->
<script src="../../assets/js/jquery.js"></script>
<script src="../../assets/js/toast.js"></script>