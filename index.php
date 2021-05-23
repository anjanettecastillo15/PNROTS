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
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="first.html">PNR Online Ticketing System</a>
                </li>
            </div>
        </nav>
        <!--NAVBAR END-->

    <h3><center>Please complete all the informations needed</center></h3>

    <!--FORM START-->
        <section class="container-fluid">
            <section class="row justify-content-center">
                <section class="col-12 col-sm-6 col-md-3">
                    <form method="post">
                    <div class="form-group">
                        <label for="cname">Complete Name</label>
                        <input type="text" class="form-control" id="cname" placeholder="Complete Name">
                    </div>
                    <div class="form-group">
                        <label for="dateoftravel">Date of Travel</label>
                        <input type="date" class="form-control" id="dateoftravel">
                    </div>
                    <div class="form-group">
                        <label>Departure Station:</label><br>
                        <select name="departure" id="departure-list" class="form-control">
                            <option value="" disabled selected>Select Departure Station</option>
                            <option>Alabang</option>
                            <option>Bicutan</option>
                            <option>Blumentritt</option>
                            <option>Buendia</option>
                            <option>EDSA</option>
                            <option>España</option>
                            <option>FTI</option>
                            <option>Laon-laan</option>
                            <option>Nichols</option>
                            <option>Paco</option>
                            <option>Pandacan</option>
                            <option>Pasay</option>
                            <option>San Andres</option>
                            <option>Sta. Mesa</option>
                            <option>Sucat</option>
                            <option>Tutuban</option>
                            <option>Vito Cruz</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Arrival Station:</label><br>
                        <select name="arrival" id="arrival-list" class="form-control">
                            <option value="" disabled selected>Select Arrival Station</option>
                            <option>Alabang</option>
                            <option>Bicutan</option>
                            <option>Blumentritt</option>
                            <option>Buendia</option>
                            <option>EDSA</option>
                            <option>España</option>
                            <option>FTI</option>
                            <option>Laon-laan</option>
                            <option>Nichols</option>
                            <option>Paco</option>
                            <option>Pandacan</option>
                            <option>Pasay</option>
                            <option>San Andres</option>
                            <option>Sta. Mesa</option>
                            <option>Sucat</option>
                            <option>Tutuban</option>
                            <option>Vito Cruz</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Time:</label><br>
                        <select name="time" id="time-list" class="form-control">
                            <option value="" disabled selected>Select Time</option>
                            <option>05:12 AM</option>
                            <option>06:02 AM</option>
                            <option>06:42 AM</option>
                            <option>07:13 AM</option>
                            <option>08:22 AM</option>
                            <option>09:32 AM</option>
                            <option>11:12 AM</option>
                            <option>12:22 PM</option>
                            <option>01:12 PM</option>
                            <option>03:02 PM</option>
                            <option>04:22 PM</option>
                            <option>05:12 PM</option>
                            <option>06:22 PM</option>
                            <option>07:42 PM</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-warning btn-block">Next</button>
                    </form>
                </section>
            </section>
        </section>
    <!--FORM END-->

    
</body>

</html>