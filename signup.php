<html>
    <head>
        <title>PNROTS | Sign Up</title>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
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
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="first.html">PNR Online Ticketing System</a>
                </li>
            </div>
        </nav>
         <!--NAVBAR END-->

        <!--SIGN UP FORM START-->
        <section class="container-fluid">
            <section class="row justify-content-center">
                <section class="col-12 col-sm-6 col-md-3">
                    <form class="form-container" method="post">
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
                    </form>
                </section>
            </section>
        </section>
        <!--SIGN UP FORM END-->
    </body>
</html>

<?php
session_start();

include("dbconnect.php");

if($_SERVER['REQUEST_METHOD'] == "POST"){

    //something was posted
    $username = $_POST['username'];
    $password = $_POST['password'];
    $pass = MD5($password);

    if (empty(trim($_POST['username']) && trim($_POST['password']))) {
        echo"Please enter a username and/or password";
    }
    else{
        $checking = mysqli_query($conn, "SELECT username FROM pnrots_signup where username = '$username'");
        
        $result = mysqli_num_rows($checking);
        
        if($result>0) {
            echo "This username is already taken";
        }
    }
    if(empty(trim($_POST['confirmpassword']))){
        echo "Please enter a confirm password";
    }
    elseif (strlen(trim($_POST['password'])) < 6) {
        echo"Password must have 6 characters";
    }
    else{
        $confirmpassword = $_POST['confirmpassword'];
        //if(empty($password) && ($password != $cpassword)){
        if($password != $confirmpassword){
        echo "Password did not match";
        }
        if(!empty($username)&& !empty($pass) && !is_numeric($username) && ($password == $confirmpassword)){

            //save to database
            $query = "insert into pnrots_signup (username, password) values ('$username', '$pass')"; 
                
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
