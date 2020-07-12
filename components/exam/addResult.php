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
    <?php require('../../assets/php/commonHeader.php')?>
    
    <!-- feature body section -->
    <div class="featureBody">
        <h1>Upload Board Confirmed Exam Result</h1>
        <form action="" method="post">
            <table class="showRadio">
                <tr>
                    <td>
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
                    </td>
                    <td>
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
                    </td>
                    <td>
                        <span>Degree program</span>
                        <div class="radioValue">
                            <input type="radio" name="degreeProgram" id="degreeProgramCS" value="cs">
                            <label for="degreeProgramCS">Computer Science</label>
                        </div>
                        <br>
                        <div class="radioValue">
                            <input type="radio" name="degreeProgram" id="degreeProgramSE" value="se">
                            <label for="degreeProgramSE">Software Engineering</label>
                        </div>
                        <br>
                        <div class="radioValue">
                            <input type="radio" name="degreeProgram" id="degreeProgramIS" value="is">
                            <label for="degreeProgramIS">Information Systems</label>
                        </div>
                    </td>
                </tr>
            </table>
            <table class="showRest">
                <tr>
                    <td>
                        <div class="restField">
                            <label for="examinationYear" id="labelExaminationYear">Year of examination</label>
                            <input type="text" name="examinationYear" id="examinationYear">
                        </div>
                    </td>
                    <td>
                        <div class="restField">
                            <label for="batch" id="labelBatch">Batch</label>
                            <input type="text" name="batch" id="batch"><br>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="restField">
                            <h4>CSV formatted result dataset</h4>
                            <input type="file" name="resultFile" id="resultFile"><br>
                        </div>
                    </td>
                    <td>
                        <input type="submit" value="Submit for Review" name="submit" id="submit">
                        <input type="reset" value="Cancel" name="cancel" id="cancel">
                    </td>
                </tr>
            </table>

        </form>
    </div>

    <!-- include footer section -->
    <?php require('../../assets/php/commonFooter.php')?>
    <script src="resultSection.js"></script>
</body>
</html>