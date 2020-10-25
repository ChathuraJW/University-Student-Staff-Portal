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
    <?php require('../../assets/php/commonHeader.php')?>
    
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
              <select id="academicStaffList" name="academicStaffList" >
          
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
              <select id="academicSupportiveList" name="academicSupportiveList" >
       
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
              <select id="administrativeList" name="administrativeList" >
       
                <?php
                     
                  foreach ($controllerData[2] as $data){
                    echo ("<option value='$data[userName]'>".$data['fullName']. " -  ".$data['userName']." </option>" );
                  }
                ?>
       
              </select>
           
              <br>
              <br>
            </div>
            <br>
            <br>
          </div>
          
          
          <br>
          <br>
          <form action = " " method="POST">
            <div class="row col-2">

            <div class="row col-2">
            <label style="text-align: left">Contacts </label>
            <br>
            <textarea cols="100" name="contacts"></textarea>
           
          </div>
              <label> Title </label> 
              <br>
              <textarea name = "title" cols="70"></textarea>
            </div>

             
            <br>
            <br>
      
            <div class="row col-2">
              <label> Message </label>
              <br>
              <textarea name = "message" rows="5" cols="70"></textarea>
            </div>

            <br>

            <div class="row col-6">
              <button class="button submit" name="submit" type="submit" style= "background-color: #4CAF50">Send
              </button>

              <button class="button cancel" colour="green" style="background-color: #FF0000">Cancel
              </button>
            </div>

          </form>       
           
          <br>
          <br>
        </div>

  
      </div>
       


    <!-- include footer section -->
    <?php require('../../assets/php/commonFooter.php')?>

    <script src="assets/sendMessageJs.js">
    </script>
</body>
</html>