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
            <P>Add PastPaper</P>
        </div>
        <div class="row col-4">
            <div>
                <label>Examination Year:</label>
                <select name="examinationYear">
                    <option></option>
                </select>
            </div>
            <div>
                <label>Semester:</label>
                <select name="semester">
                    <option value=1>1<sup>st</sup></option>
                    <option value=2>2<sup>nd</sup></option>
                </select>
            </div>
            <div>
                <label>Degree Program:</label>
                <select>
                    <option>Computer Science</option>
                    <option>Information Systems </option>
                    <option>Software Engineering</option>
                </select>
            </div>
            <div>
                <label>Subject:</label>
            </div>
        </div>
        <div class="row col-1">
            <div class="dropZone">
                <span class="dropZonePrompt">Drop file here or click to upload</span>
                <!-- <div class="dropZoneThumb" data-label="myFile.txt"></div> -->
                <input type="file" name="myFile" id="" class="dropZoneInput">
            </div>
        </div>
        <div class="row col-2">
            <div></div>
            <div></div>
        </div>

    </div>
    

    
    <!-- include footer section -->
    <?php BasicLoader::loadFooter('../../')?>
    <script src="assets/addPastPaper.js"></script>
</body>
</html>