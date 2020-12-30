<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/gridSystem.css">
    <link rel="stylesheet" href="assets/checkedApplicationStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" />

</head>
<style>
  .dataEntry{
    display: table;
    width:100%;
    margin-bottom:20px;
  }
  .dataLabel{
    
    width:50%;
    text-align:center;
    font-size:15px;
    font-weight:bold;

  }
  .data{
    display:table-cell;
    width:50%;
  }
  .head{
    padding:20px;
    text-align:center;
    font-size:25px;
    font-weight:bold;


  }
   
  .applicationForm{
    width:100%;
    
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 30px 30px 0 rgba(0, 0, 0, 0.19);

  }
  .inputLabel{
    width: 25%;
    font-size: 18px;
    
  }
  .container2{
    width:90%;
    margin:auto;
    
  }
  .input{
    width:95%;
    margin:auto;
    padding:10px;
    border:solid;
    border-color: rgb(218, 218, 218);
    outline: none;
    font-size: 18px;

  }
  .requestMessage{
    font-size:18px;
    width: 700px;
    height: 700px;
    border: 3px solid green;
    border-top: 3px solid green;
    border-radius: 4px;
    padding-top: 10px;
    padding-left: 20px;
    padding-bottom: 20px;
    padding-right: 20px;
    position: absolute;
    top: 60%;
    left: 22%;
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
    box-shadow: 0 16px 18px 0 rgb(97, 107, 97);
    
  }
  .featureBody{
    font-family: Varela;
    src: url('../../../assets/font/Varela-Regular.ttf');
}
</style>
<body>
<div class="featureBody">
  <div class="requestMessage" id="form">
      <form action="/action_page.php" class="checkedApplication">
        <div>
          <div class="head">Season Request</div>
          <div style="float:right;">Date 2020/02/17</div><br>
          <!--<div class="dataEntry"  >
            <div class="dataLabel" style="font-size: 20px;">Name</div>
            <div class="data" style="font-size: 20px;">Mr.Kamal</div>
          </div>
          <div class="dataEntry">
            <div class="dataLabel" style="font-size: 20px;">From Month</div>
            <div class="data" style="font-size: 20px;">January</div>
          </div>
          <div class="dataEntry">
            <div class="dataLabel" style="font-size: 20px;">To Month</div>
            <div class="data" style="font-size: 20px;">June</div>
          </div>
          <div class="dataEntry">
            <div class="dataLabel" style="font-size: 20px;">Address</div>
            <div class="data" style="font-size: 20px;">No 15 gall road,Kaluthara</div>
          </div>
          <div class="dataEntry">
            <div class="dataLabel" style="font-size: 20px;">From Station</div>
            <div class="data" style="font-size: 20px;">Moratuwa</div>
          </div>
          <div class="dataEntry">
            <div class="dataLabel" style="font-size: 20px;">To Station</div>
            <div class="data" style="font-size: 20px;">Bambalapitiya</div>
          </div>
          <div class="dataEntry">
            <div class="dataLabel" style="font-size: 20px;">To Month</div>
            <div class="data" style="font-size: 20px;">June</div>
          </div>-->
          <br>
                  <label for="fullName" class="inputLabel fullName">Full Name:</label><br>
                  <input type="text" id="fullName" name="fullName" class="input fullNameText" value="Mr. Kamal Perera" readonly><br><br>
                  <label for="name" class="inputLabel name">Name with initials:</label><br>
                  <input type="text" id="name" name="name" class="input nameText" value="K.Perera" readonly><br><br>
                  <label for="regNo" class="inputLabel regNo">Registration Number:</label><br>
                  <input type="text" id="regNo" name="regNo" class="input regNoText" value="2018cs145" readonly><br><br>

                  <label for="address" class="inputLabel name">Address:</label><br>
                  <input type="text" id="address" name="address" class="input nameText" value="No 15 gall road,Kaluthara" readonly><br><br>

                  <div class="row col-2">
                    <div>
                    <label for="fromMonth" class="inputLabel name">From Month:</label>
                    <input type="text" id="fromMonth" style="width:90%;" name="fromMonth" value="March" class="input nameText" readonly>
                       <br>
                    </div>

                    <div>
                      <label for="fromMonth" class="inputLabel name">To Month:</label>
                      <input type="text" style="width:90%;" id="toMonth" name="toMonth" value="July" class="input nameText" readonly>
                        <br>
                    </div>
                    <div>
                      <label for="homeStation" class="inputLabel name">Nearest Station from Home:</label><br>
                      <input type="text" id="homeStation" style="width:90%;" value="Moratuwa" name="homeStation" class="input nameText" readonly><br><br>
                    </div>
                    <div>
                      <label for="universityStation" class="inputLabel name">Nearest Station from University:</label><br>
                      <input type="text" id="universityStation" style="width:90%;" value="Bambalapitiya" name="universityStation" class="input nameText" readonly><br><br>
                    </div>

                    

                  </div>

                  <div class="dataEntry">
                    <div class="dataLabel">
                    <input type="submit" class="checkedButton" value="Checked" style="font-size: 16px;" >
                    </div>
                    <div class="data">
                    <a  href="checkTrainSeason"> 
                    <input type="button" class="cancelButton" value="Cancel" style="font-size: 16px;">
                    </a>
                    <br>
                    </div>
                  </div>
        </div>
        
         
      </form>
  </div>
</div>
</body>
</html>