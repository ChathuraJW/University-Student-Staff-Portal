<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        <span>University<br> Student-Staff<br> Portal</span><br>
        <form action="" method="post">
            <div>
                <input type="text" name="userName" id="userName" class="inputField"><br>
                <label for="userName">User Name</label>
            </div>
            <div>
                <input type="password" name="password" id="password" class="inputField"><br>
                <label for="password">Password</label>
            </div>
            <input type="submit" value="Log In" name="login" id="login" class="loginButton" style="background-color: green;">
            <input type="reset" value="Cancel" name="cancel" id="cancel" class="loginButton" style="background-color: red; ">
        </form>
    </div>
</body>
</html>