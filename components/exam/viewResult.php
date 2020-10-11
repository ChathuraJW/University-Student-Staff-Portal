<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="resultSection.css">
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
                <span class="infoBoxValue" id="">3.6563</span>
            </div>
            <div class="infoBox" id="">
                <span class="captionLabel">Batch Rank</span>
                <span class="infoBoxValue" id="">200</span>
            </div>
            <div class="infoBox" id="">
                <span class="captionLabel">Total Credit</span>
                <span class="infoBoxValue" id="">23</span>
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
            $i = 1;
            while ($i <= 8) {
                $sem = (round($i % 2) == 0) ? 2 : 1;
                $year = round($i / 2);
                echo("
                    <div class='semesterResult'>
                        <span class='semesterResultHeader'>$year st Year $sem st Semester</span>
                        <div class='semesterResultViewer'>
                            <table>
                  ");
                $j = 0;
                while ($j < rand(7, 10)) {
                    $subject = array('Data Structures and Algorithms-1', 'Programing Using C', 'Enhancement-1', 'Programming Language Concepts', 'Foundation of Computer Science')[rand(0, 4)];
                    $result = array('A', 'A+', 'A-', 'CM', 'B')[rand(0, 4)];
                    echo("
                                    <tr>
                                        <td>$subject <br> <span>SCS1201 / 3 Credits /Examination Year:2019</span></td>
                                        <td class='result'>$result</td>
                                    </tr>
                                ");
                    $j++;
                }
                echo("
                            </table>
                        </div>
                    </div>
                ");
                $i++;
            }
            ?>
        </div>
    </div>
    <br><br>
</div>

<!-- include footer section -->
<?php require('../../assets/php/commonFooter.php') ?>

<script src="../../assets/js/Chart.js"></script>
<script src="viewResult.js"></script>
</body>
</html>
