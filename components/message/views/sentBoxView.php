<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="assets/sentBoxStyle.css">
    <link rel="stylesheet" href="../../assets/css/gridSystem.css">
</head>
<body class="bodyBackground text">
    <!-- include header section -->
    <?php require_once('../../assets/php/basicLoader.php') ?>
    <?php basicLoader::loadHeader('../../'); ?>

    
    <!-- feature body section -->
    <div class="featureBody">
      <span class="heading">Sent Box</span>
      
      <a class="back" href="sendMessage">
        <input type="button" value="Back" style="position: relative; left: 1%;" class="button">
      </a>
      <div class="row col-2">
        <div class="messageList">

          <?php
          print_r($controllerData);
          foreach ($controllerData as $data){
             

            

            
            echo ("
              <a class='messageEntry' style='background-color: #044e3a' href='?messageID=".$data->getMessageID()."'>
                <span class='sender'>Sender: ".$data->getSendBy()."</span><br>
                <span class='messageContent'>".$data->getMessage()."</span><br>
                <span class='messageSendTimestamp'>".$data->getTimestamp()."</span>
              </a>
            ");
             
          }
            
          ?>
        </div>
        <div class="displayMessage">
          <?php
          echo($controllerData);
            if(isset($_GET['messageID'])){
              $receivedBy="";
              foreach ($controllerData as $data){
                  
                if($data['messageID']==$_GET['messageID']){
                  $receivedBy .= $data->getReceivedBy();
                  $receivedBy .="  ";
                  $timestamp=$data['timestamp'];
                  $title=$data->getTitle();
                  $message=$data->getMessage();
                  
                }  
                
                  
              }
              echo ("
                  
                    <span class='senderDetail'>Received To : ".$receivedBy."</span><br>
                    <span class='SendTimestampDetail'>Send at: ".$timestamp."</span><br>
                    <span class='titleDetail'>".$title."</span><br>
                    <span class='messageDetail'>".$message."</span><br>
                     
                    
                  ");
              
            }
          ?>
        </div>
      </div>

    </div>

    <!-- include footer section -->
    <?php basicLoader::loadFooter('../../'); ?>

</body>
</html>

<script src="../../assets/js/jquery.js"></script>
<script src="../../assets/js/toast.js"></script>
<script src="../../assets/js/changeTheme.js"></script>