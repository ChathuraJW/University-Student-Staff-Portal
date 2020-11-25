<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="../../assets/css/gridSystem.css">
    <link rel="stylesheet"  href="assets/addNotificationView.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>

<body>
    <!-- include header section -->
    <?php require('../../assets/php/basicLoader.php')?>
    <?php BasicLoader::loadHeader('../../')?>
    
    <div class="featureBody">
        <form id="form" method ="post" class="container">
            <div class="row col-1">
                <p class="heading">Announcements</p>
            </div>
            <div>
                <label class="subHeading">Announcement for:</label>
            </div>
            <div>
                <div>
                    <input type="checkbox" class="check" id="checkAll" value="">
                    <label for="checkAll">All</label>
                </div>
                <div>
                    <input type="checkbox" class="checkFirstSet" id="checkAcademicStaff" value="">
                    <label for="checkAcademicStaff">Academic Staff</label>
                </div>
                <div>
                    <input type="checkbox" class="checkFirstSet" id="checkAcademicSupport" value="">
                    <label for="checkAcademicSupport">Academic Support Staff</label>
                </div>
                <div>
                    <input type="checkbox" id="checkAdministrative" class="checkFirstSet" value="">
                    <label for="checkAdministrative">Administrative Staff</label>
                </div>
                <div>
                    <input type="checkbox" class="checkFirstSet" id="checkStudent" value="">
                    <label for="checkStudent">Student</label>
                </div>
                <div class="row col-4">
                    <div>
                        <input type="checkbox" class="checkSecondSet" id="checkFirstYear" value="">
                        <label for="checkFirstYear">First Year</label>
                        <div>
                            <div>
                                <input type="checkbox" class="checkThirdSet" id="check1CSGroup1" value="">
                                <label for="check1CSGroup1">CS Group 1</label>
                            </div>
                            <div>
                                <input type="checkbox" class="checkThirdSet" id="check1CSGroup2" value="">
                                <label for="check1CSGroup2">CS Group 2</label>
                            </div>
                            <div>
                                <input type="checkbox" class="checkThirdSet" id="check1IS" value="">
                                <label for="check1IS">IS</label>
                            </div>
                        </div>
                    </div>
                    <div>
                        <input type="checkbox" class="checkSecondSet" id="CheckSecondYear" value="">
                        <label for="CheckSecondYear">Second Year</label>
                        <div>
                            <div>
                                <input type="checkbox" class="checkThirdSet" id="check2CSGroup1" value="">
                                <label for="check2CSGroup1">CS Group 1</label>
                            </div>
                            <div>
                                <input type="checkbox" class="checkThirdSet" id="check2CSGroup2" value="">
                                <label for="check2CSGroup2">CS Group 2</label>
                            </div>
                            <div>
                                <input type="checkbox" class="checkThirdSet" id="check2IS" value="">
                                <label for="check2IS">IS</label>
                            </div>
                        </div>
                    </div>
                    <div>
                        <input type="checkbox" class="checkSecondSet" id="CheckThirdYear" value="">
                        <label for="CheckThirdYear">Third Year</label>
                        <div>
                            <div>
                                <input type="checkbox" class="checkThirdSet" id="check3CSGroup1" value="">
                                <label for="check3CSGroup1">CS</label>
                            </div>
                            <div>
                                <input type="checkbox" class="checkThirdSet" id="check3IS" value="">
                                <label for="check3IS">IS</label>
                            </div>
                        </div>
                    </div>
                    <div>
                        <input type="checkbox" class="checkSecondSet" id="CheckFourthYear" value="">
                        <label for="CheckFourthYear">Fourth Year</label>
                        <div>
                            <div>
                                <input type="checkbox" class="checkThirdSet" id="check4CS" value="">
                                <label for="check4CS">CS</label>
                            </div>
                            <div>
                                <input type="checkbox" class="checkThirdSet" id="check4IS" value="">
                                <label for="check4IS">IS</label>
                            </div>
                            <div>
                                <input type="checkbox" class="checkThirdSet" id="check4SE" value="">
                                <label for="check4IS">SE</label>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div><label class="subHeading" id="category">Category:</label></div>
            <div class="radioToolbar row col-5" >
                <div>
                    <input value="1" type="radio"  id = "radioDirectorNotices" name="category">
                    <label class ="" for = "radioDirectorNotices">Director Notices</label>
                </div>
                <div>
                    <input value="2" type="radio"  id = "radioSocial&Events" name="category">
                    <label class ="" for = "radioSocial&Events">Social & Events</label>
                </div>
                <div>
                    <input value="3" type="radio"  id = "radioFundraisingEvents" name="category">
                    <label class ="" for = "radioFundraisingEvents">Fundraising Events</label>
                </div>
                <div>
                    <input value="4" type="radio"  id = "radioAdministrative&Exam" name="category">
                    <label class ="" for = "radioAdministrative&Exam">Administrative & Exam</label>
                </div>
                <div>
                    <input value="5" type="radio"  id = "radioAssignmentScholarship&LectureRe-scheduling" name="category">
                    <label class ="" for = "radioAssignmentScholarship&LectureRe-scheduling">Assignment, Scholarship & Lecture Re-scheduling</label>
                </div>

            </div>
                <div class="row col-1">
                    <textarea class="textareaStyle" name="title" rows="1" cols="130" placeholder="title"></textarea>
                </div>
                <div class="row col-1">
                    <textarea class="textareaStyle" name="message" rows="7" cols="130" placeholder="message"></textarea>
                </div>
                <div class="row col-2">
                        <div class="buttonContainer">
                            <button class="submitButton red"><i class="fa fa-ban" aria-hidden="true"></i> Cancel</button>
                        </div>
                        <div class="buttonContainer">
                            <button class="submitButton green" type="submit" ><i class="fa fa-upload" aria-hidden="true"></i> Send</button>
                        </div>
                    </div>
                </div>



        </form>
    </div>
    <!-- include footer section -->
    <?php BasicLoader::loadFooter('../../')?>
    <script src="../assets/js/jquery.js"></script>
    <script src="assets/addNotification.js"></script>
</body>
</html>