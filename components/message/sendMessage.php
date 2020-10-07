bn<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <style>
    .button{
      border: none;
      color: white;
      padding: 6px 18px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      cursor: pointer;
    }
    .button1{
      background-color: #4CAF50;
    }
    .button2{
      background-color: #FF0000;
    }
    </style>

    <style>
      h1 {text-align: center;}
  
      div {text-align: center;}
    </style>
    

</head>
<body>
    <!-- include header section -->
    <?php require('../../assets/php/commonHeader.php')?>
    
    <!-- feature body section -->
    <div class="featureBody">
      <hi style="font-size: 40px;"><b> Send Messages </b></h1>
      
      <br>
      <br> 
      <label for="opt"; style="font-size: 20px;"> Enter the contacts </label>
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
      <label style="font-size: 20px;"> Title </label> 
      <br>
      <textarea name = "Title" cols="70"></textarea>
      <br>
      <br>
      
      
      <label style="font-size: 20px;"> Message </label>
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

    <!-- include footer section -->
    <?php require('../../assets/php/commonFooter.php')?>
</body>
</html>