<?php
session_start();

include("dbconnect.php");

if($_SERVER['REQUEST_METHOD'] == "POST"){

    //something was posted
    $username = $_POST['username'];
    $password = $_POST['password'];
    //$pass = MD5($password);

    if (empty(trim($_POST['username']) && trim($_POST['password']))) {
        echo"<div class=\"alert alert-danger\">";
        echo"Please enter a username and/or password";
        echo"</div>";
    }
    else{
        $checking = mysqli_query($conn, "SELECT username FROM pnrots_signup where username = '$username'");
        
        $result = mysqli_num_rows($checking);
        
        if($result>0) {
            echo"<div class=\"alert alert-danger\">";
            echo "This username is already taken";
            echo"</div>";
        }
    }
    if(empty(trim($_POST['confirmpassword']))){
        echo"<div class=\"alert alert-danger\">";
        echo "Please enter a confirm password";
        echo"</div>";
    }
    elseif (strlen(trim($_POST['password'])) < 6) {
        echo"<div class=\"alert alert-danger\">";
        echo"Password must have 6 characters";
        echo"</div>";
    }
    else{
        $confirmpassword = $_POST['confirmpassword'];
        //if(empty($password) && ($password != $cpassword)){
        if($password != $confirmpassword){
            echo"<div class=\"alert alert-danger\">";
            echo "Password did not match";
            echo"</div>";
        }
        if(!empty($username)&& !empty($password) && !is_numeric($username) && ($password == $confirmpassword)){

            //save to database
            $query = "insert into pnrots_signup (username, password) values ('$username', '$password')"; 
                
            mysqli_query($conn, $query);
    
            header("Location: login.php");
            die;
           
        }
        /*else{
            echo "<div id=girl>";
            echo "Please enter some valid information!";
            echo "</div>";
        }*/
    } 
}

?>


<html>

<head>
    <title>PNROTS | Sign Up</title>

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
                        <a class="nav-link active" href="signup.php">Sign Up</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--NAVBAR END-->

        <!--SIGN UP FORM START-->
        <section class="container-fluid">
            <section class="row justify-content-center">
                <section class="col-12 col-sm-6 col-md-3">
                <form method="post" class="form-container mt-5">
                <h2 class="pb-3 text-center">PNROTS Sign Up</h2>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Enter Username">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter Password">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="confirmpassword" placeholder="Re-enter Password">
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-dark">Submit</button>
                </div>
                
                <br>

                <medium><a class="c" href="login.php">Already have an account? Login here</a></medium>

                </form>
                    <!--<form class="form-container" method="post">
                    <div class="form-group">
                            <center><h2>PNROTS Sign Up</h2></center>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Enter Username">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter Password">
                        </div>
                        <div class="form-group">
                            <label for="confirmpassword">Confirm Password</label>
                            <input type="password" class="form-control" name="confirmpassword" placeholder="Re-enter Password">
                        </div>
                        <button type="submit" class="btn btn-dark btn-block">Submit</button>
                        <medium><a class="c" href="login.php">Already have an account? Login here</a></medium>
                    </form>-->
                </section>
            </section>
        </section>
        <!--SIGN UP FORM END-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>

