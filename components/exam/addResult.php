<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="../../assets/css/gridSystem.css">
    <link rel="stylesheet" href="resultSection.css">
</head>
<body>
<!-- include header section -->
<?php require('../../assets/php/commonHeader.php') ?>

<!-- feature body section -->
<div class="featureBody">
    <h1 class="heading">Upload Board Confirmed Exam Result</h1>
    <form action="" method="post">
        <div class="row col-3">
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
        </div>
        <br>
        <div class="row col-4">
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
            <div class="showRest">
                <span>CSV Formatted Result Dataset</span>
                <label for="resultFile" class="fileLabel" id="resultFileLabel">Upload Result Data File</label>
                <input type="file" name="resultFile" id="resultFile"><br>
            </div>
        </div>
        <br>
        <div class="row col-1">
            <div class="showRest row col-2" id="actionSection">
                <div><input type="submit" value="Submit for SAR" name="submit" id="submit" class="submitCancelButton"
                            style="background-color: rgb(23, 193, 23);"></div>
                <div><input type="reset" value="Cancel" name="cancel" id="cancel" class="submitCancelButton"
                            style="background-color: rgb(255,0,0);"></div>
            </div>
        </div>
    </form>
</div>

<!-- include footer section -->
<?php require('../../assets/php/commonFooter.php') ?>
<script src="addResult.js"></script>
<script>
    //uploaded file operation
    let fileUploaded = document.getElementById("resultFile");
    let fileLabel = document.getElementById("resultFileLabel");
    fileUploaded.addEventListener("change", function () {
        if (fileUploaded.value != '') {
            console.log("File Size is(KB): " + fileUploaded.files[0].size / 1000);
            let uploadFormat = fileUploaded.value.toString().split('.')[1].toLowerCase();
            if (uploadFormat == "csv") {
                fileLabel.style.backgroundColor = "green";
            } else {
                fileLabel.style.backgroundColor = "red";
                alert("Invalid file format. Please upload csv formatted file.")
            }
        }
    })
</script>
</body>
</html>
