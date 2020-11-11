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
    
    <div class="featureBody">
        <form>
            <div class="row col-1">
                <p class="heading">PastPapers</p>
            </div>
            <div class="row col-2">
                <div>
                    <div class="row col-2">
                        <div>
                            <label class="labelStyle">Examination Year:</label>
                            <select name="examinationYear">
                                <option value=2016>2016</option>
                                <option value=2017>2017</option>
                                <option value=2018>2018</option>
                                <option value=2019>2019</option>
                            </select>
                        </div>
                        <div>
                            <label class="labelStyle">Academic Year:</label>
                            <select name="academicYear">
                                <option value=1>1<sup>st</sup>Year</option>
                                <option value=2>1<sup>nd</sup>Year</option>
                                <option value=3>1<sup>rd</sup>Year</option>
                                <option value=4>1<sup>th</sup>Year</option>
                            </select>
                        </div>
                    </div>
                    <div class="row col-2">
                        <div>
                            <label class="labelStyle">Semester:</label>
                            <select name="semester">
                                <option value=1>1<sup>st</sup></option>
                                <option value=2>2<sup>nd</sup></option>
                            </select>
                        </div>
                        <div>
                            <label class="labelStyle">Subject:</label>
                            <select name="subject">
                                <option value="SCS2209">Database 2</option>
                                <option value="SCS2210">Discrete Maths 2</option>
                            </select>
                        </div>
                    </div>
                    <div class="row col-2">
                        <div>
                            <button class="submitButton red"><i class="fa fa-ban" aria-hidden="true"></i> Cancel</button>
                        </div>
                        <div>
                            <button class="submitButton green"type="submit" ><i class="fa fa-search" aria-hidden="true"></i> Search</button>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="row col-1" id="searchDetail">
                        <label class="labelStyle" >Search Results:</label>
                        <hr>
                        <div style="overflow: hidden" class="row col-1">
                            <a class="subjectName" href="#"><span >SCS2201 - Data Structures and algorithm</span></a>
                            <a class="pastPapers" href="#">  <i class="fa fa-download" aria-hidden="true"></i></a>
                            
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </form>


    </div>
    <!-- include footer section -->
    <?php BasicLoader::loadFooter('../../')?>
    <script src="assets/addPastPaper.js"></script>
</body>
</html>