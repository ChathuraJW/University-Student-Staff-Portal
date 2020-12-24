<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="assets/viewIQACStyle.css">
    <link rel="stylesheet" href="../../assets/css/gridSystem.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" />

</head>
<body>
<!-- include header section -->
<?php require_once('../../assets/php/basicLoader.php') ?>
<?php basicLoader::loadHeader('../../'); ?>

<!-- feature body section -->


<div class="featureBody">
    <div class="row col-1">
        <h1 class="heading"><b>View IQAC Report</b></h1><br>
    </div>

    <div class="row col-2">
        <div>
            <div class="Container row col-2">
                <div class="dropDownList">
                    <label>Academic Year</label>
                    <select name="academicYear" id="academicYear" required>
                    </select>
                </div>

                <div class="dropDownList">
                    <label >Batch Year</label>
                    <select name="batchYear" id="batchYear" required>
                        <option value=1>1<sup>st</sup> Year</option>
                        <option value=2>2<sup>nd</sup> Year</option>
                        <option value=3>3<sup>rd</sup> Year</option>
                        <option value=4>4<sup>th</sup> Year</option>
                    </select>
                </div>
            </div>
            <div class=" dropdownContainer row col-2">
                <div class="dropDownList">
                    <label >Semester</label>
                    <select name="semester">
                        <option value=1>1</option>
                        <option value=2>2</sup></option>
                        <option value=2>3</sup></option>
                        <option value=2>4</sup></option>
                        <option value=2>5</sup></option>
                        <option value=2>6</sup></option>
                        <option value=2>7</sup></option>
                        <option value=2>8</sup></option>
                    </select>
                </div>
                <div class="dropDownList">
                    <label >Subject</label>
                    <select name="subject">
                        <option value="SCS2209">SCS2209-Database 2</option>
                        <option value="SCS2212">SCS2212-Automata Theory</option>
                    </select>
                </div>
            </div>
            <div class="row col-2">
                <div>
                    <button class="submitButton red">Cancel</button>
                </div>
                <div>
                    <button class="submitButton green" type="button" onclick="searchResult();">Search</button>
                </div>
            </div>
        </div>
        <div class="search">
            <div class=" labelStyle row col-1" id="recentDetail">
                <label  >Resent Files:</label>
                <hr>
                <div class="row col-5">
                    <div class="reportDetails">
                        <a class="reportName" href="#"><span onclick="download()">IQAC Report for SCS2212-Automata Theory<br>(Second Year-Second Semester-2019)</span></a>
                    </div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div class="download">
                        <a class="iqacReport" href="#">  <i class="fa fa-download" onclick="download()"></i></a>
                    </div>
                </div>
            </div>
            <div style ="display:none;" class="labelStyle row col-1" id="searchResult">
                  
                    <label  >Search Results:</label>
                    <hr>
                    
                    <div class="row col-5">
                         
                        <div class="reportDetails">
                            <a class="reportName" href="#" ><span onclick="download()">IQAC Report for SCS2209-Database 2<br>(Second Year-Second Semester-2019)</span></a>
                        </div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div class="download">
                            <a class="iqacReport" href="#" >  <i class="fa fa-download" onclick="download()"></i></a>
                        </div>
                        
                    </div>
                    
                 
            </div>

            </div>

</div>


<!-- include footer section -->
<?php basicLoader::loadFooter('../../'); ?>

<script>
    // function searchFunction(){
    //     document.getElementById('download').removeAttribute('disabled');
    //
    // }
    //
    function download() {
        alert("Download Successfully!");
    }
    function searchResult(){
        //document.getElementById("recentDetail").style.visibility = 'hidden';
        document.getElementById("recentDetail").style.display = 'none';
        //document.getElementById("searchResult").style.visibility = 'visible';
        document.getElementById("searchResult").style.display = '';

    }

</script>

<script src="assets/viewIQAC.js"></script>
</body>
</html>
