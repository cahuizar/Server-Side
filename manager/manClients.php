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
            <label style="padding-right:20px;">Hi,&nbsp;<span class="nav-name"> John</span></label>
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
      <div class="card">
        <div class="card-header" role="tab" id="headingOne">
            <h5 class="mb-0">
              <div class="row">
                  <div class="d-flex align-items-center schedule-flex">
                      <div class="col-8 col-md-10">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Jake Mor
                        </a>
                      </div>
                  </div>
              </div>
            </h5>
        </div>
        <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne">
          <div class="card-block">
              <form action="editClient.php">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <label for="name">Name</label>
                        <input name="name" class="form-control" type="text" value="Jake Mor" disabled>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="address">Address</label>
                        <input name="address" class="form-control" type="text" value="1234 Kol Dr" disabled>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="phone">Phone Number</label>
                        <input name="phone" class="form-control" type="text" value="317-489-7896" disabled>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="email">Email Address</label>
                        <input name="email" class="form-control" type="text" value="jake.mor@info.com" disabled>
                    </div>
                </div>
                <button class="btn btn-lg btn-primary btn-block schedule-submit" type="submit">Edit Client</button>
                <br />
              </form>
          </div>
        </div>
      </div>
  <div class="card">
    <div class="card-header" role="tab" id="headingTwo">
        <h5 class="mb-0">
          <div class="row">
              <div class="d-flex align-items-center schedule-flex">
                  <div class="col-8 col-md-10">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
                        John Smith
                    </a>
                  </div>
              </div>
          </div>
        </h5>
    </div>
    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="card-block">
          <form action="editClient.php">
            <div class="row">
                <div class="col-12 col-md-6">
                    <label for="name">Name</label>
                    <input name="name" class="form-control" type="text" value="John Smith" disabled>
                </div>
                <div class="col-12 col-md-6">
                    <label for="address">Address</label>
                    <input name="address" class="form-control" type="text" value="1234 Kol Dr" disabled>
                </div>
                <div class="col-12 col-md-6">
                    <label for="phone">Phone Number</label>
                    <input name="phone" class="form-control" type="text" value="847-978-1236" disabled>
                </div>
                <div class="col-12 col-md-6">
                    <label for="email">Email Address</label>
                    <input name="email" class="form-control" type="text" value="john.smith@info.com" disabled>
                </div>
            </div>
            <button class="btn btn-lg btn-primary btn-block schedule-submit" type="submit">Edit Client</button>
            <br />
          </form>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" role="tab" id="headingThree">
        <h5 class="mb-0">
          <div class="row">
              <div class="d-flex align-items-center schedule-flex">
                  <div class="col-8 col-md-10">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseOne">
                        Lionel Messi
                    </a>
                  </div>
              </div>
          </div>
        </h5>
    </div>
    <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="card-block">
          <form action="editClient.php">
            <div class="row">
                <div class="col-12 col-md-6">
                    <label for="name">Name</label>
                    <input name="name" class="form-control" type="text" value="Lionel Messi" disabled>
                </div>
                <div class="col-12 col-md-6">
                    <label for="address">Address</label>
                    <span class="error"><?php echo $addressErr; ?></span>
                    <input name="address" class="form-control" type="text" value="6987 Ollio Dr" disabled>
                </div>
                <div class="col-12 col-md-6">
                    <label for="phone">Phone Number</label>
                    <span class="error"><?php echo $PhoneErr; ?></span>
                    <input name="phone" class="form-control" type="text" value="978-934-9852" disabled>
                </div>
                <div class="col-12 col-md-6">
                    <label for="email">Email Address</label>
                    <span class="error"><?php echo $addressErr; ?></span>
                    <input name="email" class="form-control" type="text" value="lionel.messi@info.com" disabled>
                </div>
            </div>
            <button class="btn btn-lg btn-primary btn-block schedule-submit" type="submit">Edit Client</button>
            <br />
          </form>
      </div>
    </div>
  </div>
</div>
      </div>
      <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  </body>
</html>
