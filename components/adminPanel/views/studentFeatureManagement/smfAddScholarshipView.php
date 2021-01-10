<div class="AddScholarshipStudent">
    <span class="sectionTitle">Add Scholarship Getting Students</span>
    <span style="text-align: justify;display: block;">
		Hear, administrator can assign students who are selected to have scholarships such as 'Mahapola' 'Bursary' and other scholarships awarded
        through university or other institutions.
	</span>
    <form action="" method="post">
        <span class="inputHeading">Scholarship type</span>
        <select name="scholarshipType" id="">
            <option value="MP">Mahapola Scholarship</option>
            <option value="BR">Bursary Scholarship</option>
            <option value="OT">Other Scholarship</option>
        </select>

        <span class="inputHeading">Student index list</span>
        <textarea name="studentList" id="studentList" cols="30" rows="10" style="width: 100%;"></textarea>

        <div class="buttonCouple">
            <input type="submit" value="Submit" name="saveData" class="button" onclick="confirm('Are you sure to perform this action?')">
            <input type="reset" value="Cancel" class="button">
        </div>
    </form>
</div>

<!--jquery with toast function-->
<script src="../../assets/js/jquery.js"></script>
<script src="../../assets/js/toast.js"></script>