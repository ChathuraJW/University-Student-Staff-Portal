<div class="addHostelStudent">
    <span class="sectionTitle">Add Hostel Students</span>
    <span style="text-align: justify;display: block;">
		Hear admin can add student list as comma separated index list. Then those students considered as students in the hostel currently. Specially
		to send messages those student group will use. As well as when new academic year begins those data will be invalid for the system.
	</span>
    <form action="" method="post">
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