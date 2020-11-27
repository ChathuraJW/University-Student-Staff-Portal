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
<body>
    <!-- include header section -->
    <?php require_once('../../assets/php/basicLoader.php') ?>
    <?php basicLoader::loadHeader('../../'); ?>

    
    <!-- feature body section -->
    <div class="featureBody">
      <span class="heading">Sent Box</span>
      <a class="back" href="sendMessage">
        <input type="button" value="Back" class="back">
      </a>
      <div class="row col-2">
        <div class="messageList">

          <?php
          foreach ($controllerData as $data){
             

            

            
            echo ("
              <a class='messageEntry' style='background-color: #044e3a' href='?messageID=".$data['messageID']."'>
                <span class='sender'>Sender: ".$data['sendBy']."</span><br>
                <span class='messageContent'>".$data['message']."</span><br>
                <span class='messageSendTimestamp'>".$data['timestamp']."</span>
              </a>
            ");
             
          }
            
          ?>
        </div>
        <div class="displayMessage">
          <?php
            if(isset($_GET['messageID'])){
              $receivedBy="";
              foreach ($controllerData as $data){
                  
                if($data['messageID']==$_GET['messageID']){
                  $receivedBy .= $data['receivedBy'];
                  $receivedBy .="  ";
                  $timestamp=$data['timestamp'];
                  $title=$data['title'];
                  $message=$data['message'];
                  
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