<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/gridSystem.css">
    <link rel="stylesheet" href="assets/applicationStyle.css">
</head>
<body>
<div class="form" id="form">
      <form action="/action_page.php" class="application">
        <label for="fullName" class="fullName">Full Name:</label>
        <input type="text" id="fullName" name="fullName" class="fullNameText"><br><br>
        <label for="name" class="name">Name with initials:</label>
        <input type="text" id="name" name="name" class="nameText"><br><br>
        <label for="regNo" class="regNo">Registration Number:</label>
        <input type="text" id="regNo" name="regNo" class="regNoText"><br><br><br>
        <input type="submit" value="Submit" class="submit">
        <a class="backPage" href="applyTrainSeason"> 
          <input type="button" value="Cancel" class="cancel">
        </a>
      </form>
</div>
</body>
</html>