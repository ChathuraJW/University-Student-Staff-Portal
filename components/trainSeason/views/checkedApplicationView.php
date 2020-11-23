<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/gridSystem.css">
    <link rel="stylesheet" href="assets/checkedApplicationStyle.css">
</head>
<body>
<div class="form" id="form">
      <form action="/action_page.php" class="checkedApplication">
        <label for="fullName" class="fullName">Full Name:</label>
        <input type="text" id="fullName" name="fullName" size="80" class="fullNameText" value="Agampodi Thathsarani Piyumi Senarath" readonly><br><br>
        <label for="name" class="name">Name with initials:</label>
        <input type="text" id="name" name="name" size="60" class="nameText" value="A.T.P. Senarath" readonly><br><br>
        <label for="regNo" class="regNo">Registration Number:</label>
        <input type="text" id="regNo" name="regNo" class="regNoText" value="2018cs154" readonly><br><br><br>
        <input type="submit" value="Checked" class="submit">
        <a class="backPage" href="checkTrainSeason"> 
          <input type="button" value="Cancel" class="cancel">
        </a>
      </form>
</div>
</body>
</html>