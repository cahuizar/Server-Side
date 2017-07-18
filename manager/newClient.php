<!DOCTYPE html>
<!--
TITLE: Course Project 2
AUTHOR: Carlos Huizar
File Name: newClient.php
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
          $nameErr = $addressErr = $emailErr = $telephoneErr = "";
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
                $name = filter_input(INPUT_POST, 'name');
                $address = filter_input(INPUT_POST, 'address');
                $email = filter_input(INPUT_POST, 'email');
                $telephone = filter_input(INPUT_POST, 'telephone');

                // use boolean to stop page from loading the next page
                $errorFound = false;

                // error if the first name is empty
                if (empty($_POST["name"])) {
                    $nameErr = "Name is required";
                    $errorFound = true;
                } else {
                    $nameErr = "";
                }

                // error if the last name is empty
                if (empty($_POST["address"])) {
                    $addressErr = "Address is required";
                    $errorFound = true;
                } else {
                    $addressErr = "";
                }

                // error if the email is empty
                if (empty($_POST["email"])) {
                    $emailErr = "Email is required";
                    $errorFound = true;
                } else {
                    $emailErr = "";
                }

                if(empty($_POST["telephone"])){
                    $telephoneErr= 'Please enter a valid phone number';
                    $errorFound = true;
                } else {
                    $telephoneErr = "";
                }

                // do the following if no errors are found on the form
                if ($errorFound == false){
                    session_start();

                    // store input text in session so that it can be used on display.php
                    $_SESSION['clientName'] = $name;
                    $_SESSION['clientAddress'] = $address;
                    $_SESSION['clientTelephone'] = $telephone;
                    $_SESSION['clientEmail'] = $email;

                    // go to display.php
                    header("Location: newClientTest.php");
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
    <h1 class="pages-heading">New Client</h1>
  	<hr>
	<div class="row">
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <form class="form-horizontal" method="post">
          <div class="form-group">
            <label class="col-lg-3 control-label">Full Name:</label>
            <div class="col-lg-8">
                <span class="error"><?php echo $nameErr; ?></span>
              <input class="form-control" type="text" name="name">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Address:</label>
            <div class="col-lg-8">
              <span class="error"><?php echo $addressErr; ?></span>
              <input class="form-control" type="text" name="address">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <span class="error"><?php echo $emailErr; ?></span>
              <input class="form-control" type="text" name="email">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Telephone:</label>
            <div class="col-md-8">
              <span class="error"><?php echo $telephoneErr; ?></span>
              <input class="form-control" type="tel" name="telephone">
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
  </body>
</html>
