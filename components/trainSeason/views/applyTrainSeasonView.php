<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="../../assets/css/gridSystem.css">
    <link rel="stylesheet" href="assets/applyTrainSeasonStyle.css">
    <link rel="stylesheet" href="assets/applyTrainSeasonStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" />


</head>
<body>
    <!-- include header section -->
    <?php require_once('../../assets/php/basicLoader.php') ?>
    <?php basicLoader::loadHeader('../../'); ?>

    
    <!-- feature body section -->
     
    <div class="featureBody">
        <div class="row col-2">
          <div class="applicationForm">
            <br>
            <h1 style="text-align:center;"><b>Apply Train Season<b></h1><br>
            <div class="container2">
                <!-- <div class="vertical-center"> -->

                <form method="POST" class="application">
                  <label for="fullName" class="inputLabel fullName">Full Name:</label><br>
                  <input type="text" id="fullName" name="fullName" class="input fullNameText"><br><br>
                  <label for="name" class="inputLabel name">Name with initials:</label><br>
                  <input type="text" id="name" name="name" class="input nameText"><br><br>
                  <label for="regNo" class="inputLabel regNo">Registration Number:</label><br>
                  <input type="text" id="regNo" name="regNo" class="input regNoText"><br><br>
                  <select name="acYear" id="acYear" required>
                  </select>

                  <label for="address" class="inputLabel name">Address:</label><br>
                  <input type="text" id="address" name="address" class="input nameText"><br><br>

                  <label for="address" class="inputLabel name">Age:</label><br>
                  <input type="text" id="age" name="age" class="input nameText"><br><br>

                  <div class="row col-2">
                    <div>
                    <label for="fromMonth" class="inputLabel name">From Month:</label>

                      <select class="input"  name="fromMonth" placeholder="From Month" id="fromMonth">
                          <option data-value="">January</option>
                          <option data-value="">February</option>
                          <option data-value="">March</option>
                          <option data-value="">April</option>
                          <option data-value="">May</option>
                          <option data-value="">June</option>
                          <option data-value="">July</option>
                          <option data-value="">August</option>
                          <option data-value="">September</option>
                          <option data-value="">October</option>
                          <option data-value="">November</option>
                          <option data-value="">December</option>
                          
                      </select> <br>
                    </div>

                    <div>
                      <label for="fromMonth" class="inputLabel name">To Month:</label>

                      <select class="input"  name="toMonth" placeholder="To month" id="toMonth">
                          <option data-value="">January</option>
                          <option data-value="">February</option>
                          <option data-value="">March</option>
                          <option data-value="">April</option>
                          <option data-value="">May</option>
                          <option data-value="">June</option>
                          <option data-value="">July</option>
                          <option data-value="">August</option>
                          <option data-value="">September</option>
                          <option data-value="">October</option>
                          <option data-value="">November</option>
                          <option data-value="">December</option>
                      
                      </select> <br>
                    </div>
                    <div>
                      <label for="homeStation" class="inputLabel name">Nearest Station from Home:</label><br>
                      <input type="text" id="homeStation" name="homeStation" class="input nameText"><br><br>
                    </div>
                    <div>
                      <label for="universityStation" class="inputLabel name">Nearest Station from University:</label><br>
                      <input type="text" id="universityStation" name="universityStation" class="input nameText"><br><br>
                    </div>

                  </div>
                    

                    


                  <input type="submit" value="Submit" class="button submitButton" name="submit">
                  <br>
                  <a class="backPage" href="applyTrainSeason"> 
                    <input type="button" value="Cancel" class="button cancelButton" name="cancel">
                  </a>
                </form>
                
                    <!-- <button class="viewHistory" id="viewHistory" onclick="alertFunction()">View Request History</button> 
                    <br><br> -->
                    
                    
                    <!-- <a class=application href="application">
                    
                        <button class="apply" id="apply">Request Season</button>
                    </a> -->
                    <!-- <button class="cancel" id="cancel ">Cancel</button> -->
                <!-- </div> -->
                
            </div>
            <br>
            <br>
          </div>
          <br><br>
          <div class="history">
            
            <label style="font-size: 20px"><b>Request History</b></label>
            <hr>
            <br>
            <?php
            for($x=0;$x<3;$x++){
              echo ("
              <div class='pastRequest'>
                <div>From  Moratuwa</div>
                <div>To    Bambalapitiya</div>
                <div style='float:right'>2020/02/17</div>
              </div>
              ");
            }
            ?>
          </div>
        </div>
    
    </div>
    
     

    <!-- include footer section -->
    <?php basicLoader::loadFooter('../../'); ?>
    <script>
      function alertFunction(){
        alert("You can request twice more");

      }

    </script>
     
    <script src="assets/applyTrainSeasonJs.js">
    </script>

</body>
</html>