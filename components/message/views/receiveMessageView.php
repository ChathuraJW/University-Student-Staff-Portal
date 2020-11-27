<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="assets/receiveMessageStyle.css">
    <link rel="stylesheet" href="../../assets/css/gridSystem.css">
</head>
<body>
    <!-- include header section -->
    <?php require_once('../../assets/php/basicLoader.php') ?>
    <?php basicLoader::loadHeader('../../'); ?>

    
    <!-- feature body section -->
    <div class="featureBody">
      <span class="heading">Message Inbox</span>
        <a class=backToPage href="sendMessage">
           
          <button class="back" id="back">Back</button>
        </a>
      <div class="row col-2">
        <div class="messageList">

          <?php
          
          foreach ($controllerData as $data){
            if($data['isViewed']){
              $backgroundColor='rgb(100 121 143)';
              $messageState='none';

            }else{
              $backgroundColor='rgb(80 61 84)';
              $messageState='flex';
            }

            

            
            echo ("
              <a class='messageEntry' style='background-color: $backgroundColor;' href='?messageID=".$data['messageID']."&messageState=$messageState'>
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
              foreach ($controllerData as $data){
                if($data['messageID']==$_GET['messageID']){
                  
                  echo ("
                    <span class='senderDetail'>Sender: ".$data['sendBy']."</span><br>
                    <span class='SendTimestampDetail'>Send at: ".$data['timestamp']."</span><br>
                    <span class='titleDetail'>".$data['title']."</span><br>
                    <span class='messageDetail'>".$data['message']."</span><br>
                    <a href='?activity=markAsRead&messageIDForReadConfirm=".$_GET['messageID']."'>Mark as read</a>
                    <button class='submitCancelButton blue' type='submit' style='float: right; display: ".$_GET['messageState'].";'>Mark As Read</button>
                    
                  ");
                  break;
                }  
              }
              
            }
          ?>
        </div>
      </div>

    </div>

    <!-- include footer section -->
    <?php basicLoader::loadFooter('../../'); ?>

</body>
</html>