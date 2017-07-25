<!DOCTYPE html>
<!--
TITLE: Course Project 2
AUTHOR: Carlos Huizar
File Name: empSchedule.php
ORIGINALLY CREATED ON: 07/04/2017
-->
<html lang="en">
  <head>
    <title>Employee | Work</title>
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
          require('Query.php');
          session_start();
          $query = new Query();
          $loggedIn = $_SESSION['isLoggedIn'];
          $email = $_SESSION['email'];
          // allow access if the user is logged in
          if($loggedIn == "yes") {
            // retrive the first name from database
            $fName = $query->getFName($email);
            $schedule = $query->getEmpSchedule($email);
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
              // logout button clicked
              if (isset($_POST['logout'])) {
                  // remove all from session from session
                  session_destroy();
                  header("Location: empLogin.php?l=q");
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
        <h1 class="pages-heading">Schedule </h1>
        <?php
            if($schedules[0]->results >= 1) {
              echo '
                <table class="table table-hover work-schedule">
                  <thead>
                    <tr>
                      <th>Date</th>
                      <th>Clients</th>
                      <th>Start Time</th>
                    </tr>
                  </thead>
                <tbody>              
              ';
              foreach($schedules as $schedule) {
                echo "
                  <tr>
                    <th scope='row'>". $schedule['date'] ."</th>
                    <th>". $schedule['fName'] ." ". $schedule['lName'] ."</th>
                    <td>". $schedule['startTime'] ."</td>
                  </tr>
                ";
              }
              echo '
                  </tbody>
                </table>
              ';
            } else {
              echo '<p class="no-results text-center"></p>'
            }
        ?>
        <table class="table table-hover work-schedule">
          <thead>
            <tr>
              <th>Date</th>
              <th>Clients</th>
              <th>Start Time</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">07/2/17</th>
              <td>Mark Johnson Stacy Clark</td>
              <td>7:30 am</td>
            </tr>
            <tr>
              <th scope="row">07/3/17</th>
              <td>Jacob Smith Susan Ridgeway</td>
              <td>8:00 am</td>
            </tr>
            <tr>
               <th scope="row">07/4/17</th>
               <td>Carlos Lopez</td>
               <td>11:00 am</td>
            </tr>
          </tbody>
      </table>
      </div>
      <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  </body>
</html>
