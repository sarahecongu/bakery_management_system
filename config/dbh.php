<?php
class Database{
    private $dsn = "mysql:host=localhost;dbname=bakery";
    private $dbuser = "root";
    private $dbpassword = "";
    private $conn;

    public function __construct(){
        try {
            $this->conn = new PDO($this->dsn, $this->dbuser, $this->dbpassword);
            echo "success";
        } catch (PDOException $e) {
            echo 'Error:'.$e->getMessage();
        }
    }

    public function getConnection() {
        return $this->conn;
    }
}

$ob = new Database();
$connection = $ob->getConnection();
