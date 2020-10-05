<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
</head>
<body>
    <!-- include header section -->
    <?php require('../../assets/php/commonHeader.php')?>
    
    <!-- feature body section -->
    <div class="featureBody">
      <hi> Send Messages </h1>
      <br>
      <br>  

      <label for="opt"> Enter the contacts </label>
      <select id="opt" name="opt">
      <option
        value="Academic Staff">Academic Staff</option>
      <option
        value="Academic Supportive Staff">Academic Supportive Staff</option>
      <option
        value="Academic Supportive Head">Academic Supportive Head</option>
      </select>
      <br>
      <br>

      <label> Message </label>
      <br>
      <textarea name = "Message" rows="5" cols="70"></textarea>
      <br>

      <button type="button">Send
      </button>
      

      <button type="button">Cancel
      </button>
      <br>
      <br>

  



    </div>

    <!-- include footer section -->
    <?php require('../../assets/php/commonFooter.php')?>
</body>
</html>