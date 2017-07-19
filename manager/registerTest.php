<!DOCTYPE html>
<!--
TITLE: Course Project 2
AUTHOR: Carlos Huizar
File Name: registerTest.php
ORIGINALLY CREATED ON: 07/04/2017
-->

<?php

	session_start();

    // get all the inputs from the session
    $fName = $_SESSION['fName'];
    $lName = $_SESSION['lName'];
    $email = $_SESSION['email'];
    $confirmEmail = $_SESSION['confirmEmail'];
    $password = $_SESSION['password'];
    $confirmPassword = $_SESSION['confirmPassword'];
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
    <title>Manager Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <script src="https://use.fontawesome.com/fe327c8daa.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  </head>
  <body>
      <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
          <div class="col">
            <p class="heading">Manager Register</p>
              <h2 class="form-signin-heading">Information Entered:</h2>
              <label>First Name: </label><span><?php echo htmlspecialchars($fName); ?></span><br /><br />
              <label>Last Name: </label><span><?php echo htmlspecialchars($lName); ?></span><br /><br />
              <label>Email: </label><span><?php echo htmlspecialchars($email); ?></span><br /><br />
              <label>Confirm Email: </label><span><?php echo htmlspecialchars($confirmEmail); ?></span><br /><br />
      		  <label>Password: </label><span><?php echo htmlspecialchars($password); ?></span><br /><br />
              <label>Confirm Password: </label><span><?php echo htmlspecialchars($confirmPassword); ?></span><br /><br />
              <br />
              <div class="row">
                  <div class="col-6">
                      <a href="manLogin.php" class="btn btn-lg btn-secondary btn-block">Login</a>
                  </div>
                  <div class="col-6">
                      <a href="../index.php" class="btn btn-lg btn-secondary btn-block">Home</a>
                  </div>
              </div>
              <br /><br />
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
