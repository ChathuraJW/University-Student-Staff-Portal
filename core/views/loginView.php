<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../assets/css/main.css.css">
    <link rel="stylesheet" href="../assets/css/gridSystem.css">
    <link rel="stylesheet" href="assets/login.css">
</head>
<body>
<div class="login">
    <img src="../assets/image/universityLogo.png" alt="UNI Logo"><br>
    <span class="title">University<br> Student-Staff<br> Portal</span><br>
    <form action="" method="post">
        <div class="inputPlaceholder">
            <label for="userName" id="labelUserName">User Name</label>
            <input type="text" name="userName" id="userName" class="inputField" autocomplete="off" required
                   maxlength="9" minlength="3" oninput="validateUserName()"><br>
        </div>
        <div class="inputPlaceholder">
            <label for="password" id="labelPassword">Password</label>
            <input type="password" name="password" id="password" class="inputField" autocomplete="off" required>
        </div>
        <br>
        <div style="text-align: center">
            <input type="submit" value="Log In" name="login" id="login" class="loginButton">
        </div>
    </form>
    <br>
    <a href="#"><span>Forget Password?</span></a>
</div>
<script src="assets/login.js"></script>
</body>
</html>