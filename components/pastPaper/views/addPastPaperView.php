<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="../../assets/css/gridSystem.css">
    <link rel="stylesheet"  href="assets/addPastPaper.css" >
</head>

<body>
    <!-- include header section -->
    <?php require('../../assets/php/basicLoader.php')?>
    <?php BasicLoader::loadHeader('../../')?>
    
    <div class="featureBody">

        <div class="row col-1">
            <P class="heading">Add PastPaper</P>
        </div>
        <div class="row col-3">
            <div>
                <label class="labelStyle">Examination Year:</label>
                <select name="examinationYear">
                    <option value=2016>2016</option>
                    <option value=2017>2017</option>
                    <option value=2018>2018</option>
                    <option value=2019>2019</option>
                </select>
            </div>
            <div>
                <label class="labelStyle">Semester:</label>
                <select name="semester">
                    <option value=1>1<sup>st</sup></option>
                    <option value=2>2<sup>nd</sup></option>
                </select>
            </div>
            <div>
                <label class="labelStyle">Subject:</label>
                <select name="subject">
                    <option value="SCS2209">Database 2</option>
                    <option value="SCS2210">Discrete Maths 2</option>
                </select>
                
            </div>
        </div>
        <div class="row col-1">
            <form action="" method="post">
                <div class="dropZone">
                    <span class="dropZonePrompt">Drop file here or click to upload</span>
                    <!-- <div class="dropZoneThumb" data-label="myFile.txt"></div> -->
                    <input type="file" name="myFile" id="" class="dropZoneInput" multiple>
                </div>
            </form>
        </div>
        <div class="row col-6">
            <div></div>
            <div></div>
            <div>
                <button class="submitButton red">Cancel</button>
            </div>
            <div>
                
                <button class="submitButton green"type="submit" >Upload</button>
            </div>
            <div></div>
            <div></div>
        </div>

    </div>
    

    
    <!-- include footer section -->
    <?php BasicLoader::loadFooter('../../')?>
    <script src="assets/addPastPaper.js"></script>
</body>
</html>