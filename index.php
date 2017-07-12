<!DOCTYPE html>
<!--
TITLE: Course Project 2
AUTHOR: Carlos Huizar
File Name: index.php
ORIGINALLY CREATED ON: 07/04/2017
-->
<html lang="en">
  <head>
    <title>Management Service | Home </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <script src="https://use.fontawesome.com/fe327c8daa.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  </head>
  <body>
    <div class="container h-100">
      <div class="row h-100 justify-content-center align-items-center">
        <div class="col">
          <p class="heading">Management Service</p>
          <p class="sub-heading"><span class="typed"></span></p>
          <a href="employee/empLogin.php"><p class="text-center links login">Employee Login</p></a>
          <a href="manager/manLogin.php"><p class="text-center login">Management Login</p></a>
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
    <script src="js/typed.js"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function(){
          Typed.new('.typed', {
            strings: ["Professional Cleaning",  "Great Service", "Customer Satisfaction"],
            typeSpeed: 75
          });
      });
</script>
  </body>
</html>
