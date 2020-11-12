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
          <a href="application">
          <button class="apply" id="apply">Request Season</button>
</a>
          <button class="cancel" id="cancel ">Cancel</button>
        </div>
        
      </div>
      <br>
      <br>
      <!--<div class="form-popup" id="form">
      <form action="/action_page.php" >
        <label for="fullName">Full Name:</label>
        <input type="text" id="fullName" name="fullName"><br><br>
        <label for="name">Name with initials:</label>
        <input type="text" id="name" name="name"><br><br>
        <label for="regNo">Registration Number:</label>
        <input type="text" id="regNo" name="regNo"><br><br>
        <input type="submit" value="Submit">
      </form>
      </div>-->

    </div>

     

    <!-- include footer section -->
    <?php basicLoader::loadFooter('../../'); ?>
     
    <script src="assets/applyTrainSeasonJs.js">
    </script>

</body>
</html>