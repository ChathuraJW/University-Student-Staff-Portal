<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="../../assets/css/gridSystem.css">
    <link rel="stylesheet" href="assets/addIQACStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" />

</head>
<body>
    <!-- include header section -->
    <?php require_once('../../assets/php/basicLoader.php') ?>
    <?php basicLoader::loadHeader('../../'); ?>

    
    <!-- feature body section -->
    <div class="featureBody">
      <div class="row col-1">
        <h1 class="heading"><b>Add IQAC Report</b></h1><br>
      </div>
      <div class="row col-2">
        <div>
            <div class="Container row col-2">
                <div class="dropDownList">
                    <label>Lecturer</label><br>
                    <select name="lecturer">
                        <option value=2016>kek-Kasun Ekanayake</option>
                        <option value=2017>tpt-Thilini Perera</option>
                         
                    </select>
                </div>
                <div class="dropDownList">
                    <label >Subject</label><br>
                    <select name="subject">
                        <option value="SCS2209">SCS2209-Database 2</option>
                        <option value="SCS2212">SCS2212-Automata Theory</option>
                         
                    </select>
                </div>
            </div>
            <div class=" dropdownContainer row col-2">
                <div class="dropDownList">
                    <label >Academic Year</label><br>
                    <select name="academicYear">
                        <option value=2017>2016</option>
                        <option value=2018>2017</option>
                        <option value=2017>2018</option>
                        <option value=2018>2019</option>
                    </select>
                </div>
                <div class="dropDownList">
                    <label >Batch Year</label><br>
                    <select name="batchYear">
                        <option value=1>1<sup>st</sup> Year</option>
                        <option value=2>2<sup>nd</sup> Year</option>
                        <option value=3>3<sup>rd</sup> Year</option>
                        <option value=4>4<sup>th</sup> Year</option>
                    </select>
                </div>
            </div>

            <div class=" dropdownContainer row col-2">
                <div class="dropDownList">
                    <label >Semester</label><br>
                    <select name="semester">
                        <option value=1>1</option>
                        <option value=2>2</sup></option>
                    </select>
                </div>
            </div>
            <br>
          </div>  
        <div> 
          <div class="uploadReport"> 
            <label><b> Upload Report</b> </label>
            <i class="fa fa-file-o"></i>
              <hr>
              <br>
            <div class="upload">
              
              <form action="/action_page.php" id="file" class="file"><br>
                <input type="file" id="file" name="file" class="myFile"><br><br>
                <input type="submit" class="submit"><br><br>
              </form>
              <br><br>
            </div>
          </div>
        </div>

         

      </div>
        
    </div>

    <!-- include footer section -->
    <?php basicLoader::loadFooter('../../'); ?>

</body>
</html>