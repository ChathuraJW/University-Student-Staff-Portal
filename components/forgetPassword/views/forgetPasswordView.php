<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="assets/forgetPasswordStyles.css">
    <link rel="stylesheet" href="../../assets/css/gridSystem.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <!-- include header section -->
    <?php require('../../assets/php/basicLoader.php')?>
    <?php BasicLoader::loadHeader('../../') ?>
    
    <!-- feature body section -->
    <style>
        .form{
            margin: auto;
            border-width: 10px;
            border: black;
            width:50%;
            margin-top:10%;
            margin-left:25%;
            margin-right:25%;
            background-color: rgb(255, 243, 176);
            padding:5%;
            
        }
        .head{
            font-size: 30px;
            font-weight: 100px;
            color: darkcyan;
            margin-bottom:20px;
        }
        .button{
            margin-top:20px;
            float:right;
        }
    </style>
    <div class="featureBody" >
        
        <form class="form" action="" method="post">
            <div class="head">FORGET PASSWORD</div>
            <div class="data">
                <label for="index">Your User Name</label>
                <input id="index" name="userName" type="text"><br>
                <input class="button" type="submit" name="submit" value="Reset Password">
            </div>
        </form>

    </div>
    <!-- <p id="demo" onclick="myFunction()">Click me to change my text color.</p> -->
    <script src="../../assets/js/toast.js"></script>
    <script>
        function close(){
            document.getElementById("default").style.display = "none";
        }
        function remove(message){
            document.getElementById(message).style.display = "none";
            window.location.href=document.location.href.toString().split('respondAppointment')[0]+'respondAppointment';

        }
        
    </script>
    <!-- include footer section -->
    <?php BasicLoader::loadFooter('../../') ?>
</body>

</html>