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
          <form class="form-inline">
            <label style="padding-right:20px;">Hi,&nbsp;<span class="nav-name"> John</span></label>
            <a class="btn btn-primary my-2 my-sm-0 logout">Logout</a>
          </form>
        </div>
      </nav>
      <div class="container">
        <h1 class="pages-heading">Employees</h1>
        <div id="accordion" role="tablist" aria-multiselectable="true">
          <div class="card">
            <div class="card-header" role="tab" id="headingOne">
              <h5 class="mb-0">
                <div class="row">
                    <div class="d-flex align-items-center schedule-flex">
                        <div class="col-8 col-md-10">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                              Landon Donovan
                          </a>
                        </div>
                        <div class="text-right">
                           <a class="btn btn-danger text-right">Delete</a>
                        </div>
                    </div>
                </div>
              </h5>
            </div>
            <div id="collapseOne" class="collapse " role="tabpanel" aria-labelledby="headingOne">
              <div class="card-block">
                  <div class="accordion" id="accordion2">
                  <div class="card">
                    <div class="card-header">
                      <h5 class="mb-0"><a data-toggle="collapse" data-parent="#accordion2" href="#collapseInnerOne">
                        New Work Date
                    </a></h5>
                    </div>
                    <div id="collapseInnerOne" class="collapse">
                      <div class="card-block">
                          <form>
                            <div class="row">
                                <div class="col-12 col-md-3">
                                    <label for="date">Date</label>
                                    <input name="date" class="form-control" placeholder="Date" type="text" id="datepicker">
                                </div>
                                <div class="col-12 col-md-5">
                                    <label for="exampleSelect2">Clients (select multiple):</label>
                                    <select multiple class="form-control" id="exampleSelect2">
                                      <option>Mark Johnson</option>
                                      <option>Stacy Clark</option>
                                      <option>Jacob Smith</option>
                                      <option>Susan Ridgeway</option>
                                      <option>Carlos Lopez</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-3">
                                    <label for="startTime" class="exampleSelect2">Start Time</label>
                                    <input name="startTime" class="form-control" placeholder="Start time" type="text" id="startTime" value="">
                                    <label for="endTime" class="sr-only">End Time</label>
                                </div>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block schedule-submit" type="submit">Submit</button>
                            <br />
                          </form>
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header">
                      <h5 class="mb-0"><a data-toggle="collapse" data-parent="#accordion2" href="#collapseInnerTwo">
                        View Schedule
                      </a></h4>
                    </div>
                    <div id="collapseInnerTwo" class="collapse">
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
            <div class="card-header" role="tab" id="headingFour">
              <h5 class="mb-0">
                <div class="row">
                    <div class="d-flex align-items-center schedule-flex">
                        <div class="col-8 col-md-10">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="true" aria-controls="collapseOne">
                              Stacy Turk
                          </a>
                        </div>
                        <div class="text-right">
                           <a class="btn btn-danger text-right">Delete</a>
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
                        New Work Date
                    </a></h5>
                    </div>
                    <div id="collapseInner5" class="collapse">
                      <div class="card-block">
                          <form>
                            <div class="row">
                                <div class="col-12 col-md-3">
                                    <label for="date">Date</label>
                                    <input name="date" class="form-control" placeholder="Date" type="text" id="datepicker">
                                </div>
                                <div class="col-12 col-md-5">
                                    <label for="exampleSelect2">Clients (select multiple):</label>
                                    <select multiple class="form-control" id="exampleSelect2">
                                      <option>Mark Johnson</option>
                                      <option>Stacy Clark</option>
                                      <option>Jacob Smith</option>
                                      <option>Susan Ridgeway</option>
                                      <option>Carlos Lopez</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-3">
                                    <label for="startTime" class="exampleSelect2">Start Time</label>
                                    <input name="startTime" class="form-control" placeholder="Start time" type="text" id="startTime" value="">
                                    <label for="endTime" class="sr-only">End Time</label>
                                </div>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block schedule-submit" type="submit">Submit</button>
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
                        <div class="text-right">
                           <a class="btn btn-danger text-right">Delete</a>
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
                        New Work Date
                    </a></h5>
                    </div>
                    <div id="collapseInner8" class="collapse">
                      <div class="card-block">
                          <form>
                            <div class="row">
                                <div class="col-12 col-md-3">
                                    <label for="date">Date</label>
                                    <input name="date" class="form-control" placeholder="Date" type="text" id="datepicker">
                                </div>
                                <div class="col-12 col-md-5">
                                    <label for="exampleSelect2">Clients (select multiple):</label>
                                    <select multiple class="form-control" id="exampleSelect2">
                                      <option>Mark Johnson</option>
                                      <option>Stacy Clark</option>
                                      <option>Jacob Smith</option>
                                      <option>Susan Ridgeway</option>
                                      <option>Carlos Lopez</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-3">
                                    <label for="startTime" class="exampleSelect2">Start Time</label>
                                    <input name="startTime" class="form-control" placeholder="Start time" type="text" id="startTime" value="">
                                    <label for="endTime" class="sr-only">End Time</label>
                                </div>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block schedule-submit" type="submit">Submit</button>
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
        </div>
      </div>
      <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  </body>
</html>
