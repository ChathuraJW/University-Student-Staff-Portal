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
    <h1>Review Uploaded Result</h1>
    <div class="reviewList">
        <span class="columnHeader">Review List</span>
        <?php
            $i=0;
            while($i<10){
                echo("
                     <a href='#$i' style='text-decoration: none;' onclick='loadData()'>
                        <div class='reviewListEntry' id='$i'>
                        <div class='entryDataPoint'>
                            <span class='dataPointHead'>Subject</span>
                            <span class='dataPointTail'> : SCS2201</span>
                        </div>
                        <div class='entryDataPoint'>
                            <span class='dataPointHead'>Examination for</span>
                            <span class='dataPointTail'> : 1st Years</span>
                        </div>
                        <div class='entryDataPoint'>
                            <span class='dataPointHead'>Batch</span>
                            <span class='dataPointTail'> : 2017/18</span>
                        </div>
                    </div> 
                    </a>
                ");
                $i++;
            }
        ?>
    </div>
    <div class="showFileContent">
        <span class="columnHeader">Result Review of SCS1201</span>
        <br>
        <div class="resultInfo">
            <table>
                <tr>
                    <td>Examination Year</td>
                    <td>: 2020</td>
                </tr>
                <tr>
                    <td>Semester</td>
                    <td>: 1</td>
                </tr>
                <tr>
                    <td>Examination for</td>
                    <td>: 1st Years</td>
                </tr>
                <tr>
                    <td>Batch</td>
                    <td>: 2017/18</td>
                </tr>
                <tr>
                    <td>Subject</td>
                    <td>: SCS2201(Data Structures and Algorithms 1)</td>
                </tr>
                <tr>
                    <td>Attempt</td>
                    <td>: 1st Attempt</td>
                </tr>
            </table>
            <br>
            <div class="searchSection">
                <span id="entryCount"></span>
                <input type="search" id="searchKey" onkeyup="searchOnTable()" placeholder="Search...">
            </div>
            <br><br><br>
            <div class="showResult">
                <table border="1" class="resultTable" id="dataList">
                    <tr>
                        <th>Serial No</th>
                        <th>Index Number</th>
                        <th>Result</th>
                    </tr>
                    <?php $i = 1;
                    while ($i <= 200) {
                        $eid = $i + 18001000;
                        echo("<tr><td>$i</td><td>$eid</td><td>A+</td></tr>");
                        $i++;
                    } ?>
                </table>
            </div>
            <br><br>
            <form action="">
                <div class="actionButton">
                    <input type="button" value="Confirm Result Validity" name="submit" id="submit"
                           class="submitCancelButton"
                           style="background-color: rgb(0,255,0);">
                    <input type="button" value="Result Inconsistent" name="cancel" id="cancel"
                           class="submitCancelButton"
                           style="background-color: rgb(255,0,0);">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- include footer section -->
<?php require('../../assets/php/commonFooter.php') ?>
<script src="verifyResult.js"></script>
</body>
</html>