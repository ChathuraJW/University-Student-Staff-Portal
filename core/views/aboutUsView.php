<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="assets/aboutUs.css">
    <link rel="stylesheet" href="../assets/css/gridSystem.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
<!-- include header section -->
<?php require('../assets/php/basicLoader.php') ?>
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
<div class="featureBody bodyBackground text">

    <div class="head">About Us</div>
    <div class="row col-2 imageSet">
        <div>
            <div class="image">
                <p class="textStyle">Supervisor</p>
                <img class="imageFirst" src="assets/images/imageOne.png">
                <div>
                    <p style="font-weight:bold;" class="text">Dr. Manjusri Wickramasinghe<br>B.Sc(Col), Ph.D (Monash)</p>
                    <p class="text">Senior Lecturer</p>
                    <p class="text">Department of Computation and Intelligent Systems (CIS),
                        University of Colombo School of Computing,
                        No. 35, Reid Avenue, Colombo 07, Sri Lanka</p>
                    <!-- <p class="text">email.com</p> -->
                </div>
            </div>
        </div>
        <div>
            <div class="image">
                <p class="textStyle">Co-Supervisor</p>
                <img class="imageFirst" src="assets/images/imageTwo.png">
                <div>
                    <p style="font-weight:bold;" class="text">Ms. Nimali Wasana <br> B.Sc(Col), MCS(Col)</p>
                    <p class="text">Instructor, Project Officer in Professional Development Centre</p>
                    <p class="text">University of Colombo School of Computing.
                        No. 35, Reid Avenue, Colombo 07, Sri Lanka.</p>
                </div>
            </div>
        </div>
    </div>
    <div style="margin-top:5%;text-align:center;font-weight:bold;font-size:120%" class="text">Development Team</div>
    <div class="imageSet row col-4">
        <div class="image">
            <img class="imageSecond" src="assets/images/imageThree.png">
            <div>
                <p style="font-weight:bold;" class="text">Mr. Chathura Wanniarachchi</p>
                <a class="text" href="https://www.linkedin.com/in/chathura-janaranjana-wanniarachchi">
                    <i class="fa fa-linkedin" aria-hidden="true"></i>
                </a>
            </div>
        </div>
        <div class="image">
            <img class="imageSecond" src="assets/images/imageThree.png">
            <div>
                <p style="font-weight:bold;" class="text">Miss. Shubangi Chamod</p>
                <a class="text"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="image">
            <img class="imageSecond" src="assets/images/imageThree.png">
            <div>
                <p style="font-weight:bold;" class="text">Mr. Rajith<br> Chamod</p>
                <a class="text"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="image">
            <img class="imageSecond" src="assets/images/imageThree.png">
            <div>
                <p style="font-weight:bold;" class="text">Miss. Piyumi Senarath</p>
                <a class="text"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>


</div>
<script src="../assets/js/jquery.js"></script>
<script src="../assets/js/toast.js"></script>
<script src="../assets/js/changeTheme.js"></script>


<!-- include footer section -->
<?php BasicLoader::loadFooter('../') ?>
</body>
</html>
