<?php
// session_start();
class Database{
    private $dbserver = "localhost";
    private $dbpassword = "";
    private $dbuser = "root";
    private $dbname = "bake_pal";
    protected $conn;
    // constructor
    public function __construct(){
        try {
            $query = "mysql:host=" . $this->dbserver . ";dbname=" . $this->dbname;
            $this->conn = new PDO($query, $this->dbuser, $this->dbpassword);
            $this ->conn -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
            $this ->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
       
        // echo "connected";
        } catch (PDOException $e) {
            echo "connection failed". $e->getMessage();
            
        }
        
    }

}