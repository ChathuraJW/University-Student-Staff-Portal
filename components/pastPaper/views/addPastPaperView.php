<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="../../assets/css/gridSystem.css">
    <link rel="stylesheet"  href="assets/addPastPaper.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>

<body>
    <!-- include header section -->
    <?php require('../../assets/php/basicLoader.php')?>
    <?php BasicLoader::loadHeader('../../')?>
    
    <div class="featureBody bodyBackground text">
        <div class="row col-1">
            <P class="heading">Add PastPaper</P>
        </div>
        <form method="post">
            <div class="row col-2">
                <div class="row col-2">
                    <div>
                        <label class="labelStyle">Examination Year:</label><br>
                        <select name="examinationYear">
                            <option value=2016>2016</option>
                            <option value=2017>2017</option>
                            <option value=2018>2018</option>
                            <option value=2019>2019</option>
                        </select>
                    </div>
                    <div>
                        <label class="labelStyle">Academic Year:</label><br>
                        <select name="academicYear">
                            <option value=1>First Year</option>
                            <option value=2>Second Year</option>
                            <option value=3>Third Year</option>
                            <option value=4>Fourth Year</option>
                        </select>
                    </div>
                    <div>
                        <label class="labelStyle">Semester:</label><br>
                        <select  name="semester">
                            <option value=1>First Semester</option>
                            <option value=2>Second Semester</option>
                        </select>
                    </div>
                    <div>
                        <label class="labelStyle">Subject:</label><br>
                        <select name="subject">
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
                <div id="dropZone" class="dropZone row col-1">
                    <span  class="dropZonePrompt" id="fileInputLabel">Drop file here or click to upload</span>
                    <input type="file" name="myFile" id="fileInput" class="dropZoneInput">
                </div>
            </div>
            <div class="buttonCouple">
                <button class="button" name="reset"> Cancel</button>
                <button class="button" type="submit" name="upload" > Upload</button>
            </div>
        </form>

            </div>


    <!-- include footer section -->
    <?php BasicLoader::loadFooter('../../')?>
    <script src="../../assets/js/jquery.js"></script>
    <script src="../../assets/js/toast.js"></script>
    <script src="assets/addPastPaper.js"></script>
</body>
</html>