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
<?php require('../../assets/php/basicLoader.php') ?>
<!-- include header section -->
<?php BasicLoader::loadHeader('../../');?>
<!-- feature body section -->
<div class="featureBody bodyBackground text">
    <h1 class="heading">Upload Board Confirmed Exam Result</h1>
    <div class="row" id="mainSection">
        <div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row col-3">
                    <div class="showRadio">
                        <span>Examination for</span>
                        <div class="radioValue">
                            <input type="radio" name="examinationName" id="examination1Y" value="1"
                                   onclick="selectedYear(1)" required>
                            <label for="examination1Y">1<sup>st</sup> Year</label>
                        </div>
                        <br>
                        <div class="radioValue">
                            <input type="radio" name="examinationName" id="examination2Y" value="2"
                                   onclick="selectedYear(2)" required>
                            <label for="examination2Y">2<sup>st</sup> Year</label>
                        </div>
                        <br>
                        <div class="radioValue">
                            <input type="radio" name="examinationName" id="examination3Y" value="3"
                                   onclick="selectedYear(3)" required>
                            <label for="examination3Y">3<sup>st</sup> Year</label>
                        </div>
                        <br>
                        <div class="radioValue">
                            <input type="radio" name="examinationName" id="examination4Y" value="4"
                                   onclick="selectedYear(4)" required>
                            <label for="examination4Y">4<sup>st</sup> Year</label>
                        </div>
                    </div>
                    <div class="showRadio">
                        <span>Semester</span>
                        <div class="radioValue">
                            <input type="radio" name="semester" id="semester1" value="1" onclick="selectSemester(1);"
                                   required>
                            <label for="semester1">1<sup>st</sup> Semester</label>
                        </div>
                        <br>
                        <div class="radioValue">
                            <input type="radio" name="semester" id="semester2" value="2" onclick="selectSemester(2);"
                                   required>
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
                <div class="row col-4" id="dropDownSection">
                    <div class="showRest">
                        <span>Subject <button style="background: none;color: var(--fontColor);" onclick="location.reload();"><i class="fas fa-sync"></i></button></span>
                        <select name="subject" id="subject" required>
                            <?php
//	                            create subject dropdown
                                foreach ($controllerData as $data){
                                    echo ("<option value='".$data->getCourseCode()."'>".$data->getSemester().". ".$data->getName()."</option>");
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
                        <span>CSV Formatted Result Dataset</span>
                        <label for="resultFile" class="fileLabel" id="resultFileLabel">Upload Result Data File</label>
                        <input type="file" name="resultFile" id="resultFile" required><br>
                    </div>
                </div>
                <br>
                <div class="row col-1">
                    <div class="showRest row col-2" id="actionSection">
                        <input type="submit" value="Upload Result" name="submit" id="submit" class="button" onclick="confirmMessage('Are you sure that ' +
                         'all ' +
                         'parameters are set correctly? After you done this operation, you can not recover it again. So please double check again ' +
                          'all data as well as the student results.' +
                         '')">
                        <input type="reset" value="Cancel" name="cancel" id="cancel" class="button" onclick="location.reload()">
                    </div>
                </div>
            </form>
        </div>

        <div id="displayResultSection">
            <span>Check the result again that you uploaded before process further.</span>
            <div class="searchSection">
                <span id="entryCount"></span>
                <input type="search" id="searchKey" onkeyup="searchOnTable();" placeholder="Search...">
            </div>
            <table class="resultTable" id="dataList">
                <tr>
                    <th>Serial No</th>
                    <th>Index Number</th>
                    <th>Result</th>
                </tr>

            </table>
        </div>
    </div>
</div>

<!-- include footer section -->
<?php BasicLoader::loadFooter('../../');?>
<script src="../../assets/js/jquery.js"></script>
<script src="../../assets/js/toast.js"></script>
<script src="assets/addResult.js"></script>
</body>
</html>