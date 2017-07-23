<!DOCTYPE html>
<!--
TITLE: Course Project 2
AUTHOR: Carlos Huizar
File Name: empLogin.php
ORIGINALLY CREATED ON: 07/04/2017
-->
<html lang="en">
  <head>
    <title>Employee Login</title>
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
          $query = new Query();
          $err = "";
          session_start();
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
              $email = filter_input(INPUT_POST, 'email');
              $password = filter_input(INPUT_POST, 'password');
              // get total attempts made by the email user
              $attempts = $query->getCounter($email);
              $validCredentials = $query->login($email, $password);
              // on 4th unsuccessful try, session a time and inrement number of attempts
              if($attempts == 4) {
                  $_SESSION['timeout'] = time();
                  $attempts =  $attempts + 1;
                  // icrement number of attempts
                  $query->setCounter($email, $attempts);
               }
               // increment number of attempts made by user
              else {
                  $temp_attempts =  $attempts + 1;
                  $query->setCounter($email, $temp_attempts);
              }
              // succesful credentials, reset attempts and log user in
              if($validCredentials && $attempts < 5) {
                  $_SESSION['email'] = $email;
                  $_SESSION['isLoggedIn'] = "yes";
                  $attempts = 0;
                  // reset counter
                  $query->setCounter($email, $attempts);
                  header("Location: empDashboard.php");
              }
              // attempts is larger than 5 then tell user he/she are locked out for 15 mins
              else if ($attempts >= 5 ) {
                  $err = "You have been locked out of your account. ";
                  if ($_SESSION['timeout'] + 10 * 60 < time()) {
                    $attempts = 0;
                    // reset counter
                    $query->setCounter($email, $attempts);
                    session_destroy();
                 }
              } else {
                  $err = "Username or password combination is incorrect.";
              }
          } else {
              if (isset($_GET['l']))
              {
                  $tag = $_GET['l'];
                   //if the user is redirected from the home page
                  if ($tag == 'r') {
                      $err = "You must be logged in to access the page.";
                  }
                  // user message when they logout
                  else if ($tag == 'q') {
                      $err = "You have been successfully logged out.";
                  }
              }
          }
      ?>
      <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
          <div class="col">
            <p class="heading">Employee Login</p>
            <form class="form-signin" method="post">
              <h2 class="form-signin-heading">Please sign in</h2>
              <label for="inputEmail" class="sr-only">Email address</label>
              <input style="margin-top:5px;" name="email" id="inputEmail" class="form-control" placeholder="Email address" autofocus="" type="email">
              <label for="inputPassword" class="sr-only">Password</label>
              <input style="margin-top:5px;" name="password" id="inputPassword" class="form-control" placeholder="Password" type="password">
              <span class="error"><?php echo $err; ?></span><br />
              <button style="margin-top:15px;"class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
              <br />
              <div class="row">
                  <div class="col-6">
                      <a href="../index.php" class="btn btn-lg btn-secondary btn-block">Back</a>
                  </div>
                  <div class="col-6">
                      <a href="empRegister.php" class="btn btn-lg btn-secondary btn-block">Register</a>
                  </div>
              </div>
            </form>
            <div class="text-center">
              <a class="font-icons" href="mailto:hire@carloshuizar.com?subject=Hola" target="_blank">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-envelope-o fa-stack-2x"></i>
                </span>
              </a>
              <a class="font-icons" href="https://www.linkedin.com/in/carlos-huizar-271264117/" target="_blank">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-linkedin-square fa-stack-2x"></i>
                </span>
              </a>
              <a class="font-icons" href="https://github.com/cahuizar" target="_blank">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-github fa-stack-2x"></i>
                </span>
              </a>
              <a  class="font-icons" alt= "Resume" href="Resume.pdf">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-file-text fa-stack-2x"></i>
                </span>
              </a>
            </div>
        </div>
      </div>
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  </body>
</html>
