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
<body class="bodyBackground text">
    <!-- include header section -->
    <?php require_once('../../assets/php/basicLoader.php') ?>
    <?php basicLoader::loadHeader('../../'); ?>
    
    <!-- feature body section -->
     
    
      <div class="featureBody">
      <div class="row col-2">
        <div class="applicationList">
         
        <h1 style="text-align:center;"><b>Application List<b></h1><br>
         
            <br>
            <?php
             
            foreach($controllerData[0] as $data){
              echo ("<a class='application' href='checkedApplication?requestID=".$data->getRequestID()."'>
                    <div class='button' style='left: 1%; width: 90%;'>
                      <div style='text-align: left; padding-left:20px;'>Appliciant: ".$data->getRequseterFullName()."</div>
        
                      <div style='text-align: left; padding-left:20px;'>University Station: ".$data->getNearRailwayStationUni()."</div>
                      <div style='text-align: left; padding-left:20px;'>Home Station: ".$data->getNearRailwayStationHome()."</div>
                      <div style='float:right;'>Date: ".$data->getTimeStamp()."</div><br>
                    </div><br>
                  </a>");
            }
            ?>
             
             
             
             
            
           
        <br>
        <br>
        </div>

        <div class="completedApplication">
          <h1 style="text-align:center;"><b>Completed Application List<b></h1><br>
         
          <br>
          <?php
         
          foreach($controllerData[1] as $data){
           echo ("<a class='application' href='checkedApplication?requestID=".$data->getRequestID()."'>
                 <div class='button' style='left: 7%; width: 90%;'>
                   <div style='text-align: left; padding-left:20px;'>Appliciant: ".$data->getRequseterFullName()."</div>
                   <div style='text-align: left; padding-left:20px;'>University Station: ".$data->getNearRailwayStationUni()."</div>
                   <div style='text-align: left; padding-left:20px;'>Home Station: ".$data->getNearRailwayStationHome()."</div>
                   <div style='float:right;'>Date: ".$data->getTimeStamp()."</div><br>
                 </div><br>
               </a>");
          }
          ?>
        </div>
      </div>
      </div>
       


    <!-- include footer section -->
    <?php basicLoader::loadFooter('../../'); ?>
    <script src="../../assets/js/changeTheme.js"></script>

     
</body>
</html>