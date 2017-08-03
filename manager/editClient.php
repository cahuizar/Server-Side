<!DOCTYPE html>
<!--
TITLE: Course Project 2
AUTHOR: Carlos Huizar
File Name: editClient.php
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
          $fNameErr = $lNameErr = $addressErr = $emailErr = $telephoneErr = "";

          require('Query.php');
          session_start();
          $query = new Query();
          $loggedIn = $_SESSION['isLoggedIn'];
          $email = $_SESSION['email'];
          $clientEmail = $_SESSION['clientEmail'];
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
              }
              // logout button clicked
              else if (isset($_POST['delete'])) {
                  // remove all from session from session
                  $query->deletePerson($clientEmail);
                  header("Location: manLogin.php?l=deleteClient");
              }else {
                // get all the inputs from lab1.php
                $empFName = filter_input(INPUT_POST, 'fName');
                $empLName = filter_input(INPUT_POST, 'lName');
                $address = filter_input(INPUT_POST, 'address');
                $empEmail = filter_input(INPUT_POST, 'email');
                $telephone = filter_input(INPUT_POST, 'telephone');

                // use boolean to stop page from loading the next page
                $errorFound = false;

                // error if the first name is empty
                if (empty($_POST["empFName"])) {
                    $fNameErr = "First Name is required";
                    $errorFound = true;
                } else {
                    $fNameErr = "";
                }

                // error if the last name is empty
                if (empty($_POST["empLName"])) {
                    $lNameErr = "Last Name is required";
                    $errorFound = true;
                } else {
                    $lNameErr = "";
                }

                // error if the address is empty
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
                  $query->updateClient($clientEmail, $empEmail, $empFName, $empLName, $telephone, $address);

                  // go to dashboard.php and display successful message
                  header("Location: manDashboard.php?l=updateClient");
              }
            }
          }
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
          <a class="nav-link" href="manSettings.php">Settings <span class="sr-only">(current)</span></a>
        </li>
      </ul>
      <form class="form-inline" method="post">
        <label style="padding-right:20px;">Hi,&nbsp;<span class="nav-name"> <?php echo $fName; ?></span></label>
        <button class="btn btn-primary my-2 my-sm-0 logout" name="logout">Logout</button>
      </form>
    </div>
  </nav>
  <div class="container">
    <h1 class="pages-heading">Edit Client</h1>
  	<hr>
	<div class="row">
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <form class="form-horizontal" method="post">
          <div class="form-group">
            <label class="col-lg-3 control-label">First Name:</label>
            <div class="col-lg-8">
                <span class="error"><?php echo $fNameErr; ?></span>
              <?php echo "<input class='form-control' value='".$clientFName."' type='text' name='fName'>" ?>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Last Name:</label>
            <div class="col-lg-8">
                <span class="error"><?php echo $lNameErr; ?></span>
              <?php echo "<input class='form-control' value='".$clientLName."' type='text' name='lName'>" ?>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Address:</label>
            <div class="col-lg-8">
              <span class="error"><?php echo $addressErr; ?></span>
              <?php echo "<input class='form-control' value='".$clientAddress."' type='text' name='address'>" ?>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <span class="error"><?php echo $emailErr; ?></span>
              <?php echo "<input class='form-control' value='".$clientEmail."' type='text' name='email'>" ?>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Telephone:</label>
            <div class="col-md-8">
              <span class="error"><?php echo $telephoneErr; ?></span>
              <?php echo "<input class='form-control' value='".$clientTelephone."' type='text' name='telephone'>" ?>
            </div>
          </div>
          <div class="row">
                <div class="col-12 col-md-4">
                  <input class="btn btn-primary" value="Save Changes" type="submit">
                </div>
                <div class="col-12 col-md-4">
                    <button class="btn btn-danger text-right" name="delete">Delete Employee</button>
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
