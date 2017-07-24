<!DOCTYPE html>
<!--
TITLE: Course Project 2
AUTHOR: Carlos Huizar
File Name: newWorkDay.php
ORIGINALLY CREATED ON: 07/04/2017
-->
<html lang="en">
  <head>
    <title>Manager | New Client</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <script src="https://use.fontawesome.com/fe327c8daa.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  </head>
  <body>
      <?php
          $dateErr = $startTimeErr = $selectErr = "";
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
            } else {
                // get all the inputs from lab1.php
                $date = filter_input(INPUT_POST, 'date');
                $startTime = filter_input(INPUT_POST, 'startTime');
                $clients = $_POST['clients'];

                // use boolean to stop page from loading the next page
                $errorFound = false;

                // error if the first name is empty
                if (empty($_POST["date"])) {
                    $dateErr = "Date is required";
                    $errorFound = true;
                } else {
                    $dateErr = "";
                }

                // error if the last name is empty
                if (empty($_POST["startTime"])) {
                    $startTimeErr = "Start time is required";
                    $errorFound = true;
                } else {
                    $startTimeErr = "";
                }

                // do the following if no errors are found on the form
                if ($errorFound == false){
                    session_start();

                    // store input text in session so that it can be used on display.php
                    $_SESSION['empDate'] = $date;
                    $_SESSION['empStartTime'] = $startTime;
                    $_SESSION['empClients'] = $clients;

                    // go to display.php
                    header("Location: newWorkTest.php");
                    exit();
                }
            }
          }
       ?>
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
        <li class="nav-item">
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
    <h1 class="pages-heading">New Work Day</h1>
  	<hr>
	<div class="row">
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <form class="form-horizontal" method="post">
          <div class="form-group">
            <label class="col-lg-3 control-label">Date:</label>
            <div class="col-lg-8">
                <span class="error"><?php echo $dateErr; ?></span>
                <input style="margin-top:5px;" name="date" class="form-control" placeholder="Date" type="text" id="datepicker">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Start Time:</label>
            <div class="col-lg-8">
                <span class="error"><?php echo $startTimeErr; ?></span>
                <input style="margin-top:5px;" name="startTime" class="form-control" placeholder="Start time" type="text" id="startTime" value="">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-12 control-label">Client:</label>
            <div class="col-lg-8">
                <input type="radio" name="clients" value="Mark Johnson" checked> Mark Johnson<br />
                <input type="radio" name="clients" value="Stacy Clark"> Stacy Clark<br />
                <input type="radio" name="clients" value="Jacob Smith"> Jacob Smith<br />
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input class="btn btn-primary" value="Save Changes" type="submit">
            </div>
          </div>
        </form>
      </div>
  </div>
</div>
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script src="../js/pikaday.js"></script>
    <script src="http://weareoutman.github.io/clockpicker/dist/jquery-clockpicker.min.js"></script>
    <script src="../js/js.js"></script>
  </body>
</html>
