<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="resultSection.css">
</head>
<body>
<!-- include header section -->
<?php require('../../assets/php/commonHeader.php') ?>

<!-- feature body section -->
<div class="featureBody">
    <h1>Upload Board Confirmed Exam Result</h1>
    <form action="" method="post">
        <div class="showRadio">
            <span>Examination for</span>
            <div class="radioValue">
                <input type="radio" name="examinationName" id="examination1Y" value="1y">
                <label for="examination1Y">1<sup>st</sup> Year</label>
            </div>
            <br>
            <div class="radioValue">
                <input type="radio" name="examinationName" id="examination2Y" value="2y">
                <label for="examination2Y">2<sup>st</sup> Year</label>
            </div>
            <br>
            <div class="radioValue">
                <input type="radio" name="examinationName" id="examination3Y" value="3y">
                <label for="examination3Y">3<sup>st</sup> Year</label>
            </div>
            <br>
            <div class="radioValue">
                <input type="radio" name="examinationName" id="examination4Y" value="4y">
                <label for="examination4Y">4<sup>st</sup> Year</label>
            </div>
        </div>
        <div class="showRadio">
            <span>Semester</span>
            <div class="radioValue">
                <input type="radio" name="semester" id="semester1" value="1">
                <label for="semester1">1<sup>st</sup> Semester</label>
            </div>
            <br>
            <div class="radioValue">
                <input type="radio" name="semester" id="semester2" value="2">
                <label for="semester2">2<sup>nd</sup> Semester</label>
            </div>
            <br>
        </div>
        <div class="showRadio">
            <span>Attempt</span>
            <div class="radioValue">
                <input type="radio" name="attempt" id="attemptOne" value="F">
                <label for="attemptOne">1<sup>st</sup> Attempt</label>
            </div>
            <br>
            <div class="radioValue">
                <input type="radio" name="attempt" id="attemptRep" value="R">
                <label for="attemptRep">Repeated Attempt<sup></sup></label>
            </div>
        </div>
        <br>
        <div class="showRest">
            <span>Subject</span>
            <select name="subject" id="subject">
            </select>
        </div>
        <div class="showRest">
            <span>Examination Year</span>
            <select name="examinationYear" id="examinationYear">
            </select>
        </div>
        <div class="showRest">
            <span>Batch</span>
            <select name="batch" id="batch">
            </select>
        </div>
        <br>
        <div class="showRest">
            <span>CSV formatted result dataset</span>
            <label for="resultFile" class="fileLabel" id="resultFileLabel">Upload Result Data File</label>
            <input type="file" name="resultFile" id="resultFile"><br>
        </div>
        <br>
        <div class="showRest" id="actionSection">
            <input type="submit" value="Submit for Review" name="submit" id="submit" class="submitCancelButton"
                   style="background-color: rgb(0,255,0);">
            <input type="reset" value="Cancel" name="cancel" id="cancel" class="submitCancelButton"
                   style="background-color: rgb(255,0,0);">
        </div>
    </form>
</div>

<!-- include footer section -->
<?php require('../../assets/php/commonFooter.php') ?>
<script src="resultSection.js"></script>
</body>
</html>