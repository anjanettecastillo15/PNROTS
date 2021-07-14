<?php
    session_start();
    include("dbconnect.php");
?>

<html>
<script> //pwede ng wala to kasi lahat naman dito is visible. pero lagay ko parin para for future reference -anjanette
        function changeStatus(){
            var status = document.getElementById("priority-list");
            if(status.value == "PWD"){
                document.getElementById("idno").style.visibility = "visible";
            }
            else if(status.value == "Senior Citizen"){
                document.getElementById("idno").style.visibility = "visible";
            }
            else if(status.value == "Student"){
                document.getElementById("idno").style.visibility = "visible";
            }
            else if(status.value == "Pregnant Women"){
                document.getElementById("idno").style.visibility = "visible";
            }
            else if(status.value == "None"){
                document.getElementById("idno").style.visibility = "hidden";
            }
        }
    </script>
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
        <a class="navbar-brand" href="#"><img src="pnrots.png" alt="PNR logo"></a>
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

        <div id="welcome" class="container mt-1 mb-1">
            <div class="post-heading text-center" style="margin-bottom: 40px;">
                <h3 class="text-center">Please complete all the information needed</h3>
            </div>
    </div>

    <!--FORM START-->
        <section class="container-fluid">
            <section class="row justify-content-center">
                <section class="col-12 col-sm-6 col-md-3">
                    <form method="post" action="index2.php">
                    <div>
                        <label for="name" class="form-label">Complete Name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Complete Name">
                    </div>
                    <div class="mt-3">
                        <label for="dateoftravel" class="form-label">Date of Travel</label>
                        <input type="date" class="form-control" id="dateoftravel" name="date">
                    </div>
                    <div class="mt-3">
                        <label for="departure" class="form-label">Departure Station</label>
                        <select class="form-select" name="departure" id="departure-list">
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
                    <div class="mt-3">
                        <label for="arrival" class="form-label">Arrival Station</label>
                        <select class="form-select" name="arrival" id="arrival-list">
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
                    <div class="mt-3">
                        <label for="time" class="form-label">Time</label>
                        <select class="form-select" name="time" id="time-list">
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
                    <div class="mt-3">
                        <label for="priority" class="form-label">Priority</label>
                        <select class="form-select" name="priority" id="priority-list" onchange="changeStatus()">
                            <option value="" disabled selected>Select Priority</option>
                            <option value="PWD">PWD</option>
                            <option value="Pregnant Woman">Pregnant Woman</option>
                            <option value="Senior Citizen">Senior Citizen</option>
                            <option value="Student">Student</option>
                            <option value="None">None</option>
                        </select>
                    </div>

                    <div class="mt-3" id="idno">
                        <label for="priority_idno" class="form-label">Enter Valid ID no.</label>
                        <input type="text" class="form-control" name="priority_idno" id="priority_idno" placeholder="Ex: PWD/Senior/Student ID no.">
                        <small class="text-muted">For Pregnant Women any Valid ID will do</small>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-warning btn-block mt-4">Next</button>
                    </div>
                    
                    </form>
                </section>
            </section>
        </section>
   
    <!--FORM END-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   
</body>

</html>