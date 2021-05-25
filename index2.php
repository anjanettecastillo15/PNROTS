<html>

<head>
    <title>PNROTS</title>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="jumbotron bg-warning" style="margin-bottom: 0px;">
        <h1>Philippine National Railways</h1>
        <h2>Online Ticketing System</h2>
        <p>Easiest way to book train tickets</p>
    </div>

     <!--NAVBAR START-->
     <nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapse_target">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="collapse_target">
            <a class="navbar-brand"><img src="PNR_logo.php"></a>
            <span class="navbar-text">PNR Online Ticketing System</span>

            <ul class="navbar-nav ml-lg-auto">
                <li class="nav-item">
                    <a class="nav-link" href="first.html">Log Out</a>
                </li>
            </div>
        </nav>
        <!--NAVBAR END-->
</body>


<?php

include("dbconnect.php");

if($_SERVER['REQUEST_METHOD'] == "POST"){
   //something was posted
   $transnum = rand(1,1000000);
   $name = $_POST['name'];

   if(isset($_POST['departure'])){
    $departure = $_POST['departure'];
   }
   if(isset($_POST['arrival'])){
    $arrival = $_POST['arrival'];
   }
   if(isset($_POST['time'])){
    $time = $_POST['time'];
   }
   if(isset($_POST['date'])){
    $dot = $_POST['date'];
   }
   
   if(!empty($name) && !empty($departure) && !empty($arrival) && !empty($time) && !empty($dot)){
       if($departure === $arrival){
            echo "Stations are not valid";
       }
       else{
        $stmt = $conn->prepare("insert into ticket (ref_num, name, date_of_travel, departure, arrival, time, payable) values ('$transnum','$name','$dot','$departure', '$arrival', '$time', '15')");
        $stmt->execute();
        
        $result = mysqli_query($conn, "SELECT * FROM ticket WHERE ref_num='$transnum'");
        while($row = mysqli_fetch_array($result))
            {
                echo "VIRTUAL TICKET";
                echo "<br>";
                echo "<br>";
                echo "Print and present this details upon boarding the train";
                echo "<br>";
                echo "<br>";
                echo 'Reference Number: '.$row['ref_num'].'<br>';
                echo 'Name: '.$row['name'].'<br>';
                echo 'Date of Travel: '.$row['date_of_travel'].'<br>';
                echo 'Departure Station: '.$row['departure'].'<br>';
                echo 'Arrival Station: '.$row['arrival'].'<br>';
                echo 'Departure Time: '.$row['time'].'<br>';
                echo 'Payable: '.$row['payable'].'<br>';
                echo "<br>";
                echo "<br>";
                echo 'Date Booked: '.$row['date_booked'].'<br>';
                echo 'Time Booked: '.$row['time_booked'].'<br>';
                echo "<br>";
                echo "<br>";
                echo "Thank you and have a safe trip!";
            }
        $stmt->close();
        $conn->close();
       }
       
   }
   else{
    echo "Please enter some valid information!";
   }
}
?>
    <button class="btn btn-warning" onclick="window.print('box');" id="button">Print</button>
</html>
