<!DOCTYPE html>
<html lang="eng">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="assets/settingPage.css">
    <link rel="stylesheet" href="../assets/css/gridSystem.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>

<!-- include header section -->
<?php require('../assets/php/basicLoader.php') ?>
<?php BasicLoader::loadHeader('../') ?>
<div class="featureBody bodyBackground text">
    <form method="post" class="container" enctype="multipart/form-data">
        <div class="subHeading">
            <label class="subHeading">General</label>
        </div>
        <div class="subContainer">
            <div class="block">
                <div class="col_25">
                    <label for="firstName">First Name</label>
                </div>
                <div class="col_75">
                    <input type="text" name="firstName" value="<?php echo($controllerData->getFirstName()); ?>" required>
                </div>
            </div>
            <div class="block">
                <div class="col_25">
                    <label for="lastName">Last Name</label>
                </div>
                <div class="col_75">
                    <input type="text" name="lastName" value="<?php echo($controllerData->getLastName()); ?>" required>
                </div>
            </div>
            <div class="block">
                <div class="col_25">
                    <label for="email">Personal Email</label>
                </div>
                <div class="col_75">
                    <input type="email" name="email" value="<?php echo($controllerData->getPersonalEmail()); ?>" required>
                </div>
            </div>
            <div class="block">
                <div class="col_25">
                    <label for="address">Address</label>
                </div>
                <div class="col_75">
                    <input type="text" name="address" value="<?php echo($controllerData->getAddress()); ?>" required>
                </div>
            </div>
            <div class="block">
                <div class="col_25">
                    <label for="contactNum">Contact Number</label>
                </div>
                <div class="col_75">
                    <input type="number" name="contactNumber" value="<?php echo($controllerData->getTPNO()); ?>" required>
                </div>
            </div>
            <div class="buttonSet">
                <input class="button" type="submit" name="updateProfileData" value="Update">
                <input class="button" type="reset" value="Cancel">
            </div>
        </div>
    </form>
        <hr>
        <div class="subHeading">
            <label class="subHeading">Update Profile Picture</label>
        </div>
        <div class="subContainer">
            <form method="post" class="container" enctype="multipart/form-data">
                <div class="inputs profilePictureUpload">
                    <label for="profilePic" id="imageLoadContainer">
                        <img class="profile" id="output" src="" style="display: none;">
                        <i class="fa fa-upload" aria-hidden="true" id="uploadIcon"
                           style="display: block;padding: 15px;font-size: 7em;text-align:center;"></i>
                    </label>
                    <input class="inputField choose" type="file" accept="image/*" onchange="loadFile(event)" name="profilePic" id="profilePic">
                </div>
                <div class="buttonSet">
                    <input class="button" type="submit" name="profilePictureSubmit" value="Update">
                    <input class="button" type="reset" value="Cancel">
                </div>
            </form>
        </div>
        <hr>

        <div class="subHeading">
            <label class="subHeading">Change Password</label>
        </div>
        <div class="subContainer">
            <div class="block">
                <div class="col_25">
                    <label for="keys">Click here to Change password</label>
                </div>
                <div class="col_75">
                    <input type="button" onclick="window.open('http://localhost/ussp/core/forgetPassword','_self');" class='button' id="keys"
                           value="Change">
                </div>
            </div>
        </div>
        <hr>
        <div class="subHeading">
            <label class="subHeading">Private/Public Key Pair </label>
        </div>
        <div class="subContainer">
            <div class="block">
                <div class="col_25">
                    <label for="keys">Click here to generate public and private keys</label>
                </div>
                <div class="col_75">
                    <input type="submit" class='button' id="keys" name="pubKeySubmit" onclick="display()" value="Generate">
                </div>
            </div>
        </div>
        <a id="aTag" style="display:none;" href="http://localhost/USSP/core/privateKey.txt" onclick="displayNone()"></a>
</div>
</body>
<script src="../assets/js/jquery.js"></script>
<script src="../assets/js/toast.js"></script>
<script src="../assets/js/changeTheme.js"></script>
<script>
    let loadFile = function (event) {
        const output = document.getElementById('output');
        output.style.height = "250px";
        output.src = '';
        document.getElementById('imageLoadContainer').style.width = 'max-content';
        document.getElementById('imageLoadContainer').style.padding = '10px';
        output.style.position = "initial";

        output.src = URL.createObjectURL(event.target.files[0]);
        // switch display in-between icon and image
        document.getElementById('uploadIcon').style.display = 'none';
        document.getElementById('output').style.display = 'block';
        // abject height
        document.getElementById('output').style.height = 'auto';

        output.onload = function () {
            URL.revokeObjectURL(output.src) // free memory
        }
    };

    function display() {
        document.getElementById('aTag').style.display = "";
    }

    function displayNone() {
        document.getElementById('aTag').style.display = "none";
    }

    //change home href path
    document.getElementsByTagName('a').item(0).setAttribute('href', 'home');
</script>

<!-- include footer section -->
<?php BasicLoader::loadFooter('../') ?>
</html>