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
          
         <div class="container"> 

         <br>
          <div class="dropdownList"> 
          <br> <br>
           
            <select name="academicYear" id="academicYear" class="academicYear">
              <option value="Select Academic Year">Select Academic Year</option>
              <option value="2018/2019">2018/2019</option>
              <option value="2017/2018">2017/2018</option>
              <option value="2016/2017">2016/2017</option>
            </select>
            <br><br>
            <select name="course" id="course" class="course">
              <option value="Select Course Code">Select Course Code</option>
              <option value="SCS1201">SCS1201</option>
              <option value="SCS1202">SCS1202</option>
              <option value="SCS1203">SCS1203</option>
            </select>
            <br>
            <br>
            <br>
         
          </div>
            <br>
            <br>
            <input type="button" onclick="searchFunction()" value="Search" id="search" action="" class="search" >
            <br><br>
            <button class="download"  disabled="disabled" id="download" ><i class="fa fa-download"></i> Download </button>
            <br><br>
           
        </div>
        <br><br>

      </div>


    <!-- include footer section -->
    <?php basicLoader::loadFooter('../../'); ?>

    <script>
      function searchFunction(){
        document.getElementById('download').removeAttribute('disabled');
        
      }

      
    </script>
</body>
</html>