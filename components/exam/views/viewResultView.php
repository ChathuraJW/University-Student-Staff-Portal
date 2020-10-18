<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="assets/resultSection.css">
    <link rel="stylesheet" href="../../assets/css/gridSystem.css">
</head>
<body>
<!-- include header section -->
<?php require('../../assets/php/commonHeader.php') ?>
<!-- feature body section -->
<div class="featureBody">
    <div class="basicInfo">
        <span class="captionLabel">Overall Information</span>
        <div class="row col-4">
            <div class="infoBox" id="">
                <span class="captionLabel">Current GPA</span>
                <span class="infoBoxValue" id="valueGPA"><?php echo(round($controllerData[0],4))?></span>
            </div>
            <div class="infoBox" id="">
                <span class="captionLabel">Batch Rank</span>
                <span class="infoBoxValue" id=""><?php echo($controllerData[1])?></span>
            </div>
            <div class="infoBox" id="">
                <span class="captionLabel">Total Credit</span>
                <span class="infoBoxValue" id=""><?php echo($controllerData[2])?></span>
            </div>
            <div class="infoBox" id="degreeClass">
                <span class="captionLabel degreeClass">Degree Class</span>
                <span class="infoBoxValue degreeClass" id="classNotation"></span>
            </div>
        </div>
        <div class="row col-1">
        <span style="font-size: 15px;">GPV 4.0 is for grade A+ and A. GPV 3.7 is for grade A-.
        GPV 3.3 is for grade B+. GPV 3.0 is for grade B. GPV 2.7 is for grade B-.
             GPV 2.3 is for grade C+. GPV 2.0 is for grade C.  GPV 1.7 is for grade C-.
             GPV 1.3 is for grade D+.  GPV 1.0 is for grade D. GPV 0.0 is for less grades.
            <br>
            FC -First Class degree, SU -Second Upper degree, SL -Second Lower degree, NM -Normal degree,
            -- indicates that your GPA is insufficient to complete the degree.
        </span>
        </div>
    </div>
    <div class="row col-1">
        <div class="gpaDistribution">
            <span class="captionLabel">Batch GPA Distribution</span>
            <canvas id="gpaDistribution" class="graphCanvas" style="width: 80%"></canvas>
        </div>
    </div>
    <div class="row col-2">
        <div class="individualGPADistribution">
            <span class="captionLabel">Individual GPA Distribution</span>
            <canvas id="individualGPADistribution" class="graphCanvas"></canvas>
        </div>
        <div class="gradeContribution">
            <span class="captionLabel">Grade Contribution for GPA</span>
            <canvas id="gradeContribution" class="graphCanvas"></canvas>
        </div>
    </div>

    <div class="resultViewer">
        <span class="captionLabel">Semester Vice Result</span>
        <div class="row col-3">
            <?php
            $semester = 1;
            foreach ($controllerData[3] as $semesterData){
                $sem = (round($semester % 2) == 0) ? 2 : 1;
                $year = round($semester / 2);
                echo("
                        <div class='semesterResult'>
                            <span class='semesterResultHeader'>$year<sup>st</sup> Year $sem<sup>st</sup> Semester</span>
                            <div class='semesterResultViewer'>
                                <table>
                  ");
                //create subject entry
                foreach ($semesterData as $subjectEntry){
                    echo("
                         <tr>
                             <td>".$subjectEntry['name']." <br> <span>".$subjectEntry['courseCode']." / ".$subjectEntry['creditValue']." Credits /Examination Year:".$subjectEntry['yearOfExam']."</span></td>
                             <td class='result'>".$subjectEntry['result']."</td>
                         </tr>
                    ");
                }
                echo("
                            </table>
                        </div>
                    </div>
                ");
//                increase semester value by 1
                $semester++;
            }
            ?>
        </div>
    </div>
    <br><br>
</div>

<!-- include footer section -->
<?php require('../../assets/php/commonFooter.php') ?>
<script src="../../assets/js/jquery.js"></script>
<script src="../../assets/js/Chart.js"></script>
<script src="assets/viewResult.js"></script>
</body>
</html>
