<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USSP Login</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <style>
        body{
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            background-image: url('assets/images/loginBackground.jpg');
        }

    </style>
</head>
<body>
    <div class="login">
        <img src="assets/images/UNI_logo.png" alt="UNI Logo"><br>
        <span>University<br> Student-Staff<br> Portal</span><br>
        <form action="" method="post">
            <div class="inputPlaceholder">
                <label for="userName" id="labelUserName">User Name</label>
                <input type="text" name="userName" id="userName" class="inputField" autocomplete="off"><br>
            </div>
            <div class="inputPlaceholder">
                <label for="password" id="labelPassword">Password</label>
                <input type="password" name="password" id="password" class="inputField" autocomplete="off">
            </div>
            <br>
            <div style="text-align: center">
                <input type="submit" value="Log In" name="login" id="login" class="loginButton" style="background-color: green;">
                &nbsp;<input type="reset" value="Cancel" name="cancel" id="cancel" class="loginButton" style="background-color: red; ">
            </div>
        </form>
        <br>
        <a href="#">Forget Password</a>
    </div>
    <script src="assets/js/main.js"></script>
</body>
</html>