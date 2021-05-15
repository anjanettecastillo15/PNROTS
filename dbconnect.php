<?php
  $host = "localhost: 3307";
  $user = "root";
  $pass = "";
  $dtbname = "pnrots";
  
    //database connection

    if(!$conn = mysqli_connect($host, $user, $pass, $dtbname))
    {

        die("failed to connect!");
    }
    
    
?>