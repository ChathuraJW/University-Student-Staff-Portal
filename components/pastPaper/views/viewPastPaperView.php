<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="../../assets/css/gridSystem.css">
    <link rel="stylesheet"  href="assets/viewPastPaper.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>

<body>
    <!-- include header section -->
    <?php require('../../assets/php/basicLoader.php')?>
    <?php BasicLoader::loadHeader('../../')?>
    
    <div class="featureBody bodyBackground text">
        <form method="post" enctype="multipart/form-data">
            <div class="row col-1">
                <p class="heading">PastPapers</p>
            </div>
            <div class="row col-2">
                <div>
                    <div class="dropdownContainer row col-2">
                        <div>
                            <label class="labelStyle">Examination Year:</label>
                            <select name="examinationYear">
                                <option value="0"></option>
                                <option value=2016>2016</option>
                                <option value=2017>2017</option>
                                <option value=2018>2018</option>
                                <option value=2019>2019</option>
                            </select>
                        </div>
                        <div>
                            <label class="labelStyle">Academic Year:</label>
                            <select name="academicYear">
                                <option value="0"></option>
                                <option value=1>First Year</option>
                                <option value=2>Second Year</option>
                                <option value=3>Third Year</option>
                                <option value=4>Fourth Year</option>
                            </select>
                        </div>
                    </div>
                    <div class=" dropdownContainer row col-2">
                        <div>
                            <label class="labelStyle">Semester:</label>
                            <select name="semester">
                                <option value="0"></option>
                                <option value=1>First Semester</option>
                                <option value=2>Second Semester</option>
                            </select>
                        </div>
                        <div>
                            <label class="labelStyle">Subject:</label><br>
                            <select name="subject">
                                <option value="0"></option>
                                <?php
                                foreach ($controllerData[0] as $row ){
                                    echo ("
                                    <option value='".$row->getCourseCode()."'>".$row->getName()."</option>
                                ");
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="buttonCouple">
                            <button class="button" name="reset"> Cancel</button>
                            <button class="button" type="button" name="search" onclick="searchResulta();"> Search</button>
                    </div>
                </div>
                <div>
                    <div class="row col-1" id="recentDetail">
                        <label class="labelStyle" >Resent Uploads:</label>
                        <hr>
                        <div style="overflow: hidden" class="row col-5">
                            <div class="paperDetails">
                                <a class="subjectName" href="#"><span >SCS2214 - Information and system security 2019 <br> Second Year, Second Semester</span></a>
                            </div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div class="download">
                                <a class="pastPapers" href="#">  <i class="fa fa-download" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <!-- sample data -->
                        <div style="overflow: hidden" class="row col-5">
                            <div class="paperDetails">
                                <a class="subjectName" href="#"><span >SCS2201 - Data Structures and algorithm-2 2016 <br> First Year, Second Semester</span></a>
                            </div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div class="download">
                                <a class="pastPapers" href="#">  <i class="fa fa-download" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <div style="overflow: hidden" class="row col-5">
                            <div class="paperDetails">
                                <a class="subjectName" href="#"><span >SCS2213 - Electronics and physical computing 2016 <br> Second Year, Second Semester</span></a>
                            </div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div class="download">
                                <a class="pastPapers" href="#">  <i class="fa fa-download" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <div style="overflow: hidden" class="row col-5">
                            <div class="paperDetails">
                                <a class="subjectName" href="#"><span >SCS2212 - Automata Theory 2018 <br> Second Year, Second Semester</span></a>
                            </div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div class="download">
                                <a class="pastPapers" href="#">  <i class="fa fa-download" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <div style ="display:none;" class="row col-1" id="searchResult">
                        <label class="labelStyle" >Search Results:</label>
                        <hr>
                        <div style="overflow: hidden" class="row col-5">
                            <div class="paperDetails">
                                <a class="subjectName" href="#"><span >SCS2214 - Information and system security 2019 <br> Second Year, Second Semester</span></a>
                            </div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div class="download">
                                <a class="pastPapers" href="#">  <i class="fa fa-download" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>


    </div>
    <!-- include footer section -->
    <?php BasicLoader::loadFooter('../../')?>
    <script src="assets/viewPastPaper.js"></script>
</body>
</html>