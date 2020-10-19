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
    <h1 class="heading">Get Raw Result</h1>
    <div class="row col-3">
        <div class="reviewList">
            <span class="columnHeader">Received Result List</span>
            <?php
            //            print_r($controllerData);
            $i = 0;
            foreach ($controllerData as $row) {
//                echo($row[1]['subjectCode']);
                $url = "?fileID=" . $row[1]['fileID'] . "&examinationYear=" . $row[1]['yearOfExam'] . "&semester=" . $row[1]['semester'] . "&batch=" . $row[1]['batch'] . "&subject=" . $row[1]['subjectCode'] . "&attempt=" . $row[1]['attempt'] . "&filePath=" . $row[1]['fileLocation']."&sendBy=".strtoupper($row[0]);
                $attempt = ($row[1]['attempt'] == 'F') ? 'First Attempt' : 'Repeat Attempt';
                $semester = ceil($row[1]['semester'] / 2) . "Y (" . ($row[1]['semester'] % 2 == 0 ? 2 : 1) . " S)";
                echo("
                     <a href='$url' class='reviewListEntry' id='" . $row[1]['fileID'] . "'>
                        <div>
                            <span class='dataPointHead'>Subject</span>
                            <span class='dataPointTail'> : " . explode('_', $row[1]['subjectCode'])[0] . "</span>
                        </div>
                        <div>
                            <span class='dataPointHead'>Year (Semester)</span>
                            <span class='dataPointTail'> : " . $semester . "</span>
                        </div>
                        <div>
                            <span class='dataPointHead'>Attempt</span>
                            <span class='dataPointTail'> : " . $attempt . "</span>
                        </div>
                        <div>
                            <span class='dataPointHead'>Batch</span>
                            <span class='dataPointTail'> : " . $row[1]['batch'] . "</span>
                        </div>
                        <div>
                            <div class='sendByResult'>Result Submitted By: " . strtoupper($row[0]) . "</div>
                        </div>
                    </a>
                ");
            }
            ?>

        </div>
        <div class="showFileContent" id="showFileContent">
            <div id="printArea">
                <span class="columnHeader">Result Review of SCS1201</span>
                <br>
                <?php
                if (isset($_GET['fileID'])) {
                    $attempt = ($_GET['attempt'] == 'F') ? 'First Attempt' : 'Repeat Attempt';
                    $subject = explode('_', $_GET['subject'])[1] . " ( " . explode('_', $_GET['subject'])[0] . " )";
//                    year calculation based on semester with a?b:c statement
                    $year = ceil($_GET['semester'] / 2) == 1 ? "1st Year" : (ceil($_GET['semester'] / 2) == 2 ? "2nd Year" : (ceil($_GET['semester'] / 2) == 3 ? "3rd Year" : "4th Year"));
                    echo("
                                    <table>
                                        <tr>
                                            <td>Examination Year</td>
                                            <td class='Separator'>:</td>
                                            <td>" . $_GET['examinationYear'] . "</td>
                                        </tr>
                                        <tr>
                                            <td>Semester</td>
                                            <td class='Separator'>:</td>
                                            <td>" . ($_GET['semester'] % 2 == 0 ? 2 : 1) . "</td>
                                        </tr>
                                        <tr>
                                            <td>Examination for</td>
                                            <td class='Separator'>:</td>
                                            <td>" . $year . "</td>
                                        </tr>
                                        <tr>
                                            <td>Batch</td>
                                            <td class='Separator'>:</td>
                                            <td>" . $_GET['batch'] . "</td>
                                        </tr>
                                        <tr>
                                            <td>Subject</td>
                                            <td class='Separator'>:</td>
                                            <td>" . $subject . "</td>
                                        </tr>
                                        <tr>
                                            <td>Attempt</td>
                                            <td class='Separator'>:</td>
                                            <td>" . $attempt . "</td>
                                        </tr>
                                        <tr>
                                            <td>Send By</td>
                                            <td class='Separator'>:</td>
                                            <td>" . $_GET['sendBy'] . "</td>
                                        </tr>
                                    </table>
                                
                                ");
                }
                ?>
                <br><br>
                <div class="showResult">
                    <table class="resultTable" id="dataList">
                        <tr>
                            <th>Serial No</th>
                            <th>Index Number</th>
                            <th>Result</th>
                        </tr>
                        <?php
                        //                                read URL
                        if (isset($_GET['fileID'])) {
                            $myFile = fopen($_GET['filePath'], "r");
                            fgets($myFile);
                            while (!feof($myFile)) {
                                $dataArray = fgets($myFile);
                                if (strlen($dataArray) > 0) {
                                    $serialNumber = explode(",", $dataArray)[0];
                                    $indexNumber = explode(",", $dataArray)[1];
                                    $result = explode(",", $dataArray)[2];
                                    echo("<tr><td>$serialNumber</td><td>$indexNumber</td><td>$result</td></tr>");
                                }
                            }
                            fclose($myFile);
                        }
                        ?>
                    </table>
                </div>
                <br>
            </div>
            <br>
            <form action="" method="post">
                <div class="row col-2">
                    <div class="fileExportSection">
                        <button onclick="savePDF();"><i class="fas fa-file-pdf fa-3x"></i></button>
<!--                        <button><i class="fas fa-file-csv fa-3x"></i></button>-->
                    </div>
                    <div class="actionButton">
                        <input type="submit" value="Confirm result Received" name="confirmation" class="submitCancelButton"
                               style="background-color: rgb(23, 193, 23);">
                        <input type="button" value="Cancel" name="cancel" id="cancel"
                               class="submitCancelButton" onclick="window.location.href=document.location.href.toString().split('getRawResult')[0]+'getRawResult';"
                               style="background-color: rgb(255,0,0);">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- include footer section -->
<?php require('../../assets/php/commonFooter.php') ?>
<script src="assets/getRawResult.js"></script>
</body>
</html>