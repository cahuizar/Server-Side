<!DOCTYPE html>
<!--
TITLE: Course Project 2
AUTHOR: Carlos Huizar
File Name: manClients.php
ORIGINALLY CREATED ON: 07/04/2017
-->

<?php
    $nameErr = $addressErr = $PhoneErr = $emailErr = "";
?>

<html lang="en">
  <head>
    <title>Manager | Work</title>
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
        $Err = "";
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
                header("Location: manLogin.php?l=q");
            } else {
                $clients = $query->getClients();

            }
          }
        // redirect back to login and display error message
        } else {
            header("Location: manLogin.php?l=r");
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
              <a class="nav-link" href="manSettings.php">Settings</a>
            </li>
          </ul>
          <form class="form-inline" method="post">
            <label style="padding-right:20px;">Hi,&nbsp;<span class="nav-name"> <?php echo $fName; ?></span></label>
            <button class="btn btn-primary my-2 my-sm-0 logout" name="logout">Logout</button>
          </form>
        </div>
      </nav>
      <div class="container">
        <h1 class="pages-heading">Clients</h1>
        <div id="accordion" role="tablist" aria-multiselectable="true">
            <div class="row">
                <div class="col-12 col-sm-3">
                    <form action="newClient.php">
                        <button class="btn btn-lg btn-primary btn-block schedule-submit" type="submit">+ Add Client</button>
                        <br />
                    </form>
                </div>
            </div>
      <?php
          $results = $clients[0]; 
          if($results[0] >= 1) {
              $counter = 0;
              foreach($clients as $client) {
                echo '
                    <div class="card">
                        <div class="card-header" role="tab" id="heading'. $counter .'">
                            <h5 class="mb-0">
                            <div class="row">
                                <div class="d-flex align-items-center schedule-flex">
                                    <div class="col-8 col-md-10">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse'. $counter .'" aria-expanded="true" aria-controls="collapse'. $counter .'">
                                            '. $client->fName .' '. $client->lName .'
                                        </a>
                                    </div>
                                </div>
                            </div>
                            </h5>
                        </div>
                        <div id="collapse'. $counter .'" class="collapse" role="tabpanel" aria-labelledby="heading'. $counter .'">
                        <div class="card-block">
                            <form action="editClient.php">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <label for="fname">Name</label>
                                        <input name="fname" class="form-control" type="text" value="'. $client->fName .'" disabled>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="lname">Name</label>
                                        <input name="lname" class="form-control" type="text" value="'. $client->lName .'" disabled>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="address">Address</label>
                                        <input name="address" class="form-control" type="text" value="'. $client->address .'" disabled>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="phone">Phone Number</label>
                                        <input name="phone" class="form-control" type="text" value="'. $client->telephone .'" disabled>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="email">Email Address</label>
                                        <input name="email" class="form-control" type="text" value="'. $client->email .'" disabled>
                                    </div>
                                </div>
                                <button class="btn btn-lg btn-primary btn-block schedule-submit" type="submit">Edit Client</button>
                                <br />
                            </form>
                        </div>
                        </div>
                    </div>
                '
              }
          } else {
              echo '<p class="no-results text-center">There are no clients.</p>';
            }
      ?>
      </div>
    </div>
      </div>
      <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  </body>
</html>
