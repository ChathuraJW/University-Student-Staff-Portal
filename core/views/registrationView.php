<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="assets/registrationStyles.css">
    <!-- <link rel="stylesheet" href="assets/css/fontawesome-free-5.15.1-web/css/all.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/gridSystem.css">
</head>
        
<body>
    
<?php $records=$controllerData;
foreach($records as $record){
    if($record['gender']=='M'){
        $gender='Male';
    }else{
        $gender='Female';
    }
    }
    
?> 

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
            <form action=""  method="post" name="form">
                <div id="pwd" class="forms password"  >

                    <div class="row col-1">
                        <h2 class="heading">Change Password </h2>

                    </div>
                    
                    <div class="inputs">
                        
                        <div class="row col-2 input">
                            <div><label for="psw"><b>New Password</b></label></div>
                            <div class="data"> 
                                <input style="margin-bottom:55px;" class="inputField" type="password" placeholder="Enter Password" name="psw" id="psw">    <i class="fa fa-question-circle pswIconF" id="pswIconF" onmouseover="visible('pswError1')" aria-hidden="true"><div style="visibility:hidden;" class="messagetext" id="pswError1">Filling is required and LowerCase, UpperCase, Number, special Character must include and length must > or = 8 </div></i>
                                
                                <br>
                                
                            </div>
                            
                            <!-- Filling this field is required ! -->
                        </div>
                        
                        <div class="row col-2 input">
                            <div><label for="psw-repeat"><b>Repeat Password</b></label></div>
                            <div>
                                <input style="" class="inputField" type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat">   <i class="fa fa-question-circle pswIconR" onmouseover="visible('pswError2')" aria-hidden="true"><div style="visibility:hidden;" class="messagetext" id="pswError2">Filling is required and Equal to first password  </div></i><br>

                            </div>
                            
                        </div>
                    

                        <div class="row col-2">
                            <div></div>
                            <div><input class="button next" type="button" onclick="validateForm()"  name="next" value="NEXT"></div>
                        </div>
                    </div>
                </div>
                    
                <div id="bsc" class="forms basic" style="display:none;" >

                   <!-- GET DATA FROM USER TABLE-->
                    <div class="row col-1">
                        <h2 class="heading">Basic Information</h2>
                        
                    </div>
                    <div class="inputs basicInputs">
                        
                        <div class="row col-1 input">
                            
                            <div><label for="fName"><b>First Name</b></label></div>
                            <div><input class="inputField normalFields" type="text" placeholder="Enter Name"  name="fName" id="fName" <?php echo "value='".$record['firstName']."'"?> required>    <i class="fa fa-question-circle pswIconF" onmouseover="visible('fNameMsg')" aria-hidden="true"><div style="visibility:hidden;" class="messagetext" id="fNameMsg">Ex Chathura Janaranjana  </div></i><br>
                            
                            </div>
                        </div>
                        
                        <div class="row col-1 input">
                            
                            <div><label for="lName"><b>Last Name</b></label></div>
                            <div><input class="inputField normalFields" type="text" placeholder="Enter Name" name="lName" id="lName" <?php echo "value='".$record['lastName']."'"?> required>    <i class="fa fa-question-circle pswIconF" onmouseover="visible('lNameMsg')" aria-hidden="true"><div style="visibility:hidden;" class="messagetext" id="lNameMsg"> Ex Wanniarachchi</div></i><br>

                        </div>
                        </div>
                        <div class="row col-1 input">
                            
                            <div><label for="fullName"><b>Full Name</b></label></div>
                            <div><input class="inputField normalFields" type="text" placeholder="Enter Name" name="fullName" id="fullName" <?php echo "value='".$record['fullName']."'"?> required>   <i class="fa fa-question-circle pswIconF" onmouseover="visible('fullNameMsg')" aria-hidden="true"><div style="visibility:hidden;" class="messagetext" id="fullNameMsg"> Ex Wanniarachchilage Chathura Janaranjana Wanniarachchi</div></i><br><br>
                            
                            </div>

                        </div>
                        <div class="row col-2 input">
                            <div >
                                
                                <div><label for="gender"><b>Gender</b></label></div>
                                <div>
                                    <input style="width:90%" class="inputField normalFields" list="types" placeholder="Gender" name="gender" id="gender" <?php echo "value='".$gender."'"?> required>   <i class="fa fa-question-circle pswIconF" onmouseover="visible('genderMsg')" aria-hidden="true"><div style="visibility:hidden;" class="messagetext" id="genderMsg"> Ex Wanniarachchi</div></i><br><br>

                                </div>
                                <datalist id="types">
                                    <option data-value="1">Male</option>
                                    <option data-value="2">Female</option>
                                </datalist> <br>
                            </div>
                            <div >
                                
                                <div><label for="occupation"><b>Salutation</b></label></div>
                                <div>
                                    <input style="width:90%" class="inputField normalFields" list="role" placeholder="Occupation" name="occupation" id="occupation" <?php echo "value='".$record['salutation']."'"?> required>   <i class="fa fa-question-circle pswIconF" onmouseover="visible('salutationMsg')" aria-hidden="true"><div style="visibility:hidden;" class="messagetext" id="salutationMsg"> Choose from dropdown</div></i><br><br>

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
                                
                                <div><label for="nic"><b>NIC</b></label></div>
                                <div >
                                    <input style="width:90%;" class="inputField normalFields" type="text" placeholder="Enter NIC" name="nic" id="nic" <?php echo "value='".$record['nic']."'"?> required> <i class="fa fa-question-circle pswIconF" onmouseover="visible('nicMsg')" aria-hidden="true"><div style="visibility:hidden;" class="messagetext" id="nicMsg"> Required information</div></i>
                                    
                                </div>
                            </div>
                            <div>
                                
                                <div><label for="dob"><b>DOB</b></label></div>
                                <div >
                                    <input style="width:90%;" class="inputField normalFields" type="date" placeholder="Enter DOB" name="dob" id="dob" <?php echo "value='".$record['dob']."'"?> required> <i class="fa fa-question-circle pswIconF" onmouseover="visible('dobMsg')" aria-hidden="true"><div style="visibility:hidden;" class="messagetext" id="dobMsg"> Required information</div></i>
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
                            
                            <div><label for="tele"><b>Telephone</b></label></div>
                            <div><input class="inputField normalFields" type="text" placeholder="Enter Telephone number" name="tele" id="tele" required>  <i class="fa fa-question-circle pswIconF" onmouseover="visible('teleMsg')" aria-hidden="true"><div style="visibility:hidden;" class="messagetext" id="teleMsg"> Required information</div></i><br>

                        </div>
                        </div>
                        <div class="row col-1 input">
                            
                            <div><label for="address"><b>Address</b></label></div>
                            <div><input class="inputField normalFields" type="text" placeholder="Enter Address" name="address" id="address" <?php echo "value='".$record['address']."'"?> required>  <i class="fa fa-question-circle pswIconF" onmouseover="visible('addressMsg')" aria-hidden="true"><div style="visibility:hidden;" class="messagetext" id="addressMsg"> Required information</div></i><br>

                        </div>
                        </div>
                        <div class="row col-2 input">
                            <div>
                                
                                <div><label for="email"><b>Personal Email</b></label></div>
                                <div><input style="width:90%;"class="inputField normalFields" type="email" placeholder="Enter Personal Email" name="email" id="email" <?php echo "value='".$record['personalEmail']."'"?> required>  <i class="fa fa-question-circle pswIconF" onmouseover="visible('emailMsg')" aria-hidden="true"><div style="visibility:hidden;" class="messagetext" id="emailMsg"> Required information</div></i><br>

                            </div>
                            </div>
                            <div>
                                
                                <div><label for="uniMail"><b>University Email</b></label></div>
                                <div><input style="width:90%;" class="inputField normalFields" type="email" placeholder="Enter University Email" name="uniMail" id="uniMail" <?php echo "value='".$record['universityEmail']."'"?>>  <i class="fa fa-question-circle pswIconF" onmouseover="visible('uniMailMsg')" aria-hidden="true"><div style="visibility:hidden;" class="messagetext" id="uniMailMsg"> Enter Valid Input</div></i><br>
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
                            <div><input class="button next" type="submit" name="submit" value="submit"></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="pages" id="pages" check="1">
            <span id="page1" class="pageNumber">1</span>
            <span id="page2"class="pageNumber">2</span>
            <span id="page3"class="pageNumber">3</span>
            <span id="page4"class="pageNumber">4</span>
            
        </div>
        
    </div>
    
    <script >
        if(document.getElementById("pages").getAttribute('check') == 1){
            document.getElementById("page1").style.backgroundColor="rgb(194, 192, 192,0.4)";
        }
        if(document.getElementById("pages").getAttribute('check') == 2){
            document.getElementById("page2").style.backgroundColor="rgb(194, 192, 192,0.4)";
        }
        if(document.getElementById("pages").getAttribute('check') == 3){
            document.getElementById("page3").style.backgroundColor="rgb(194, 192, 192,0.4)";
        }
        if(document.getElementById("pages").getAttribute('check') == 4){
            document.getElementById("page4").style.backgroundColor="rgb(194, 192, 192,0.4)";
        }

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
                        if(/[^A-Za-z' ']/.test(fullName)){
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
                    document.getElementById("pages").setAttribute('check', 2);
                    
                    // document.write(document.getElementById("pages").getAttribute('check'));
                    document.getElementById("bsc").style.display="";            
                    // document.getElementById("topic").style.display="none";            
                }
                function toCnt(){
                    document.getElementById("bsc").style.display="none";
                    document.getElementById("pages").setAttribute('check', 3);
                    document.getElementById("cnt").style.display="";            
                }
                function toImg(){
                    document.getElementById("cnt").style.display="none";
                    document.getElementById("pages").setAttribute('check', 4);
                    
                    document.getElementById("img").style.display="";            
                }
                function backPwd(){
                    document.getElementById("bsc").style.display="none";
                    document.getElementById("pages").setAttribute('check', 1);
                    document.getElementById("pwd").style.display="";
                    // document.getElementById("topic").style.display="";            
                }
                function backBsc(){
                    document.getElementById("cnt").style.display="none";
                    document.getElementById("pages").setAttribute('check', 2);
                    document.getElementById("bsc").style.display="";            
                }
                function backCnt(){
                    document.getElementById("img").style.display="none";
                    document.getElementById("pages").setAttribute('check', 3);
                    document.getElementById("cnt").style.display="";            
                }


    </script>
    

    <!-- include footer section -->
    <!-- <?php require('../../assets/php/commonFooter.php')?> -->
    <script src="assets/registrationScript.js"></script>
</body>
</html>