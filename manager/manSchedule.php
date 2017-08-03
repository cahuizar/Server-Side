<!DOCTYPE html>
<!--
TITLE: Course Project 2
AUTHOR: Carlos Huizar
File Name: manSchedule.php
ORIGINALLY CREATED ON: 07/04/2017
-->
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
          $employees = $query->getEmployees();
          $rowCount = $query->getEmployeesCount();
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // logout button clicked
            if (isset($_POST['logout'])) {
                // remove all from session from session
                session_destroy();
                header("Location: manLogin.php?l=q");
            } else if(isset($_POST['edit'])) {
                header("Location: editEmployee.php");
            }
            else if(isset($_POST['work'])) {
                header("Location: newWorkDay.php");
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
        <h1 class="pages-heading">Employees</h1>
        <div class="row">
            <div class="col-12 col-sm-3">
                <form action="newEmployee.php">
                    <button class="btn btn-lg btn-primary btn-block schedule-submit" type="submit">+ Add Employee</button>
                    <br />
                </form>
            </div>
        </div>
        <?php
          $results = $rowCount[0];
          if($results >= 1) {
              echo '<div id="accordion" role="tablist" aria-multiselectable="true">';
              $counter = 0;
              foreach($employees as $employee) {
                echo '
                  <div class="card">
                    <div class="card-header" role="tab" id="heading'. $counter .'">
                      <h5 class="mb-0">
                        <div class="row">
                            <div class="d-flex align-items-center schedule-flex">
                                <div class="col-8 col-md-10">
                                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse'. $counter .'" aria-expanded="true" aria-controls="collapseOne">
                                      '. $employee['fName'] .' '. $employee['lName'] .'
                                  </a>
                                </div>
                            </div>
                        </div>
                      </h5>
                    </div>
                    <div id="collapse'. $counter .'" class="collapse " role="tabpanel" aria-labelledby="heading'. $counter .'">
                      <div class="card-block">
                          <div class="accordion" id="accordion2">
                          <div class="card">
                            <div class="card-header">
                              <h5 class="mb-0"><a data-toggle="collapse" data-parent="#accordion2" href="#collapseInner'. $counter .'">
                                Edit Employee & New Work Date
                            </a></h5>
                            </div>
                            <div id="collapseInner'. $counter .'" class="collapse">
                              <div class="card-block">
                                  <form method="post">
                                    <div class="row">
                                          <div class="col-12 col-md-6 form-group">
                                              <label for="fName">First Name</label>
                                              <input name="fName" class="form-control" type="text" value="'. $employee['fName'] .'" disabled>
                                          </div>
                                          <div class="col-12 col-md-6">
                                              <label for="lName">Last Name</label>
                                              <input name="lName" class="form-control" type="text" value="'. $employee['lName'] .'" disabled>
                                          </div>
                                          <div class="col-12 col-md-6">
                                              <label for="email">Email Address</label>
                                              <input name="email" class="form-control" type="text" value="'. $employee['email'] .'" disabled>
                                          </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <button class="btn btn-lg btn-primary btn-block schedule-submit" name="edit">Edit Employee</button>
                                        </div>
                                        <div class="col-6">
                                            <button class="btn btn-lg btn-primary btn-block schedule-submit" name="work">New Work Date</button>
                                        </div>
                                    </div>
                                    <br />
                                  </form>
                              </div>
                            </div>
                          </div>
                          ';
                      $counter++;
                      echo '
                          <div class="card">
                            <div class="card-header">
                              <h5 class="mb-0"><a data-toggle="collapse" data-parent="#accordion2" href="#collapseInner'. $counter .'">
                                View Schedule
                              </a></h4>
                            </div>
                            <div id="collapseInner'. $counter .'" class="collapse">
                              <div class="card-block">
                            ';
                      $empEmail = $employee['email'];
                      $count = $query->getEmpScheduleCount($empEmail);
                      $schedules = $query->getEmpSchedule($empEmail);
                      $results = $count->results;
                      if($results > 1) {
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
                          echo '
                            <tr>
                              <td scope="row">'. $schedule['date'] .'</td>
                              <td>'. $schedule['fName'] .' '. $schedule['lName'] .'</td>
                              <td>'. $schedule['startTime'] .'</td>
                            </tr>
                          ';
                        }
                        echo '
                            </tbody>
                          </table>
                        ';
                      } else {
                        echo '<p class="no-results text-center">The employee does not have a schedule yet.</p>';
                      }
                echo '
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              ';
              $counter++;
              }
              echo '
                  </div>
              ';
            } else {
              echo '<p class="no-results text-center">There are no employees.</p>';
            }
        ?>

          <!--<div class="card">
            <div class="card-header" role="tab" id="headingFour">
              <h5 class="mb-0">
                <div class="row">
                    <div class="d-flex align-items-center schedule-flex">
                        <div class="col-8 col-md-10">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="true" aria-controls="collapseOne">
                              Stacy Turk
                          </a>
                        </div>
                    </div>
                </div>
              </h5>
            </div>
            <div id="collapseFour" class="collapse" role="tabpanel" aria-labelledby="headingOne">
              <div class="card-block">
                  <div class="accordion" id="accordion5">
                  <div class="card">
                    <div class="card-header">
                      <h5 class="mb-0"><a data-toggle="collapse" data-parent="#accordion5" href="#collapseInner5">
                        Edit Employee & New Work Date
                    </a></h5>
                    </div>
                    <div id="collapseInner5" class="collapse">
                      <div class="card-block">
                          <form method="post">
                            <div class="row">
                                  <div class="col-12 col-md-6 form-group">
                                      <label for="fName">First Name</label>
                                      <input name="fName" class="form-control" type="text" value="Stacy" disabled>
                                  </div>
                                  <div class="col-12 col-md-6">
                                      <label for="lName">Last Name</label>
                                      <input name="lName" class="form-control" type="text" value="Turk" disabled>
                                  </div>
                                  <div class="col-12 col-md-6">
                                      <label for="email">Email Address</label>
                                      <input name="email" class="form-control" type="text" value="stacy.turk@info.com" disabled>
                                  </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <button class="btn btn-lg btn-primary btn-block schedule-submit" name="edit">Edit Employee</button>
                                </div>
                                <div class="col-6">
                                    <button class="btn btn-lg btn-primary btn-block schedule-submit" name="work">New Work Date</button>
                                </div>
                            </div>
                            <br />
                          </form>
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header">
                      <h5 class="mb-0"><a data-toggle="collapse" data-parent="#accordion2" href="#collapseInner6">
                        View Schedule
                      </a></h4>
                    </div>
                    <div id="collapseInner6" class="collapse">
                      <div class="card-block">
                          <table class="table table-hover">
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
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" role="tab" id="headingSeven">
              <h5 class="mb-0">
                <div class="row">
                    <div class="d-flex align-items-center schedule-flex">
                        <div class="col-8 col-md-10">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapse7" aria-expanded="true" aria-controls="collapseOne">
                              Michael Scott
                          </a>
                        </div>
                    </div>
                </div>
              </h5>
            </div>
            <div id="collapse7" class="collapse" role="tabpanel" aria-labelledby="headingOne">
              <div class="card-block">
                  <div class="accordion" id="accordion8">
                  <div class="card">
                    <div class="card-header">
                      <h5 class="mb-0"><a data-toggle="collapse" data-parent="#accordion8" href="#collapseInner8">
                        Edit Employee & New Work Date
                    </a></h5>
                    </div>
                    <div id="collapseInner8" class="collapse">
                      <div class="card-block">
                          <form method="post">
                            <div class="row">
                                  <div class="col-12 col-md-6 form-group">
                                      <label for="fName">First Name</label>
                                      <input name="fName" class="form-control" type="text" value="Michael" disabled>
                                  </div>
                                  <div class="col-12 col-md-6">
                                      <label for="lName">Last Name</label>
                                      <input name="lName" class="form-control" type="text" value="Scott" disabled>
                                  </div>
                                  <div class="col-12 col-md-6">
                                      <label for="email">Email Address</label>
                                      <input name="email" class="form-control" type="text" value="m.scott@info.com" disabled>
                                  </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <button class="btn btn-lg btn-primary btn-block schedule-submit" name="edit">Edit Employee</button>
                                </div>
                                <div class="col-6">
                                    <button class="btn btn-lg btn-primary btn-block schedule-submit" name="work">New Work Date</button>
                                </div>
                            </div>
                            <br />
                          </form>
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header">
                      <h5 class="mb-0"><a data-toggle="collapse" data-parent="#accordion2" href="#collapseInner9">
                        View Schedule
                      </a></h4>
                    </div>
                    <div id="collapseInner9" class="collapse">
                      <div class="card-block">
                          <table class="table table-hover">
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
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>-->
      </div>
      <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  </body>
</html>
