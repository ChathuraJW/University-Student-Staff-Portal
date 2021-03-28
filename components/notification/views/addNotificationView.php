<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="../../assets/css/gridSystem.css">
    <link rel="stylesheet" href="assets/addNotificationView.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>

<body>
<!-- include header section -->
<?php require('../../assets/php/basicLoader.php') ?>
<?php BasicLoader::loadHeader('../../') ?>

<div class="featureBody bodyBackground text">
    <form id="form" method="post" class="container">
        <div class="row col-1">
            <p class="heading">Announcements</p>
        </div>
        <div><label class="subHeading" id="">Title:</label></div>
        <div class="row col-1">
            <textarea class="textareaStyle" name="title" rows="1" cols="130"></textarea>
        </div>
        <div><label class="subHeading" id="">Message:</label></div>
        <div class="row col-1">
            <textarea class="textareaStyle" name="message" rows="7" cols="130"></textarea>
        </div>
        <div>
            <label class="subHeading">Announcement for:</label>
        </div>
        <div>
            <div class="divStyle">
                <input type="checkbox" class="check" id="checkAll" value="1100" name="receiverList[]">
                <label for="checkAll" class="checked">All</label>
                <span class="w3docs"></span>
            </div>
            <div class="divStyle">
                <input type="checkbox" class="checkFirstSet checkAll" id="checkAcademicStaff" value="1300" name="receiverList[]"
                       onchange="changeState();">
                <label for="checkAcademicStaff">Academic Staff</label>
            </div>
            <div class="divStyle">
                <input type="checkbox" class="checkFirstSet checkAll" id="checkAcademicSupport" value="1400" name="receiverList[]"
                       onchange="changeState();">
                <label for="checkAcademicSupport">Academic Support Staff</label>
            </div>
            <div class="divStyle">
                <input type="checkbox" id="checkAdministrative" class="checkFirstSet checkAll" value="1500" name="receiverList[]"
                       onchange="changeState();">
                <label for="checkAdministrative">Administrative Staff</label>
            </div>
            <div class="divStyle">
                <input type="checkbox" class="checkFirstSet checkAll" id="checkStudent" value="1200" name="receiverList[]" onchange="changeState();">
                <label for="checkStudent">Student</label>
            </div class="divStyle">
            <div class="row col-4">
                <div class="divStyle">
                    <input type="checkbox" class="checkSecondSet checkAll checkStudent" id="checkFirstYear" value="1210" name="receiverList[]"
                           onchange="changeState();">
                    <label for="checkFirstYear">First Year</label>
                    <div class="divStyle">
                        <div class="divStyle">
                            <input type="checkbox" class="checkThirdSet checkAll checkStudent checkFirstYear" id="check1CSGroup1" value="1211"
                                   name="receiverList[]" onchange="changeState();">
                            <label for="check1CSGroup1">CS Group 1</label>
                        </div>
                        <div class="divStyle">
                            <input type="checkbox" class="checkThirdSet checkAll checkStudent checkFirstYear" id="check1CSGroup2" value="1212"
                                   name="receiverList[]" onchange="changeState();">
                            <label for="check1CSGroup2">CS Group 2</label>
                        </div>
                        <div class="divStyle">
                            <input type="checkbox" class="checkThirdSet checkAll checkStudent checkFirstYear" id="check1IS" value="1213"
                                   name="receiverList[]" onchange="changeState();">
                            <label for="check1IS">IS</label>
                        </div>
                    </div>
                </div>
                <div class="divStyle">
                    <input type="checkbox" class="checkSecondSet checkAll checkStudent" id="checkSecondYear " value="1220" name="receiverList[]"
                           onchange="changeState();">
                    <label for="checkSecondYear ">Second Year</label>
                    <div>
                        <div class="divStyle">
                            <input type="checkbox" class="checkThirdSet checkAll checkStudent checkSecondYear" id="check2CSGroup1" value="1221"
                                   name="receiverList[]" onchange="changeState();">
                            <label for="check2CSGroup1">CS Group 1</label>
                        </div>
                        <div class="divStyle">
                            <input type="checkbox" class="checkThirdSet checkAll checkStudent checkSecondYear" id="check2CSGroup2" value="1222"
                                   name="receiverList[]" onchange="changeState();">
                            <label for="check2CSGroup2">CS Group 2</label>
                        </div class="divStyle">
                        <div class="divStyle">
                            <input type="checkbox" class="checkThirdSet checkAll checkStudent checkSecondYear" id="check2IS" value="1223"
                                   name="receiverList[]" onchange="changeState();">
                            <label for="check2IS">IS</label>
                        </div>
                    </div>
                </div>
                <div class="divStyle">
                    <input type="checkbox" class="checkSecondSet checkAll checkStudent " id="checkThirdYear" value="1230" name="receiverList[]"
                           onchange="changeState();">
                    <label for="checkThirdYear">Third Year</label>
                    <div>
                        <div class="divStyle">
                            <input type="checkbox" class="checkThirdSet checkAll checkStudent checkThirdYear" id="check3CSGeneral" value="1231"
                                   name="receiverList[]" onchange="changeState();">
                            <label for="check3CSGeneral">CS General</label>
                        </div>
                        <div class="divStyle">
                            <input type="checkbox" class="checkThirdSet checkAll checkStudent checkThirdYear" id="check3CSGSpecial" value="1232"
                                   name="receiverList[]" onchange="changeState();">
                            <label for="check3CSGSpecial">CS Special</label>
                        </div>
                        <div class="divStyle">
                            <input type="checkbox" class="checkThirdSet checkAll checkStudent checkThirdYear" id="check3SESpecial" value="1233"
                                   name="receiverList[]" onchange="changeState();">
                            <label for="check3SESpecial">SE Special</label>
                        </div>
                        <div class="divStyle">
                            <input type="checkbox" class="checkThirdSet checkAll checkStudent checkThirdYear " id="check3ISGeneral" value="1234"
                                   name="receiverList[]" onchange="changeState();">
                            <label for="check3ISGeneral">IS General</label>
                        </div>
                        <div class="divStyle">
                            <input type="checkbox" class="checkThirdSet checkAll checkStudent checkThirdYear " id="check3ISSpecial" value="1235"
                                   name="receiverList[]" onchange="changeState();">
                            <label for="check3ISSpecial">IS Special</label>
                        </div>
                    </div>
                </div>
                <div class="divStyle">
                    <input type="checkbox" class="checkSecondSet checkAll checkStudent" id="checkFourthYear" value="1240" name="receiverList[]"
                           onchange="changeState();">
                    <label for="checkFourthYear">Fourth Year</label>
                    <div>
                        <div class="divStyle">
                            <input type="checkbox" class="checkThirdSet checkAll checkStudent checkFourthYear" id="check4CS" value="1241"
                                   name="receiverList[]" onchange="changeState();">
                            <label for="check4CS">CS</label>
                        </div>
                        <div class="divStyle">
                            <input type="checkbox" class="checkThirdSet checkAll checkStudent checkFourthYear" id="check4IS" value="1242"
                                   name="receiverList[]" onchange="changeState();">
                            <label for="check4IS">IS</label>
                        </div>
                        <div class="divStyle">
                            <input type="checkbox" class="checkThirdSet  checkStudent checkFourthYear checkAll" id="check4SE" value="1243"
                                   name="receiverList[]" onchange="changeState();">
                            <label for="check4SE">SE</label>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row col-2">
            <div><label class="subHeading" id="category">Category:</label>
                <div class="radioToolbar row col-3">
                    <div>
                        <input value="3" type="radio" id="radioDirectorNotices" name="category">
                        <label class="category" for="radioDirectorNotices">Director Notices</label>
                    </div>
                    <div>
                        <input value="2" type="radio" id="radioSocial&Events" name="category">
                        <label class="category" for="radioSocial&Events">Social & Events</label>
                    </div>
                    <div>
                        <input value="4" type="radio" id="radioFundraisingEvents" name="category">
                        <label class="category" for="radioFundraisingEvents">Fundraising Events</label>
                    </div>
                    <div>
                        <input value="5" type="radio" id="radioAdministrative&Exam" name="category">
                        <label class="category" for="radioAdministrative&Exam">Administrative & Exam</label>
                    </div>
                    <div>
                        <input value="1" type="radio" id="radioAssignmentScholarship&LectureRe-scheduling" name="category">
                        <label class="special" for="radioAssignmentScholarship&LectureRe-scheduling">Assignment, Scholarship & Lecture
                            Re-scheduling</label>
                    </div>
                    <div>
                        <input value="7" type="radio" id="other" name="category">
                        <label class="category" for="other">Other</label>
                    </div>
                </div>
            </div>
            <div class="weeks">
                <label for="weeks" class="subHeading">Weeks:</label><br>
                <input type="number" id="weeks" name="weeks"><br>
                <label class="message">*Notification appearing time period in weeks. </label>
            </div>
        </div>


        <div class="buttonCouple">
            <button class="button" type="submit" name="send"> Send</button>
            <button type="reset" class="button "> Cancel</button>
        </div>
    </form>
</div>
<!-- include footer section -->
<?php BasicLoader::loadFooter('../../') ?>
<script src="../../assets/js/jquery.js"></script>
<script src="assets/addNotification.js"></script>
<script src="../../assets/js/toast.js"></script>
<script src="../../assets/js/changeTheme.js"></script>

</body>
</html>