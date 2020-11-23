<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="assets/checkTrainSeasonStyle.css">
    <link rel="stylesheet" href="../../assets/css/gridSystem.css">

     
     
     

</head>
<body>
    <!-- include header section -->
    <?php require_once('../../assets/php/basicLoader.php') ?>
    <?php basicLoader::loadHeader('../../'); ?>
    
    <!-- feature body section -->
     
    
      <div class="featureBody">
        <h1><b>Season Application List<b></h1><br>
        <div class="container"> 
          <div class="btn-group">
            <br>
            <a class=application href="checkedApplication">
            <button class="button">Application Set 1</button>
            </a>
            <input type="checkbox" class="checkbox" id="checkbox" name="checkbox" value="checkbox">
            <label for="checkbox" class="label">Mark as checked</label><br><br>
            <a class=application href="checkedApplication">
            <button class="button">Application Set 2</button>
            </a>
            <input type="checkbox" class="checkbox" id="checkbox" name="checkbox" value="checkbox">
            <label for="checkbox" class="label">Mark as checked</label><br><br>
            <a class=application href="checkedApplication">
            <button class="button">Application Set 3</button>
            </a>
            <input type="checkbox" class="checkbox" id="checkbox" name="checkbox" value="checkbox">
            <label for="checkbox" class="label">Mark as checked</label><br><br>
            <a class=application href="checkedApplication">
            <button class="button">Application Set 4</button>
            </a>
            <input type="checkbox" class="checkbox" id="checkbox" name="checkbox" value="checkbox">
            <label for="checkbox" class="label">Mark as checked</label><br><br>
            <a class=application href="checkedApplication">
            <button class="button">Application Set 5</button>
            </a>
            <input type="checkbox" class="checkbox" id="checkbox" name="checkbox" value="checkbox">
            <label for="checkbox" class="label">Mark as checked</label><br><br>
            <a class=application href="checkedApplication">
            <button class="button">Application Set 6</button>
            </a>
            <input type="checkbox" class="checkbox" id="checkbox" name="checkbox" value="checkbox">
            <label for="checkbox" class="label">Mark as checked</label><br><br>
            <a class=application href="checkedApplication">
            <button class="button">Application Set 7</button>
            </a>
            <input type="checkbox" class="checkbox" id="checkbox" name="checkbox" value="checkbox">
            <label for="checkbox" class="label">Mark as checked</label><br><br>
            <a class=application href="checkedApplication">
            <button class="button">Application Set 8</button>
            </a>
            <input type="checkbox" class="checkbox" id="checkbox" name="checkbox" value="checkbox">
            <label for="checkbox" class="label">Mark as checked</label><br><br>
            <a class=application href="checkedApplication">
            <button class="button">Application Set 9</button>
            </a>
            <input type="checkbox" class="checkbox" id="checkbox" name="checkbox" value="checkbox">
            <label for="checkbox" class="label">Mark as checked</label><br><br>
            <a class=application href="checkedApplication">
            <button class="button">Application Set 10</button>
            </a>
            <input type="checkbox" class="checkbox" id="checkbox" name="checkbox" value="checkbox">
            <label for="checkbox" class="label">Mark as checked</label><br><br> 
            <input type="submit" class="submit" value="Submit">
            
          </div>
        </div>
        <br>
        <br>
      
      </div>
       


    <!-- include footer section -->
    <?php basicLoader::loadFooter('../../'); ?>

     
</body>
</html>