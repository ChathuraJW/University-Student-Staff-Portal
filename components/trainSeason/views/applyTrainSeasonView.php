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
          <button class="apply" id="button ">Request Season</button>
          <button class="cancel" id="button ">Cancel</button>
        </div>
        
      </div>
      <br>
      <br>
    </div>

    <!-- include footer section -->
    <?php basicLoader::loadFooter('../../'); ?>

</body>
</html>