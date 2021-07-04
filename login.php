<?php
session_start();

include("dbconnect.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    
    //something was posted
    $username = $_POST['username'];
    $password = $_POST['password'];
   // $pass = MD5($password);

    if(!empty($username)&& !empty($password) && !is_numeric($username))
    {
        
        //read from database
        $query = "select * from pnrots_signup where username = '$username' limit 1"; 
        
        $result = mysqli_query($conn, $query);

        if($result)
        {
            if($result && mysqli_num_rows($result) > 0)
            {
                $user_data = mysqli_fetch_assoc($result);
                
                if($user_data['password'] === $password){

                    $_SESSION['username'] = $user_data['username'];
                    header("Location: index.php");
                    die;
                }
            }
        }
        echo"<div class=\"alert alert-danger\">";
        echo"<strong>Wrong username or password</strong>";
        echo"</div>";
    }
    else{
        echo"<div class=\"alert alert-danger\">";
        echo "<strong>Please enter valid information!</strong>";
        echo"</div>";
    }
}
?>

<html>

<head>
    <title>PNROTS | Login</title>

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
                        <a class="nav-link" aria-current="page" href="first.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="signup.php">Sign Up</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="login.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--NAVBAR END-->

        <!--LOGIN FORM START-->
        <section class="container-fluid">
            <section class="row justify-content-center">
                <section class="col-12 col-sm-6 col-md-3">
                <form method="post" class="form-container mt-5">
                <h2 class="pb-3 text-center">PNROTS Login</h2>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Enter Username">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter Password">
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-dark">Submit</button>
                </div>
                
                <br>
                <medium><a class="c" href="signup.php">Don't have an account yet? Sign Up here</a></medium>

                </form>
                    <!--<form class="form-container" method="post">
                    <div class="form-group">
                            <center><h2>PNROTS Login</h2></center>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Enter Username">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter Password">
                        </div>
                        <button type="submit" class="btn btn-dark btn-block">Submit</button>
                        <medium><a class="c" href="signup.php">Don't have an account yet? Sign Up here</a></medium>
                    </form>-->
                </section>
            </section>
        </section>
        <!--LOGIN FORM END-->
    </body>
</html>

