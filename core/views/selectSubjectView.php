<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="assets/selectSubjectStyle.css">
    <link rel="stylesheet" href="../assets/css/gridSystem.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
    <!-- include header section -->
    <?php require('../assets/php/basicLoader.php')?>
    <?php BasicLoader::loadHeader('../') ?>
    <!-- feature body section -->
    <div class="featureBody bodyBackground text" >
    <!-- <option credit='".$record['creditValue']."'value='".$record['courseCode']."'>'".$record['name']."'</option> -->
        <form class="mainForm" id="theForm" action="" name="theForm" method="post">
            <!-- <select name="" id=""> -->
            <div class="heading text">Subject Selection</div>
            <div class="statement">System will not care about compulsory subject. User have to get responsibility to select their compulsory subjects correctly.</div>
            <div class="creditBox" id="credit">
                <div class="creditName">Total Credit: <span  id="creditValue" value="0">0</span> </div>
                <!-- <div class="creditValue" id="creditValue" value="0">0</div> -->
            </div>
                <?php
                    $records=$controllerData;
                    // In here we list the subjects belongs to user in current semester
                    foreach($records as $record){
                        echo(" 
                            <div class='entry'>
                                <div class='label'>
                                    <label for='".$record['courseCode']."'>".$record['courseCode']." - ".$record['name']."<p>    </p> Credit:".$record['creditValue']."</label>
                                </div>
                                <div class='value'>
                                    <input class='inputBox' credit='".$record['creditValue']."' id='".$record['courseCode']."' type='checkbox' name='checkingBox[]' onclick='creditFunction(`".$record['courseCode']."`);' value='".$record['courseCode']."'>
                                </div>
                            </div>
                            <br>
                            ");
                    }
                ?>
                <div style="margin-bottom:40px;"class="buttonGroup">
                    <div ><input class="button buttonSubmit"type="submit" name="submit"  value="Submit"></div>
                    <div ><input class="button buttonSubmit"type="reset" name="reset"  value="Cancel"></div>
                </div>
            
            
            <!-- </select> -->
        </form>

    </div>
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/toast.js"></script>
    <script src="../assets/js/changeTheme.js"></script>
    <script>
        function creditFunction(id){
            var checkBox = document.getElementById(id);  //get id of the checked checkbox
            var creditValue = document.getElementById("creditValue"); //get id of span what containing the credit value
            
            if (checkBox.checked == true){              // Here, If check value is true then credit value of span view is increase by checked subject's credit value 
                var credit=checkBox.getAttribute('credit');
                var x=parseInt(credit);
                var value =creditValue.getAttribute('value');
                var y=parseInt(value);
                var z=x+y;
                var str=z.toString();
                creditValue.setAttribute('value',z);
                creditValue.innerHTML=z;

            } else {          // Here, If check value is false then credit value of span view is decrease by checked subject's credit value 
                var credit=checkBox.getAttribute('credit');
                var x=parseInt(credit);
                var value =creditValue.getAttribute('value');
                var y=parseInt(value);
                var z=y-x;
                var str=z.toString();
                creditValue.setAttribute('value',z);
                creditValue.innerHTML=z;
            }
        }

        // this code get from stackoverflow

        var fixmeTop = $('#credit').offset().top;       // get initial position of the element

        $(window).scroll(function() {                  // assign scroll event listener

            var currentScroll = $(window).scrollTop(); // get current position

            if (currentScroll >= fixmeTop) {           // apply position: fixed if you
                $('#credit').css({                      // scroll to that element or below it
                    position: 'fixed',
                    top: '0',
                    left: '0'
                });
            } else {                                   // apply position: static
                $('#credit').css({                      // if you scroll above it
                    position: 'static'
                });
            }

        });
    </script>

    <!-- include footer section -->
    <?php BasicLoader::loadFooter('../') ?>
</body>
</html>
