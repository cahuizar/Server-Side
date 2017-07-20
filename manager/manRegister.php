<!DOCTYPE html>
<!--
TITLE: Course Project 2
AUTHOR: Carlos Huizar
File Name: manResgister.php
ORIGINALLY CREATED ON: 07/04/2017
-->

<?php
    require('Database.php');
    $fNameErr = $lNameErr = $emailErr = $emailConfirmErr = $passwordErr = $passwordConfirmErr = $serverErr = "";
    $db = Database::getDB();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // get all the inputs from lab1.php
        $fName = filter_input(INPUT_POST, 'fName');
        $lName = filter_input(INPUT_POST, 'lName');
        $email = filter_input(INPUT_POST, 'email');
        $confirmEmail = filter_input(INPUT_POST, 'confirmEmail');
        $password = filter_input(INPUT_POST, 'password');
        $confirmPassword = filter_input(INPUT_POST, 'confirmPassword');

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

        // error if the emails do not match
        if($email != $confirmEmail) {
            $emailConfirmErr = "Emails do not match";
            $errorFound = true;
        } else {
            $emailConfirmErr = "";
        }

        // error if the password length is less than 8
        if (strlen($password) < 8) {
            $passwordErr = "Password must be atleast 8 characters";
            $errorFound = true;
        } else {
            $passwordErr = "";
        }

        // error if the passwords do not match
        if($password != $confirmPassword) {
            $passwordConfirmErr = "Passwords do not match";
            $errorFound = true;
        } else {
            $passwordConfirmErr = "";
        }

        // do the following if no errors are found on the form
        if ($errorFound == false){
            $query = "INSERT INTO Person (email, fName, lName)
						          VALUES (:email, :fName, :lName)";
            $statement = $db->prepare($query);
            $statement->bindValue(":email", $email);
            $statement->bindValue(":fName", $fName);
            $statement->bindValue(":lName", $lName);
            if(!$statement->execute()) {
              $serverErr = "User already exists";
              $statement->closeCursor();
            } else {
              $serverErr = "";
              $statement->closeCursor();
              $query = "INSERT INTO Employee (email, password)
						            VALUES (:email, :password)";
              $statement = $db->prepare($query);
              $statement->bindValue(":email", $email);
              $statement->bindValue(":password", $password);
              $statement->execute();
              $statement->closeCursor();
              $query = "INSERT INTO Manager (email)
						            VALUES (:email)";
              $statement = $db->prepare($query);
              $statement->bindValue(":email", $email);
              $statement->execute();
              $statement->closeCursor();
              // go to registerTest.php
              header("Location: manLogin.php");
              exit();
            }
            
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
  <div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">
      <div class="col">
        <p class="heading">Manager Register</p>
        <form class="form-signin" method="post">
          <h2 class="form-signin-heading">Please enter your information:</h2>
          <label for="fName" class="sr-only">First Name</label>
          <span class="error"><?php echo $fNameErr; ?></span>
          <input style="margin-top:5px;" name="fName" id="fName" class="form-control" placeholder="First Name*" type="text">
          <label for="lName" class="sr-only">Last Name</label>
          <span class="error"><?php echo $lNameErr; ?></span>
          <input style="margin-top:5px;" name="lName" id="lName" class="form-control" placeholder="Last Name*" type="text">
          <label for="inputEmail" class="sr-only">Email address</label>
          <span class="error"><?php echo $emailErr; ?></span>
          <input style="margin-top:5px;" name="email" id="inputEmail" class="form-control" placeholder="Email address*" type="email">
          <label for="confirmEmail" class="sr-only">Confirm Email address</label>
          <span class="error"><?php echo $emailConfirmErr; ?></span>
          <input style="margin-top:5px;" name="confirmEmail" id="confirmEmail" class="form-control" placeholder="Confirm email address*" type="email">
          <label for="inputPassword" class="sr-only">Password</label>
          <span class="error"><?php echo $passwordErr; ?></span>
          <input style="margin-top:5px;" name="password" id="inputPassword" class="form-control" placeholder="Password*" type="password">
          <label for="confirmPassword" class="sr-only">Confirm Password</label>
          <span class="error"><?php echo $passwordConfirmErr; ?></span>
          <input style="margin-top:5px;" name="confirmPassword" id="confirmPassword" class="form-control" placeholder=" Confirm password*" type="password">
          <span class="error"><?php echo $serverErr; ?></span>
          <button style="margin-top:15px;"class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
          <br />
          <div class="row">
              <div class="col-6">
                  <a href="manLogin.php" class="btn btn-lg btn-secondary btn-block">Login</a>
              </div>
              <div class="col-6">
                  <a href="../index.php" class="btn btn-lg btn-secondary btn-block">Home</a>
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
