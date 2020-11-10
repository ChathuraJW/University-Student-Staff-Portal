<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="assets/rmStyle.css">
    <link rel="stylesheet" href="../../assets/css/gridSystem.css">
</head>
<body>
    <!-- include header section -->
    <?php require_once('../../assets/php/basicLoader.php') ?>
    <?php basicLoader::loadHeader('../../'); ?>

    
    <!-- feature body section -->
    <div class="featureBody">
    <div class="row col-1">
      <h1> <b>Inbox <b></h1>
    </div>
      
  <!--
    <div class="row col-3">
      <ul>
        <li>Date : 05.10.2020</li>
        <li>Time : data[0]</li>
        <li>Title : data[1]</li>
        <li>Message : Can you come to the meeting?</li>
         

         
      </ul>
    </div>
    <div class = "openBtn">
        <button class ="openButton"
          onclick="openForm()">
          <strong>View</strong>
        </button>
    </div>
    <div class = "formPopup" id="myForm">
          <form action = "/action_page.php"
          class="formContainer">
              <h1>Message</h1>
              <label for = "date"><b>Date</b></label>
              <input type = "date" id="msgDate" name="Date">
              <br>

              <label for = "time"><b>Time</b></label>
              <input type = "time" id="msgTime" name="Time">
              <br>

              <label for = "title"><b>Title</b></label>
              <input type = "text" name="Title" >
              <br>

              <label for = "message"><b>Message</b></label>
              <input type = "text" name="Message">
              <br> 

              <button type="button" class="btn cancel"
              onclick="closeForm()">OK</button>
          </form>
        </div>

        <script>
          function openForm()
          {
            document.getElementById("myForm").style.display="block";
          }

          function closeForm()
          {
            document.getElementById("myForm").style.display="none";
          }
        </script>
        
     -->

      <div>
          <table id="inbox">
            <tr>
              <th style="width:250px">Date & Time</th>
              <th>Title</th>
              <th>Message</th>

            </tr> 

            <?php
              //if($controllerData->num_rows>0){
                //while($row = $controllerData->fetch_assoc())
                
                foreach ($controllerData as $data)
                {
                  
                  echo "<tr><td>" . $data['timestamp'] . "</td><td>" . $data['title'] . "</td><td>" . $data['message'] . "</td></tr>"  ;  
                }

                /*foreach ($controllerData[1] as $data)
                {
                  print_r($data);
                  echo "<tr><td>" . $data['timestamp'] . "</td><td>" . $data['title'] . "</td><td>" . $data['message'] . "</td></tr>"  ;  
                }*/
              
            ?>
             
          </table>
      </div>
  
       

       

  



    </div>

    <!-- include footer section -->
    <?php basicLoader::loadFooter('../../'); ?>

</body>
</html>