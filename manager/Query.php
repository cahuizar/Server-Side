<?php
    include('../Database.php');
     /*
        All employee queries will go here
     */
    class Query {
        private static $dsn = "mysql:host=localhost;dbname=cahuizar_db";
        private static $username = "cahuizar";
        private static $password = "server123";
        private static $db;

        function __construct()
        {
            if(!isset(self::$db)) {
                try {
                    self::$db = new PDO(self::$dsn,
                                        self::$username,
                                        self::$password);
                } catch (PDOException $e) {

                }
            }
        }

        public function manExists($email)
        {
            // return the row if the user exists
            $query = "SELECT count(*) as c FROM Manager
                      WHERE email= ?";

            $statement = self::$db->prepare($query);
            $statement->execute(array($email));
            $row = $statement->fetch(PDO::FETCH_OBJ);
            $count = $row->c;

            if($count == 1) {
                return true;
            }
            return false;
        }

        public function login($email, $password)
        {
            // check to see if credentials are good
            $query = "SELECT count(*) as c FROM Employee
                      JOIN Manager
                      ON Employee.email = Manager.email
                      WHERE Manager.email= ?
                      AND Employee.password = ?";

            $statement = self::$db->prepare($query);
            $statement->execute(array($email, $password));
            $row = $statement->fetch(PDO::FETCH_OBJ);
            $count = $row->c;

            if($count == 1) {
                return true;
            }
            return false;
        }

        public function newMan($email, $password, $fName, $lName, $counter)
        {
            // INSERT data into person table
            $query = "INSERT INTO Person (email, fName, lName) VALUES (?, ?, ?)";
            $statement = self::$db->prepare($query);
            $statement->execute(array($email, $fName, $lName));

            // INSERT data into Employee table
            $query = "INSERT INTO Employee (email, password, counter) VALUES (?, ?, ?)";
            $statement = self::$db->prepare($query);
            $statement->execute(array($email, $password, $counter));

            // INSERT data into Employee table
            $query = "INSERT INTO Manager (email) VALUES (?)";
            $statement = self::$db->prepare($query);
            $statement->execute(array($email));
        }

        public function newTimesheet($email, $date, $startTime, $endTime)
        {
            // INSERT data into timesheet table
            $query = "INSERT INTO Timesheet (email, date, startTime, endTime) VALUES (?, ?, ?, ?)";
            $statement = self::$db->prepare($query);
            $statement->execute(array($email, $date, $startTime, $endTime));

        }

        public function updateEmp($curEmail, $email, $password, $fName, $lName, $counter)
        {
            // Update Person table
            $query = "UPDATE Person
                      SET fName = ?, lName = ?, email = ?
                      WHERE email = ?";
            $statement = self::$db->prepare($query);
            $statement->execute(array($fName, $lName, $email, $curEmail));

            // Update Employee table
            $query = "UPDATE Employee
                      SET password = ?, counter = ?
                      WHERE email = ?";
            $statement = self::$db->prepare($query);
            $statement->execute(array($password, $counter, $email));

        }

        public function updateClient($curEmail, $email, $fName, $lName, $telephone, $address)
        {
            // Update Person table
            $query = "UPDATE Person
                      SET fName = ?, lName = ?, email = ?
                      WHERE email = ?";
            $statement = self::$db->prepare($query);
            $statement->execute(array($fName, $lName, $email, $curEmail));

            // Update Employee table
            $query = "UPDATE Client
                      SET address = ?, telephone = ?
                      WHERE email = ?";
            $statement = self::$db->prepare($query);
            $statement->execute(array($address, $telephone, $email));

        }

        public function deletePerson($email)
        {
            // Delete Person table
            $query = "DELETE FROM Person
                      WHERE email = ?";
            $statement = self::$db->prepare($query);
            $statement->execute(array($email));

        }

        public function newEmp($email, $password, $fName, $lName, $counter)
        {
            // INSERT data into person table
            $query = "INSERT INTO Person (email, fName, lName) VALUES (?, ?, ?)";
            $statement = self::$db->prepare($query);
            $statement->execute(array($email, $fName, $lName));

            // INSERT data into Employee table
            $query = "INSERT INTO Employee (email, password, counter) VALUES (?, ?, ?)";
            $statement = self::$db->prepare($query);
            $statement->execute(array($email, $password, $counter));
        }

        public function newClient($email, $address, $fName, $lName, $telephone)
        {
            // INSERT data into person table
            $query = "INSERT INTO Person (email, fName, lName) VALUES (?, ?, ?)";
            $statement = self::$db->prepare($query);
            $statement->execute(array($email, $fName, $lName));

            // INSERT data into Employee table
            $query = "INSERT INTO Client (email, address, telephone) VALUES (?, ?, ?)";
            $statement = self::$db->prepare($query);
            $statement->execute(array($email, $address, $telephone));
        }

        public function updateMan($curEmail, $email, $password, $fName, $lName, $counter)
        {
            // Update Person table
            $query = "UPDATE Person
                      SET fName = ?, lName = ?, email = ?
                      WHERE email = ?";
            $statement = self::$db->prepare($query);
            $statement->execute(array($fName, $lName, $email, $curEmail));

            // Update Employee table
            $query = "UPDATE Employee
                      SET password = ?, counter = ?
                      WHERE email = ?";
            $statement = self::$db->prepare($query);
            $statement->execute(array($password, $counter, $email));

        }

        public function getMan($email) {
            // retrieve the employees information
            $query = "SELECT Manager.email, Person.fName, Person.lName,
                      Employee.password
                      FROM Person
                      JOIN Employee
                      ON Person.email = Employee.email
                      JOIN Manager
                      ON Manager.email = Employee.email
                      where Manager.email = ?";
            $statement = self::$db->prepare($query);
            $statement->execute(array($email));
            $row = $statement->fetch(PDO::FETCH_OBJ);
            return $row;
        }

        public function getEmployeesCount() {
            // retrieve the employees information
            $query = "SELECT count(*) as results
                      FROM Person
                      JOIN Employee
                      ON Person.email = Employee.email";
            $statement = self::$db->prepare($query);
            $statement->execute();
            $row = $statement->fetchAll();
            return $row;
        }

        public function getEmployees() {
            // retrieve the employees information
            $query = "SELECT Employee.email, Person.fName, Person.lName,
                      Employee.password
                      FROM Person
                      JOIN Employee
                      ON Person.email = Employee.email";
            $statement = self::$db->prepare($query);
            $statement->execute();
            $row = $statement->fetchAll();
            return $row;
        }

        public function getClientsCount() {
            // retrieve the clients information
            $query = "SELECT count(*) as results
                      FROM Person
                      JOIN Client
                      ON Person.email = Client.email";
            $statement = self::$db->prepare($query);
            $statement->execute();
            $row = $statement->fetchAll();
            return $row;
        }

        public function getClients() {
            // retrieve the clients information
            $query = "SELECT Person.email, Person.fName, Person.lName, Client.address, Client.telephone
                      FROM Person
                      JOIN Client
                      ON Person.email = Client.email";
            $statement = self::$db->prepare($query);
            $statement->execute();
            $row = $statement->fetchAll();
            return $row;
        }

        public function getEmpScheduleCount($email) {
            // retrieve the the employees working schedule
            $query = "SELECT count(*) as results
                      FROM Person
                      JOIN Client
                      ON Person.email = Client.email
                      JOIN WorkDate
                      ON Client.email = WorkDate.clientEmail
                      WHERE WorkDate.empEmail = ?";
            $statement = self::$db->prepare($query);
            $statement->execute(array($email));
            $row = $statement->fetch(PDO::FETCH_OBJ);
            return $row;
        }

        public function getEmpSchedule($email) {
            // retrieve the the employees working schedule
            $query = "SELECT WorkDate.date, Person.fName, Person.lName, WorkDate.startTime
                      FROM Person
                      JOIN Client
                      ON Person.email = Client.email
                      JOIN WorkDate
                      ON Client.email = WorkDate.clientEmail
                      WHERE WorkDate.empEmail = ?";
            $statement = self::$db->prepare($query);
            $statement->execute(array($email));
            $row = $statement->fetchAll();
            return $row;
        }

        public function getFName($email) {

            // retrieve the first name from database
            $query = "SELECT Person.fName as fName
                      FROM Person
                      JOIN Employee
                      ON Person.email = Employee.email
                      JOIN Manager
                      ON Manager.email = Employee.email
                      where Manager.email = ?";
            $statement = self::$db->prepare($query);
            $statement->execute(array($email));
            $row = $statement->fetch(PDO::FETCH_OBJ);
            $fName = $row->fName;
            return $fName;
        }

        public function setCounter($email, $counter) {
            $query = "UPDATE Employee
                      SET counter= ?
                      WHERE email= ?";

            $statement = self::$db->prepare($query);
            $statement->execute(array($counter, $email));
        }


        public function getCounter($email) {
            // retrieve the number of tries the user has done to login
            $query = "SELECT counter as attempts FROM Employee
                      WHERE email= ?";

            $statement = self::$db->prepare($query);
            $statement->execute(array($email));
   		    $row = $statement->fetch(PDO::FETCH_OBJ);
            $attempts = $row->attempts;

            return $attempts;
        }

    }
 ?>
