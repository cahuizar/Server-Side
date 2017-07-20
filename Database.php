<?php
    class Database {
        private static $dsn = "mysql:host=localhost;dbname=cahuizar_db";
        private static $username = "cahuizar";
        private static $password = "server123";
        private static $db;
        private static $fName;

        private function __construct() { }

        public static function getDB() {
            if(!isset(self::$db)) {
                try {
                    self::$db = new PDO(self::$dsn,
                                        self::$username,
                                        self::$password);
                } catch (PDOException $e) {

                }
            }
            return self::$db;
        }

        public static function getFName($email) {
            $sql = "SELECT fName FROM Employee where email = ':email'";
            $statement = self::$db->prepare($sql);
            $statement->bindValue(":email", $email);
            $statement->execute();
            $row = $statement->fetchAll();
            $statement->closeCursor();
            self::$fName = $row['fName'];
            return self::$fName;
        }
    }
?>