<!DOCTYPE html>
<!--
TITLE: Course Project 2
AUTHOR: Carlos Huizar
File Name: workTest.php
ORIGINALLY CREATED ON: 07/04/2017
-->

<?php
	session_start();
    // get all the inputs from the session
    $date = $_SESSION['date'];
    $startTime = $_SESSION['startTime'];
    $endTime = $_SESSION['endTime'];
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

      // logout button clicked
      if (isset($_POST['logout'])) {
          session_start();
          unset($_SESSION['fName']);
          unset($_SESSION['lName']);
          unset($_SESSION['email']);
          unset($_SESSION['confirmEmail']);
          unset($_SESSION['password']);
          unset($_SESSION['confirmPasssword']);
          header("Location: ../index.php");
      }
    }
 ?>

<html lang="en">
  <head>
    <title>Employee Settings</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <script src="https://use.fontawesome.com/fe327c8daa.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  </head>
  <body>
      <nav class="navbar navbar-toggleable-md navbar-light" style="background-color: #1ad2f9;">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">Management Service</a>

        <div class="collapse navbar-collapse" id="navbarColor03">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="manDashboard.php">Home</a>
            </li>
            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Work
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="manSchedule.php">Employees</a>
                  <a class="dropdown-item" href="manClients.php">Clients</a>
                  <a class="dropdown-item" href="manWork.php">Timesheet</a>
                </div>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="manSettings.php">Settings <span class="sr-only">(current)</span></a>
            </li>
          </ul>
          <form class="form-inline" method="post">
            <label style="padding-right:20px;">Hi,&nbsp;<span class="nav-name"> John</span></label>
            <button class="btn btn-primary my-2 my-sm-0 logout" name="logout">Logout</button>
          </form>
        </div>
      </nav>
      <div class="container">
        <div class="row h-100 justify-content-center align-items-center">
          <div class="col">
            <p class="heading">Timesheet Information</p>
              <h2 class="form-signin-heading">Information Entered:</h2>
              <label>Date: </label><span><?php echo htmlspecialchars($date); ?></span><br /><br />
              <label>Start Time: </label><span><?php echo htmlspecialchars($startTime); ?></span><br /><br />
              <label>End Time: </label><span><?php echo htmlspecialchars($endTime); ?></span><br /><br />
              <br />
        </div>
      </div>
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  </body>
</html>
