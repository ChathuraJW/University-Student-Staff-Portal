<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="assets/forgetPasswordStyles.css">
    <link rel="stylesheet" href="../assets/css/gridSystem.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <!-- include header section -->
    <?php require('../assets/php/basicLoader.php')?>
    <header>
        <div class='overlay row col-3'>
            <div class='imgSection'>
                <img src='../assets/image/universityLogo.png' alt='UOC_logo'/>
            </div>
            <div class='textSection'>
                <span class='mainText'>University Student-Staff Portal</span><br>
                <span class='uniName'>University of Colombo School of Computing<br>Sri Lanka</span>
            </div>
            <div class='imgSection'>
                <img src='../assets/image/logoUSSP.png' alt='UCSC_logo'/>
            </div>
        </div>
    </header>
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
            /* background-color: rgb(255, 243, 176); */
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
        }
    </style>
    <div class="featureBody" >
        <!-- this form get the username who wants to change the password -->
        <form class="form" action="" method="post"> 
            <div class="head">FORGET PASSWORD</div>
            <div class="data">
                <label for="index">Your User Name</label>
                <input id="index" name="userName" type="text"><br>
                <input class="button" type="submit" name="submit" value="Reset Password">
            </div>
        </form>

    </div>
    <script src="../assets/js/toast.js"></script>
    <script src="../assets/js/changeTheme.js"></script>
    <!-- include footer section -->
    <?php BasicLoader::loadFooter('../../') ?>
</body>

</html>