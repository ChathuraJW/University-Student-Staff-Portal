<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="assets/css/registrationStyles.css">
    <!-- <link rel="stylesheet" href="assets/css/fontawesome-free-5.15.1-web/css/all.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/gridSystem.css">
</head>
        
<body>
    

    <!-- feature body section -->
    
    <div class="bg featureBody" >
    
        <div class="row col-2" id="topic" style="margin:auto;width:60%;">
            <div class="row col-1" style="margin:auto;">
                <div>
                <img class="logo2" src="../assets/image/logoUOC.PNG" alt=""><img class="logo1" src="../assets/image/logoUCSC.PNG" alt="">
                </div>
            </div>
            <div class="row col-1">
                <div>
                <span class="mainHead"><p style="font-size: 70px;margin-bottom:-20px;">USSP</p><p style="font-size: 40px;">Registration</p></span>
                </div>
            </div>
        </div>
        

        <div class="row col-1">
            <form action=""  onsubmit="return getdata()" method="post" name="form">
                <div id="pwd" class="forms password" >

                    <div class="row col-1">
                        <h2 class="heading">User Password </h2>

                    </div>
                    
                    <div class="inputs">
                        <span>
                            <div style="visibility:hidden;"class="popupText pswError1" id="pswError1">Filling is required and LowerCase, UpperCase, Number, special Character must include and length must > or = 8 </div>
                        </span>
                        <div class="row col-2 input">
                            <div><label for="psw"><b>Password</b></label></div>
                            <div class="data"> 
                                <input class="inputField" type="password" placeholder="Enter Password" name="psw" id="psw">    <i class="fa fa-question-circle pswIconF" id="pswIconF" onmouseover="visible('pswError1')" aria-hidden="true"></i><br>
                                
                            </div>
                            <!-- Filling this field is required ! -->
                        </div>
                        <span>
                            <div style="visibility:hidden;" class="popupText pswError2" id="pswError2">Filling is required and Equal to first password </div>
                        </span>
                        <div class="row col-2 input">
                            <div><label for="psw-repeat"><b>Repeat Password</b></label></div>
                            <div>
                                <input class="inputField" type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat">   <i class="fa fa-question-circle pswIconR" onmouseover="visible('pswError2')" aria-hidden="true"></i><br>
                                <!-- <p style="display:none;"class="popupText" id="equal">Not equal to first</p> -->
                            </div>
                            
                        </div>
                      

                        <div class="row col-1">
                            <div><input class="button next" type="button" onclick="validateForm()"  name="next" value="NEXT"></div>
                        </div>
                    </div>
                </div>
                    
                <div id="bsc" class="forms basic" style="display:none;" >
                    
                    <div class="row col-1">
                        <h2 class="heading">Basic Details</h2>
                    </div>
                    <div class="inputs basicInputs">
                        
                        <div class="row col-1 input">
                            <span>
                                <div style="width:95%;visibility:hidden;" class="popupText" id="fNameMsg"> Ex Chathura Janaranjana</div>
                            </span>
                            <div><label for="fName"><b>First Name</b></label></div>
                            <div><input class="inputField normalFields" type="text" placeholder="Enter Name" name="fName" id="fName" required>    <i class="fa fa-question-circle pswIconF" onmouseover="visible('fNameMsg')" aria-hidden="true"></i><br>
                            <!-- <p style="display:none;"class="popupText" id="fNameMsg">Filling is required</p> -->
                            </div>
                        </div>
                        
                        <div class="row col-1 input">
                            <span>
                                <div style="width:95%;visibility:hidden;"class="popupText" id="lNameMsg"> Ex Wanniarachchi</div>
                            </span>
                            <div><label for="lName"><b>Last Name</b></label></div>
                            <div><input class="inputField normalFields" type="text" placeholder="Enter Name" name="lName" id="lName" required>    <i class="fa fa-question-circle pswIconF" onmouseover="visible('lNameMsg')" aria-hidden="true"></i><br>
                            <!-- <p style="display:none;"class="popupText" id="lNameMsg">Filling is required</p> -->
                        </div>
                        </div>
                        <div class="row col-1 input">
                            <span >
                                <div style="width:95%;visibility:hidden;"class="popupText" id="fullNameMsg"> Ex Wanniarachchilage Chathura Janaranjana Wanniarachchi</div>
                            </span>
                            <div><label for="fullName"><b>Full Name</b></label></div>
                            <div><input class="inputField normalFields" type="text" placeholder="Enter Name" name="fullName" id="fullName" required>   <i class="fa fa-question-circle pswIconF" onmouseover="visible('fullNameMsg')" aria-hidden="true"></i><br><br>
                            <!-- <p style="display:none;"class="popupText" id="fullNameMsg">Filling is required</p> -->
                            
                            </div>

                        </div>
                        <div class="row col-2 input">
                            <div >
                                <span style="margin-bottom:10px;">
                                    <div style="width:90%;visibility:hidden;"class="popupText" id="genderMsg">Choose from dropdown</div>

                                </span>
                                <div><label for="gender"><b>Gender</b></label></div>
                                <div>
                                    <input style="width:90%" class="inputField normalFields" list="types" placeholder="Gender" name="gender" id="gender" required>   <i class="fa fa-question-circle pswIconF" onmouseover="visible('genderMsg')" aria-hidden="true"></i><br><br>
                                    <!-- <p style="display:none;"class="popupText" id="genderMsg">Filling is required</p> -->
                                </div>
                                <datalist id="types">
                                    <option data-value="1">Male</option>
                                    <option data-value="2">Female</option>
                                </datalist> <br>
                            </div>
                            <div >
                                <span style="margin-bottom:10px;">
                                    <div style="width:90%;visibility:hidden;"class="popupText" id="salutationMsg">Choose from dropdown</div>
                                </span>
                                <div><label for="occupation"><b>Salutation</b></label></div>
                                <div>
                                    <input style="width:90%" class="inputField normalFields" list="role" placeholder="Occupation" name="occupation" id="occupation" required>   <i class="fa fa-question-circle pswIconF" onmouseover="visible('salutationMsg')" aria-hidden="true"></i><br><br>
                                    <!-- <p style="display:none;"class="popupText" id="OccupationInv">Invalid Name</p> -->
                                </div>
                                <datalist id="role">
                                    <option data-value="1">Mr</option>
                                    <option data-value="2">Ms</option>
                                    <option data-value="3">Mrs</option>
                                    <option data-value="4">Dr</option>
                                    <option data-value="4">Rev</option>
                                </datalist> <br>
                            </div>
                        </div>

                        <div class="row col-2 input">
                            <div >
                                <span >
                                    <div style="width:90%;visibility:hidden;"class="popupText" id="nicMsg">Required information</div>
                                </span>
                                <div><label for="nic"><b>NIC</b></label></div>
                                <div >
                                    <input style="width:90%;" class="inputField normalFields" type="text" placeholder="Enter NIC" name="nic" id="nic" required> <i class="fa fa-question-circle pswIconF" onmouseover="visible('nicMsg')" aria-hidden="true"></i>
                                    <!-- <p style="display:none;"class="popupText" id="nicMsg">Filling is required</p> -->
                                    
                                </div>
                            </div>
                            <div>
                                <span >
                                    <div style="width:90%;visibility:hidden;"class="popupText" id="dobMsg">Required information</div>
                                </span>
                                <div><label for="dob"><b>DOB</b></label></div>
                                <div >
                                    <input style="width:90%;" class="inputField normalFields" type="date" placeholder="Enter DOB" name="dob" id="dob" required> <i class="fa fa-question-circle pswIconF" onmouseover="visible('dobMsg')" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>

                        <div class="row col-2 input">
                            <div><input class="button" type="button" onclick="backPwd()"name="previous" value="PREVIOUS"></div>
                            <div><input class="button next" type="button" onclick="BasicDetails()"name="next" value="NEXT"></div>
                        </div>
                    </div>
                </div>
                <div id="cnt" class="forms contact " style="display:none;" >
                    <div class="row col-1">
                        <h2 class="heading">Contact Details</h2>
                    </div>
                    <div class="inputs basicInputs">
                        <div class="row col-1 input">
                            <span>
                                <div style="visibility:hidden;width:95%;" class="popupText" id="teleMsg">Required information</div>
                            </span>
                            <div><label for="tele"><b>Telephone</b></label></div>
                            <div><input class="inputField normalFields" type="text" placeholder="Enter Telephone number" name="tele" id="tele" required>  <i class="fa fa-question-circle pswIconF" onmouseover="visible('teleMsg')" aria-hidden="true"></i><br>
                            <!-- <p style="display:none;"class="popupText" id="teleInv">Invalid Name</p> -->
                            </div>
                        </div>
                        <div class="row col-1 input">
                            <span>
                                <div style="visibility:hidden;width:95%;"class="popupText" id="addressMsg">Required information</div>
                            </span>
                            <div><label for="address"><b>Address</b></label></div>
                            <div><input class="inputField normalFields" type="text" placeholder="Enter Address" name="address" id="address" required>  <i class="fa fa-question-circle pswIconF" onmouseover="visible('addressMsg')" aria-hidden="true"></i><br>
                            <!-- <p style="display:none;"class="popupText" id="addressInv">Invalid Name</p> -->
                            </div>
                        </div>
                        <div class="row col-2 input">
                            <div>
                                <span>
                                    <div style="visibility:hidden;width:90%;" class="popupText" id="emailMsg">Required information</div>
                                </span>
                                <div><label for="email"><b>Personal Email</b></label></div>
                                <div><input style="width:90%;"class="inputField normalFields" type="email" placeholder="Enter Personal Email" name="email" id="email" required>  <i class="fa fa-question-circle pswIconF" onmouseover="visible('emailMsg')" aria-hidden="true"></i><br>
                                <!-- <p style="display:none;"class="popupText" id="emailInv">Invalid Name</p> -->
                                </div>
                            </div>
                            <div>
                                <span>
                                    <div style="visibility:hidden;width:90%;" class="popupText" id="uniMailMsg">Enter Valid Input</div>
                                </span>
                                <div><label for="uniMail"><b>University Email</b></label></div>
                                <div><input style="width:90%;" class="inputField normalFields" type="email" placeholder="Enter University Email" name="uniMail" id="uniMail">  <i class="fa fa-question-circle pswIconF" onmouseover="visible('teleMsg')" aria-hidden="true"></i><br>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row col-2 input">
                            <div><input class="button" type="button" onclick="backBsc()"name="previous" value="PREVIOUS"></div>
                            <div><input class="button next" type="button" onclick="ContactDetails()"name="next" value="NEXT"></div>
                        </div>
                    </div>
                </div>
                <div id="img" class="forms image" style="display:none;" >
                    <div class="row col-1">
                        <h2 class="heading">Profile Image</h2>
                    </div>
                    <div class="inputs">
                        <div class="row col-1 input">
                            <div><label for="image"><b>Profile Image</b></label><br></div>
                        </div>
                        <div class="row col-1 input">
                            <div><input class="inputField choose"  type="file" accept="image/*" onchange="loadFile(event)" placeholder="Enter Profile Image" name="image" id="image"></div>
                        </div>
                        <img class="profile" id="output"/>
                        <div class="row col-2">
                            <div><input class="button" type="button" onclick="backCnt()"name="previous" value="PREVIOUS"></div>
                            <div><input class="button next" type="submit" name="submit" value="SUBMIT"></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        function visible(element){
            document.getElementById(element).style.visibility="visible";
            setTimeout(function(){
                document.getElementById(element).style.visibility="hidden";
            }, 4000);
        }
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
            }
        };

        function ContactDetails(){
            var telephone = document.forms["form"]["tele"].value;
            var address = document.forms["form"]["address"].value;
            var email = document.forms["form"]["email"].value;
            var uniMail = document.forms["form"]["uniMail"].value;
            var testValue=0;
            if(telephone==""){
                displayError("tele","teleMsg");
            }
            else{
                document.getElementById("teleMsg").style.visibility="hidden";
                if(telephone.length==10){
                    if(/[^0-9]/.test(telephone)){
                        displayError("tele","teleMsg");
                    }
                    else{
                        document.getElementById("teleMsg").style.visibility="hidden";
                        testValue++;
                    }
                }
                else{
                    displayError("tele","teleMsg");
                }
            }
            if(address==""){
                displayError("address","addressMsg");
            }
            else{
                document.getElementById("addressMsg").style.visibility="hidden";
                testValue++;
            }
            if(email==""){
                displayError("email","emailMsg");
            }
            else{
                var emailMatch= /[@]/;
                document.getElementById("emailMsg").style.visibility="hidden";
                if(email.match(emailMatch)){
                    
                    document.getElementById("emailMsg").style.visibility="hidden";
                    testValue++;
                    
                }
                else{
                    displayError("email","emailMsg");
                }
            }
            if(uniMail!=""){
                var emailMatch= /[@]/;
                document.getElementById("uniMailMsg").style.visibility="hidden";
                if(email.match(emailMatch)){
                    
                    document.getElementById("uniMailMsg").style.visibility="hidden";
                    testValue++;
                    
                }
                else{
                    displayError("uniMail","uniMailMsg");
                }
            
            }
            if(testValue==3){
                toImg();
            }
        }
        function BasicDetails(){
            var fName = document.forms["form"]["fName"].value;
            var lName = document.forms["form"]["lName"].value;
            var fullName = document.forms["form"]["fullName"].value;
            var gender = document.forms["form"]["gender"].value;
            var occupation = document.forms["form"]["occupation"].value;
            var nic = document.forms["form"]["nic"].value;
            var dob = document.forms["form"]["dob"].value;
            var numbers=/^[0-9]+$/;
            var checker=/^[A-Za-z'.']+$/;
            var nicCheck=/^[0-9vV]+$/;
            var ticket=0;
            if(fName==""){
                displayError("fName","fNameMsg");
            }
            else{
                document.getElementById("fNameMsg").style.visibility="hidden";
                if(fName.match(checker)){
                    document.getElementById("fNameMsg").style.visibility="hidden";
                    ticket++;
                }
                else{
                    displayError("fName","fNameMsg");
                }
            }

            if(lName==""){
                displayError("lName","lNameMsg");
            }
            else{
                document.getElementById("lNameMsg").style.visibility="hidden";
                if(/[^A-Za-z]/.test(lName)){
                    displayError("lName","lNameMsg");
                }else{
                    document.getElementById("lNameMsg").style.visibility="hidden";
                    ticket++;
                }
            }

            if(fullName==""){
                displayError("fullName","fullNameMsg");
            }
            else{
                document.getElementById("fullNameMsg").style.visibility="hidden";
                if(/[^A-Za-z'.']/.test(fullName)){
                    displayError("fullName","fullNameMsg");
                }else{
                    document.getElementById("fullNameMsg").style.visibility="hidden";
                    ticket++;
                }
            }
            if(gender==""){
                displayError("gender","genderMsg");
            }
            else{
                document.getElementById("genderMsg").style.visibility="hidden";
                if(gender=="Male"||gender=="Female"){
                    document.getElementById("genderMsg").style.visibility="hidden";
                    ticket++;
                }else{
                    displayError("gender","genderMsg");
                }
            }
            if(occupation==""){
                displayError("occupation","salutationMsg");
            }
            else{
                document.getElementById("salutationMsg").style.visibility="hidden";
                if(occupation=="Mr"|| occupation=="Mrs"|| occupation=="Dr"|| occupation=="Ms"|| occupation=="Rev"){
                    document.getElementById("salutationMsg").style.visibility="hidden";
                    ticket++;
                }else{
                    displayError("occupation","salutationMsg");
                }
            }
            if(nic==""){
                displayError("nic","nicMsg");
            }
            else{
                document.getElementById("nicMsg").style.visibility="hidden";
                if(nic.length == 10 || nic.length == 12){
                    if(nic.length==10){
                        if(nic.match(nicCheck)){
                            document.getElementById("nicMsg").style.visibility="hidden";
                            ticket++;
                        }else{
                            displayError("nic","nicMsg");
                        }
                    }
                    if(nic.length == 12){
                        if(nic.match(numbers)){
                            document.getElementById("nicMsg").style.visibility="hidden";
                            ticket++;
                        }
                        else{
                            displayError("nic","nicMsg");
                        }
                    } 
                }
                else if(nic.length > 0){
                    displayError("nic","nicMsg");
                }
            }
            if(dob==""){
                displayError("dob","dobMsg");
            }
            else{
                document.getElementById("dobMsg").style.visibility="hidden";
                ticket++;
            }

            if(ticket==7){
                toCnt();
            }
            
        }
        
        function validateForm(){
            var x = document.forms["form"]["psw"].value;
            var y = document.forms["form"]["psw-repeat"].value;
            if(x==""||y==""){
                if(x==""){
                    displayError("psw","pswError1");
                    
                }
                else{
                    document.getElementById("pswError1").style.visibility="hidden";
                }
                if(y==""){

                    displayError("psw-repeat","pswError2");

                }else{
                    document.getElementById("pswError2").style.visibility="hidden";
                }
            }
            else{
                document.getElementById("pswError1").style.visibility="hidden";
                document.getElementById("pswError2").style.visibility="hidden";
                var lowerCaseLetters = /[a-z]/g;
                var upperCaseLetters = /[A-Z]/g;
                var specialCharachters=/[@#$%)^&*(}>?,./;''~\|:""`{<]/;
                var numbers = /[0-9]/g;
                
                if(x.match(upperCaseLetters)) {
                    document.getElementById("pswError1").style.visibility="hidden";
                    if(x.match(specialCharachters)) {
                        if(x.match(lowerCaseLetters)) {
                            document.getElementById("pswError1").style.visibility="hidden";
                            if(x.match(numbers)) {
                                document.getElementById("pswError1").style.visibility="hidden";
                                if(x.length >= 8) {
                                    document.getElementById("pswError1").style.visibility="hidden";
                                    if(x==y){
                                        document.getElementById("pswError2").style.visibility="hidden";
                                        toBsc();
                                    }else{
                                        displayError("psw-repeat","pswError2");
                                    }
                                } else {
                                    displayError("psw","pswError1");
                                }
                            } else {
                                displayError("psw","pswError1");
                            }
                        } else {
                            displayError("psw","pswError1");
                        }
                    }
                    else{
                        displayError("psw","pswError1");
                    }
                } else {
                    displayError("psw","pswError1");
                }
                
            }
            
        }
        function displayError(field,message){
            document.getElementById(field).style.animation="shake 0.3s";
            document.getElementById(field).style.backgroundColor="rgb(252, 186, 175)";
            document.getElementById(message).style.visibility="visible";
            setTimeout(function(){
                document.getElementById(field).style.backgroundColor="";
                document.getElementById(message).style.visibility="hidden";
                document.getElementById(field).style.animation="";
            }, 3000);
        }
        function toBsc(){
            document.getElementById("pwd").style.display="none";
            document.getElementById("bsc").style.display="";            
            // document.getElementById("topic").style.display="none";            
        }
        function toCnt(){
            document.getElementById("bsc").style.display="none";
            document.getElementById("cnt").style.display="";            
        }
        function toImg(){
            document.getElementById("cnt").style.display="none";
            document.getElementById("img").style.display="";            
        }
        function backPwd(){
            document.getElementById("bsc").style.display="none";
            document.getElementById("pwd").style.display="";
            // document.getElementById("topic").style.display="";            
        }
        function backBsc(){
            document.getElementById("cnt").style.display="none";
            document.getElementById("bsc").style.display="";            
        }
        function backCnt(){
            document.getElementById("img").style.display="none";
            document.getElementById("cnt").style.display="";            
        }


    </script>
    

    <!-- include footer section -->
    <!-- <?php require('../../assets/php/commonFooter.php')?> -->
</body>
</html>