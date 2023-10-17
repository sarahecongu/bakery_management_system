<?php
class DatabaseConnection
{
	private $db_username = 'root';
	private $db_password = '';
	private $database = "bake_pal";
	protected $conn;

	protected function connect_db()
	{
		$this->conn = new PDO('mysql:host=127.0.0.1;dbname=' . $this->database, $this->db_username, $this->db_password);
		$this ->conn -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
		if (!$this->conn) {
			return "Fatal Error: Connection Failed!";
		} else {
			return $this->conn;
		}
	}
}
