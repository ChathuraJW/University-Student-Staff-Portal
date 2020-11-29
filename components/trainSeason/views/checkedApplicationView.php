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
    display:table-cell;
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
background-color: rgb(225, 247, 192);

  }
   
   


  }
  .requestMessage{
    font-size:18px;
  }
  .featureBody{
    font-family: Varela;
    src: url('../../../assets/font/Varela-Regular.ttf');
}
</style>
<body>
<div class="form requestMessage" id="form">
      <form action="/action_page.php" class="checkedApplication">
        <div>
          <div class="head">Season Request</div>
          <div style="float:right;">Date 2020/02/17</div><br>
          <div class="dataEntry"  >
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
          </div>
          <br>
          
        </div>
        
        <div class="dataEntry">
          <div class="dataLabel">
            <input type="submit" class="checkedButton" value="Checked" style="font-size: 16px;" >
          </div>
          <div class="data">
            <a  href="checkTrainSeason"> 
              <input type="button" class="cancelButton" value="Cancel" style="font-size: 16px;">
            </a>
          </div>
        </div>
      </form>
</div>
</body>
</html>