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
            <h4>Name of the examination</h4>
            <input type="radio" name="examinationName" id="examinationName" value="1y">
            <label for="1y">1<sup>st</sup> Year</label><br>
            <input type="radio" name="examinationName" id="examinationName" value="2y">
            <label for="2y">2<sup>st</sup> Year</label><br>
            <input type="radio" name="examinationName" id="examinationName" value="3y">
            <label for="3y">3<sup>st</sup> Year</label><br>
            <input type="radio" name="examinationName" id="examinationName" value="4y">
            <label for="4y">4<sup>st</sup> Year</label><br>

            <h4>Year of examination</h4>
            <input type="text" name="examinationYear" id="examinationYear">
            
            <h4>Semester</h4>
            <input type="radio" name="semester" id="semester" value="1">
            <label for="1">1<sup>st</sup> Semester</label><br>
            <input type="radio" name="semester" id="semester" value="2">
            <label for="2">2<sup>nd</sup> Semester</label><br>

            <h4>Degree program</h4>
            <input type="radio" name="degreeProgram" id="degreeProgram" value="cs">
            <label for="cs">Computer Science</label><br>
            <input type="radio" name="degreeProgram" id="degreeProgram" value="se">
            <label for="se">Software Engineering</label><br>
            <input type="radio" name="degreeProgram" id="degreeProgram" value="is">
            <label for="is">Information Systems</label><br>
            
            <h4>Batch</h4>
            <input type="text" name="batch" id="batch"><br>

            <h4>CSV formatted result dataset</h4>
            <input type="file" name="resultFile" id="resultFile"><br>

            <input type="submit" value="Submit for Review" name="submit" id="submit">
            <input type="reset" value="Cancel" name="cancel" id="cancel">
        </form>
    </div>

    <!-- include footer section -->
    <?php require('../../assets/php/commonFooter.php')?>
</body>
</html>