<?php
class Database{
    private $dbserver = "localhost";
    private $dbpassword = "";
    private $dbuser = "root";
    private $dbname = "bake_pal";
    protected $conn;
    // constructor
    public function __construct(){
        try {
        $dsn = "mysql:host={$this->dbserver};dbname={$this->dbname};";
        $options = array(PDO::ATTR_PERSISTENT);
        $this->conn = new PDO($dsn,$this->dbuser,$this->dbpassword,$options);
        
        echo "connected";
        } catch (PDOException $e) {
            echo "connection failed". $e->getMessage();
            
        }
        
    }

}