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
                            <input type="radio" name="examinationName" id="examinationName" value="1y">
                            <label for="1y">1<sup>st</sup> Year</label>
                        </div>
                        <div class="radioValue">
                            <input type="radio" name="examinationName" id="examinationName" value="2y">
                            <label for="2y">2<sup>st</sup> Year</label>
                        </div>
                        <div class="radioValue">
                            <input type="radio" name="examinationName" id="examinationName" value="3y">
                            <label for="3y">3<sup>st</sup> Year</label>
                        </div>
                        <div class="radioValue">
                            <input type="radio" name="examinationName" id="examinationName" value="4y">
                            <label for="4y">4<sup>st</sup> Year</label>
                        </div>
                    </td>
                    <td>
                        <span>Semester</span>
                        <div class="radioValue">
                            <input type="radio" name="semester" id="semester" value="1">
                            <label for="1">1<sup>st</sup> Semester</label>
                        </div>
                        <div class="radioValue">
                            <input type="radio" name="semester" id="semester" value="2">
                            <label for="2">2<sup>nd</sup> Semester</label>
                        </div>
                    </td>
                    <td>
                        <span>Degree program</span>
                        <div class="radioValue">
                            <input type="radio" name="degreeProgram" id="degreeProgram" value="cs">
                            <label for="cs">Computer Science</label>
                        </div>
                        <div class="radioValue">
                            <input type="radio" name="degreeProgram" id="degreeProgram" value="se">
                            <label for="se">Software Engineering</label>
                        </div>
                        <div class="radioValue">
                            <input type="radio" name="degreeProgram" id="degreeProgram" value="is">
                            <label for="is">Information Systems</label>
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