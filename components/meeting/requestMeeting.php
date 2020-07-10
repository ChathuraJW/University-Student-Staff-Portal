<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
</head>
<body>
    <!-- include header section -->
    <?php require('../../assets/php/commonHeader.php')?>
    
    <!-- feature body section -->
    <div class="featureBody">
        <h2>Make Your Request</h2>
        <!-- fist lecturer and date -->
        <label for="lecture1">Lecturer </label>
        <input list="lecture1">
        <datalist id="lecture1">
            <option value="LEC1045"></option>
            <option value="LEC1305"></option>
            <option value="LEC1023"></option>
            <option value="LEC1245"></option>
            <option value="LEC1395"></option>
            <option value="LEC1294"></option>
        </datalist> 
        <label for="date1">Date </label>
        <input type="date" id="date1"><br>

        <!-- object for lecturer shedule of the day -->
        <object data=""></object><br>
        <form method="get" action="submit.php">
        <fieldset>
        <label for="lecture2">Lecturer </label>
        <input list="lecture2">
        <datalist id="lecture2">
            <option value="LEC1045"></option>
            <option value="LEC1305"></option>
            <option value="LEC1023"></option>
            <option value="LEC1245"></option>
            <option value="LEC1395"></option>
            <option value="LEC1294"></option>
        </datalist> <br>
        <label for="date2">Date </label>
        <input type="date" id="date2"><br>

        <label for="time">Time </label>
        <input type="time" id="time"><br>

        <label for="description">Description </label>
        <input type="text" id="description"><br>
        
        <button type="submit" value="Submit">Request an Appointment</button>
        
        
        <button type="reset">Reset</button>
        </form>
        <!-- <input type="submit" action="/submit" value="Request an Appointment"> -->
        </fieldset>
    </div>
    

    <!-- include footer section -->
    <?php require('../../assets/php/commonFooter.php')?>
</body>
</html>