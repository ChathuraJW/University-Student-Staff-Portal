<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="../../assets/css/gridSystem.css">
    <link rel="stylesheet" href="assets/resultSection.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>
<body>
<!-- include header section -->
<?php require('../../assets/php/commonHeader.php') ?>

<!-- feature body section -->
<div class="featureBody">
    <div class="row col-1">
        <div>
            <h1 class="heading">Send Raw Result to Examination SAR</h1>
        </div>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="row col-3">
            <div class="showRadio">
                <span>Examination for</span>
                <div class="radioValue">
                    <input type="radio" name="examinationName" id="examination1Y" value="1" onclick="selectedYear(1);" required>
                    <label for="examination1Y">1<sup>st</sup> Year</label>
                </div>
                <br>
                <div class="radioValue">
                    <input type="radio" name="examinationName" id="examination2Y" value="2" onclick="selectedYear(2);" required>
                    <label for="examination2Y">2<sup>st</sup> Year</label>
                </div>
                <br>
                <div class="radioValue">
                    <input type="radio" name="examinationName" id="examination3Y" value="3" onclick="selectedYear(3);" required>
                    <label for="examination3Y">3<sup>st</sup> Year</label>
                </div>
                <br>
                <div class="radioValue">
                    <input type="radio" name="examinationName" id="examination4Y" value="4" onclick="selectedYear(4);" required>
                    <label for="examination4Y">4<sup>st</sup> Year</label>
                </div>
            </div>
            <div class="showRadio">
                <span>Semester</span>
                <div class="radioValue">
                    <input type="radio" name="semester" id="semester1" value="1" onclick="selectSemester(1)" required>
                    <label for="semester1">1<sup>st</sup> Semester</label>
                </div>
                <br>
                <div class="radioValue">
                    <input type="radio" name="semester" id="semester2" value="2" onclick="selectSemester(2)" required>
                    <label for="semester2">2<sup>nd</sup> Semester</label>
                </div>
                <br>
            </div>
            <div class="showRadio">
                <span>Attempt</span>
                <div class="radioValue">
                    <input type="radio" name="attempt" id="attemptOne" value="F" required>
                    <label for="attemptOne">1<sup>st</sup> Attempt</label>
                </div>
                <br>
                <div class="radioValue">
                    <input type="radio" name="attempt" id="attemptRep" value="R" required>
                    <label for="attemptRep">Repeated Attempt<sup></sup></label>
                </div>
            </div>
        </div>
        <br>
        <div class="row col-4">
            <div class="showRest">
                <span>Subject <button onclick="location.reload();"><i class="fas fa-sync"></i></button></span>
                <select name="subject" id="subject" required>
                    <?php
                    foreach ($controllerData as $data){
                        $year=ceil($data[semester]/2) -1;
                        $semester=($data[semester]%2) ? 0 : 1 ;
                        $semList=Array(Array(1,2),Array(3,4),Array(5,6),Array(7,8));
                        echo ("<option value='$data[courseCode]'>".$semList[$year][$semester].". $data[name]</option>");
                    }
                    ?>
                </select>
            </div>
            <div class="showRest">
                <span>Examination Year</span>
                <select name="examinationYear" id="examinationYear" required>
                </select>
            </div>
            <div class="showRest">
                <span>Batch</span>
                <select name="batch" id="batch" required>
                </select>
            </div>
            <div class="showRest">
                <span>Result Dataset</span>
                <label for="rawResultFile" class="fileLabel" id="rawResultFileLabel">Upload System Genarated File</label>
                <input type="file" name="rawResultFile" id="rawResultFile" required><br>
            </div>
        </div>
        <br>
        <div class="row col-1">
            <div class="showRest row col-2" id="actionSection">
                <div><input type="submit" value="Submit to SAR" name="submit" id="submit" class="submitCancelButton"
                            style="background-color: rgb(23, 193, 23);"></div>
                <div><input type="reset" value="Cancel" name="cancel" id="cancel" class="submitCancelButton"
                            style="background-color: rgb(255,0,0);"></div>
            </div>
        </div>
    </form>
</div>

<!-- include footer section -->
<?php require('../../assets/php/commonFooter.php') ?>
<script src="assets/addRawResult.js"></script>

</body>
</html>
