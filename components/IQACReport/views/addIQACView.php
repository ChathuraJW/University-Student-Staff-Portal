<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="../../assets/css/gridSystem.css">
    <link rel="stylesheet" href="assets/addIQACStyle.css">
</head>
<body>
    <!-- include header section -->
    <?php require_once('../../assets/php/basicLoader.php') ?>
    <?php basicLoader::loadHeader('../../'); ?>

    
    <!-- feature body section -->
    <div class="featureBody">
      <h1><b>Add IQAC Report</b></h1>
      <br>
      <div class="container">
        <br> 
        <select name="lecturer" id="lecturer" class="lecturer">
          <option value="Select Lecturer Name">Select Lecturer Name</option>
          <option value="Dr.Manju Wickramsinghe">Dr.Manju Wickramsinghe</option>
          <option value="Dr.Kapila Dias">Dr.Kapila Dias</option>
          <option value="Dr.Noel Fernando">Dr.Noel Fernando</option>
        </select>
        <br><br>
        <select name="course" id="course" class="course">
          <option value="Select Course Code">Select Course Code</option>
          <option value="SCS1201">SCS1201</option>
          <option value="SCS1202">SCS1202</option>
          <option value="SCS1203">SCS1203</option>
        </select>
        <br>
        <br>
        <div class="upload">
          <form action="/action_page.php" id="file" class="file">
            <input type="file" id="file" name="file" class="myFile"><br><br>
            <input type="submit" class="submit">
          </form>
          <br>
        </div>
      </div>
      <br><br>
    </div>

    <!-- include footer section -->
    <?php basicLoader::loadFooter('../../'); ?>

</body>
</html>