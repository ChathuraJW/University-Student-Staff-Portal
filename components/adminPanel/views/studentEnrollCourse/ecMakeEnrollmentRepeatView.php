<div class="repeatEnrollment">
    <span class="sectionTitle">Student Course Enrollment(Repeat Attempts)</span>
    <span style="text-align: justify;display: block;">
		Hear administrator can enroll student for course for repeated attempt. For that list, of student index number should input to below given
		textarea as comma separated format.
	</span>
    <form action="" method="post">
        <div class="row col-2">
            <div>
                <!--				subject dropdown-->
                <span class="inputHeading">Course Module</span>
                <select name="selectedSubject" id="selectedSubject" style="width: auto;">
					<?php
						if ($controllerData) {
							foreach ($controllerData as $row) {
								echo("<option value='" . $row->getCourseCode() . "'>" . $row->getName() . " [" . $row->getStudentForYear() . " Year]</option>");
							}
						}
					?>
                </select>
                <br><br><br><br>
                <div>
                    <input type="submit" value="Proceed to Enrollment" name="Proceed" class="button" onclick="confirm('Are you sure to preform this' +
					 ' action?')">
                    <input type="reset" value="Cancel" class="button">
                </div>
            </div>

            <div>
                <span class="inputHeading">Student Index List</span>
                <!--			student list-->
                <textarea name="studentIndexList" id="" cols="50" rows="10" style="width: 450px;" required></textarea>
            </div>
        </div>
    </form>
</div>

<!--jquery with toast function-->
<script src="../../assets/js/jquery.js"></script>
<script src="../../assets/js/toast.js"></script>