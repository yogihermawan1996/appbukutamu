<?php
error_reporting(0);
class koneksi{
	
	public 	$host = "localhost";
	private $db_name = "bukutamu";
	private $username = "root";
	private $password = "";
	private $conn;
	
	public function doKoneksi(){
	
		$this->conn = null;
		
		try{
			$this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
		}catch(PDOException $exception){
			echo "Connection error: " . $exception->getMessage();
		}
		return $this->conn;
	}
}
?>
