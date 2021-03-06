<!DOCTYPE html>
<!--
TITLE: Course Project 2
AUTHOR: Carlos Huizar
File Name: manSettings.php
ORIGINALLY CREATED ON: 07/04/2017
-->
<html lang="en">
  <head>
    <title>Manager | Settings</title>
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
      $fName = $fNameErr = $lNameErr = $emailErr = $passwordErr = "";
      require('Query.php');
      session_start();
      $query = new Query();
      $loggedIn = $_SESSION['isLoggedIn'];
      $email = $_SESSION['email'];
      $curEmail = $email;
      // allow access if the user is logged in
      if($loggedIn == "yes") {
          // retrive the first name from database
          $fName = $query->getFName($email);
          $emp = $query->getMan($email);
          $lName = $emp->lName;
          $password = $emp->password;
          // logout, kill session and send user to login page
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
              // logout button clicked
              if (isset($_POST['logout'])) {
                  // remove all from session from session
                  session_destroy();
                  header("Location: manLogin.php?l=q");
              }
              else {
                  // get all the inputs from lab1.php
                  $fName = filter_input(INPUT_POST, 'fName');
                  $lName = filter_input(INPUT_POST, 'lName');
                  $email = filter_input(INPUT_POST, 'email');
                  $password = filter_input(INPUT_POST, 'password');

                  // use boolean to stop page from loading the next page
                  $errorFound = false;

                  // error if the first name is empty
                  if (empty($_POST["fName"])) {
                      $fNameErr = "First Name is required";
                      $errorFound = true;
                  } else {
                      $fNameErr = "";
                  }

                  // error if the last name is empty
                  if (empty($_POST["lName"])) {
                      $lNameErr = "Last name is required";
                      $errorFound = true;
                  } else {
                      $lNameErr = "";
                  }

                  // error if the email is empty
                  if (empty($_POST["email"])) {
                      $emailErr = "Email is required";
                      $errorFound = true;
                  } else {
                      $emailErr = "";
                  }

                  // error if the password length is less than 8
                  if (strlen($password) < 8) {
                      $passwordErr = "Password must be atleast 8 characters";
                      $errorFound = true;
                  } else {
                      $passwordErr = "";
                  }

                  // do the following if no errors are found on the form
                  if ($errorFound == false){
                      $_SESSION['email'] = $email;

                      // update employee info
                      $query->updateEmp($curEmail, $email, $password, $fName, $lName, 0);

                      // go to dashboard.ph and display successfull email
                      header("Location: manDashboard.php?l=settings");
                  }
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
        <li class="nav-item dropdown">
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
          <a class="nav-link" href="#">Settings <span class="sr-only">(current)</span></a>
        </li>
      </ul>
      <form class="form-inline" method="post">
        <label style="padding-right:20px;">Hi,&nbsp;<span class="nav-name"> <?php echo $fName; ?></span></label>
        <button class="btn btn-primary my-2 my-sm-0 logout" name="logout">Logout</button>
      </form>
    </div>
  </nav>
  <div class="container">
    <h1 class="pages-heading">Edit Profile</h1>
  	<hr>
	<div class="row">
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <form class="form-horizontal" method="post">
          <div class="form-group">
            <label class="col-lg-3 control-label">First name:</label>
            <div class="col-lg-8">
                <span class="error"><?php echo $fNameErr; ?></span>
              <?php echo "<input class='form-control' value='".$fName."' type='text' name='fName'>" ?>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Last name:</label>
            <div class="col-lg-8">
              <span class="error"><?php echo $lNameErr; ?></span>
              <?php echo "<input class='form-control' value='".$lName."' type='text' name='lName'>" ?>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <span class="error"><?php echo $emailErr; ?></span>
              <?php echo "<input class='form-control' value='".$email."' type='text' name='email'>" ?>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Password:</label>
            <div class="col-md-8">
              <span class="error"><?php echo $passwordErr; ?></span>
              <?php echo "<input class='form-control' value='".$password."' type='password' name='password'>" ?>
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
