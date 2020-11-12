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
            <form action=""  method="post" name="form">
                <div id="pwd" class="forms password" style="display:none;" >

                    <div class="row col-1">
                        <h2 class="heading">User Password </h2>

                    </div>
                    
                    <div class="inputs">
                        
                        <div class="row col-2 input">
                            <div><label for="psw"><b>Password</b></label></div>
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
                    
                <div id="bsc" class="forms basic"  >

                <?php $records=$controllerData;?>    <!-- GET DATA FROM USER TABLE-->
                    <div class="row col-1">
                        <h2 class="heading">Basic Information</h2>
                        
                    </div>
                    <div class="inputs basicInputs">
                        
                        <div class="row col-1 input">
                            
                            <div><label for="fName"><b>First Name</b></label></div>
                            <div><input class="inputField normalFields" type="text" placeholder="Enter Name" <?php echo "value='".$records['firstName']."'"?> name="fName" id="fName" required>    <i class="fa fa-question-circle pswIconF" onmouseover="visible('fNameMsg')" aria-hidden="true"><div style="visibility:hidden;" class="messagetext" id="fNameMsg">Ex Chathura Janaranjana  </div></i><br>
                            
                            </div>
                        </div>
                        
                        <div class="row col-1 input">
                            
                            <div><label for="lName"><b>Last Name</b></label></div>
                            <div><input class="inputField normalFields" type="text" placeholder="Enter Name" name="lName" id="lName" required>    <i class="fa fa-question-circle pswIconF" onmouseover="visible('lNameMsg')" aria-hidden="true"><div style="visibility:hidden;" class="messagetext" id="lNameMsg"> Ex Wanniarachchi</div></i><br>

                        </div>
                        </div>
                        <div class="row col-1 input">
                            
                            <div><label for="fullName"><b>Full Name</b></label></div>
                            <div><input class="inputField normalFields" type="text" placeholder="Enter Name" name="fullName" id="fullName" required>   <i class="fa fa-question-circle pswIconF" onmouseover="visible('fullNameMsg')" aria-hidden="true"><div style="visibility:hidden;" class="messagetext" id="fullNameMsg"> Ex Wanniarachchilage Chathura Janaranjana Wanniarachchi</div></i><br><br>
                            
                            </div>

                        </div>
                        <div class="row col-2 input">
                            <div >
                                
                                <div><label for="gender"><b>Gender</b></label></div>
                                <div>
                                    <input style="width:90%" class="inputField normalFields" list="types" placeholder="Gender" name="gender" id="gender" required>   <i class="fa fa-question-circle pswIconF" onmouseover="visible('genderMsg')" aria-hidden="true"><div style="visibility:hidden;" class="messagetext" id="genderMsg"> Ex Wanniarachchi</div></i><br><br>

                                </div>
                                <datalist id="types">
                                    <option data-value="1">Male</option>
                                    <option data-value="2">Female</option>
                                </datalist> <br>
                            </div>
                            <div >
                                
                                <div><label for="occupation"><b>Salutation</b></label></div>
                                <div>
                                    <input style="width:90%" class="inputField normalFields" list="role" placeholder="Occupation" name="occupation" id="occupation" required>   <i class="fa fa-question-circle pswIconF" onmouseover="visible('salutationMsg')" aria-hidden="true"><div style="visibility:hidden;" class="messagetext" id="salutationMsg"> Choose from dropdown</div></i><br><br>

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
                                    <input style="width:90%;" class="inputField normalFields" type="text" placeholder="Enter NIC" name="nic" id="nic" required> <i class="fa fa-question-circle pswIconF" onmouseover="visible('nicMsg')" aria-hidden="true"><div style="visibility:hidden;" class="messagetext" id="nicMsg"> Required information</div></i>
                                    
                                </div>
                            </div>
                            <div>
                                
                                <div><label for="dob"><b>DOB</b></label></div>
                                <div >
                                    <input style="width:90%;" class="inputField normalFields" type="date" placeholder="Enter DOB" name="dob" id="dob" required> <i class="fa fa-question-circle pswIconF" onmouseover="visible('dobMsg')" aria-hidden="true"><div style="visibility:hidden;" class="messagetext" id="dobMsg"> Required information</div></i>
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
                            <div><input class="inputField normalFields" type="text" placeholder="Enter Address" name="address" id="address" required>  <i class="fa fa-question-circle pswIconF" onmouseover="visible('addressMsg')" aria-hidden="true"><div style="visibility:hidden;" class="messagetext" id="addressMsg"> Required information</div></i><br>

                        </div>
                        </div>
                        <div class="row col-2 input">
                            <div>
                                
                                <div><label for="email"><b>Personal Email</b></label></div>
                                <div><input style="width:90%;"class="inputField normalFields" type="email" placeholder="Enter Personal Email" name="email" id="email" required>  <i class="fa fa-question-circle pswIconF" onmouseover="visible('emailMsg')" aria-hidden="true"><div style="visibility:hidden;" class="messagetext" id="emailMsg"> Required information</div></i><br>

                            </div>
                            </div>
                            <div>
                                
                                <div><label for="uniMail"><b>University Email</b></label></div>
                                <div><input style="width:90%;" class="inputField normalFields" type="email" placeholder="Enter University Email" name="uniMail" id="uniMail">  <i class="fa fa-question-circle pswIconF" onmouseover="visible('uniMailMsg')" aria-hidden="true"><div style="visibility:hidden;" class="messagetext" id="uniMailMsg"> Enter Valid Input</div></i><br>
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
    </div>
    <script src="../assets/registrationScript.js">
    </script>
    

    <!-- include footer section -->
    <!-- <?php require('../../assets/php/commonFooter.php')?> -->
</body>
</html>