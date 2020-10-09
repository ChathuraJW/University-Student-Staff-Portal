bn<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="../../components/message/smStyle.css">
     
     

</head>
<body>
    <!-- include header section -->
    <?php require('../../assets/php/commonHeader.php')?>
    
    <!-- feature body section -->
    <!--<div class="row col-1">-->
      <div class="container">
        <div class="featureBody">
     
          <h1><b> Send Messages </b></h1>
      
          <br>
          <br> 
          <label for="opt"> Enter the contacts </label>
          <br>
          <select id="opt1" name="opt1">
            <option
              value="Academic Staff">Academic Staff</option>
            <option
              value="None">None</option>
       
          </select>

          <select id="opt2" name="opt2">
       
            <option
              value="Academic Supportive Head">Academic Supportive Head</option>
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
          <br>
          <br>
          <label> Title </label> 
           <br>
          <textarea name = "Title" cols="70"></textarea>
          <br>
          <br>
      
      
          <label> Message </label>
          <br>
      
          <textarea name = "Message" rows="5" cols="70"></textarea>
          <br>

          <button class="button button1">Send
          </button>

          <button class="button button2">Cancel
          </button>
       

       
          <br>
          <br>

  
        </div>
      </div> 

    <!--</div>-->

    <!-- include footer section -->
    <?php require('../../assets/php/commonFooter.php')?>
</body>
</html>