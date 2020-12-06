<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../assets/css/gridSystem.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="assets/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css"/>

</head>
<body>

<!-- header section -->


<!--login detail section-->
<div class="loginInfo">
    <h4>Login as <?php echo $_COOKIE["fullName"]; ?> &nbsp;<span><a href="../assets/php/logout.php"
                                                                    style="color: white;"><i class="fas fa-sign-out-alt"
                                                                                             style="color: white;"></i></a></span>
    </h4>
</div>

<div class="container">
    <div class="notificationStack">
    </div>
    <div class="content">
    </div>
    <div class="userInformation">
        <div class="profileSection">
            <a href="" class="userSetting"><i class="fas fa-cog fa-2x"></i></a>
            <div class="profilePic">
                <!--                    update profile picture based on the picture availability and the gender-->
                <?php
                $filePath = '';
                if ($controllerData[0][0]['profilePicURL'] === "") {
                    if ($controllerData[0][0]['gender'] === 'M')
                        $filePath = "userMale.jpg";
                    else
                        $filePath = "userFemale.jpg";
                } else {
                    $filePath = $controllerData[0][0]['profilePicURL'];
                }
                echo("
                        <img src='assets/profile picture/{$filePath}' alt='profilePic' style='height: auto;width: 100%;margin: auto'>
                        ");
                ?>

            </div>
            <div class="userInfo">
                <?php
                echo("
                            <span class='name'><span style='font-size: 20px'>(" . $controllerData[0][0]['salutation'] . ")&nbsp;</span>" . $controllerData[0][0]['firstName'] . "<br>" . $controllerData[0][0]['lastName'] . "</span><br>
                            <span class='emailPersonal'>" . $controllerData[0][0]['personalEmail'] . "</span><br>
                            <span class='emailUniversity'>" . $controllerData[0][0]['universityEmail'] . "</span><br>
                            <span class='gpa green' id='displayGPA'>" . $controllerData[0][0]['currentGPA'] . "</span>
                        ");
                ?>
            </div>
        </div>
    </div>
</div>

<!--load footer-->
<?php require_once('../assets/php/basicLoader.php') ?>
<?php BasicLoader::loadFooter("../"); ?>

<script src="../assets/js/jquery.js"></script>
<!--<script src="assets/home.js"></script>-->
</body>
</html>