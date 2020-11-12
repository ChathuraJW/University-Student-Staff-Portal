<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="assets/smStyle.css">
    <link rel="stylesheet" href="../../assets/css/gridSystem.css">

     
     
     

</head>
<body>
    <!-- include header section -->
    <?php require_once('../../assets/php/basicLoader.php') ?>
    <?php basicLoader::loadHeader('../../'); ?>
    
    <!-- feature body section -->
     
    
      <div class="featureBody">
        <div class="container">
          <div class="row col-1">
         
            <h1><b> Send Messages </b></h1>
         
      
            <br>
            <br> 
           
            <label for="option"> Enter the contacts </label>
           
          </div>
           
          
          <div class="row col-3">
            <div>
              <select style="height:50px; width:200px; font-size:18px; background-color: white; box-shadow:8px 8px 16px 0px rgba(0,0,0,0.2);" id="academicStaffList" name="academicStaffList" onchange="addStaffRecipient('academicStaffList');">
               
              <option value="">Academic Staff </option>
                <?php
                     
                  foreach ($controllerData[0] as $data){
                       
                    echo ("<option value='$data[userName]'>".$data['fullName']. " -  ".$data['userName']." </option>" );
                  }
                ?>
              </select>
              <br>
              <br>
            </div>
          
            <div>  
              <select style="height:50px; width:200px; font-size:18px; background-color: white; box-shadow:8px 8px 16px 0px rgba(0,0,0,0.2);" id="academicSupportiveList" name="academicSupportiveList" onchange="addStaffRecipient('academicSupportiveList');"  >
                <option value="">Academic Supportive Staff </option>
                <?php
                     
                  foreach ($controllerData[1] as $data){
                    echo ("<option value='$data[userName]'>".$data['fullName']. " -  ".$data['userName']." </option>" );
                  }
                ?>
              </select>
           
              <br>
              <br>
            </div>

            <div>
              <select style="height:50px; width:200px; font-size:18px; background-color: white; box-shadow:8px 8px 16px 0px rgba(0,0,0,0.2);" id="administrativeList" name="administrativeList" onchange="addStaffRecipient('administrativeList');">
              <option value="">Administrative Staff </option>
                <?php
                     
                  foreach ($controllerData[2] as $data){
                    echo ("<option value='$data[userName]'>".$data['fullName']. " -  ".$data['userName']." </option>" );
                  }
                ?>
       
              </select>
           
              <br>
              <br>
              
             
            
            <br>
            <br>
          </div>
          
          
          <br>
          <br>
          <form action = " " method="POST">
             
            <label style="text-align: left;">Contacts </label>
            <br>
            <textarea cols="100" name="contacts" style="font-size:15px;  background-color: rgb(198, 241, 198); box-shadow:8px 8px 16px 0px rgba(0,0,0,0.2);" id="contacts" readonly></textarea>
           
              <br>
              <br>
              <label> Title </label> 
              <br>
              <textarea name = "title" cols="70" style="font-size:16px; background-color: rgb(198, 241, 198); box-shadow:8px 8px 16px 0px rgba(0,0,0,0.2);"></textarea>
             

             
            <br>
            <br>
      
             
              <label> Message </label>
              <br>
              <textarea name = "message" rows="5" cols="70" style="font-size:16px; background-color:rgb(198, 241, 198); box-shadow:8px 8px 16px 0px rgba(0,0,0,0.2);"></textarea>
             

            <br>

             
              <button class="button submit" name="submit" type="submit" style= "background-color: #4CAF50">Send
              </button>

              <button class="button cancel" colour="green" style="background-color: #FF0000">Cancel
              </button>
             

          </form>       
           
          <br>
          <br>
        </div>

  
      </div>
       


    <!-- include footer section -->
    <?php basicLoader::loadFooter('../../'); ?>

    <script src="assets/sendMessageJs.js">
    </script>
</body>
</html>