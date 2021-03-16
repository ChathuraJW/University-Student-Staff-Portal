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
        <form  id="file" class="file" method="POST" enctype="multipart/form-data"><br>
            <div class="Container row col-2">
                <div class="dropDownList">
                    <label>Lecturer</label><br>
                    
                    <select name="lecturer" id="lecturer">
                    <?php
                      foreach($controllerData[0] as $data){
                          echo("<option value='".$data->getUserName()."'>" .$data->getUserName(). " - " .$data->getFullName(). "</option>");
                        }
                    ?>
                    </select>
                    
                </div>
                <div class="dropDownList">
                    <label >Subject</label><br>
                    <select name="subject">
                    <?php
                      foreach($controllerData[1] as $data){
                          echo("<option value='".$data->getCourseCode()."'>" .$data->getCourseCode(). " - " .$data->getName(). "</option>");
                        }
                    ?>
                         
                    </select>
                </div>
            </div>
            <div class=" dropdownContainer row col-2">
                <div class="dropDownList">
                    <label >Academic Year</label><br>
                    <select name="academicYear" id="academicYear" required>
                         
                    </select>
                </div>
                <div class="dropDownList">
                    <label >Batch Year</label><br>
                    <select name="batchYear" required>
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
                    <select name="semester" required>
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
              
               
                <input type="file" id="file" name="file" class="file"><br><br>
                <input type="submit" class="submit" name="submit"><br><br>
              </form>
              <br><br>
            </div>
          </div>
        </div>

         

      </div>
        
    </div>

    <!-- include footer section -->
    <?php basicLoader::loadFooter('../../'); ?>

    <script src="assets/addIQAC.js"></script>
</body>
</html>