<?php
class DB {
    private static $instance = null;
    private $connection;
    private function __construct() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "demo";

        try {
            $this->connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }

}


// $sql="CREATE TABLE types (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     name VARCHAR(100)
// );";
//   $connect=DB::getInstance()->getConnection();
//   $connect->exec($sql);


//   $sql="CREATE TABLE users (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     name VARCHAR(100),
//     email VARCHAR(100),
//     address VARCHAR(100),
//     phone int,
//     type_id int,
//     FOREIGN KEY (type_id) REFERENCES types(id)

// );";
//   $connect=DB::getInstance()->getConnection();
//   $connect->exec($sql);
  

?>