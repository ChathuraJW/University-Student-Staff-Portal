<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="resultSection.css">
    <style>
        .footer {
            position: unset;
        }
    </style>
</head>
<body>
<!-- include header section -->
<?php require('../../assets/php/commonHeader.php') ?>

<!-- feature body section -->
<div class="featureBody">
    <div class="basicInfo">
        <div style="padding-bottom: 50px;padding-top: 50px">
            <div class="infoBlock">
                <span class="basicInfoElement" id="overallGPA">3.619</span>
                <label for="overallGPA">Current GPA</label>
            </div>
            <div class="infoBlock">
                <span class="basicInfoElement" id="batchRank">#31</span>
                <label for="batchRank">Batch Rank</label>
            </div>
            <div class="infoBlock">
                <span class="basicInfoElement" id="totalCredit">31</span>
                <label for="totalCredit">Total Credit</label>
            </div>
        </div>
    </div>
    <div class="degreeClass">
        <span class="degreeClassHeader">Degree Information</span>
        <span class="classNotation">FC</span>
        <span class="degreeClassFooter">FC-First Class degree, SU-Second Upper degree, SL-Second Lower degree, NM-Normal degree,
            -- indicates that your GPA is insufficient to complete the degree.</span>
    </div>
    <div class="gpaDistribution">
        <span>Batch GPA Distribution</span>
        <canvas id="gpaDistribution" class="graphCanvas" style="width: 80%"></canvas>
    </div>

    <div class="individualGPADistribution">
        <span class="graphHeader">Individual GPA Distribution</span>
        <canvas id="individualGPADistribution" class="graphCanvas"></canvas>
    </div>
    <div class="gradeContribution">
        <span class="graphHeader">Grade Contribution for GPA</span>
        <canvas id="gradeContribution" class="graphCanvas"></canvas>
    </div>
    <div class="resultViewer">
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
            while ($j < 10) {
                echo("
                                    <tr>
                                        <td>Data Structures and Algorithms <br> <span>SCS1201 / 3 Credits /Examination Year:2019</span></td>
                                        <td class='result'>A-</td>
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
    <br><br>
</div>

<!-- include footer section -->
<?php require('../../assets/php/commonFooter.php') ?>
<script src="../../assets/js/Chart.js"></script>
<script src="viewResult.js"></script>
</body>
</html>