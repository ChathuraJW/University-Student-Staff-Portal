<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="../../assets/css/gridSystem.css">
    <link rel="stylesheet" href="assets/contactUnionSection.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

</head>
<body>
<?php require_once('../../assets/php/basicLoader.php') ?>
<?php basicLoader::loadHeader('../../'); ?>
<div class="featureBody">
    <span class="heading">Contact Student Union</span>
    <div class="row col-2">
        <div class="historySection">
            <span class="columnHeader">Message History</span>
            <?php
            //temp message list with different size
            $msgList = array('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, voluptate.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum inventore libero minima neque odit reiciendis similique! Atque cumque dicta, distinctio dolor expedita in, incidunt laborum libero magni odio, perferendis qui quod sunt. Adipisci alias aliquid asperiores at consequatur delectus dicta dolores ea, et ex expedita hic id ipsum maxime mollitia nihil officiis placeat praesentium quae quas quo reprehenderit vero voluptate? Ab atque consectetur in magni minus molestias nam reprehenderit sunt unde veniam. Ab alias asperiores blanditiis excepturi obcaecati placeat quasi quos voluptas. Aut beatae distinctio ea earum eligendi est excepturi illum impedit, nesciunt ratione rerum temporibus ullam unde veritatis voluptatum.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque doloribus et exercitationem fuga molestias neque numquam quidem repellat sunt voluptate. Cum esse quae quia quisquam recusandae repellendus sed voluptatibus, voluptatum.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad commodi culpa deleniti est laboriosam laborum laudantium mollitia odit quidem vel. Alias aliquam atque culpa cupiditate deserunt dignissimos dolor dolorem dolores, doloribus dolorum ducimus ea enim et eum ex facilis hic impedit iure libero magni molestiae necessitatibus neque non numquam odio placeat quae quaerat quam quasi reiciendis repudiandae, sit suscipit temporibus ullam ut vero voluptas. Dolorem dolorum ea error modi ratione?');
            for ($i = 0; $i < 5; $i++) {
                //text size based resize button enable and content height adjustment
                if (strlen($msgList[$i % 4]) < 250) {
                    $heightValue = 'auto';
                    $displayStatus = 'none';
                } else {
                    $heightValue = '110px';
                    $displayStatus = 'block';
                }

                echo("
                <div class='messageEntry' id='entry$i'>
                    <span class='messageEntryContent'><b>Lorem ipsum dolor sit amet, consectetur.</b></span>
                    <span class='messageEntryContent' style='overflow:hidden;height:$heightValue;text-overflow: ellipsis;text-align: justify;' id='content$i'>" . $msgList[$i % 4] . "</span>
                    <span class='messageEntryContent' style='font-size:15px;'><button class='readMore' id='readMore$i' style='display:$displayStatus;' onclick='loadMore($i)'>Read More...</button></span>
                    <span class='messageEntryContent' style='float:right;color: #5a5757;'><b><i class='fas fa-calendar-day'>&nbsp;2020-11-02</i>&nbsp;&nbsp;<i class='fas fa-clock'>&nbsp;12:23:32</i></b></span>
                </div>
                ");
            }
            ?>
        </div>
        <div class="newMessageSection">
            <span class="columnHeader">Send New Message</span>
            <form class="" action="" method="post">
                <span class="inputHeading">Title:</span>
                <input type="text" name="messageTitle" required><br><br>
                <span class="inputHeading">Message:</span>
                <textarea name="messageContent" id="messageContent" rows="20" style=" resize: none;" required>
                </textarea>
                <div class="actionArea row col-2">
                    <input type="submit" name="sendMessage" value="Send The Message" class="submitCancelButton green"
                           style="margin:auto;">
                    <input type="reset" name="" value="Cancel" class="submitCancelButton red" style="margin:auto;">
                </div>
            </form>
        </div>
    </div>
</div>
<?php basicLoader::loadFooter('../../'); ?>
<script src="../../assets/js/jquery.js"></script>
<script src="assets/contactUnion.js"></script>
</body>
</html>
