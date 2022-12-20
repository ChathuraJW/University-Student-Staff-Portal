<!--add staff section-->
<div class="addStaffAsIndividual">
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

<!--jquery with toast function-->
<script src="../../assets/js/jquery.js"></script>
<script src="../../assets/js/toast.js"></script>