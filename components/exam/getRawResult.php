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
    <h1 class="heading">Get Raw Result</h1>
    <div class="reviewList">
        <span class="columnHeader">Received Result List</span>
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
        <div id="pdfArea">
            <div>
                <br>
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
            </div>
            <br>
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
                        $myFile = fopen("Raw Results/12345.csv","r");
                        fgets($myFile);
                        while(! feof($myFile)) {
                            $dataArray=fgets($myFile);
                            if(strlen($dataArray)>0){
                                $serialNumber=explode(",",$dataArray)[0];
                                $indexNumber=explode(",",$dataArray)[1];
                                $result=explode(",",$dataArray)[2];
                                echo("<tr><td>$serialNumber</td><td>$indexNumber</td><td>$result</td></tr>");
                            }
                        }
                        fclose($myFile);
                    }
                    ?>
                </table>
            </div>
        </div>
        <br><br>
        <form action="">
            <div class="actionButton">
                <input type="button" value="Download as PDF" name="submit" class="submitCancelButton"
                       style="background-color: rgb(0,255,0);" onclick="savePDF('ResultDoc')">
                <input type="button" value="Cancel" name="cancel" id="cancel"
                       class="submitCancelButton"
                       style="background-color: rgb(255,0,0);">
            </div>
        </form>
    </div>
</div>
<!-- include footer section -->
<?php require('../../assets/php/commonFooter.php') ?>
<script src="verifyResult.js"></script>
<script src="../../assets/js/jsPDF.js"></script>
<script>
    let pdfDocument=new jsPDF();
    function savePDF(title) {
        pdfDocument.fromHTML(document.getElementById('pdfArea').innerHTML);
        pdfDocument.save(title+'.pdf');
    }

    //open result data
    let elementID=document.location.href.toString().split("verifyResult.php")[1];
    console.log(elementID);
    if(elementID!=""){
        document.getElementById("showFileContent").style.display="inline-grid";
        let notificationCard=document.getElementById(elementID.split("=")[1]);
        notificationCard.style.backgroundColor="rgba(255,0,0,0.93)";
    }

</script>
</body>
</html>
