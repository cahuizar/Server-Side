<!DOCTYPE html>
<!--
TITLE: Course Project 2
AUTHOR: Carlos Huizar
File Name: empWork.php
ORIGINALLY CREATED ON: 07/04/2017
-->
<html lang="en">
  <head>
    <title>Employee | Work</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <link rel="stylesheet" type="text/css" href="http://weareoutman.github.io/clockpicker/dist/jquery-clockpicker.min.css">
    <script src="https://use.fontawesome.com/fe327c8daa.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  </head>
  <body>
      <?php
          $dateErr = $startTimeErr = $endTimeErr = "";
          require('Query.php');
          session_start();
          $query = new Query();
          $loggedIn = $_SESSION['isLoggedIn'];
          $email = $_SESSION['email'];
          // allow access if the user is logged in
          if($loggedIn == "yes") {
            // retrive the first name from database
            $fName = $query->getFName($email);
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
              // logout button clicked
              if (isset($_POST['logout'])) {
                  // remove all from session from session
                  session_destroy();
                  header("Location: empLogin.php?l=q");
              } else {
                  // get all the inputs from lab1.php
                  $date = filter_input(INPUT_POST, 'date');
                  $startTime = filter_input(INPUT_POST, 'startTime');
                  $endTime = filter_input(INPUT_POST, 'endTime');

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

                  // error if the last name is empty
                  if (empty($_POST["endTime"])) {
                      $endTimeErr = "End time is required";
                      $errorFound = true;
                  } else {
                      $endTimeErr = "";
                  }

                  // do the following if no errors are found on the form
                  if ($errorFound == false){
                      session_start();

                      // store input text in session so that it can be used on display.php
                      $_SESSION['date'] = $date;
                      $_SESSION['startTime'] = $startTime;
                      $_SESSION['endTime'] = $endTime;
                      $query->newTimesheet($email, $date, $startTime, $endTime);

                      // go to dashboard.php and display successful message
                      header("Location: empDashboard.php?l=timesheet");
                  }
              }
            }
          // redirect back to login and display error message
          } else {
              header("Location: empLogin.php?l=r");
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
              <a class="nav-link" href="empDashboard.php">Home</a>
            </li>
            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Work
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="empSchedule.php">Schedule</a>
                  <a class="dropdown-item" href="empClients.php">Clients</a>
                  <a class="dropdown-item" href="empWork.php">Timesheet</a>
                </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="empSettings.php">Settings</a>
            </li>
          </ul>
          <form class="form-inline" method="post">
            <label style="padding-right:20px;">Hi,&nbsp;<span class="nav-name"> <?php echo $fName; ?></span></label>
            <button class="btn btn-primary my-2 my-sm-0 logout" name="logout">Logout</button>
          </form>
        </div>
      </nav>
      <div class="container">
        <h1 class="pages-heading">Timesheet</h1>
        <form class="form-signin" method="post">
          <h2 class="form-signin-heading">New Log:</h2>
          <label for="date" class="sr-only">Date</label>
          <span class="error"><?php echo $dateErr; ?></span>
          <input style="margin-top:5px;" name="date" class="form-control" placeholder="Date" type="text" id="datepicker">
          <label for="startTime" class="sr-only">Start Time</label>
          <span class="error"><?php echo $startTimeErr; ?></span>
          <input style="margin-top:5px;" name="startTime" class="form-control" placeholder="Start time" type="text" id="startTime" value="">
          <label for="endTime" class="sr-only">End Time</label>
          <span class="error"><?php echo $endTimeErr; ?></span>
          <input style="margin-top:5px;" name="endTime" class="form-control" placeholder="End time" type="text" id="endTime" value="">
          <button style="margin-top:15px;"class="btn btn-lg btn-primary btn-block" type="submit">Submit Timesheet</button>
          <br />
        </form>
      </div>
      <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
      <script src="../js/pikaday.js"></script>
      <script src="http://weareoutman.github.io/clockpicker/dist/jquery-clockpicker.min.js"></script>
      <script src="../js/js.js"></script>
  </body>
</html>
