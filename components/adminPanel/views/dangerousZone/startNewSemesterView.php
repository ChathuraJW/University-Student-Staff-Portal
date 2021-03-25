<style>
    .confirmButton {
        display: block;
        margin: 20px auto auto;
        padding: 10px;
        background-color: var(--dangerColor);
    }
</style>
<div class="startNewSemester">
    <span class="sectionTitle">Start a New Semester</span>
    <span style="text-align: justify;display: block;">
        Hear you can start a new semester. When you press the button, all student's course enrolment will be disable. As well as all student group also
        promoted to next level if needed. This is a dangerous activity because of that. So before doing this please make sure that actually you need to
        perform this activity.
    </span>
    <br>
    <form action="" method="post">
        <div class="row col-2">
            <div>
                <span class="inputHeading">Admin Username</span>
                <input type="text" name="adminUserName" required> <br>
                <span class="inputHeading">Admin Password</span>
                <input type="password" name="adminPassword" required>
            </div>
            <div>
                <span class="inputHeading">Confirmation</span>
                <input type="checkbox" name="agreed" id="" required>
                <span>By ticking this, I confirm that,  as the system administrator, I am going to start a new semester, purposely.</span>
                <br><br>
                <button type="submit" name="confirmToStartNewSemester" value="confirm" class="button confirmButton" onclick="confirm('Ary you sure to ' +
             'preform this action?')">Confirm and Start a New
                    Semester
                </button>
            </div>
        </div>
    </form>
</div>

<!--jquery with toast function-->
<script src="../../assets/js/jquery.js"></script>
<script src="../../assets/js/toast.js"></script>