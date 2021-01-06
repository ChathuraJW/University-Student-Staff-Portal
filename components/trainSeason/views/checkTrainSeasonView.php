<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="assets/checkTrainSeasonStyle.css">
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
          <div> 
        <h1 style="text-align:center;"><b>Application List<b></h1><br>
        <div class="container"> 
          <div class="btn-group">
            <br>
            <?php
            foreach($controllerData as $data){
              echo ("<a class='application' href='checkedApplication'>
                    <div class='button'>
                      <div>Appliciant: ".$data->getRequester()."</div>
                      <div>Station: </div>
                      <div style='float:right;'>Date: 2020/02/07</div>
                    </div><br>
                  </a>");
            }
            ?>
             
            <!--<a class=application href="checkedApplication">
            <button class="button">Application Set 2</button><br><br>
            </a>
             
            <a class=application href="checkedApplication">
            <button class="button">Application Set 3</button><br><br>
            </a>
             
            <a class=application href="checkedApplication">
            <button class="button">Application Set 4</button><br><br>
            </a>
             
            <a class=application href="checkedApplication">
            <button class="button">Application Set 5</button><br><br>
            </a>
             
            <a class=application href="checkedApplication">
            <button class="button">Application Set 6</button><br><br>
            </a>
             
            <a class=application href="checkedApplication">
            <button class="button">Application Set 7</button><br><br>
            </a>
             
            <a class=application href="checkedApplication">
            <button class="button">Application Set 8</button><br><br>
            </a>
             
            <a class=application href="checkedApplication">
            <button class="button">Application Set 9</button><br><br>
            </a>
             
            <a class=application href="checkedApplication">
            <button class="button">Application Set 10</button><br><br>
            </a>-->
             
             
            
          </div>
        </div>
        <br>
        <br>
        </div>
      </div>
      </div>
       


    <!-- include footer section -->
    <?php basicLoader::loadFooter('../../'); ?>

     
</body>
</html>