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
    <h1 class="heading">Review Uploaded Result</h1>
    <div class="reviewList">
        <span class="columnHeader">Review List</span>
        <?php
        $i=0;
        while($i<10){
            echo("
                     <a href='?resultSection=$i' style='text-decoration: none;' onclick='loadData()' class='reviewListEntry' id='$i'>
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
                    </a>
                ");
            $i++;
        }
        ?>
    </div>
    <div class="showFileContent" id="showFileContent">
            <span class="columnHeader">Result Review of SCS1201</span>
            <br>
            <table>
                <tr>
                    <td class="fileDataHeader">Examination Year</td>
                    <td class="Separator">:</td>
                    <td class="fileDataHeader">2020</td>
                </tr>
                <tr>
                    <td class="fileDataHeader">Semester</td>
                    <td class="Separator">:</td>
                    <td class="fileDataHeader">1</td>
                </tr>
                <tr>
                    <td class="fileDataHeader">Examination for</td>
                    <td class="Separator">:</td>
                    <td class="fileDataHeader">1st Years</td>
                </tr>
                <tr>
                    <td class="fileDataHeader">Batch</td>
                    <td class="Separator">:</td>
                    <td class="fileDataHeader">2017/18</td>
                </tr>
                <tr>
                    <td class="fileDataHeader">Subject</td>
                    <td class="Separator">:</td>
                    <td class="fileDataHeader">SCS2201(Data Structures and Algorithms 1)</td>
                </tr>
                <tr>
                    <td class="fileDataHeader">Attempt</td>
                    <td class="Separator">:</td>
                    <td class="fileDataHeader">1st Attempt</td>
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
                    <?php
//                    read url
//                    echo($_SERVER['REQUEST_URI']);
                    if(isset($_GET['resultSection'])){
                        $myFile = fopen("Confirmed Results/12345.csv","r");
                        fgets($myFile);
                        while(! feof($myFile)) {
                            $dataArray=fgets($myFile);
                            if(strlen($dataArray)>0) {
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
<!-- include footer section -->
<?php require('../../assets/php/commonFooter.php') ?>
<script src="verifyResult.js"></script>
<script>
    //open result data
    let elementID=document.location.href.toString().split("verifyResult.php")[1];
    if(elementID!=""){
            document.getElementById("showFileContent").style.display="inline-grid";
            let notificationCard=document.getElementById(elementID.split("=")[1]);
            notificationCard.style.backgroundColor="#730388";
            notificationCard.style.color="white";
    }

</script>
</body>
</html>
