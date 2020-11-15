<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="../../assets/css/gridSystem.css">
    <link rel="stylesheet" href="assets/applyTrainSeasonStyle.css">
</head>
<body>
    <!-- include header section -->
    <?php require_once('../../assets/php/basicLoader.php') ?>
    <?php basicLoader::loadHeader('../../'); ?>

    
    <!-- feature body section -->
    <div class="featureBody">
    <h1><b>Apply Train Season<b></h1>
    <br>
      <div class="container">
        <div class="vertical-center">
        
        <button class="viewHistory" id="viewHistory" onclick="alertFunction()">View Request History</button> 
        <br><br>
        
        
          <a class=application href="application">
           
            <button class="apply" id="apply">Request Season</button>
          </a>
          <button class="cancel" id="cancel ">Cancel</button>
        </div>
        
      </div>
      <br>
      <br>
       
    </div>
    
     

    <!-- include footer section -->
    <?php basicLoader::loadFooter('../../'); ?>
    <script>
      function alertFunction(){
        alert("You can request twice more");

      }

    </script>
     
    <script src="assets/applyTrainSeasonJs.js">
    </script>

</body>
</html>