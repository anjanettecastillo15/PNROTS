<html>
<head>
    <title>PNROTS</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <!--link para sa icon sa footer-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/v4-shims.css">
</head>

<body>

    <!--NAVBAR START-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top mb-5">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="PNR_logo.png" alt="PNR logo"></a>
            <span class="navbar-text">PNR Online Ticketing System</span>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="first.html">Log out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--NAVBAR END-->



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
                echo '<form class="container text-center">';
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
               // echo '</form>';
            }
        $stmt->close();
        $conn->close();
       }
       
   }
   else{
    echo"<div class=\"alert alert-danger\">";
    echo "<strong>Please enter valid information!</strong>";
    echo"</div>";
   }
}
?>
<br>
        <button class="btn btn-warning mt-3" onclick="window.print('box');" id="button">Print</button>
        <button class="btn btn-warning mt-3" id="button"><a href="index.php" class="text-decoration-none text-dark"> Return</a></button>
        </form>
    </body>
</html>
