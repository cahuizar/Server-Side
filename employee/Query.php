<?php
    include('../Database.php')
     /*
        All employee queries will go here
     */
    class Query {
        private static $dsn = "mysql:host=localhost;dbname=cahuizar_db";
        private static $username = "cahuizar";
        private static $password = "server123";
        private string $db;

        function __construct(argument)
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

        public function empExists($email)
        {
            // return the row if the user exists
            $query = "SELECT count(*) as c FROM Employee
                      WHERE email= ?";

            $statement = $db->prepare($query);
            $statement->execute(array($email));
            $row = $statement->fetch(PDO::FETCH_OBJ);
            $count = $row->c;

            if($count == 1) {
                return true;
            }
            return false;
        }

        public function newEmp($email, $password, $fName, $lName, $counter)
        {
            // INSERT data into person table
            $query = "INSERT INTO Person (email, fName, lName) VALUES (?, ?, ?)";
            $statement = $db->prepare($query);
            $statement->execute(array($email, $fName, $lName));

            // INSERT data into Employee table
            $query = "INSERT INTO Employee (email, password, counter) VALUES (?, ?, ?)";
            $statement = $db->prepare($query);
            $statement->execute(array($email, $password, $counter));
        }

        public function getFName($email) {
            // retrive the first name from database
            $query = "SELECT fName as c FROM Employee where email = ?";
            $statement = $db->prepare($query);
            $statement->execute(array($email));
            $row = $statement->fetch(PDO::FETCH_OBJ);
            $fName = $row->c;
            return $fName;
        }


        public function setCounter($email, $counter) {
            $query = "UPDATE User
                      SET counter= ?
                      WHERE email= ?";

            $statement = $db->prepare($query);
            $statement->execute(array($counter, $email));
        }

        public function getCounter($email) {
            // retrieve the number of tries the user has done to login
            $query = "SELECT counter as attempts FROM User
                      WHERE email= ?";

            $statement = $db->prepare($query);
            $statement->execute(array($email));
   		    $row = $statement->fetch(PDO::FETCH_OBJ);
            $attempts = $row->attempts;

            return $attempts;
        }

    }


 ?>
