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
           
          <label for="opt"> Enter the contacts </label>
           
          </div>
          
          <div class="row col-3">
          <select id="opt1" name="opt1" >
          
          <option value="Academic Staff">Academic Staff</option>
            <option value="None">None</option>
             
             
          <?php 
           
            while($rows = $data1->fetch_assoc())
            {
              $userName = $rows['userName'];
              
              echo "<option value = '$userName'>$userName</option>";
            }
          ?>
       
          </select>

          <select id="opt2" name="opt2">
       
            <option
              value="Academic Supportive Head">Administrative Staff</option>
            <option
              value="None">None</option>
          </select>

          <select id="opt3" name="opt3">
       
            <option
              value="Academic Supportive Staff">Academic Supportive Staff</option>
            <option
              value="None">None</option>
       
          </select>
           
          <br>
          <br>
          <textarea cols="70"></textarea>
           
           
</div>
<br>
          <br>
        <div class="row col-1">
          <label> Title </label> 
           
        </div>
        <div class="row col-1">
          <textarea name = "Title" cols="70"></textarea>
           
        </div>
        <br>
          <br>
      
        <div class="row col-1">
          <label> Message </label>
          
</div>
        <div class="row col-2">
          <textarea name = "Message" rows="5" cols="70"></textarea>
          </div>
          <br>
          <div class="row col-6">
          <button class="button button1">Send
          </button>

          <button class="button button2">Cancel
          </button>
</div>
          
           
          <br>
          <br>
</div>

  
        </div>
      </div> 

    </div>


    <!-- include footer section -->
    <?php require('../../assets/php/commonFooter.php')?>
</body>
</html>